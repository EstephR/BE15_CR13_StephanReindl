//Hide Alert Message after Timeout!
window.setTimeout(hideAlert, 3000);

function hideAlert() {
    let alertEl = document.getElementById("alert-msg");
    alertEl.classList.add("d-none");
}