// Load the Google Maps API
function initMap() {

  let coordinatesInput =document.getElementById("map_coordinates").value;
  let coordinatesArrays =JSON.parse(coordinatesInput );
  let shapes = [];

  drawShapesOnMap(coordinatesArrays);
  function drawShapesOnMap(coordinatesArrays) {
    coordinatesArrays.forEach((coordinatesArray) => {
      const coordinates = JSON.parse(coordinatesArray);
      const polygon = new google.maps.Polygon({
        paths: coordinates
      });
      shapes.push(polygon);

    });
  }
  // Get user's location using GPS
  document.getElementById("gps-button").addEventListener("click", () => {
    getLocationUsingGPS();
  });
  function getLocationUsingGPS(){
    navigator.geolocation.getCurrentPosition(
      (position) => {

        var { latitude, longitude } = position.coords;
        currentPosition = new google.maps.LatLng(latitude, longitude);  
          
        if (!isMarkerInsideShapes(currentPosition, shapes)) {
          alert('the location is out of the store delivery area')
        }

      },
      (error) => {
        console.log("getLocationUsingGPS Geolocation error:", error);
      }
    );
  }
  function isMarkerInsideShapes(position, shapes) {
    for (let i = 0; i < shapes.length; i++) {
      if (google.maps.geometry.poly.containsLocation(position, shapes[i])) {
        console.log('true');
        return true;
      }
    }
    console.log('false');
    return false;
  }

}