// Load the Google Maps API
function initMap() {

  var coordinatesInput =document.getElementById("coordinates").value;
  var coordinatesArrays =JSON.parse(coordinatesInput );

  const map = new google.maps.Map(document.getElementById("map"), {
    center: JSON.parse(coordinatesArrays[0])[0],
    zoom: 8,
  });

  // Define the desired zoom level
  const zoomLevel = 15;

  // Set the zoom level of the map
  map.setZoom(zoomLevel);


  drawShapesOnMap(coordinatesArrays);

  function drawShapesOnMap(coordinatesArrays) {
    coordinatesArrays.forEach((coordinatesArray) => {
      const coordinates = JSON.parse(coordinatesArray);
      console.log(coordinates);
      const polygon = new google.maps.Polygon({
        paths: coordinates,
        editable: false,
        draggable: false,
        strokeColor: '#77fc86', // Set the stroke color to #77fc86
        strokeOpacity: 0, // Remove the border by setting the strokeOpacity to 0
        fillColor: '#77fc86', // Set the fill color to #77fc86
        fillOpacity: 0.3, // Set the fill opacity as desired (0.5 in this example)
      });
      polygon.setMap(map);
    });
  }

 

}
 