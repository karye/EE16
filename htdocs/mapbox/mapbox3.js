window.onload = start;

function start() {
    const eBox = document.querySelector(".coordinates");

    mapboxgl.accessToken = 'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';
    let map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/karye/cjpb2b4yz0g2v2sqc8wlqsm6y', // stylesheet location
        center: [18.07, 59.33], // starting position [lng, lat]
        zoom: 10 // starting zoom
    });

    map.on("click", addMarker);

    function addMarker(e) {
        let marker = new mapboxgl.Marker()
            .setLngLat(e.lngLat)
            .addTo(map);

        console.log(e.lngLat);  

        /* Lägg till en ny rad i tabellen för varje click */
        eBox.innerHTML += e.lngLat.lng + "," + e.lngLat.lat + ",\n";
    }
}