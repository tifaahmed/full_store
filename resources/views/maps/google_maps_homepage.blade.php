 
<span class="btn btn-success btngoogle-new" id="gps-button" style="width: 100%">check location</span>  
<textarea   id="map_coordinates"   rows="20"  hidden 
>{{isset($coordinates) ? $coordinates : '' }}</textarea>

<div class="row " id="branches" >
    @foreach ($branches as $branch)
        <div class="col-md-4">
            
            {{$branch->name}}
        </div>
    @endforeach
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>
<script src="{{ env('APP_URL_public', asset('')).'/js/map_homepage.js' }}"></script>
