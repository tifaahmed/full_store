<div class="row border shadow rounded-4 py-3 mb-4" id="table_show">
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <form action="#" method="get">
                <div class="row">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-utensils"></i>
                        <p class="title px-2">{{ trans('labels.table') }}</p>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="Name" class="form-label" id="delivery">{{ trans('labels.table') }}<span class="text-danger"> *  </span></label>
                        <select name="table" id="table" class="form-select input-h" @if(Session::has('table_id')) disabled  @endif required>
                            <option value="">{{ trans('labels.select_table') }}
                            </option>
                            @foreach ($tableqrs as $tableqr)
                            <option value="{{$tableqr->id}}" {{@Session::get('table_id') == $tableqr->id ? 'selected' : ''}}> {{ $tableqr->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>