var map = L.map('map').setView([7.54, -5.54],6);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);
function getColor(d) { return d==01?"#C0362B" : d==02?"#E74C3C" : d==03?"#9B59B6" : d==04?"#8E44AD" : d==05?"#2980B9" : d==06?"#3498DB" : d==07?"#1ABC9C" : d==08?"#16A085":  d==09?"#27AE60": d==10?"#2ECC71": d==11?"#F1C40F": d==12?"#F39C12": "#E67E22" }
L.control.scale().addTo(map);
function style(feature) { return {fillColor:getColor(feature.id),weight:2,opacity:1,color:"black",dashArray:"3",fillOpacity:0.7};}
function highlightFeature(e) { var layer = e.target;
                               layer.setStyle({weight:5, color:"#666", dashArray:"", fillOpacity:0.7});
                               layer.bringToFront();}
function resetHighlight(e) { geojson.resetStyle(e.target); }
updateInfos = function (props) { document.getElementById("district").innerHTML = "<b> District: </b>" + props.name + "<br>";
                                 document.getElementById("population").innerHTML = "<b> Population: </b>" + props.population}
function showInfos(e) { var layer = e.target;
                        updateInfos(layer.feature.properties); }
function onEachFeature(feature, layer) { layer.on({mouseover: highlightFeature, mouseout: resetHighlight, click: showInfos}); }

const geojson = L.geoJson(districts,{style:style, onEachFeature: onEachFeature}).addTo(map);