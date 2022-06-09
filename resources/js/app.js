require('./bootstrap');

// ALPINE.JS
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// FIREBASE
import { initializeApp } from 'firebase/app';
import { getAnalytics } from "firebase/analytics";

const firebaseConfig = {
    apiKey: "AIzaSyADnNR4R3w3SJUr_FmnV01caif2fizhqxs",
    authDomain: "shiroyuki-dev.firebaseapp.com",
    projectId: "shiroyuki-dev",
    storageBucket: "shiroyuki-dev.appspot.com",
    messagingSenderId: "17647753783",
    appId: "1:17647753783:web:d80ca4d3023e73b2bbbdb2",
    measurementId: "G-CRCH9872R4"
};
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

// HIGHLIGHT.JS
import hljs from 'highlight.js'
import hljsBlade from 'highlightjs-blade'
import 'highlight.js/styles/atom-one-dark.css'

hljs.registerLanguage('blade', hljsBlade)
document.querySelectorAll('pre code').forEach((block) => hljs.highlightElement(block))

// TUI Editor
import '@toast-ui/editor/dist/toastui-editor.css'
import Editor from '@toast-ui/editor'
window.editor = new Editor({
    initialValue: document.querySelector('#description').value,
    el: document.querySelector('#editor'),
    previewStyle: "vertical",
    height: "600px",
    initialEditType: "markdown",
    useCommandShortcut: true,
})