let shapes = [];
console.log('shapes',shapes);


// Load the Google Maps API
function initMap() {

  let coordinatesInput =document.getElementById("map_coordinates").value;
  console.log('coordinatesInput',coordinatesInput);
  let coordinatesArrays =JSON.parse(coordinatesInput );
  console.log('coordinatesArrays',coordinatesArrays);
  // let coordinatesFirstPoint = JSON.parse(coordinatesArrays[0])[0];
  // console.log('coordinatesFirstPoint',coordinatesFirstPoint);
  let currentPosition = null;

  console.log("create the map ");
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
  });
  console.log("create the marker ");
  const marker = new google.maps.Marker({
    map: map,
    draggable: true,
  });
  const geocoder = new google.maps.Geocoder();
  drawShapesOnMap(coordinatesArrays);

  getLocationUsingGPS();




  function drawShapesOnMap(coordinatesArrays) {
    console.log("function drawShapesOnMap run");
    console.log("function drawShapesOnMap -> coordinatesArrays", coordinatesArrays);
    
    for (var key in coordinatesArrays) {
      var coordinates = coordinatesArrays[key];
      console.log("function drawShapesOnMap -> coordinatesArrays[key]",key,coordinates);

        var coordinatesArray = JSON.parse(coordinates);
        console.log("function drawShapesOnMap -> coordinatesArrays[key] -> coordinates",key,coordinatesArray);

        const polygon = new google.maps.Polygon({
          paths: coordinatesArray,
          editable: false,
          draggable: false,
          strokeColor: '#77fc86', // Set the stroke color to #77fc86
          strokeOpacity: 0, // Remove the border by setting the strokeOpacity to 0
          fillColor: '#77fc86', // Set the fill color to #77fc86
          fillOpacity: 0.3, // Set the fill opacity as desired (0.5 in this example)
        });
        polygon.setMap(map);
        shapes.push(polygon);
    }
    console.log("function drawShapesOnMap -> add the shapes",shapes);
  }

  // // Get user's location using GPS
  // // document.getElementById("gps-button").addEventListener("click", () => {
  //   getLocationUsingGPS();
  // // });


  function getLocationUsingGPS(){
    console.log('function getLocationUsingGPS run ');
    navigator.geolocation.getCurrentPosition(
      (position) => {
        var { latitude, longitude } = position.coords;
        var currentPosition = new google.maps.LatLng(latitude, longitude); 
        console.log('function getLocationUsingGPS  -> my location ',currentPosition);

        console.log("function getLocationUsingGPS  -> set the map to the currentPosition");
        map.setCenter(currentPosition);

        console.log("function getLocationUsingGPS  -> set the marker to the currentPosition");
        marker.setPosition(currentPosition);




        if (!isMarkerInsideShapes(currentPosition, shapes)) {
          console.log("function getLocationUsingGPS  -> location is out of the store delivery area");

          console.log("function getLocationUsingGPS  -> function locationOutOfDeliveryArea run");
          locationOutOfDeliveryArea(currentPosition);
        }else{
          console.log("function getLocationUsingGPS  -> location is in the store delivery area");

          console.log("function getLocationUsingGPS  -> function locationInDeliveryArea run");
          locationInDeliveryArea(currentPosition);
        }
      },
      (error) => {
        console.log("getLocationUsingGPS Geolocation error:", error);
      }
    );
  }
  function isMarkerInsideShapes(position, shapes) {
    console.log('function isMarkerInsideShapes run');

    for (let i = 0; i < shapes.length; i++) {
      if (google.maps.geometry.poly.containsLocation(position, shapes[i])) {
        console.log('function isMarkerInsideShapes -> true');
        return true;
      }
    }
    console.log('function isMarkerInsideShapes -> false');
    return false;
  }
















  function branchesHandler(currentPosition) {
    console.log("function branchesHandler run");

    const coordinateString = String(currentPosition);

    // Coordinates of your position (replace with your actual coordinates)
    const startIndex = coordinateString.indexOf("(") + 1;
    const endIndex = coordinateString.indexOf(")");
    const coordinatesSubstring = coordinateString.substring(startIndex, endIndex);
    const [latitude, longitude] = coordinatesSubstring.split(",").map(coord => parseFloat(coord.trim()));
    

    const myPosition = { lat: latitude, lon: longitude };

    // console.log(currentPos;ition);
    // console.log(myPosition)

    // Get all items with the class 'item'
    const items = document.querySelectorAll('.branches_item');


    
    // Calculate distances and store them in an array
    const distances = [];

    items.forEach(item => {
        const itemLat = parseFloat(item.dataset.lat);
        const itemLon = parseFloat(item.dataset.lon);

        console.log("function branchesHandler run -> function haversineDistance run");
        const distance = haversineDistance(myPosition.lat, myPosition.lon, itemLat, itemLon);

        distances.push({ item, distance });
    });

    // Sort items based on distances
    distances.sort((a, b) => a.distance - b.distance);

    // Clear the original item list
    const branches_itemList = document.getElementById('branches_itemList');
    branches_itemList.innerHTML = '';

    distances.forEach(entry => {
      branches_itemList.appendChild(entry.item);

      // Check if distance text already exists
      const distanceTextElement = entry.item.querySelector('.distance-text');
      if (distanceTextElement) {
          // If it exists, update its content
          distanceTextElement.textContent = `Distance: ${entry.distance.toFixed(2)} km`;
      } else {
          // If it doesn't exist, create a new element and append it
          const distanceElement = document.createElement('div');
          distanceElement.textContent = `Distance: ${entry.distance.toFixed(2)} km`;
          distanceElement.className = 'distance-text';
          entry.item.appendChild(distanceElement);
      }
  });










  }




  function haversineDistance(lat1, lon1, lat2, lon2) {
    console.log("function haversineDistance run");

    const R = 6371;
    const dLat = deg2rad(lat2 - lat1);
    const dLon = deg2rad(lon2 - lon1);
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
              Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
              Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    const distance = R * c;
    return distance;
  }

  function deg2rad(deg) {
      return deg * (Math.PI / 180);
  }


    // addListener #######################################################
      // Event listener for map out of shapes click
      google.maps.event.addListener(map, 'click', function (event) {
        console.log('map google.maps.event.addListener click');
        var position = event.latLng
        marker.setPosition(position);
        locationOutOfDeliveryArea(position);
      });

    // Event listener for shape click
    shapes.forEach((shape) => {
      google.maps.event.addListener(shape, 'click', function (event) {
        console.log('shapes google.maps.event.addListener click');
        var position = event.latLng
        marker.setPosition(position);
        locationInDeliveryArea(position)
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
      console.log("function marketMoved run",position);
      if (!isMarkerInsideShapes(position, shapes)) {
        console.log("function marketMoved  -> location is out of the store delivery area");
        console.log("function marketMoved  -> function locationOutOfDeliveryArea run");
        locationOutOfDeliveryArea(position);
      }else{
        console.log("function getLocationUsingGPS  -> location is in the store delivery area");
        console.log("function getLocationUsingGPS  -> function locationInDeliveryArea run");
        locationInDeliveryArea(position);
      }


 



    }
    // addListener #######################################################
       
      function locationOutOfDeliveryArea(position) {
        console.log("function locationOutOfDeliveryArea run ");
        document.getElementById("branches").style.display = "block";
        console.log("function locationOutOfDeliveryArea -> function branchesHandler run");
        branchesHandler(position);
        document.getElementById("favorite_location_submit").disabled = true;

        console.log("function locationOutOfDeliveryArea -> function addLatLong run ( empty the input)");
        // add or remove
        addLatLong()

      }
      function locationInDeliveryArea(position) {
        document.getElementById("branches").style.display = "none";
        document.getElementById("favorite_location_submit").disabled = false;

        console.log("function locationOutOfDeliveryArea -> function addLatLong run (fill the input)");
        // add or remove
        addLatLong(position)
        
        

      }

      function addLatLong(position) {
        console.log("function addLatLong run");
        if (!position) {
          console.log("function addLatLong -> empty position" ,position);
          document.getElementById("favorite_location_long").value = '';
          document.getElementById("favorite_location_lat").value = '';       
        }else{
          if (position['lat'] > 0 && position['lng'] > 0) {
            console.log("function addLatLong -> array position" ,position);
            document.getElementById("favorite_location_long").value = position['lat'];
            document.getElementById("favorite_location_lat").value = position['lng'];
          }else{
            console.log("function addLatLong -> obj position" ,position);
            const coordinateString = String(position);  
            // Extract latitude and longitude using string manipulation
            const startIndex = coordinateString.indexOf("(") + 1;
            const endIndex = coordinateString.indexOf(")");
            const coordinatesSubstring = coordinateString.substring(startIndex, endIndex);  
            const [latitude, longitude] = coordinatesSubstring.split(",").map(coord => parseFloat(coord.trim()));  
            if (latitude > 0 && longitude > 0) {
              document.getElementById("favorite_location_long").value = latitude;
              document.getElementById("favorite_location_lat").value = longitude;
            }
          }
        }
      }
}