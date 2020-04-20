window.onload = start;

function start() {
    /* Hur vi kontaktar webbtjänsten */
    const url = "https://json.smutje.se";

    /* Element vi behöver läsa av eller skriva till */
    const eKnapp = document.querySelector("button");
    const eResultat = document.querySelector("#resultat");

    eKnapp.addEventListener("click", hamta);
    function hamta() {
       
        /* Skicka ajax-anrop till webbtjänsten */
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("loadend", hamtaJson);
        function hamtaJson() {
            var lista = JSON.parse(this.responseText);
            lista.forEach(element => {
                eResultat.innerHTML += element + "<br>";
            });
        }

        ajax.open("GET", url, true);
        ajax.send();
    }
}
