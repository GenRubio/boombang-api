const Utils = require("../objects/Utils");

const HomeController = {
    sectionEl: {
        selector: "",
    },
    init() {
        if (!Utils.checkSection(this.sectionEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners() {
       
    },
};

module.exports = HomeController;
