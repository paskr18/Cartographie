var map = L.map('map').setView([7.54, -5.54],7);
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);
          function getColor(d) { return d>5000000?"#00441B" : d>4000000?"#006D2C" : d> 3000000?"#238B45" : d>2000000?"#41AE76" : d>1000000?"#66C2A4" : d>750000?"#99D8C9" : d>500000?"#CCECE6" : d>250000?"#E5F5F9": "#F7FCFD"; }
          L.control.scale().addTo(map);
          function style(feature) { return {fillColor:getColor(feature.properties.population),weight:2,opacity:1,color:"black",dashArray:"3",fillOpacity:0.7};}
          function highlightFeature(e) { var layer = e.target;
                                         layer.setStyle({weight:5, color:"#666", dashArray:"", fillOpacity:0.7});
                                         layer.bringToFront();}
          function resetHighlight(e) { geojson.resetStyle(e.target); }
          function zoomToFeature(e) { map.fitBounds(e.target.getBounds()); }
          function onEachFeature(feature, layer) { layer.on({mouseover: highlightFeature, mouseout: resetHighlight, click: zoomToFeature}); }
         const layerDistricts = L.featureGroup();
         const geojson = L.geoJson(districts,{style:style, onEachFeature: onEachFeature}).addTo(layerDistricts);
         layerDistricts.addTo(map);