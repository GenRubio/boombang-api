const FormLoginController = require("./controllers/FormLoginController");

const ViewHandler = {
    init(data) {
        this.outdatedBrowserRework = data.outdatedBrowserRework;

        document.addEventListener("DOMContentLoaded", () => {
            this.onDocumentReady();
        });
    },
    onDocumentReady() {
        FormLoginController.init();
    },
};

module.exports = ViewHandler;
