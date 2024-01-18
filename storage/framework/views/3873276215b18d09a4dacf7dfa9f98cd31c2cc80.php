<div class="row ">
    <div class="col-lg-10 pg-none col-md-10">
        <input type="text" id="address-input" value="<?php echo e(isset($address) ? $address : ''); ?>"  name="address" class="form-control input-h" style="width:100%"> 
    </div>
    <div class="col-lg-2  pg-none col-md-2">
        <span class="btn btn-info btn-search-map-res" id="address-button" style="color: #fff;width:100%"> Search  </span>
    </div>
</div>
<span class="btn btn-success btngoogle-new" id="gps-button" style="width: 100%">gps-location</span>  

<input id="latitude" name="latitude" value="25.261512298578495"     />
<input id="longitude" name="longitude" value="25.261512298578495"     />

<textarea name="coordinates" id="map_coordinates_direct"   rows="12"  style="width:100%"   hidden 
><?php echo e(isset($coordinates) ? $coordinates : ''); ?></textarea>
  


<div id="map" style="height: 400px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>
<script src="<?php echo e(env('APP_URL_public', asset('')).'/js/maps_checkout.js'); ?>"></script>
<?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/maps/google_maps_checkout.blade.php ENDPATH**/ ?>