<div class="row border shadow rounded-4 py-3 mb-4"   
{{-- id="pickup_date" --}}
>
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <form action="#" method="get">
                <div class="row">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-regular fa-clock"></i>
                        <p class="title px-2">{{ trans('labels.date_time') }}</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="Name" class="form-label" id="delivery_date">{{ trans('labels.delivery_date') }}<span class="text-danger"> * </span></label>
                        <label for="Name" class="form-label" id="pickup_date">{{ trans('labels.pickup_date') }}<span class="text-danger"> * </span></label>
                        <input type="date" class="form-control input-h" id="delivery_dt" value="" placeholder="Delivery date" required min="{{date('Y-m-d')}}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="Name" class="form-label" id="delivery">{{ trans('labels.delivery_time') }}<span class="text-danger"> *  </span></label>
                        <label for="Name" class="form-label" id="pickup">{{ trans('labels.pickup_time') }}<span class="text-danger"> * </span></label>
                        <label id="store_close"
                            class="d-none text-danger">{{ trans('labels.today_store_closed') }}</label>
                            <input type="hidden" name="store_id" id="store_id" value="{{ $storeinfo->id }}">
                            <input type="hidden" name="sloturl" id="sloturl" value="{{ URL::to($storeinfo->slug . '/timeslot') }}">
                        <select name="delivery_time" id="delivery_time" class="form-select input-h" required>
                            <option value="{{ old('delivery_time') }}">{{ trans('labels.select') }}
                            </option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>