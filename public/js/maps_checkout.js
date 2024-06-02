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
  
  console.log('start latitudeInput & longitudeInput',latitudeInput,longitudeInput)
  if ( latitudeInput > 0 && longitudeInput  > 0) {
    console.log('latitudeInput & longitudeInput field',latitudeInput,longitudeInput)
    currentPosition = new google.maps.LatLng(latitudeInput, longitudeInput); 
  }else{
    console.log('latitudeInput & longitudeInput empty',latitudeInput,longitudeInput)
    getLocationUsingGPS();// will fill the currentPosition or nor
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
      // document.getElementById("address-button").addEventListener("click", () => {
      //   const address = document.getElementById("address-input").value;
      //   geocodeAddress(address);
      // });

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
            
            console.log('getLocationUsingGPS',currentPosition);
            
            if (!isMarkerInsideShapes(currentPosition, shapes)) {
              console.log('getLocationUsingGPS ! isMarkerInsideShapes change',lastValidPosition);
              marker.setPosition(lastValidPosition);
              map.setCenter(lastValidPosition);
              locationOutOfDeliveryArea(); 
              addLatLong(lastValidPosition);
              reverseGeocodeLatLng(lastValidPosition);    
              getCoordinatId(lastValidPosition)
            }
            else{
              console.log('getLocationUsingGPS isMarkerInsideShapes correct',currentPosition);
              lastValidPosition = currentPosition; 
              marker.setPosition(currentPosition);
              map.setCenter(currentPosition);
              addLatLong(currentPosition);
              reverseGeocodeLatLng(currentPosition);    
              getCoordinatId(currentPosition);
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
      console.log("drawShapesOnMap run");
      for (var key in coordinatesArrays) {
          var coordinates = coordinatesArrays[key];
          // const coordinates = JSON.parse(coordinates);
          // console.log(coordinatesArrays[key]);
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
          polygons.push({ key: key, polygon: polygon });

      }
    }
    function addLatLong(position) {
      console.log("addLatLong run");
      
      if (position['lat'] > 0 && position['lng'] > 0) {
        console.log("addLatLong position 1" ,position);
        document.getElementById("latitude").value = position['lat'];
        document.getElementById("longitude").value = position['lng'];
      }else{
        console.log("addLatLong position 2" ,position);
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

    }
    // Reverse geocode to get address
    function reverseGeocodeLatLng(latLng) {
      console.log("reverseGeocodeLatLng run");
      const geocoder = new google.maps.Geocoder();

      var addressArPromise = new Promise((resolve) => {
        geocoder.geocode({ location: latLng, language: 'ar' }, (results, status) => {
          if (status === "OK") {
            if (results[0]) {
              var  address_ar = results[0].formatted_address;
              document.getElementById("address-input-ar").value = address_ar;
              resolve(address_ar);
            }
          }
        });
      });
      var addressEnPromise = new Promise((resolve) => {
        geocoder.geocode({ location: latLng, language: 'en' }, (results, status) => {
          if (status === "OK") {
            if (results[0]) {
              var  address_en = results[0].formatted_address;
              document.getElementById("address-input-en").value = address_en;
              resolve(address_en);
            }
          }
        });
      });
      Promise.all([addressArPromise, addressEnPromise])
      .then(([address_ar, address_en]) => {
          var address_array = {
              ar: address_ar,
              en: address_en
          };
          var address = JSON.stringify(address_array);
          document.getElementById("address").value = address;
          console.log('reverseGeocodeLatLng address',address);
      })
      .catch((error) => {
          console.error('Error during geocoding:', error);
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
      console.log(position,"getCoordinatId function run");
      var selectElement = document.getElementById('delivery_area');
      for (var i = 0; i < polygons.length; i++) {
        // console.log('getCoordinatIdloop for polygons',polygons.length);
        if (google.maps.geometry.poly.containsLocation(position, polygons[i].polygon)) {
          // Loop through the options
          for (var x = 0; x < selectElement.options.length; x++) {
            console.log('1- selectElement.options.value',x,selectElement.options[x].value);
            console.log('2- polygons key',i,polygons[i].key);

            // Check if the current option's value matches the desired value
            if (selectElement.options[x].value == polygons[i].key) {
              console.log('match true');
                // Set the selected attribute for the matching option
                selectElement.options[x].selected = true;
                selectElement.value = selectElement.options[x].value;
                
                // Create a new event
                var changeEvent = new Event("change");
                // Dispatch the event
                selectElement.dispatchEvent(changeEvent);
                return; // Stop looping once found
            }else{
              console.log('match false');
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
 