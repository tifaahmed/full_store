
<div class="row border shadow rounded-4 py-3 mb-4" id="open">
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <form action="#" method="get">
                <div class="row">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-regular fa-circle-question"></i>
                        <p class="title px-2">{{ trans('labels.delivery_info') }}</p>
                    </div>


                    @if (auth()->user() && auth()->user()->userAddresses && auth()->user()->userAddresses->count())
                    <div class="row">
                        <label for="validationDefault" class="form-label">{{ trans('labels.user_addresses') }} </label>
                        @foreach (auth()->user()->userAddresses()->orderBy('is_active','desc')->get() as $key => $userAddress)
                            <div class="col-3 px-0 mb-2">
                                <label class="form-check-label d-flex  justify-content-between align-items-center"
                                for="user-address-{{$userAddress->id}}">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input m-0" type="radio" name="user_address"
                                        id="user-address-{{$userAddress->id}}" value="{{$key}}"
                                        {{ $userAddress->is_active ? 'checked' : ''}}>
                                        <p class="px-2">
                                            {{ $userAddress->title}}
                                        </p>
                                    </div>
                                </label>
                                <div class="child-container">
                                    <input id="user_address_address_{{$key}}" value="{{$userAddress->address}}" hidden>
                                    <input id="user_address_house_num_{{$key}}" value="{{$userAddress->house_num}}" hidden>
                                    <input id="user_address_street_{{$key}}" value="{{$userAddress->street}}"hidden>
                                    <input id="user_address_block_{{$key}}" value="{{$userAddress->block}}"hidden>
                                    <input id="user_address_pincode_{{$key}}" value="{{$userAddress->pincode}}"hidden>
                                    <input id="user_address_building_{{$key}}" value="{{$userAddress->building}}"hidden>
                                    <input id="user_address_landmark_{{$key}}" value="{{$userAddress->landmark}}"hidden>

                                    <input id="user_address_longitude_{{$key}}" value="{{$userAddress->longitude}}"hidden>
                                    <input id="user_address_latitude_{{$key}}" value="{{$userAddress->latitude}}"hidden>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="col-md-12 mb-4">

                        <label for="validationDefault" class="form-label">{{ trans('labels.delivery_area') }}<span class="text-danger"> * </span></label>
                        <select disabled name="delivery_area" id="delivery_area" class="form-control">
                            <option value=""price="{{ 0 }}">
                                {{ trans('labels.select') }}
                            </option>
                            @foreach ($deliveryarea as $area)
                                <option value="{{ $area->name }}" price="{{ $area->price }}">
                                    {{ $area->name }} {{ $area->delivery_time }}
                                    {{-- - {{ helper::currency_formate($area->price, $storeinfo->id) }} --}}
                                </option>
                            @endforeach
                        </select>
                        @foreach ($deliveryarea as $coordinates_key => $area)
                        <input id="area_coordinates_{{$area->name}}" value="{{ json_encode([$area->coordinates]) }}" hidden >
                        @endforeach
                        <?php
                        $coordinatesToArray  =  $deliveryarea->whereNotNull('coordinates')
                                            ->pluck('coordinates','name')->map(function ($coordinates) {
                                                return json_decode($coordinates, true); // true to get an associative array
                                            })->toArray();

                                            



                        $coordinates = json_encode($coordinatesToArray);
                        ?>
                        <textarea style="width:100%" rows="12" id="all_coordinates" hidden >{{isset($coordinates) ? $coordinates : '' }}</textarea>

                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label">{{ trans('labels.block') }}<span class="text-danger"> * </span></label>
                        <input type="text" class="form-control input-h" name="block" id="block" placeholder="Block" >
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label">{{ trans('labels.street') }}<span class="text-danger"> </span></label>
                        <input type="text" class="form-control input-h"   name="street"  id="street" placeholder="Street" >
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label">{{ trans('labels.house_num') }}</label>
                        <input type="text" class="form-control input-h" name="house_num" id="house_num" placeholder="House Number" >
                    </div>
                    {{-- <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label">{{ trans('labels.address') }}<span class="text-danger"> * </span></label>
                        <input type="text" class="form-control input-h" name="address" id="address" placeholder="Address" >
                    </div> --}}
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label">{{ trans('labels.landmark') }}<span class="text-danger"> </span></label>
                        <input type="text" class="form-control input-h"   name="landmark"  id="landmark" placeholder="Landmark" >
                    </div>
                    {{-- <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label">{{ trans('labels.building') }}</label>
                        <input type="text" class="form-control input-h" name="building" id="building" placeholder="Building" >
                    </div> --}}
                    {{-- <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label">{{ trans('labels.pincode') }}</label>
                        <input type="number" class="form-control input-h" placeholder="Pincode" name="postal_code" id="postal_code" >
                    </div> --}}

                    <div>
                        @include('maps.google_maps_checkout',[
                            'coordinates' => $coordinates,
                            'address_ar' => old('address.ar'),
                            'address_en' => old('address.en'),
                            'latitude' => old('latitude'),
                            'longitude' => old('longitude'),
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>