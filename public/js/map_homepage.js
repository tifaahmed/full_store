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
          alert('thes location is out of the store delivery area');

          document.getElementById("gps_button_title").style.display = "none";
          document.getElementById("gps-button").style.display = "none";
          
          document.getElementById("select_branch_title").style.display = "block";
          document.getElementById("branches").style.display = "block";

          branchesHandler(currentPosition);
          
        }else{
          alert('thes location is in the store delivery area');
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
















  function branchesHandler(currentPosition) {
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

        const distance = haversineDistance(myPosition.lat, myPosition.lon, itemLat, itemLon);

        distances.push({ item, distance });
    });
    console.log(items);

  // Sort items based on distances
  distances.sort((a, b) => a.distance - b.distance);

    // Clear the original item list
    const branches_itemList = document.getElementById('branches_itemList');
    branches_itemList.innerHTML = '';

    // Append items back to the list in sorted order
    distances.forEach(entry => {
      branches_itemList.appendChild(entry.item);
        
        // Add the distance under each item's position
        const distanceElement = document.createElement('div');
        distanceElement.textContent = `Distance: ${entry.distance.toFixed(2)} km`;
        entry.item.insertBefore(distanceElement, entry.item.childNodes[1]);
    });
  }




  function haversineDistance(lat1, lon1, lat2, lon2) {
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




}