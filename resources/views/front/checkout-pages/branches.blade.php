    <div class="row" id="pickup_date">
        <div class="d-flex align-items-center mb-3">
            <i class="fa-regular fa-address-card"></i>
            <p class="title px-2">{{ trans('labels.branches') }}</p>
        </div>
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
        <input hidden type="text" name="barnch_id" id="barnch_id" value="{{ session('favorite_branch') }}"  >

        @foreach ($branches as $key=> $branch)
            <div class="col-md-6"> 
                <div class="custom-square {{ session('favorite_branch') == $branch->id  ? 'active' : '' }}" onclick="toggleSquare(this,{{$branch->id}})">
                    <i class="custom-icon fas fa-home"></i>
                    <div class="icon-text">{{$branch->name}}</div>
                    <div class="icon-text">{{$branch->address}}</div>
                </div>
            </div>
        @endforeach
    </div>
