import $ from "jquery";
import DarkModeSwitch from "./ts/DarkMode";
import AppFunctions from "./ts/AppFunctions";

window.addEventListener('load', () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(() => {
        $("#loader_container").fadeOut();
    }, 1000)

    Object.values(AppFunctions).map((value) => value());

    DarkModeSwitch.getInstance();
});
