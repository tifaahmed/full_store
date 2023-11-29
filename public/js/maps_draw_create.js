let drawingManager;
let drawnShape;


// Load the Google Maps API
function initMap() {

  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 0, lng: 0 },
    zoom: 8,
  });

  const geocoder = new google.maps.Geocoder();

  
  getLocationUsingGPS();
  // Define the desired zoom level
  const zoomLevel = 15;

  // Set the zoom level of the map
  map.setZoom(zoomLevel);





  drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: null, // Set to null to prevent initial drawing
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: [google.maps.drawing.OverlayType.POLYGON]
    },
    polygonOptions: {
      editable: true
    }
  });
  
  var polygon = null; // Variable to store the polygon object
  
  google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
    if (event.type === google.maps.drawing.OverlayType.POLYGON) {
      polygon = event.overlay; // Store the polygon object
      polygonEdited();

      // Remove the previously drawn shape if it exists
      if (drawnShape) {
        drawnShape.setMap(null);
      }
      drawnShape = event.overlay;
      drawingManager.setDrawingMode(null); // Disable drawing mode
  
      // Add listener to remove the shape if the user wants to draw another
      google.maps.event.addListenerOnce(drawingManager, 'drawingmode_changed', function() {
        if (drawnShape) {
          drawnShape.setMap(null);
          drawnShape = null;
          document.getElementById("coordinates").value =null; 
        }
      });

      // Add event listeners for vertex updates
      google.maps.event.addListener(polygon.getPath(), 'set_at', function() {
        polygonEdited();
      });
      google.maps.event.addListener(polygon.getPath(), 'insert_at', function() {
        polygonEdited();
      });
      google.maps.event.addListener(polygon.getPath(), 'remove_at', function() {
        polygonEdited();
      });
    }
  });
  

  drawingManager.setMap(map);


  // // Get location based on input address
  document.getElementById("address-button").addEventListener("click", () => {
    const address = document.getElementById("address-input").value;
    geocodeAddress(address);
  });

  // Get user's location using GPS
  document.getElementById("gps-button").addEventListener("click", () => {
    getLocationUsingGPS();
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

  // Geocode address 
  function geocodeAddress(address) {
    geocoder.geocode({ address: address }, (results, status) => {
      

      if (status === "OK") {
        console.log(status);
        if (results[0]) {
          const location = results[0].geometry.location;

          console.log(location);
          map.setCenter(location);
          reverseGeocodeLatLng(location);
        }
      } else {
        alert("Geocode was not successful for the following reason:"+status);
        console.error("Geocode was not successful for the following reason:", status);
      }
    });
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

          reverseGeocodeLatLng(latLng);

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

  function polygonEdited() {
    // Get the polygon coordinates
    var coordinates = polygon.getPath().getArray();
    document.getElementById("coordinates").value =JSON.stringify(coordinates); 

    console.log(coordinates);
  }


}


 