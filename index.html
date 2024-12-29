<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Editor with Save File</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.38.0/min/vs/loader.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        #toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: #f4f4f4;
            border-bottom: 1px solid #ddd;
        }
        #main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
            flex-direction: row;
        }
        #editor-container {
            width: 50%;
            border-right: 1px solid #ccc;
        }
        iframe {
            width: 50%;
            height: 100%;
            border: none;
        }
        button {
            padding: 5px 10px;
            border: none;
            background-color: #e6d643;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            #main-container {
                flex-direction: column; /* Stack the editor and output */
            }
            #editor-container, iframe {
                width: 100%; /* Make both take full width */
                border-right: none; /* Remove border between them */
                height: 50%;
            }
        }
    </style>
</head>
<body>

    <div id="toolbar">
        <button id="toggle-theme">Switch to Light Mode</button>
        <button id="format-code">Format Code</button>
        <button id="save-file">Save File</button>
        <button id="run-program">Run Program</button> <!-- New Run Program button -->
    </div>

    <div id="main-container">
        <div id="editor-container"></div>
        <iframe id="output"></iframe>
    </div>

    <script>
        let editor;
        let isDarkMode = true;

        // Load Monaco Editor
        require.config({ paths: { vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.38.0/min/vs' } });
        require(['vs/editor/editor.main'], function () {
            editor = monaco.editor.create(document.getElementById('editor-container'), {
                value: `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add your CSS here */
    </style>
</head>
<body>
    <!-- Start Coding Here -->
</body>
</html>`,
                language: 'html',
                theme: 'vs-dark', // Default theme
                automaticLayout: true,
                wordWrap: 'on',
            });

            // Auto-run code on change
            editor.onDidChangeModelContent(() => {
                handleAutoCompleteTags();
            });

            // Theme toggle button logic
            document.getElementById('toggle-theme').addEventListener('click', () => {
                isDarkMode = !isDarkMode;
                const newTheme = isDarkMode ? 'vs-dark' : 'vs-light';
                const buttonText = isDarkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode';

                monaco.editor.setTheme(newTheme); // Change theme
                document.getElementById('toggle-theme').textContent = buttonText; // Update button text
            });

            // Format Code button logic
            document.getElementById('format-code').addEventListener('click', () => {
                const model = editor.getModel();
                const range = model.getFullModelRange();
                const formatted = monaco.editor.format(model, range);
                editor.setValue(formatted);
            });

         // Save File button logic
           document.getElementById('save-file').addEventListener('click', () => {
               const code = editor.getValue();
               const fileType = prompt('Enter the file format you want to save as (e.g., html, txt):', 'html');
               
    if (fileType) {
        // Normalize the file type input to lowercase
        const normalizedFileType = fileType.trim().toLowerCase();

        // Make sure the file type entered is valid (e.g., html, php, txt)
        const validFileTypes = ['html', 'php', 'txt', 'css', 'js'];

        if (validFileTypes.includes(normalizedFileType)) {
            const blob = new Blob([code], { type: `text/${normalizedFileType}` });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `index.${normalizedFileType}`;  // Save with the chosen file extension
            link.click();
        } else {
            alert('Invalid file type. Please choose from: html, php, txt, css, js.');
        }
    }
});

            // Run Program button logic
            document.getElementById('run-program').addEventListener('click', () => {
                const code = editor.getValue();
                const outputFrame = document.getElementById('output').contentWindow.document;

                // Check if code is PHP
                if (code.includes('<?php')) {
                    runPHP(code);
                } else {
                    outputFrame.open();
                    outputFrame.write(code);
                    outputFrame.close();
                }
            });

            function handleAutoCompleteTags() {
                const cursorPosition = editor.getPosition();
                const model = editor.getModel();
                const lineContent = model.getLineContent(cursorPosition.lineNumber);

                // Match an opening tag without a closing tag
                const tagMatch = lineContent.match(/<([a-zA-Z0-9\-]+)([^>]*)>$/);
                if (tagMatch) {
                    const tagName = tagMatch[1]; // Extracted tag name
                    const isSelfClosing = ['br', 'img', 'input', 'hr', 'meta', 'link'].includes(tagName); // Self-closing tags

                    // Check if the next line already has a closing tag
                    const nextLineContent = model.getLineContent(cursorPosition.lineNumber + 1);
                    if (!isSelfClosing && !nextLineContent.includes(`</${tagName}>`)) {
                        const closingTag = `</${tagName}>`;

                        // Check if the closing tag is already present in the document
                        const currentText = model.getValue();
                        if (!currentText.includes(closingTag)) {
                            const newContent = `\n    \n${closingTag}`;

                            editor.executeEdits(null, [
                                {
                                    range: new monaco.Range(
                                        cursorPosition.lineNumber,
                                        lineContent.length + 1,
                                        cursorPosition.lineNumber,
                                        lineContent.length + 1
                                    ),
                                    text: newContent,
                                },
                            ]);

                            // Move cursor to the inside of the tag
                            editor.setPosition({
                                lineNumber: cursorPosition.lineNumber + 1,
                                column: 5, // Adjust for indentation
                            });
                        }
                    }
                }

                // Auto-close CSS blocks
                if (lineContent.trim().endsWith('{')) {
                    const nextLineContent = model.getLineContent(cursorPosition.lineNumber + 1);
                    if (!nextLineContent.trim().endsWith('}')) {
                        editor.executeEdits(null, [
                            {
                                range: new monaco.Range(
                                    cursorPosition.lineNumber,
                                    lineContent.length + 1,
                                    cursorPosition.lineNumber,
                                    lineContent.length + 1
                                ),
                                text: `\n    \n}`,
                            },
                        ]);
                        editor.setPosition({
                            lineNumber: cursorPosition.lineNumber + 1,
                            column: 5,
                        });
                    }
                }

                // Auto-close PHP blocks
                if (lineContent.trim() === '<?php') {
                    const nextLineContent = model.getLineContent(cursorPosition.lineNumber + 1);
                    if (!nextLineContent.trim().endsWith('?>')) {
                        editor.executeEdits(null, [
                            {
                                range: new monaco.Range(
                                    cursorPosition.lineNumber,
                                    lineContent.length + 1,
                                    cursorPosition.lineNumber,
                                    lineContent.length + 1
                                ),
                                text: `\n    \n?>`,
                            },
                        ]);
                        editor.setPosition({
                            lineNumber: cursorPosition.lineNumber + 1,
                            column: 5,
                        });
                    }
                }
            }

            // Run PHP code via AJAX request to server
            function runPHP(phpCode) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'run_php.php', true); // You need a PHP server endpoint to handle this
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Display PHP output in iframe or elsewhere
                        document.getElementById('output').srcdoc = xhr.responseText;
                    }
                };
                xhr.send('phpCode=' + encodeURIComponent(phpCode));
            }
        });
    </script>
</body>
</html>
