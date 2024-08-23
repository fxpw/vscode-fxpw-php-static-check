import * as vscode from 'vscode';

export function activate(context: vscode.ExtensionContext) {
	try {
		console.log("init check");
	} catch (error) {
		console.error(error);
	}

}

// This method is called when your extension is deactivated
export function deactivate() { }
