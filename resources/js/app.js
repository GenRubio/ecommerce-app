require('./bootstrap');
const ViewHandler = require('./view-handler');
var outdatedBrowserRework = require('outdated-browser-rework');
ViewHandler.init({
    outdatedBrowserRework: outdatedBrowserRework,
});
