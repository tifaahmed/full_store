 
 
<textarea name="coordinates" id="coordinates"   rows="10"  style="width:100%" hidden
>{{isset($coordinates) ? $coordinates : '' }}</textarea>
 

<div id="map" style="height: 400px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>

<script src="{{ env('APP_URL_public', asset('')).'/js/maps_draw_edit.js'  }}"></script>
