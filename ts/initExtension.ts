import * as vscode from 'vscode';
import {PhpBladeСheck} from './PhpBladeСheck';
export async function activate(context: vscode.ExtensionContext) {
	try {
		await PhpBladeСheck.Init(context);
		console.log("init vscode-fxpw-php-static-check v1.0.3");
	} catch (error) {
		console.error(error);
	}
}

// This method is called when your extension is deactivated
export function deactivate() { }
