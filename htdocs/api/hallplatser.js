
/* Skolans position */
var lat = 59.336885;
var lon = 18.048323;

mapboxgl.accessToken = 'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
    center: [lon, lat], // starting position [lng, lat]
    zoom: 10 // starting zoom
});

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showLocation);
} else {
    alert("Kan inte hitta din position. Du har en gammal webbläsare.");
}

function showLocation(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    console.log("Din position är: " + lat + ", " + lon);

    /* Skapa en special markerikon för hem */
    var hem = document.createElement('div');
    hem.className = 'marker';
    var marker = new mapboxgl.Marker(hem)
        .setLngLat([lon, lat])
        .addTo(map);

    map.flyTo({
        center: [lon, lat],
        zoom: 15,
        speed: 0.2,
        curve: 1,
        easing(t) {
            return t;
        }
    });

    /* Omvandla data till post-data */
    var postData = new FormData();
    postData.append("lat", lat);
    postData.append("lon", lon);

    /* Skicka data till ett php-skript */
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "hallplatser.php", true);
    ajax.send(postData);

    ajax.addEventListener("loadend", fetchStops);

    function fetchStops() {
        /* Tar emot datat från php-skriptet */
        var stopsJson = this.responseText;
        //console.log(stopsJson);

        /* Kodar av json-formatet */
        var stops = JSON.parse(stopsJson);

        /* Loppa igenom alla hållplatser */
        stops.forEach(stop => {
            console.log("Hållplats: ", stop[0], stop[1], stop[2]);

            /* Skapa en popup med gatuadressen */
            var popup = new mapboxgl.Popup({
                offset: 25
            })
                .setText(stop[0]);

            /* Infoga en marker på kartan för varje hållpats */
            var marker = new mapboxgl.Marker()
                .setLngLat([stop[2], stop[1]])
                .setPopup(popup)
                .addTo(map);
        });
    }
}