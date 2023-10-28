var map = L.map('map').setView([7.54, -5.54],8);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);
L.control.scale().addTo(map);
          
function onMapClick(e) {
            var parts = e.latlng.toString();
            lastpart = parts.replace("LatLng(", "");
            middleForm = lastpart.replace(")" , "");
            lastForm = middleForm.replace(" ","");
            parts = lastForm.split(",");
            document.getElementById("latitude").value = parts[0];
            document.getElementById("longitude").value = parts[1]; }
            
map.on('click',onMapClick);