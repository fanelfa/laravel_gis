var map = L.map('map', {
    center: [20.0, 5.0],
    minZoom: 2,
    zoom: 2
})

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    subdomains: ['a', 'b', 'c']
}).addTo(map)

var myIcon = L.icon({
    iconUrl: myURL + '/pin24.png',
    iconRetinaUrl: myURL + '/pin48.png',
    iconSize: [29, 24],
    iconAnchor: [9, 21],
    popupAnchor: [0, -14]
})

for (var i = 0; i < markers.length; ++i) {
    L.marker([markers[i].lat, markers[i].lng], { icon: myIcon })
        .bindPopup('<a href="' + markers[i].url + '" target="_blank">' + markers[i].name + '</a>')
        .addTo(map);
}
