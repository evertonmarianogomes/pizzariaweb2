class DarkModeSwitch {
    private darkSwitch: HTMLInputElement;

    public constructor() {
        this.darkSwitch = document.querySelector("#darkSwitch") as HTMLInputElement;

        if (this.darkSwitch) {
            this.initTheme();
            this.resetTheme();
        }
    }

    public static getInstance() {
        return new DarkModeSwitch();
    }

    private initTheme(): void {
        var darkThemeSelected =
            localStorage.getItem("darkSwitch") !== null &&
            localStorage.getItem("darkSwitch") === "dark";
        this.darkSwitch.checked = darkThemeSelected;
        darkThemeSelected
            ? document.body.setAttribute("data-theme", "dark")
            : document.body.removeAttribute("data-theme");

        (() => {
            let navbar = document.querySelector("nav.navbar") as HTMLElement;
            let table = document.querySelector(".table") as HTMLTableElement;
            if (this.darkSwitch?.checked) {
                navbar?.classList.add("navbar-dark");
                table?.classList.add("table-dark");
            } else {
                navbar?.classList.remove("navbar-dark");
                table?.classList.remove("table-dark");
            }
        })();
    }

    private resetTheme(): void {
        this.darkSwitch.addEventListener("change", function () {
            (() => {
                let navbar = document.querySelector("nav.navbar") as HTMLElement;
                let table = document.querySelector(".table") as HTMLTableElement;

                
                if (this.checked) {
                    document.body.setAttribute("data-theme", "dark");
                    localStorage.setItem("darkSwitch", "dark");
                    navbar?.classList.add("navbar-dark");
                    table?.classList.add("table-dark");
                } else {
                    document.body.removeAttribute("data-theme");
                    localStorage.removeItem("darkSwitch");
                    navbar?.classList.remove("navbar-dark");
                    table?.classList.remove("table-dark");
                }
            })();
        });
    }

}


export default DarkModeSwitch;