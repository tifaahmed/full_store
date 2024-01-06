 
<span class="btn btn-success btngoogle-new" id="gps-button" style="width: 100%">check location</span>  
<textarea   id="map_coordinates"   rows="20"  hidden 
><?php echo e(isset($coordinates) ? $coordinates : ''); ?></textarea>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>
<script src="<?php echo e(env('APP_URL_public', asset('')).'/js/map_homepage.js'); ?>"></script>
<?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/maps/google_maps_homepage.blade.php ENDPATH**/ ?>