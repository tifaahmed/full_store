



<div class="row pg-none">
    <div class="col-lg-10 col-md-10 pg-none">
        <input type="text" id="address-input" class="form-control input-h" style="width:100%">

    </div>
    <div class="col-lg-2 col-md-2 pg-none mt-2">
        <span class="btn btn-info" id="address-button" style="color: #fff;width:100%"> Search  </span>
    </div>

</div>
<span class="btn btn-success w-100 pg-none mt-2 d-flex align-items-center justify-content-center" style="height:40px;" id="gps-button">gps-location</span>

<input id="latitude" name="latitude" value="<?php echo e(isset($latitude) ? $latitude : ''); ?>"  hidden  />
<input id="longitude" name="longitude" value="<?php echo e(isset($longitude) ? $longitude : ''); ?>" hidden   />

<div id="map" style="height: 400px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&callback=initMap" async defer></script>
<script src="<?php echo e(env('APP_URL_public').'/js/maps.js'); ?>"></script>
<?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/maps/google_map.blade.php ENDPATH**/ ?>