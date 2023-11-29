



<div class="row">
    <div class="col-lg-10 col-md-10">
        <input type="text" id="address-input" class="form-control input-h" style="width:100%"> 

    </div>
    <div class="col-lg-2 col-md-2">
        <span class="btn btn-info" id="address-button" style="color: #fff;width:100%"> Search  </span>
    </div>
  
</div>
<span class="btn btn-success" id="gps-button">gps-location</span>  

<input id="latitude" name="latitude" value="{{isset($latitude) ? $latitude : ''}}"  hidden  />
<input id="longitude" name="longitude" value="{{isset($longitude) ? $longitude : ''}}" hidden   />

<div id="map" style="height: 400px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>


<script src="{{  'http://127.0.0.1:8000/js/maps_draw.js' }}"></script>
