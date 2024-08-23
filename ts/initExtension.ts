import * as vscode from 'vscode';
import {phpBladeСheck} from './phpBladeСheck';
export async function activate(context: vscode.ExtensionContext) {
	try {
		await phpBladeСheck.Init(context);
		console.log("init vscode-fxpw-php-static-check v1.0.3");
	} catch (error) {
		console.error(error);
	}

}

// This method is called when your extension is deactivated
export function deactivate() { }
