import '@toast-ui/editor/dist/toastui-editor.css'
import Editor from '@toast-ui/editor'

if (document.querySelectorAll('#editor').length > 0) {
    window.editor = new Editor({
        initialValue: document.querySelector('#description').value,
        el: document.querySelector('#editor'),
        previewStyle: "vertical",
        height: "600px",
        initialEditType: "markdown",
        useCommandShortcut: true,
    })
}