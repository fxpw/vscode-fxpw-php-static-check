import * as vscode from 'vscode';
import {ExtensionSettings} from "./ExtensionSettings";


async function debug(message:string) {
	if(ExtensionSettings.DEBUG){
		console.log(message);
	}
}


export class PhpBladeСheck {
	private static context: vscode.ExtensionContext | null;
	private static diagnosticCollection: vscode.DiagnosticCollection;

	static async CheckBlade(document: vscode.TextDocument): Promise<vscode.Diagnostic[]> {
		let diagnostics: vscode.Diagnostic[] = [];
		debug("ts/bladeСheck.ts:10");
		if(ExtensionSettings.CHECK_BLADE_TEMPLATES){
			debug("ts/bladeСheck.ts:12");
			let text = document.getText();
			const lines = text.split('\n');
			lines.forEach((line, index) => {
				if (line.includes("<=?") || line.includes("<?php") || line.includes("?>")) {
					debug("ts/bladeСheck.ts:17");
					const message = `Error in line:${index + 1} - old Blade template`;
					const range = new vscode.Range(new vscode.Position(index, 0), new vscode.Position(index, line.length));
					const diagnostic = new vscode.Diagnostic(range, message, vscode.DiagnosticSeverity.Warning);
					diagnostics.push(diagnostic);
				}
			});
		}
		return diagnostics;
	}

	static async CheckLocalization(document: vscode.TextDocument): Promise<vscode.Diagnostic[]> {
		let diagnostics: vscode.Diagnostic[] = [];
		debug("ts/bladeСheck.ts:38");
		if(ExtensionSettings.CHECK_LOCALIZATION){
			debug("ts/bladeСheck.ts:40");
			let text = document.getText();
			const lines = text.split('\n');
			lines.forEach((line, index) => {
				if (/[\u0400-\u04FF]/.test(line)) {
					debug("ts/bladeСheck.ts:45");
					const message = `Error in line:${index + 1} - localization`;
					const range = new vscode.Range(new vscode.Position(index, 0), new vscode.Position(index, line.length));
					const diagnostic = new vscode.Diagnostic(range, message, vscode.DiagnosticSeverity.Warning);
					diagnostics.push(diagnostic);
				}
			});
		}
		return diagnostics;
	}


	static async InitWatchPHPBlade(): Promise<boolean> {
		if (this.context) {
			this.diagnosticCollection = vscode.languages.createDiagnosticCollection('php-blade');
			this.context.subscriptions.push(
				vscode.workspace.onDidChangeTextDocument(async (event) => {
					let document = event.document;
					if (document.languageId === 'blade') {
						let allDiagnostics: vscode.Diagnostic[] = [];
						this.diagnosticCollection.set(document.uri, undefined);

						let diagnosticsBlade: vscode.Diagnostic[] = await this.CheckBlade(document);
						allDiagnostics.push(...diagnosticsBlade);
						
						let diagnosticsLocalization: vscode.Diagnostic[] = await this.CheckLocalization(document);
						allDiagnostics.push(...diagnosticsLocalization);
						if (allDiagnostics.length > 0) {
							this.diagnosticCollection.set(document.uri, allDiagnostics);
						}
					}
				}),
				vscode.workspace.onDidCloseTextDocument((document) => {
					this.diagnosticCollection.set(document.uri, undefined);
				})
			);
		}
		return true;
	}

	static async Init(context: vscode.ExtensionContext): Promise<boolean> {
		try {
			this.context = context;
			await ExtensionSettings.Init(context);
			await this.InitWatchPHPBlade();
			return true;
		} catch (error) {
			console.error(error);
			return false;
		}
	}
}