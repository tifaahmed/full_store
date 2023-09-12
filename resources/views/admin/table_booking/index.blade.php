@extends('admin.layout.default')
@section('content')
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-12 col-md-4">
                <h5 class="pages-title fs-2">{{ trans('labels.booking') }}</h5>
                <div class="d-flex">
                @include('admin.layout.breadcrumb')
                </div>
            </div>
           
        </div>
        <div class="row mb-7">
            <div class="col-12">
                <div class="card border-0 my-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                                <thead>
                                    <tr class="fw-500">
                                        <td>{{ trans('labels.srno') }}</td>
                                        <td>{{ trans('labels.event') }}</td>
                                        <td>{{ trans('labels.people') }}</td>
                                        <td>{{ trans('labels.event_date') }}</td>
                                        <td>{{ trans('labels.event_time') }}</td>
                                        <td>{{ trans('labels.name') }}</td>
                                        <td>{{ trans('labels.email') }}</td>
                                        <td>{{ trans('labels.mobile') }}</td>
                                        <td>{{ trans('labels.special_request') }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($bookings as $booking)
                                        <tr class="fs-7">
                                            <td>@php echo $i++ @endphp</td>
                                            <td>{{ $booking->event}}</td>
                                            <td>{{ $booking->people}}</td>
                                            <td>{{ $booking->event_date}}</td>
                                            <td> {{ date("h:i a",strtotime($booking->event_time)) }}
                                               
                                            </td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->email }}</td>
                                            <td>{{ $booking->mobile }}</td>
                                            <td>{{ $booking->notes }}</td>    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
