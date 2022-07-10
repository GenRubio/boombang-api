const Utils = require("../objects/Utils");

const FormLoginController = {
    loginFormEl: {
        selector: "#login-form",
    },
    notAccountButtonEl: {
        selector: ".not-acount-button-js",
    },
    registerFormEl:{
        selector: "#register-form"
    },
    submitButtonEl: {
        selector: ".submit-login-button-js"
    },
    init() {
        if (!Utils.checkSection(this.loginFormEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners() {
        $(document).on("submit", this.loginFormEl.selector, (e) => {
            this.loginHandler(e);
        });
    },
    loginHandler(e) {
        e.preventDefault();

        const $item = this;
        this.blockSendButton(true);

        const item = $(e.currentTarget);
        $.ajax({
            url: Utils.getUrl("homeLogin"),
            method: "POST",
            data: item.serialize(),
            success: function (data) {
                if (data.success) {
                    location.href = Utils.getUrl("home");
                } else {
                    toastr.error("Nombre o contraseña incorrectos.");
                }
                item[0].reset();
                $item.blockSendButton(false);
            },
            
        });
    },
    blockSendButton(success){
        if (success){
            $(this.submitButtonEl.selector).attr('disabled', true);
            $(this.submitButtonEl.selector).text('Cargando...');
        }
        else{
            $(this.submitButtonEl.selector).attr('disabled', false);
            $(this.submitButtonEl.selector).text('Go to chat');
        }
    }
};

module.exports = FormLoginController;
