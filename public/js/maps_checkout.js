let shapes = [];
let polygons = [];

let coordinatesInput =document.getElementById("map_coordinates_direct").value;
let coordinatesArrays =JSON.parse(coordinatesInput );
var firstEntry = Object.entries(coordinatesArrays)[0];
var firstCoordinatesArray = firstEntry[1];

let latitudeInput =  document.getElementById("latitude").value;
let longitudeInput =  document.getElementById("longitude").value;


let FirstPointLatLong = firstCoordinatesArray[0];

// Load the Google Maps API
function initMap() {


  const map = new google.maps.Map(document.getElementById("map"), {
    center:FirstPointLatLong,
    zoom: 15,
  });
  const marker = new google.maps.Marker({
    map: map,
    draggable: true,
  });
  drawShapesOnMap(coordinatesArrays);
  let FirstValidPosition = new google.maps.LatLng(FirstPointLatLong['lat'], FirstPointLatLong['lng']);

  let lastValidPosition = FirstValidPosition; 
  let currentPosition = FirstValidPosition; 
  // console.log(FirstValidPosition);
  // console.log(lastValidPosition);

  if ( latitudeInput > 0 && longitudeInput  > 0) {
    currentPosition = new google.maps.LatLng(latitudeInput, longitudeInput); 
    lastValidPosition = currentPosition;
    map.setCenter(currentPosition);
    marker.setPosition(currentPosition);
  }else{
    console.log(FirstValidPosition);
    console.log(lastValidPosition);

    getLocationUsingGPS();

  }

 
  const geocoder = new google.maps.Geocoder();












    // buttons #######################################################
      // Get location based on input address
      document.getElementById("address-button").addEventListener("click", () => {
        const address = document.getElementById("address-input").value;
        geocodeAddress(address);
      });

      // Get user's location using GPS
      document.getElementById("gps-button").addEventListener("click", () => {
        getLocationUsingGPS();
      });


    // buttons #######################################################





    // addListener #######################################################
      // Event listener for map click
        google.maps.event.addListener(map, 'click', function (event) {
          locationOutOfDeliveryArea(); 
        });
      // Event listener for shape click
        shapes.forEach((shape) => {
          google.maps.event.addListener(shape, 'click', function (event) {
            marker.setPosition(event.latLng);
            addLatLong(event.latLng);
            reverseGeocodeLatLng(event.latLng);   
            getCoordinatId(event.latLng);  
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
            getCoordinatId(position);

          }
        }
    // addListener #######################################################

 

 
      // Geocode address and update marker position
      function geocodeAddress(address) {
        geocoder.geocode({ address: address }, (results, status) => {
          if (status === "OK") {
            if (results[0]) {
              const position = results[0].geometry.location;

              if (!isMarkerInsideShapes(position, shapes)) {
                locationOutOfDeliveryArea(); 
              }else{
                marker.setPosition(position);
                marketMoved(position); 
                map.setCenter(position);
                addLatLong(position);
                reverseGeocodeLatLng(position);      
              }
            }
          } else {
            console.error("Geocode was not successful for the following reason:", status);
          }
        });
      }

    function getLocationUsingGPS(){
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {

            var { latitude, longitude } = position.coords;
            currentPosition = new google.maps.LatLng(latitude, longitude);  


            // console.log(latitude, longitude,'-1 getLocationUsingGPS');
            // console.log(currentPosition,'0 getLocationUsingGPS');
            
            if (!isMarkerInsideShapes(currentPosition, shapes)) {
            //   console.log(lastValidPosition,'1 getLocationUsingGPS');
              // console.log(lastValidPosition,'1111 getLocationUsingGPS');
              currentPosition = lastValidPosition; 
              marker.setPosition(lastValidPosition);
              map.setCenter(lastValidPosition);
              locationOutOfDeliveryArea(); 
            }
            else{
              console.log(lastValidPosition,'2 getLocationUsingGPS');
              currentPosition = currentPosition; 
              lastValidPosition = currentPosition; 
              marker.setPosition(currentPosition);
              map.setCenter(currentPosition);
              addLatLong(currentPosition);
              reverseGeocodeLatLng(currentPosition);    
              getCoordinatId();    
            }

          },
          (error) => {
            console.log("getLocationUsingGPS Geolocation error:", error);
            
          }
        );
      } else {
        console.log("getLocationUsingGPS Geolocation not supported");
      }
    }



    function drawShapesOnMap(coordinatesArrays) {
      for (var key in coordinatesArrays) {
          var coordinates = coordinatesArrays[key];
          // const coordinates = JSON.parse(coordinates);
          console.log(coordinatesArrays[key]);
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
          polygons.push({ key: key, polygon: polygon });

      }
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
    // Reverse geocode to get address
    function reverseGeocodeLatLng(latLng) {
      geocoder.geocode({ location: latLng }, (results, status) => {
        if (status === "OK") {
          if (results[0]) {
            const address = results[0].formatted_address;
            document.getElementById("address-input").value = address;
          }
        } else {
          console.error("reverseGeocodeLatLng Geocoder failed due to:", status);
        }
      });
    }
    function isMarkerInsideShapes(position, shapes) {
      for (let i = 0; i < shapes.length; i++) {
        console.log(polygons,'isMarkerInsideShapes');

        if (google.maps.geometry.poly.containsLocation(position, polygons[i].polygon)) {
          console.log('true','isMarkerInsideShapes');
          return true;
        }
      }
      console.log('false','isMarkerInsideShapes');
      return false;
    }
    function getCoordinatId(position) {
      // console.log(position,'getCoordinatId');
        // Check if the marker is inside any polygon
        for (var i = 0; i < polygons.length; i++) {
          console.log(position,polygons[i]);

          if (google.maps.geometry.poly.containsLocation(position, polygons[i].polygon)) {
              var selectElement = document.getElementById('delivery_area');
               // Loop through the options
              for (var i = 0; i < selectElement.options.length; i++) {
                // Check if the current option's value matches the desired value
                if (selectElement.options[i].value ===polygons[i].key) {
                    // Set the selected attribute for the matching option
                    selectElement.options[i].selected = true;
                    break; // Stop looping once found
                }
            }
          }
        }
    }
    function locationOutOfDeliveryArea() {
      // alert('the location is out of the store delivery area');
      
      // document.getElementById("cart-delivery-2").click();
      // document.getElementById("class-cart-delivery-1").style.display = "none";
      // document.getElementById("class-cart-delivery-3").style.display = "none";


    }
    
}
 