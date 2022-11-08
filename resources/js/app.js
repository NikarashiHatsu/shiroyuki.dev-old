require('./alpine');
require('./bootstrap');
require('./googleAnalytics');
require('./highlight');
require('./tui-editor');

window.marked = require('marked')
window.sanitizeHtml = require('sanitize-html')