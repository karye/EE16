window.onload = start();

function start() {
    const eBox = document.querySelector(".platser");
    const eKnapp = document.querySelector("#knapp");
    const url = "spara2.php";
    mapboxgl.accessToken = 'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';
    let map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/karye/cjpb2b4yz0g2v2sqc8wlqsm6y', // stylesheet location
        center: [18.07, 59.33], // starting position [lng, lat]
        zoom: 11 // starting zoom
    });
    map.on("click", addMarker);

    function addMarker(e) {
        let marker1 = new mapboxgl.Marker({
                draggable: true
            })
            .setLngLat(e.lngLat)
            .addTo(map);

        console.log(e.lngLat);
        /* eBox.innerHTML += "<tr><td>Long:" + e.lngLat.lng + "</td><td>" + e.lngLat.lat + "</td><td>Text</td></tr>"; */

        eBox.innerHTML += "<input name=\"koordinater[]\" type=\"text\" value=\"" + rund(e.lngLat.lng) + ", " + rund(e.lngLat.lat) + "\"><input name=\"beskrivningar[]\" type=\"text\" value=\"Beskrivning\">" + "\n";
    }

    eKnapp.addEventListener("click", spara);

    function spara() {
        let ajax = new XMLHttpRequest();
        ajax.addEventListener("loadend", svar);
        function svar() {
            console.log(this.responseText);
            if (this.responseText == "Sparad") {
                alert("Det funkade!");
            } else {
                alert("Det funkade inte att spara");
            }
        }
        ajax.open("POST", url, true);
        let formData = new FormData(eBox);
        ajax.send(formData);
    }
    function rund(tal) {
        return tal.toFixed(5);
    }
}