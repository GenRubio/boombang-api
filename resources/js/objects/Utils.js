const RoutesHelper = require("./RoutesHelper");

const Utils = {
  modalTypes: {
    modalResponse: {
      selector: "#modal-response",
    },
    modalAnswers: {
      selector: "#modal-answers",
    },
    modalQuestions: {
      selector: "#modal-questions",
    },
  },
  modalContentRenderEl: {
    selector: ".content-render",
  },

  openModal(modalId, html = "") {
    let modal = $(modalId);
    modal.modal("show");
    modal.find(".spinner-render").hide();
    modal.find(this.modalContentRenderEl.selector).html(html);
    modal.find(this.modalContentRenderEl.selector).show();
  },

  hideModal(modalId) {
    let modal = $(modalId);
    modal.modal("hide");
    modal.find(".spinner-render").show();
    modal.find(this.modalContentRenderEl.selector).hide();
    modal.find(this.modalContentRenderEl.selector).html("");
  },

  checkIfModalTypesHasShowedModal() {
    for (const modalType in this.modalTypes) {
      const selector = this.modalTypes[modalType].selector;
      const isShowed = this.checkIfModalIsShowed(selector);
      if (isShowed) return true;
    }
    return false;
  },

  checkIfModalIsShowed(modalId) {
    return $(modalId).hasClass("show");
  },

  getUrl(route, hasSlug = false) {
    const routesHelper = new RoutesHelper();
    const slug = hasSlug ? this.getEventDetailConfig().slug : null;
    const routeEl = routesHelper.getRoute(route, slug, "%slug%");
    return routeEl;
  },

  getEventDetailConfig() {
    let e = window.app.page;
    if ("undefined" == typeof e)
      throw new Error("This config does not exists. EMC01");
    return e;
  },

  showModal(selector) {
    $(selector).modal("show");
  },

  hideModal(selector) {
    $(selector).modal("hide");
  },

  disable(selector) {
    $(selector).attr("disabled", true);
  },

  enable(selector) {
    $(selector).attr("disabled", false);
  },

  checkSection(selector) {
    return document.querySelectorAll(selector).length;
  },

  ////////////////////////////////////////////////////////////////////////////////////////////
  // Copy makeRequest to the controller where you want to use it. Don't import from Utils! //
  //////////////////////////////////////////////////////////////////////////////////////////
  //
  // makeRequest(url, data, callbacksFn) {
  //   const $req = axios.post(url, data);
  //   $req.then((response) => {
  //     let sFn = callbacksFn.success;
  //
  //     if (typeof sFn == "function")
  //       sFn.bind(this)(response);
  //   });
  //
  //   $req.catch((response) => {
  //     let eFn = callbacksFn.error;
  //
  //     if (typeof eFn == "function")
  //       eFn.bind(this)(response);
  //   });
  // },
  ////////////////////////////////////////////////////////////////////////////////////////////
};
module.exports = Utils;
