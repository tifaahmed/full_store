
// Load the Google Maps API
function initMap() {
  var coordinates2 =JSON.parse(document.getElementById("coordinates").value );


  const map = new google.maps.Map(document.getElementById("map"), {
    center: coordinates2[0],
    zoom: 8,
  });

 



  // Define the desired zoom level
  const zoomLevel = 15;

  // Set the zoom level of the map
  map.setZoom(zoomLevel);


  var polygon = new google.maps.Polygon({
      paths: coordinates2,
      editable: true,
      draggable: true,
      map: map // Replace "map" with your actual map object variable
  });
    
  polygon.setMap(map);

  // Add event listeners for vertex updates
  google.maps.event.addListener(polygon.getPath(), 'set_at', function() {
    polygonEdited();
  });
  google.maps.event.addListener(polygon.getPath(), 'insert_at', function() {
    polygonEdited();
  });
  google.maps.event.addListener(polygon.getPath(), 'remove_at', function() {
    polygonEdited();
  });

  function polygonEdited() {
    // Get the polygon coordinates
    var coordinates = polygon.getPath().getArray();
    document.getElementById("coordinates").value =JSON.stringify(coordinates); 

    console.log(coordinates);
  }



 
  function getLocationUsingGPS(lat = null ,long = null){
    
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          console.log(lat,1);
          if (lat > 0 && long > 0) {
            var latLng = new google.maps.LatLng(lat, long);  
          }else{
            var { latitude, longitude } = position.coords;
            var latLng = new google.maps.LatLng(latitude, longitude);  
          }

          reverseGeocodeLatLng(latLng);

          map.setCenter(latLng);
        },
        (error) => {
          console.error("Geolocation error:", error);
        }
      );
    } else {
      console.error("Geolocation not supported");
    }
  };
 



}



 