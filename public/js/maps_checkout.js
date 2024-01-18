let shapes = [];
let polygons = [];

let coordinatesInput =document.getElementById("map_coordinates_direct").value;
let coordinatesArrays =JSON.parse(coordinatesInput );
var firstEntry = Object.entries(coordinatesArrays)[0];
var firstCoordinatesArray = firstEntry[1];

let latitudeInput =  document.getElementById("latitude").value;
let longitudeInput =  document.getElementById("longitude").value;

let currentPosition   = firstCoordinatesArray[0];
let FirstPointLatLong = firstCoordinatesArray[0];
let lastValidPosition = firstCoordinatesArray[0];

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
  
  if ( latitudeInput > 0 && longitudeInput  > 0) {
    currentPosition = new google.maps.LatLng(latitudeInput, longitudeInput); 
  }else{
    getLocationUsingGPS();
    if (currentPosition == null || currentPosition == 'null') {
      currentPosition = FirstValidPosition; 
    }
  }

  map.setCenter(currentPosition);
  marker.setPosition(currentPosition);
  const geocoder = new google.maps.Geocoder();




  // console.log(FirstValidPosition);
  // console.log(lastValidPosition);




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
      // Event listener for map out of shapes click
        // google.maps.event.addListener(map, 'click', function (event) {
        //   console.log('map google.maps.event.addListener click');
        //   // locationOutOfDeliveryArea(); 
        // });

      // Event listener for shape click
        shapes.forEach((shape) => {
          google.maps.event.addListener(shape, 'click', function (event) {
            console.log('shapes google.maps.event.addListener click');
            var position = event.latLng
            marker.setPosition(position);
            addLatLong(position);
            reverseGeocodeLatLng(position);   
            getCoordinatId(position);  
          });
        });
      // Move marker and get address on marker drag
        google.maps.event.addListener(marker, 'dragend', function () {
          console.log('marker google.maps.event.addListener dragend');
          var position = marker.getPosition();
          marketMoved(position);  
        });

        marker.addListener("dragend", () => {
          console.log("Marker dragged!");
          var position = marker.getPosition();
          marketMoved(position);
        });

        function marketMoved(position) {
          console.log("marketMoved",position);
          if (!isMarkerInsideShapes(position, shapes)) {
            marker.setPosition(lastValidPosition);
            addLatLong(lastValidPosition);
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
        console.log("geocodeAddress",address);
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
            // console.error("Geocode was not successful for the following reason:", status);
          }
        });
      }

    function getLocationUsingGPS(){
      console.log('getLocationUsingGPS');

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
              // console.log(lastValidPosition,'2 getLocationUsingGPS');
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
            // console.log("getLocationUsingGPS Geolocation error:", error);
            
          }
        );
      } else {
        // console.log("getLocationUsingGPS Geolocation not supported");
      }
    }



    function drawShapesOnMap(coordinatesArrays) {
      console.log("drawShapesOnMap run");
      for (var key in coordinatesArrays) {
          var coordinates = coordinatesArrays[key];
          // const coordinates = JSON.parse(coordinates);
          // console.log(coordinatesArrays[key]);
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
      // console.log("addLatLong run");
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
      // console.log("reverseGeocodeLatLng run");

      geocoder.geocode({ location: latLng }, (results, status) => {
        if (status === "OK") {
          if (results[0]) {
            const address = results[0].formatted_address;
            document.getElementById("address-input").value = address;
          }
        } else {
          // console.error("reverseGeocodeLatLng Geocoder failed due to:", status);
        }
      });
    }
    function isMarkerInsideShapes(position, shapes) {
      console.log('isMarkerInsideShapes run');

      for (let i = 0; i < shapes.length; i++) {
        // console.log(polygons,'isMarkerInsideShapes');

        if (google.maps.geometry.poly.containsLocation(position, polygons[i].polygon)) {
          // console.log('true','isMarkerInsideShapes');
          return true;
        }
      }
      // console.log('false','isMarkerInsideShapes');
      return false;
    }
    function getCoordinatId(position) {
      // console.log(position,"getCoordinatId function run");
      var selectElement = document.getElementById('delivery_area');
      for (var i = 0; i < polygons.length; i++) {
        // console.log('getCoordinatIdloop for polygons',polygons.length);
        if (google.maps.geometry.poly.containsLocation(position, polygons[i].polygon)) {
          // Loop through the options
          for (var x = 0; x < selectElement.options.length; x++) {
            console.log('selectElement.options.value',x,selectElement.options[x].value);
            console.log('polygons key',i,polygons[i].key);

            // Check if the current option's value matches the desired value
            if (selectElement.options[x].value == polygons[i].key) {
                // Set the selected attribute for the matching option
                selectElement.options[x].selected = true;
                selectElement.value = selectElement.options[x].value;
                
                // Create a new event
                var changeEvent = new Event("change");
                // Dispatch the event
                selectElement.dispatchEvent(changeEvent);
                return; // Stop looping once found
            }
          }
        }

      }
    }
    function locationOutOfDeliveryArea() {
      // console.log('locationOutOfDeliveryArea run');

      // alert('the location is out of the store delivery area');
      
      // document.getElementById("cart-delivery-2").click();
      // document.getElementById("class-cart-delivery-1").style.display = "none";
      // document.getElementById("class-cart-delivery-3").style.display = "none";


    }
    
}
 