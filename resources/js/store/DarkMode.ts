import { defineStore } from "pinia";

const useDarkModeStore = defineStore("darkMode", {
    state: () => {
        var darkThemeSelected =
            localStorage.getItem("darkSwitch") !== null &&
            localStorage.getItem("darkSwitch") === "dark";

        darkThemeSelected
            ? document.body.setAttribute("data-theme", "dark")
            : document.body.removeAttribute("data-theme");

        return { darkMode: darkThemeSelected }
    },

    actions: {
        switchDarkMode() {
            if (!this.darkMode) {
                document.body.setAttribute("data-theme", "dark");
                localStorage.setItem("darkSwitch", "dark");
                this.darkMode = true;
            } else {
                document.body.removeAttribute("data-theme");
                localStorage.removeItem("darkSwitch");
                this.darkMode = false;
            }
        },
    },

});

export {useDarkModeStore};