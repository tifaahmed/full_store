



    
    
    <span class="btn btn-success" id="gps-button">gps-location</span>
 
    <input id="latitude" name="latitude" value="<?php echo e(isset($latitude) ? $latitude : ''); ?>" hidden >
    <input id="longitude" name="longitude" value="<?php echo e(isset($longitude) ? $longitude : ''); ?>" hidden >
    
    <div id="map" style="height: 400px;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjNDbpAwCRVKFKxneDP_hWB9CbwQBqyPs&callback=initMap" async defer></script>
    <script src="<?php echo e(env('APP_URL_public').'/js/maps.js'); ?>"></script>
 <?php /**PATH C:\laragon\www\full_store\full_store\resources\views/maps/google_map.blade.php ENDPATH**/ ?>