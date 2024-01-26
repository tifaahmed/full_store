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

  getLocationUsingGPS();

  function getLocationUsingGPS(){
    navigator.geolocation.getCurrentPosition(
      (position) => {

        var { latitude, longitude } = position.coords;
        currentPosition = new google.maps.LatLng(latitude, longitude);  
          branchesHandler(currentPosition);
      },
      (error) => {
        console.log("getLocationUsingGPS Geolocation error:", error);
      }
    );
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
    const items = document.querySelectorAll('.pickup_branches_item');


    
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
    const branches_itemList = document.getElementById('peckup_branches_itemList');
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