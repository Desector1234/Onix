<!DOCTYPE html>
<html>
<meta charset="utf-8" />

<head>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    <link rel="stylesheet" href="<a href=https://unpkg.com/leaflet@1.0.2/dist/leaflet.css">https://unpkg.com/leaflet@1.0.2/dist/leaflet.css </a>"/> <script type="text/javascript" src="countries.js">
    </script>
    <script src="leaflet-search-master\src\leaflet-search.js"></script>
    <link rel="stylesheet" href="leaflet-search-master\src\leaflet-search.css" />

    <style>
        #map {
            width: 100%;
            height: 600px;
            box-shadow: 5px 5px 5px #888;
        }
    </style>

</head>

<body>
    <div id="map"></div>
    <script>
        var map = L.map('map', {
            center: [41.66, -4.72],
            zoom: 4
        });

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="http://mapbox.com">Mapbox</a>',
            id: 'mapbox.light'
        }).addTo(map);


        var countryStyle = {
            'color': "#858585",
            'weight': 2,
            'opacity': 0.6
        };

        function getColor(d) {
            return d > 100000000 ? '#800026' :
                d > 50000000 ? '#BD0026' :
                d > 20000000 ? '#E31A1C' :
                d > 10000000 ? '#FC4E2A' :
                d > 5000000 ? '#FD8D3C' :
                d > 2000000 ? '#FEB24C' :
                d > 1000000 ? '#FED976' :
                '#FFEDA0';
        }
        for (var i in countries.features)
            countries.features[i].properties.color = getColor(countries.features[i].properties.pop_est);

        function popup(feature, layer) {
            if (feature.properties && feature.properties.name) {
                layer.bindPopup(feature.properties.name);
            }
        }

        function style(feature) {
            return {
                fillColor: getColor(feature.properties.pop_est),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        var countriesJS = L.geoJson(countries, {
            onEachFeature: popup,
            style: style
        }).addTo(map);

        var searchControl = new L.Control.Search({
            layer: countriesJS,
            propertyName: 'name',
            circleLocation: false
        });

        searchControl.on('search_locationfound', function(e) {
                e.layer.setStyle({
                    fillColor: '#3f0',
                    color: '#0f0'
                });
            })
            .on('search_collapsed', function(e) {
                countriesJS.eachLayer(function(layer) { //restauramos el color del elemento
                    countriesJS.resetStyle(layer);
                });
            });

        map.addControl(searchControl);
    </script>
</body>

</html>