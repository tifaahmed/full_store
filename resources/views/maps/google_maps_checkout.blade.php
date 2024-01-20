{{-- <div class="row ">
    <div class="col-lg-10 pg-none col-md-10">
        <input type="text" id="address-input"  
        class="form-control input-h" style="width:100%"> 
    </div>
    <div class="col-lg-2  pg-none col-md-2">
        <span class="btn btn-info btn-search-map-res" id="address-button" style="color: #fff;width:100%"> Search  </span>
    </div>
</div> --}}
<span class="btn btn-success btngoogle-new" id="gps-button" style="width: 100%">gps-location</span>  

<input readonly type="text" name="address" id="address" hidden>
<input id="latitude" name="latitude" value="{{isset($latitude) ? $latitude : ''}}" hidden    readonly/>
<input id="longitude" name="longitude" value="{{isset($longitude) ? $longitude : ''}}" hidden readonly    />

<textarea name="coordinates" id="map_coordinates_direct"   rows="12"  style="width:100%"   hidden 
>{{isset($coordinates) ? $coordinates : '' }}</textarea>
  
<div class="row pg-none">
    <div class="col-lg-12 col-md-12 pg-none">
        <label for="">    {{ trans('labels.address') }} ar</label>
        <input readonly type="text"  value="{{old('address_ar')}}"
        id="address-input-ar" class="form-control  " style="width:100%"
        placeholder="{{ trans('labels.address') }} ar">
        @error('address.ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror 
        <label for="">{{ trans('labels.address') }} en</label>
        <input readonly type="text" value="{{old('address_en')}}"
        id="address-input-en" class="form-control " style="width:100%" 
        placeholder="{{ trans('labels.address') }} en">
        @error('address.en')
            <span class="text-danger">{{ $message }}</span>
        @enderror 
    </div>
</div>

<div id="map" style="height: 400px;"></div>

