let shapes = [];
let coordinatesInput =document.getElementById("coordinates").value;
let coordinatesArrays =JSON.parse(coordinatesInput );
let coordinatesFirstPoint = JSON.parse(coordinatesArrays[0])[0];
let latitudeInput =  document.getElementById("latitude").value;
let longitudeInput =  document.getElementById("longitude").value;

function initMap() {


  const map = new google.maps.Map(document.getElementById("map"), {
    center:coordinatesFirstPoint,
    zoom: 15,
  });
  const marker = new google.maps.Marker({
    map: map,
    draggable: true,
  });
  drawShapesOnMap(coordinatesArrays);

  if (latitudeInput && longitudeInput) {
    var latLng = new google.maps.LatLng(latitudeInput, longitudeInput);  
  }else{
    var latLng = coordinatesFirstPoint;  
    getLocationUsingGPS();
  }
  // marker.setPosition(latLng);
  var lastValidPosition = latLng; 


  const geocoder = new google.maps.Geocoder();
  reverseGeocodeLatLng(latLng);      

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
      shapes.push(polygon);
    });
  }





  // getLocationUsingGPS(document.getElementById("latitude").value,document.getElementById("longitude").value);

  // buttons #######################################################

    // // // Get location based on input address
    document.getElementById("address-button").addEventListener("click", () => {
      const address = document.getElementById("address-input-search").value;
      geocodeAddress(address);
    });

    // // Get user's location using GPS
    document.getElementById("gps-button").addEventListener("click", () => {
      getLocationUsingGPS();
    });
  // buttons #######################################################

  // addListener #######################################################

    // Event listener for map click
    google.maps.event.addListener(map, 'click', function (event) {
      alert('the location is out of the store delivery area')
    });
    // Event listener for shape click
    shapes.forEach((shape) => {
      google.maps.event.addListener(shape, 'click', function (event) {
        marker.setPosition(event.latLng);
        addLatLong(event.latLng);
        reverseGeocodeLatLng(event.latLng);     
      });
    });

    // Move marker and get address on marker drag
      google.maps.event.addListener(marker, 'drag', function () {
        var position = marker.getPosition();
        marketMoved(position);  
      });
      marker.addListener("dragend", () => {
        var position = marker.getPosition();
        console.log(position);

        marketMoved(position);
      });
      function marketMoved(position) {
        if (!isMarkerInsideShapes(position, shapes)) {
          marker.setPosition(lastValidPosition);
          addLatLong(lastValidPosition);
          reverseGeocodeLatLng(lastValidPosition);       
        }else{
          lastValidPosition = position; 
          addLatLong(position);
          reverseGeocodeLatLng(position);  
        }
    }

  // addListener #######################################################

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
          const position = results[0].geometry.location;

          if (!isMarkerInsideShapes(position, shapes)) {
            
          }else{
            marker.setPosition(position);
            marketMoved(position); 
            map.setCenter(position);
            addLatLong(position);
            reverseGeocodeLatLng(position);      
          }

          // document.getElementById("lat").value = location;
          // marker.setPosition(location);
          // map.setCenter(location);
          // reverseGeocodeLatLng(location);
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
    }
  }

  function getLocationUsingGPS(lat = null ,long = null){
    
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          console.log(lat,1);
          if (lat > 0 && long > 0) {
            var position = new google.maps.LatLng(lat, long);  
          }else{
            var { latitude, longitude } = position.coords;
            var position = new google.maps.LatLng(latitude, longitude);  
          }

      
          if (!isMarkerInsideShapes(position, shapes)) {
          }else{
            marker.setPosition(position);
            marketMoved(position); 
            map.setCenter(position);
            addLatLong(position);
            reverseGeocodeLatLng(position);      
          }

        },
        (error) => {
          console.error("Geolocation error:", error);
        }
      );
    } else {
      console.error("Geolocation not supported");
    }
  };


  function isMarkerInsideShapes(position, shapes) {
    for (let i = 0; i < shapes.length; i++) {
      if (google.maps.geometry.poly.containsLocation(position, shapes[i])) {
        return true;
      }
    }
    console.log(lastValidPosition);
    return false;
  }
}