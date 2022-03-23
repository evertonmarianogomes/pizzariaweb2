import $ from "jquery";

let Loader = () => {
    setTimeout(() => {
        $("#loader_container").fadeToggle();
    }, 1100)
}

export default Loader;;