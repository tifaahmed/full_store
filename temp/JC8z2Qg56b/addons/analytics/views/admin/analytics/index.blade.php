@extends('admin.layout.default')
@section('content')
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-12 col-md-4">
                <h5 class="pages-title fs-2">{{ trans('labels.analytics') }}</h5>
                <div class="d-flex">
                    @include('admin.layout.breadcrumb')
                </div>
            </div>
            <div class="col-12 col-md-8">
                <form action="{{ URL::to('/admin/google_analytics') }}" class="my-3">
                    <div class="input-group ps-0 justify-content-end">
                        <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                            <input type="date" class="form-control rounded-5 px-4 bg-white" name="startdate" @isset($_GET['startdate'])
                                value="{{ $_GET['startdate'] }}" @endisset required>
                        </div>
                        <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                            <input type="date" class="form-control rounded-5 px-4 bg-white" name="enddate" @isset($_GET['enddate'])
                                value="{{ $_GET['enddate'] }}" @endisset required>
                        </div>
                        <div class="input-group-append pb-2 pb-xl-0 px-1">
                            <button class="btn btn-primary rounded-5 px-4" type="submit">{{ trans('labels.fetch') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row mb-7">
            <div class="col-md-12 mb-3">
                <div class="card border-0 box-shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <canvas id="visitorschart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="analyticsmainbtn">
                <ul class="nav nav-tabs pb-1 overflow-auto flex-nowrap text-nowrap" id="subAnalytics" role="tablist">
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <!--  for rtl use this class (ms-2) -->
                        <a class="nav-link me-2 @if(!request()->query('data')) active @endif" href="{{ URL::to('/admin/google_analytics') }}?startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}" tabindex="-1">{{ trans('labels.overview') }}</a>
                    </li>
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <!--  for rtl use this class (ms-2) -->
                        <a class="nav-link me-2 @if(request()->query('data') =='countries') active @endif" href="{{ URL::to('/admin/google_analytics') }}?data=countries&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}" tabindex="-1">{{ trans('labels.countries') }}</a>
                    </li>
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <!--  for rtl use this class (ms-2) -->
                        <a class="nav-link me-2 @if(request()->query('data') =='os') active @endif" href="{{ URL::to('/admin/google_analytics') }}?data=os&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}" tabindex="-1">{{ trans('labels.operating_systems') }}</a>
                    </li>
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <!--  for rtl use this class (ms-2) -->
                        <a class="nav-link me-2 @if(request()->query('data') =='browsers') active @endif" href="{{ URL::to('/admin/google_analytics') }}?data=browsers&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}" tabindex="-1">{{ trans('labels.browsers') }}</a>
                    </li>
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <!--  for rtl use this class (ms-2) -->
                        <a class="nav-link me-2 @if(request()->query('data') =='languages') active @endif" href="{{ URL::to('/admin/google_analytics') }}?data=languages&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}" tabindex="-1">{{ trans('labels.languages') }}</a>
                    </li>
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <!--  for rtl use this class (ms-2) -->
                        <a class="nav-link me-2 @if(request()->query('data') =='devices') active @endif" href="{{ URL::to('/admin/google_analytics') }}?data=devices&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}" tabindex="-1">{{ trans('labels.devices') }}</a>
                    </li>
                </ul>
            </nav>


            @php
            $bgcolor=array("bg-secondary","bg-primary","bg-success","bg-danger","bg-warning","bg-info","bg-dark");
            $count = count($bgcolor);
            @endphp

            <div class="col-12 @if(request()->query('data') == 'countries') col-lg-12 @else col-lg-6 @endif @if(request()->query('data') != 'countries') @if(!request()->query('data')) col-lg-6 @else d-none @endif @endif my-3">
                <div class="card h-100">
                    <div class="card-header py-3 bg-transparent">
                        <h5>{{ trans('labels.countries') }}</h5>
                    </div>
                    <div class="card-body">
                    @foreach($topCountries as $key=>$value)
                        <div class="d-flex justify-content-between mb-1">
                            <div class="text-truncate">
                                <a class="align-middle">{{$value['country']}}</a>
                            </div>
                            <div>
                                @php
                                $countriesper = number_format((float)$value['sessions'] * 100 / $totalpageviewcountrywise, 3, '.', '');
                                @endphp
                                <small class="text-muted">{{$countriesper}}%</small>
                                <span class="ml-3">{{$value['sessions']}}</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped {{$bgcolor[$key % $count]}}" role="progressbar" style="width: {{$countriesper}}%;" aria-valuenow="{{$countriesper}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if(!request()->query('data'))
                        @if ($key == 4)
                            @break
                        @endif
                        @endif
                    @endforeach
                    </div>
                    @if(request()->query('data') != 'countries')
                    <div class="card-footer text-muted bg-transparent">
                        <a href="?data=countries&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}">{{ trans('labels.view_more') }}</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12 @if(request()->query('data') == 'os') col-lg-12 @else col-lg-6 @endif @if(request()->query('data') != 'os') @if(!request()->query('data')) col-lg-6 @else d-none @endif @endif my-3">
                <div class="card h-100">
                    <div class="card-header py-3 bg-transparent">
                        <h5>{{ trans('labels.operating_systems') }}</h5>
                    </div>
                    <div class="card-body">
                    @foreach($topOS as $key=>$value)
                        <div class="d-flex justify-content-between mb-1">
                            <div class="text-truncate">
                                <a class="align-middle">{{$value['os']}}</a>
                            </div>
                            <div>
                                @php
                                $osper = number_format((float)$value['sessions'] * 100 / $totalos, 3, '.', '');
                                @endphp
                                <small class="text-muted">{{$osper}}%</small>
                                <span class="ml-3">{{$value['sessions']}}</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped {{$bgcolor[$key % $count]}}" role="progressbar" style="width: {{$osper}}%;" aria-valuenow="{{$osper}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if(!request()->query('data'))
                        @if ($key == 4)
                            @break
                        @endif
                        @endif
                    @endforeach
                    </div>
                    @if(request()->query('data') != 'os')
                    <div class="card-footer text-muted bg-transparent">
                        <a href="?data=os&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}">{{ trans('labels.view_more') }}</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12 @if(request()->query('data') == 'browsers') col-lg-12 @else col-lg-6 @endif @if(request()->query('data') != 'browsers') @if(!request()->query('data')) col-lg-6 @else d-none @endif @endif my-3">
                <div class="card h-100">
                    <div class="card-header py-3 bg-transparent">
                         <h5>{{ trans('labels.browsers') }}</h5>
                    </div>
                    <div class="card-body">
                    @foreach($topBrowsers as $key=>$value)
                        <div class="d-flex justify-content-between mb-1">
                            <div class="text-truncate">
                                <a class="align-middle">{{$value['browser']}}</a>
                            </div>
                            <div>
                                @php
                                $browsersper = number_format((float)$value['sessions'] * 100 / $totalbrowsers, 3, '.', '');
                                @endphp
                                <small class="text-muted">{{$browsersper}}%</small>
                                <span class="ml-3">{{$value['sessions']}}</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped {{$bgcolor[$key % $count]}}" role="progressbar" style="width: {{$browsersper}}%;" aria-valuenow="{{$browsersper}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if(!request()->query('data'))
                        @if ($key == 4)
                            @break
                        @endif
                        @endif
                    @endforeach
                    </div>
                    @if(request()->query('data') != 'browsers')
                    <div class="card-footer text-muted bg-transparent">
                        <a href="?data=browsers&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}">{{ trans('labels.view_more') }}</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12 @if(request()->query('data') == 'languages') col-lg-12 @else col-lg-6 @endif @if(request()->query('data') != 'languages') @if(!request()->query('data')) col-lg-6 @else d-none @endif @endif my-3">
                <div class="card h-100">
                    <div class="card-header py-3 bg-transparent">
                         <h5>{{ trans('labels.languages') }}</h5>
                    </div>
                    <div class="card-body">
                    @foreach($topLanguages as $key=>$value)
                        <div class="d-flex justify-content-between mb-1">
                            <div class="text-truncate">
                                <a class="align-middle">{{$value['languages']}}</a>
                            </div>
                            <div>
                                @php
                                $languagesper = number_format((float)$value['sessions'] * 100 / $totallanguages, 3, '.', '');
                                @endphp
                                <small class="text-muted">{{$languagesper}}%</small>
                                <span class="ml-3">{{$value['sessions']}}</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped {{$bgcolor[$key % $count]}}" role="progressbar" style="width: {{$languagesper}}%;" aria-valuenow="{{$languagesper}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if(!request()->query('data'))
                        @if ($key == 4)
                            @break
                        @endif
                        @endif
                    @endforeach
                    </div>
                    @if(request()->query('data') != 'languages')
                    <div class="card-footer text-muted bg-transparent">
                        <a href="?data=languages&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}">{{ trans('labels.view_more') }}</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12 @if(request()->query('data') == 'devices') col-lg-12 @else col-lg-6 @endif @if(request()->query('data') != 'devices') @if(!request()->query('data')) col-lg-6 @else d-none @endif @endif my-3">
                <div class="card h-100">
                    <div class="card-header py-3 bg-transparent">
                         <h5>{{ trans('labels.devices') }}</h5>
                    </div>
                    <div class="card-body">
                    @foreach($topDevices as $key=>$value)
                        <div class="d-flex justify-content-between mb-1">
                            <div class="text-truncate">
                                <a class="align-middle">{{$value['devices']}}</a>
                            </div>
                            <div>
                                @php
                                $devicesper = number_format((float)$value['sessions'] * 100 / $totaldevice, 3, '.', '');
                                @endphp
                                <small class="text-muted">{{$devicesper}}%</small>
                                <span class="ml-3">{{$value['sessions']}}</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped {{$bgcolor[$key % $count]}}" role="progressbar" style="width: {{$devicesper}}%;" aria-valuenow="{{$devicesper}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if(!request()->query('data'))
                        @if ($key == 4)
                            @break
                        @endif
                        @endif
                    @endforeach
                    </div>
                    @if(request()->query('data') != 'devices')
                    <div class="card-footer text-muted bg-transparent">
                        <a href="?data=devices&startdate={{ Request::get('startdate') }}&enddate={{ Request::get('enddate') }}">{{ trans('labels.view_more') }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
@endsection
@section('scripts')
<script>

var visitorschart = null;
var labels = {{ Js::from($date) }};
var visitors = {{ Js::from($visitors) }};
var uniquevisitors = {{ Js::from($uniquevisitors) }};

createvisitorschart(labels, visitors, uniquevisitors);
$('#visitorsdate').on('change', function () {
    "use strict";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $("#visitorsdate").attr('data-url'),
        method: "GET",
        data: {
            visitorsdate: $("#visitorsdate").val()
        },
        dataType: "JSON",
        success: function (data) {
            createvisitorschart(data.revenuelabels, data.visitors, data.uniquevisitors)
        },
        error: function (data) {
            toastr.error(wrong);
            return false;
        }
    });
});
function createvisitorschart(labels, visitors, uniquevisitors) {
    "use strict";
    const chartdata = {
        labels: labels,
        datasets: [
            {
                label: 'Visitors',
                backgroundColor: ['#F15A1F'],
                borderColor: ['#F15A1F'],
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 10,
                data: visitors,
            },
            {
                label: 'Unique Visitors',
                backgroundColor: ['#000'],
                borderColor: ['#000'],
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 10,
                data: uniquevisitors,
            }
        ]
    };
    const config = {
        type: 'line',
        data: chartdata,
        options: {}
    };
    if (visitorschart != null) {
        visitorschart.destroy();
    }
    if (document.getElementById('visitorschart')) {
        visitorschart = new Chart(document.getElementById('visitorschart'), config);
    }
}

</script>
@endsection
