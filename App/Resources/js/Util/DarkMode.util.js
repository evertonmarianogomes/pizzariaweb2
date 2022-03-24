/** Adaptação do projeto "Dark Mode Switch" by Coliff. 
 * Link do Projeto: https://github.com/coliff/dark-mode-switch
*/

let darkSwitch = document.querySelector("#darkSwitch");

function DarkModeSwitch() {
    initTheme();
    navbarDark();

    darkSwitch.addEventListener("change", () => {
        navbarDark()
        resetTheme();
    });
}

function initTheme() {
    var darkThemeSelected =
        localStorage.getItem("darkSwitch") !== null &&
        localStorage.getItem("darkSwitch") === "dark";
    darkSwitch.checked = darkThemeSelected;
    darkThemeSelected
        ?
        document.body.setAttribute("data-theme", "dark") :
        document.body.removeAttribute("data-theme");
}

function resetTheme() {
    if (darkSwitch?.checked) {
        document.body.setAttribute("data-theme", "dark");
        localStorage.setItem("darkSwitch", "dark");
    } else {
        document.body.removeAttribute("data-theme");
        localStorage.removeItem("darkSwitch");
    }
}

/**DarkMode for Main Navbar */
function navbarDark() {
    var navbar = document.querySelector(".navbar");
    if (darkSwitch.checked) {
        navbar?.classList.add("navbar-dark");
        navbar?.classList.remove("navbar-light");
    } else {
        navbar?.classList.remove("navbar-dark");
        navbar?.classList.add("navbar-light");
    }
}


export default DarkModeSwitch;