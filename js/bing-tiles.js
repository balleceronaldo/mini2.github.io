var apiKey = "Ag7DSkKr-xwKNkS_dRyQ51O-e5Wz7ca-Fz2mzu6vtWPm1YxbIE6eFcYgXgMMUM4X";
const lat = document.getElementById('lat');
const lng = document.getElementById('lng');

var map = new OpenLayers.Map( 'map');

var road = new OpenLayers.Layer.Bing({
    key: apiKey,
    type: "Road",

    metadataParams: {mapVersion: "v1"}
});
var aerial = new OpenLayers.Layer.Bing({
    key: apiKey,
    type: "Aerial"
});
var hybrid = new OpenLayers.Layer.Bing({
    key: apiKey,
    type: "AerialWithLabels",
    name: "Bing Aerial With Labels"
});

map.addLayers([aerial, hybrid, road]);
map.addControl(new OpenLayers.Control.LayerSwitcher());
// Zoom level numbering depends on metadata from Bing, which is not yet loaded.
var zoom = map.getZoomForResolution(0);
map.setCenter(new OpenLayers.LonLat(lat,lng).transform(
    new OpenLayers.Projection("EPSG:4326"),
    map.getProjectionObject()
), zoom);
console.log(lat);