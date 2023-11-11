var map = L.map('map').setView([7.54, -5.54],8);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);
L.control.scale().addTo(map);
const layerTowns = L.featureGroup();
layerTowns.addTo(map);
var newTown = null;
var greenIcon = L.icon({iconUrl:'images/icons/green_locator.png', iconAnchor: [18,64]});
          
function onMapClick(e) {
            var parts = e.latlng.toString();
            lastpart = parts.replace("LatLng(", "");
            middleForm = lastpart.replace(")" , "");
            lastForm = middleForm.replace(" ","");
            parts = lastForm.split(",");
            document.getElementById("latitude").value = parts[0];
            document.getElementById("longitude").value = parts[1];
              if (newTown == null) {
                 newTown = L.marker(e.latlng, {icon: greenIcon}).addTo(layerTowns);
              } else {
                 newTown.setLatLng(e.latlng);
              } 
            }
            
map.on('click',onMapClick);