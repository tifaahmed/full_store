



    {{-- <input type="text" id="address-input"> --}}
    {{-- <button id="address-button"> Search  </button> --}}
    <span class="btn btn-success" id="gps-button">gps-location</span>
 
    <input id="latitude" name="latitude" value="{{isset($latitude) ? $latitude : ''}}" hidden >
    <input id="longitude" name="longitude" value="{{isset($longitude) ? $longitude : ''}}" hidden >
    
    <div id="map" style="height: 400px;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjNDbpAwCRVKFKxneDP_hWB9CbwQBqyPs&callback=initMap" async defer></script>
    <script src="{{  env('APP_URL_public').'/js/maps.js' }}"></script>
 