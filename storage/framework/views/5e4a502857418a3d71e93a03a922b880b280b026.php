



<div class="row">
    <div class="col-lg-10 col-md-10">
        <input type="text" id="address-input" name="address" class="form-control input-h" style="width:100%"> 
    </div>
    <div class="col-lg-2 col-md-2">
        <span class="btn btn-info" id="address-button" style="color: #fff;width:100%"> Search  </span>
    </div>
  
</div>
<span class="btn btn-success" id="gps-button">gps-location</span>  

<input id="latitude" name="latitude" value="<?php echo e(isset($latitude) ? $latitude : ''); ?>"  hidden  />
<input id="longitude" name="longitude" value="<?php echo e(isset($longitude) ? $longitude : ''); ?>" hidden   />

<textarea name="coordinates" id="coordinates"   rows="10"  style="width:100%" hidden 
><?php echo e(isset($coordinates) ? $coordinates : ''); ?></textarea>
  


<div id="map" style="height: 400px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>
<script src="<?php echo e(asset('js/maps_checkout.js')); ?>"></script>
<?php /**PATH C:\laragon\www\full_store\full_store\resources\views/maps/google_maps_checkout.blade.php ENDPATH**/ ?>