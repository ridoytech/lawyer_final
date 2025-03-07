function formatText(command, editorNumber, value = null) {
    const editor = document.getElementById(`editorContent${editorNumber}`);
    editor.focus();
    document.execCommand(command, false, value);
}

function insertLink(editorNumber) {
    const url = prompt('Enter the URL:');
    if (url) {
        const editor = document.getElementById(`editorContent${editorNumber}`);
        editor.focus();
        document.execCommand('createLink', false, url);
    }
}

function insertImage(editorNumber) {
    const url = prompt('Enter the image URL:');
    if (url) {
        const editor = document.getElementById(`editorContent${editorNumber}`);
        editor.focus();
        document.execCommand('insertImage', false, url);
    }
}

function undo(editorNumber) {
    const editor = document.getElementById(`editorContent${editorNumber}`);
    editor.focus();
    document.execCommand('undo', false, null);
}

function redo(editorNumber) {
    const editor = document.getElementById(`editorContent${editorNumber}`);
    editor.focus();
    document.execCommand('redo', false, null);
}

function searchText(editorNumber) {
    const text = prompt('Enter text to search:');
    if (text) {
        const editor = document.getElementById(`editorContent${editorNumber}`);
        const content = editor.innerHTML;
        const highlighted = content.replace(new RegExp(text, 'gi'), match => `<span style="background-color: yellow;">${match}</span>`);
        editor.innerHTML = highlighted;
    }
}

function spellCheck(editorNumber) {
    alert('Spell check feature is not fully implemented in this example.');
}

function saveFile(editorNumber) {
    const editor = document.getElementById(`editorContent${editorNumber}`);
    const content = editor.innerHTML;
    const blob = new Blob([content], { type: 'text/html' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `document${editorNumber}.html`;
    a.click();
}

function loadFile(editorNumber) {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'text/html';
    input.onchange = function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const editor = document.getElementById(`editorContent${editorNumber}`);
            editor.innerHTML = e.target.result;
        };
        reader.readAsText(file);
    };
    input.click();
}