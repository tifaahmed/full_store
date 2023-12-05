let shapes = [];

// Load the Google Maps API
function initMap() {

  var coordinatesInput =document.getElementById("coordinates").value;

  var coordinatesArrays =JSON.parse(coordinatesInput );
  
  const geocoder = new google.maps.Geocoder();

  const map = new google.maps.Map(document.getElementById("map"), {
    center: JSON.parse(coordinatesArrays[0])[0],
    zoom: 8,
  });

  getLocationUsingGPS(document.getElementById("latitude").value,document.getElementById("longitude").value);
  // Get user's location using GPS
  document.getElementById("gps-button").addEventListener("click", () => {
    getLocationUsingGPS();
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
        strokeColor: '#fc7979', // Set the stroke color to #fc7979
        strokeOpacity: 0, // Remove the border by setting the strokeOpacity to 0
        fillColor: '#fc7979', // Set the fill color to #fc7979
        fillOpacity: 0.5, // Set the fill opacity as desired (0.5 in this example)
      });
      polygon.setMap(map);
      shapes.push(polygon);

    });
  }

  const marker = new google.maps.Marker({
    position: JSON.parse(coordinatesArrays[0])[0],
    map: map,
    draggable: true,
  });
  console.log(JSON.parse(coordinatesArrays[0])[0]);

  function isMarkerInsideShapes(position, shapes) {
    for (let i = 0; i < shapes.length; i++) {
      if (google.maps.geometry.poly.containsLocation(position, shapes[i])) {
        return true;
      }
    }
    return false;
  }

    google.maps.event.addListener(marker, 'drag', function () {
      if (!isMarkerInsideShapes(marker.getPosition(), shapes)) {
        marker.setPosition(JSON.parse(coordinatesArrays[0])[0]);
      }else{
        const position = marker.getPosition();
        addLatLong(position);
        reverseGeocodeLatLng(position);
      }
    });
    // Move marker and get address on marker drag
    marker.addListener("dragend", () => {
      if (!isMarkerInsideShapes(marker.getPosition(), shapes)) {
        marker.setPosition(JSON.parse(coordinatesArrays[0])[0]);
      }
    });

    // Event listener for map click
    google.maps.event.addListener(map, 'click', function (event) {
      if (!isMarkerInsideShapes(marker.getPosition(), shapes)) {
        marker.setPosition(JSON.parse(coordinatesArrays[0])[0]);
      }else{
        marker.setPosition(event.latLng);
      }
    });

    // Event listener for shape click
    shapes.forEach((shape) => {
      google.maps.event.addListener(shape, 'click', function (event) {
        if (!isMarkerInsideShapes(marker.getPosition(), shapes)) {
          marker.setPosition(JSON.parse(coordinatesArrays[0])[0]);
        }else{
          marker.setPosition(event.latLng);
        }      
      });
    });


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
}
 