window.onload = start;

function start() {
    const eInput = document.querySelector("input");
    const eTextarea = document.querySelector("textarea");
    const eButton = document.querySelector("button");
    let url = "server.php";
    
    eButton.addEventListener("click", skicka);
    function skicka() {
        /* Skicka ajax-anrop till webbtjänsten */
        let ajax = new XMLHttpRequest();
        ajax.addEventListener("loadend", sparaData);
        function sparaData() {
            console.log(this.responseText);
        }
        ajax.open("POST", url, true);
        
        /* Läs av formulärets innehåll */
        let formData = new FormData();
        formData.append("namn", eInput.value);
        formData.append("meddelande", eTextarea.value);
        
        /* Nu, skicka data */
        ajax.send(formData);
    }
}