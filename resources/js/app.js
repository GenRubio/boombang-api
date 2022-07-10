require('./bootstrap');

var outdatedBrowserRework = require('outdated-browser-rework');
const annyang = require('annyang');
const ViewHandler = require('./ViewHandler');
window.electronApp = false;
ViewHandler.init({
    outdatedBrowserRework: outdatedBrowserRework,
});
