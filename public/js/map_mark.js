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
    editable: false,
    map: map // Replace "map" with your actual map object variable
});


  function drawShapesOnMap(shapeData) {
      const coordinates = JSON.parse(shape.coordinates);
  
      const polygon = new google.maps.Polygon({
        paths: coordinates,
        editable: false,
        draggable: false,
      });
  
      polygon.setMap(map);
  }












  // // Get location based on input address
  document.getElementById("address-button").addEventListener("click", () => {
    const address = document.getElementById("address-input").value;
    geocodeAddress(address);
  });

  // Get user's location using GPS
  document.getElementById("gps-button").addEventListener("click", () => {
    getLocationUsingGPS();
  });

  // Move marker and get address on marker drag
  marker.addListener("dragend", () => {
    const position = marker.getPosition();
    addLatLong(position);
    reverseGeocodeLatLng(position);
  });

  // Reverse geocode to get address
  function reverseGeocodeLatLng(latLng) {
    geocoder.geocode({ location: latLng }, (results, status) => {
      if (status === "OK") {
        if (results[0]) {
          const address = results[0].formatted_address;
          document.getElementById("address-input").value = address;
        }
      } else {
        console.error("Geocoder failed due to:", status);
      }
    });
  }

  // Geocode address and update marker position
  function geocodeAddress(address) {
    geocoder.geocode({ address: address }, (results, status) => {
      if (status === "OK") {
        if (results[0]) {
          const location = results[0].geometry.location;
          document.getElementById("lat").value = location;

          marker.setPosition(location);
          map.setCenter(location);
          reverseGeocodeLatLng(location);
        }
      } else {
        console.error("Geocode was not successful for the following reason:", status);
      }
    });
  }
  function addLatLong(position) {

    const coordinateString = String(position);

    // Extract latitude and longitude using string manipulation
    const startIndex = coordinateString.indexOf("(") + 1;
    const endIndex = coordinateString.indexOf(")");
    const coordinatesSubstring = coordinateString.substring(startIndex, endIndex);
    const [latitude, longitude] = coordinatesSubstring.split(",").map(coord => parseFloat(coord.trim()));
    
    if (latitude > 0 && longitude > 0) {
      document.getElementById("latitude").value = latitude;
      document.getElementById("longitude").value = longitude;
      
      
                console.log( document.getElementById("latitude").value);
                console.log( document.getElementById("longitude").value);
      
    }

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

          addLatLong(latLng);
          reverseGeocodeLatLng(latLng);
          marker.setPosition(latLng);
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


// function saveShapeToDatabase(shapeType, coordinatesString) {
//   // Make an AJAX request to your server to save the shape data to the database
//   // You can use libraries like jQuery, Axios, or fetch to make the request
//   // Example using jQuery:
//   $.ajax({
//     url: '/save-shape',
//     method: 'POST',
//     data: {
//       shapeType: shapeType,
//       coordinates: coordinatesString
//     },
//     success: function(response) {
//       console.log('Shape saved successfully');
//     },
//     error: function(error) {
//       console.error('Error saving shape:', error);
//     }
//   });
// }