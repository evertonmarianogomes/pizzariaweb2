import { Modal, Toast } from "bootstrap";


const AppFunctions = {
    showToasts: () => {
        const toastElList: Array<HTMLElement> = Array.from(document.querySelectorAll('.toast'));
        const toastList = toastElList.map(toastEl => new Toast(toastEl));
        toastList.map((toast) => {
            toast.show();
        });
    },
    logoutApp: () => {
        let btnLogout = document.querySelector("#btnLogout") as HTMLLinkElement;

        btnLogout?.addEventListener("click", (e) => {
            e.preventDefault();
    
            if (confirm("Certeza que deseja sair? ")){
                location.href = btnLogout.href;
            }
        });
    },
    showAboutModal: () => {
        let aboutModalTrigger = document.querySelector("#aboutModalToggle") as HTMLButtonElement;
        let aboutModalEl = document.querySelector("#aboutModal") as HTMLElement;

        if (aboutModalEl) {
            let aboutModal = new Modal(aboutModalEl);
            aboutModalTrigger.addEventListener("click", (e: Event) => {
                e.preventDefault();
                aboutModal.show();
            })
        }
    }
};


export default AppFunctions;