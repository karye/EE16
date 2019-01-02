window.onload = start;

function start() {
    const eInput1 = document.querySelector("#namn");
    const eTextarea = document.querySelector("#chatt");
    const eInput2 = document.querySelector("#meddelande");
    const eButton = document.querySelector("button");
    let url = "server.php";
    
    eTextarea.addEventListener("change", skrollaNed);
    function skrollaNed() {
        eTextarea.scrollTop = eTextarea.scrollHeight;
    }
    skrollaNed();

    /* eButton.addEventListener("click", skicka); */
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
        formData.append("namn", eInput1.value);
        formData.append("meddelande", eTextarea.value);
        
        /* Nu, skicka data */
        ajax.send(formData);
    }
}