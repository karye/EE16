window.onload = start;

function start() {
    const eTextarea = document.querySelector("#chatt");

    setInterval(uppdateraChatten, 1000);
    function uppdateraChatten() {
        
        /* Anropa ett php-skript som läser av chattfilen */
        let ajax = new XMLHttpRequest();
        ajax.addEventListener("loadend", skrivUt);
        function skrivUt() {
            eTextarea.textContent = this.responseText;
        }
        ajax.open("POST", "read.php", true);
        ajax.send();
    }
    
}