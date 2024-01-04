<span class="btn btn-success w-100 pg-none mt-2 d-flex align-items-center justify-content-center" style="height:40px;" id="gps-button">gps-location</span>
<div id="map" style="height: 400px;"></div>

<div class="row pg-none">
    <div class="col-lg-12 col-md-12 pg-none">
        <label for="">address ar</label>
        <input readonly type="text" name="address:ar" id="address-input-ar" class="form-control input-h" style="width:100%">
        <label for="">address ar</label>
        <input readonly type="text" name="address:en" id="address-input-en" class="form-control input-h" style="width:100%">
    </div>
    <div class="col-lg-6 col-md-6 pg-none">
        <label for="">latitude</label>
        <input readonly id="latitude" name="latitude" class="form-control input-h" style="width:100%"/>
    </div>
    <div class="col-lg-6 col-md-6 pg-none">
        <label for="">longitude</label>
        <input readonly id="longitude" name="longitude" class="form-control input-h" style="width:100%"/>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>
<script src="{{  env('APP_URL_public', asset('')).'/js/maps_branch_create.js' }}"></script>
