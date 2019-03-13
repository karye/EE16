window.onload = start;

function start() {

    mapboxgl.accessToken = 'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
        center: [18.07, 59.33], // starting position [lng, lat]
        zoom: 10 // starting zoom
    });

    var marker = new mapboxgl.Marker()
        .setLngLat([18.1, 59.33])
        .addTo(map);

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    } else {
        alert("Kan inte hitta din position. Du har en gammal webbläsare.");
    }

    function showLocation(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        console.log("Din position är: " + lat + ", " + lon);

    }
}