import $ from "jquery";

let ShowToasts = () => {
    let toastElList = [].slice.call(document.querySelectorAll('.toast'))
    let toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl , {delay: 5000, animation: true})
    })

    toastList.forEach(element => {
        element.show();
    });

    toastElList.forEach(element => {
        element.addEventListener('hidden.bs.toast', () => {
            $(element).remove();
        })
    });
}


export default ShowToasts;