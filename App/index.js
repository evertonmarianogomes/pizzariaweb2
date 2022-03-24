import Loader from "./Resources/js/Util/Loader.util.js";
import DarkModeSwitch from "./Resources/js/Util/DarkMode.util";
import ShowToasts from "./Resources/js/Util/Toast.util";

window.addEventListener("load", () => {
    Loader();
    DarkModeSwitch();
    ShowToasts();
});