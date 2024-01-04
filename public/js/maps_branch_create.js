let shapes = [];
let latitudeInput =  document.getElementById("latitude").value;
let longitudeInput =  document.getElementById("longitude").value;

function initMap() {


  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 0, lng: 0 },
    zoom: 15,
  });
  const marker = new google.maps.Marker({
    map: map,
    draggable: true,
  });

  getLocationUsingGPS();

  // buttons #######################################################

    // // Get user's location using GPS
    document.getElementById("gps-button").addEventListener("click", () => {
      getLocationUsingGPS();
    });
  // buttons #######################################################

  // addListener #######################################################
      
    // Event listener for map click
    google.maps.event.addListener(map, 'click', function (event) {
      marker.setPosition(event.latLng);
      addLatLong(event.latLng);
      reverseGeocodeLatLng(event.latLng);  
      console.log(event.latLng,'map clicked');
    });

    // Move marker and get address on marker drag
      google.maps.event.addListener(marker, 'drag', function () {
        var position = marker.getPosition();
        addLatLong(position);
        reverseGeocodeLatLng(position);   
        console.log(position,'maps marker dragend position');
      });
      marker.addListener("dragend", () => {
        var position = marker.getPosition();
        addLatLong(position);
        reverseGeocodeLatLng(position);   
        console.log(position,'marker dragend position');
      });


  // addListener #######################################################

  // Reverse geocode to get address
  function reverseGeocodeLatLng(latLng) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: latLng, language: 'ar' }, (results, status) => {
      if (status === "OK") {
        if (results[0]) {
          const address = results[0].formatted_address;
          document.getElementById("address-input-ar").value = address;
        }
      } else {
        console.error("Geocoder failed due to:", status);
      }
    });
    geocoder.geocode({ location: latLng, language: 'en' }, (results, status) => {
      if (status === "OK") {
        if (results[0]) {
          const address = results[0].formatted_address;
          document.getElementById("address-input-en").value = address;
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
          marker.setPosition(position);
          map.setCenter(position);
          addLatLong(position);
          reverseGeocodeLatLng(position);      
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
            marker.setPosition(position);
            map.setCenter(position);
            addLatLong(position);
            reverseGeocodeLatLng(position);      
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