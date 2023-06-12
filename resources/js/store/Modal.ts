import { defineStore } from "pinia";
import {Modal} from "bootstrap";

const useModalStore = defineStore("BootstrapModal", {
    state: () => ({modal: Modal.prototype}),
    actions: {
        openModal(modalEl: string|null = null) {
            if(!modalEl) {
                this.modal?.show();
            } else {
                this.modal = new Modal(document.querySelector(modalEl) as HTMLElement);
                this.modal?.show();
            }
        },
        closeModal() {
            this.modal?.hide();
        }
    }
});

export {useModalStore};