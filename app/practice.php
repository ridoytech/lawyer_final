<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Text Editors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        .editor {
            width: 300px;
            height: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            resize: none;
        }
        .button-container {
            text-align: center;
            margin-top: 10px;
        }
        .copy-btn {
            padding: 5px 10px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .copy-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <textarea class="editor" id="editor1" placeholder="Editor 1"></textarea>
            <div class="button-container">
                <button class="copy-btn" onclick="copyText(1)">Copy</button>
            </div>
        </div>
        <div>
            <textarea class="editor" id="editor2" placeholder="Editor 2"></textarea>
            <div class="button-container">
                <button class="copy-btn" onclick="copyText(2)">Copy</button>
            </div>
        </div>
        <div>
            <textarea class="editor" id="editor3" placeholder="Editor 3"></textarea>
            <div class="button-container">
                <button class="copy-btn" onclick="copyText(3)">Copy</button>
            </div>
        </div>
    </div>

    <script>
        function copyText(editorNumber) {
            var textArea = document.getElementById("editor" + editorNumber);
            textArea.select();
            textArea.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Copied: " + textArea.value);
        }
    </script>
</body>
</html>
