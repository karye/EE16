window.onload = start;

function start() {
    const eTextarea = document.querySelector("#chatt");
    
    /* Hämtar chatt-texten varje sekund, 1sek = 1000 msek */
    setInterval(uppdateraChatten, 1000);
    
    function uppdateraChatten() {
        
        /* Anropa ett php-skript som läser av chattfilen */
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("loadend", skrivUt);
        
        function skrivUt() {
            eTextarea.textContent = this.responseText;
        }
        ajax.open("POST", "read.php", true);
        ajax.send();
    }
}