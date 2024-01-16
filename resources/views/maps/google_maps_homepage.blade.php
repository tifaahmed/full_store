 
<span class="btn btn-success btngoogle-new" id="gps-button" style="width: 100%">
    {{trans('labels.check_location')}}
</span>  
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
<div id="branches" style="display: none">
    <form action="{{ URL::to('favorite/branch') }}" method="POST">
        <input type="text" name="barnch_id" id="barnch_id" hidden>
        @csrf
        <div class="row" id="branches_itemList" >
            @foreach ($branches as $branch)
                <div class="col-md-12 branches_item" data-lat="{{$branch->latitude}}" data-lon="{{$branch->longitude}}">
                    <div class="custom-square" onclick="toggleSquare(this,{{$branch->id}})">
                        <i class="custom-icon fas fa-home"></i>
                        <div class="icon-text">{{$branch->name}}</div>
                        <div class="icon-text">{{$branch->address}}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success " style="display: none"
        id="favorite_branch_submit"> 
            {{trans('labels.save')}} 
        </button>
    </form>
</div>

 

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>
<script src="{{ env('APP_URL_public', asset('')).'/js/map_homepage.js' }}"></script>

<script>
    function toggleSquare(square,barnch_id) {
      // Remove 'active' class from all squares
      document.querySelectorAll('.custom-square').forEach(function(element) {
        element.classList.remove('active');
      });
      // console.log(barnch_id);
      // Add 'active' class to the clicked square
      square.classList.add('active');
      document.getElementById("barnch_id").value = barnch_id;
      localStorage.setItem('modalShown', true);
      document.getElementById("favorite_branch_submit").click();
    }
  </script>