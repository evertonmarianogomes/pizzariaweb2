import Loader from "./Resources/ts/Loader.util";
import ShowToasts from "./Resources/ts/Toast.util";
import DarkModeSwitch from "./Resources/ts/DarkMode.util";
import bootstrap from "bootstrap";

const windowsAndMacStyles = () => {
    navigator.userAgentData.getHighEntropyValues(["architecture", "platform"]).then((ua) => {
        let plataform = ua.platform;

        if (plataform !== "Linux") {
            // Get HTML head element
            var head = document.getElementsByTagName('HEAD')[0];

            // Create new link Element
            var link = document.createElement('link');

            // set the attributes for link element 
            link.rel = 'stylesheet';

            link.type = 'text/css';

            link.href = '/pizzariaweb2/dist/css/macos_windows.css';

            // Append link element to HTML head
            head.appendChild(link);
        }
    });
}

window.addEventListener("load", () => {
    Loader();
    ShowToasts();
    DarkModeSwitch();
    windowsAndMacStyles();
})

