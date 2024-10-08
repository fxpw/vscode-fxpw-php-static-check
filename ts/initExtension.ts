import * as vscode from 'vscode';
import {PhpСheck} from "./phpСheck";
export async function activate(context: vscode.ExtensionContext) {
	try {
		await PhpСheck.Init(context);
		console.log("init vscode-fxpw-php-static-check v1.0.14");
	} catch (error) {
		console.error(error);
	}
}

// This method is called when your extension is deactivated
export function deactivate() { }
