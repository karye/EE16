window.onload = start;

function start() {
    /* Hur vi kontaktar webbtjänsten */
    const url = "https://openexchangerates.org/api/latest.json";
    const appId = "5060dce54c554ee68ce716471d7be4a3";

    /* Element vi behöver läsa av eller skriva till */
    const eBelopp = document.querySelector("#belopp");
    const eValuta = document.querySelector("#valuta");
    const eResultat = document.querySelector("#resultat");

    eValuta.addEventListener("change", vaxla);

    function vaxla() {
        var belopp = eBelopp.value;
        console.log(belopp);
        var valuta = eValuta.value;
        console.log(valuta);
        
        /* Skicka ajax-anrop till webbtjänsten */
        var ajax = new XMLHttpRequest();
/*         ajax.onreadystatechange = function () {
            if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
                var kurs = JSON.parse(this.responseText);
                console.log(kurs.rates[valuta]);
                eResultat.value = belopp * kurs.rates[valuta];
            }
        }; */

        ajax.addEventListener("loadend", hamtaKurser);
        function hamtaKurser() {
            var kurs = JSON.parse(this.responseText);
            console.log(kurs.rates[valuta]);
            eResultat.value = belopp * kurs.rates[valuta];
        }

        ajax.open("GET", url + "?app_id=" + appId, true);
        ajax.send();
    }
}
