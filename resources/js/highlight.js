import hljs from 'highlight.js'
import hljsBlade from 'highlightjs-blade'
import 'highlight.js/styles/atom-one-dark.css'
window.hljs = hljs

hljs.registerLanguage('blade', hljsBlade)
document.querySelectorAll('pre code').forEach((block) => hljs.highlightElement(block))