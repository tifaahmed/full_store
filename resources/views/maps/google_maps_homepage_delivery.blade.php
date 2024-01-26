 
{{-- <span class="btn btn-success btngoogle-new" id="gps-button" style="width: 100%">
    {{trans('labels.check_location')}}
</span>   --}}
<textarea   id="map_coordinates"   rows="20"  hidden 
>{{isset($coordinates) ? $coordinates : '' }}</textarea>

<style>
    .custom-square {
        padding: 14px;
        width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border: 2px solid #ccc;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .custom-square.active {
      border-color: red;
    }
    .custom-icon {
      font-size: 24px;
    }
    .icon-text {
      margin-top: 10px;
      font-size: 14px;
      text-align: center
    }
  </style>



  <form action="{{ URL::to('favorite/location_or_branch') }}" method="POST">
    @csrf
    <input type="text" id="favorite_location_long" name="favorite_long" hidden>
    <input type="text" id="favorite_location_lat" name="favorite_lat" hidden>
    <div style="text-align: center"  >
      <button type="submit" class="btn header-main"  disabled 
      id="favorite_location_submit" style="color: #fff"> 
        {{trans('labels.confirm')}} 
      </button>
      <button type="button" id="delivery_back" class="btn btn-dark"   
        style="color: #fff"> 
        {{trans('labels.cancel')}} 
      </button>
      <br>
    </div>
    <div id="map" style="height: 400px;"></div>
    <div id="branches" style="display: none">
        <h5 class=" " id="select_branch_title" style="padding: 19px;">
          {{trans('labels.you_are_outside_the_delivery_area_you_can_pickup_from_one_of_our_branches')}}
        </h5> 
        <input type="text" name="branch_id" id="branch_id" hidden>
        @csrf
        <div class="row" id="branches_itemList" style="text-align: center;">
            @foreach ($branches as $branch)
                <div class="col-md-6 branches_item" data-lat="{{$branch->latitude}}" 
                  data-lon="{{$branch->longitude}}" style="color:#fff">
                    <div class="custom-square header-main" onclick="toggleSquare(this,{{$branch->id}})">
                        <div class="icon-text">{{$branch->name}}</div>
                        <div class="distance-text"></div>
                        <div class="icon-text" style="height: 70px;">{{$branch->address}}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success " style="display: none"
        id="favorite_branch_submit"> 
            {{trans('labels.save')}} 
        </button>
    </div>
  </form>
 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry" async defer></script>


<script>
    function toggleSquare(square,branch_id) {
      // Remove 'active' class from all squares
      document.querySelectorAll('.custom-square').forEach(function(element) {
        element.classList.remove('active');
      });
      // console.log(branch_id);
      // Add 'active' class to the clicked square
      square.classList.add('active');
      document.getElementById("branch_id").value = branch_id;
      document.getElementById("favorite_branch_submit").click();
    }
    document.getElementById('delivery_back').addEventListener('click', function () {
      var divToHide = document.getElementById('location_popup_page_1_main').style.display = 'block';
      var divToHide = document.getElementById('location_popup_page_2_delivery').style.display = 'none';
      var divToHide = document.getElementById('location_popup_page_2_pickup').style.display = 'none';
    });
  </script>