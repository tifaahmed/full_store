@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2">{{ trans('labels.testimonials') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="{{ URL::to('admin/testimonials/add') }}" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}
                </a>
            </div>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="fw-500">
                                    <td>{{ trans('labels.srno') }}</td>
                                    <td>{{ trans('labels.image') }}</td>
                                    <td>{{ trans('labels.name') }}</td>
                                    <td>{{ trans('labels.position') }}</td>
                                    <td>{{ trans('labels.description') }}</td>
                                    <td>{{ trans('labels.ratting') }}</td>
                                    <td>{{ trans('labels.action') }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                            @foreach ($testimonials as $testimonial)
                            <tr class="fs-7">
                                <td>@php
                                    echo $i++;
                                @endphp</td>
                                <td><img src="{{helper::image_path($testimonial->image)}}"  class="img-fluid rounded-3 hw-50 object-fit-cover" alt=""></td>
                                <td>{{$testimonial->name}}</td>
                                <td>{{$testimonial->position}}</td>
                                <td>{{ Str::limit($testimonial->description,150)}}</td>
                                <td>{{$testimonial->star}}</td>
                                <td>
                                    <a href="{{ URL::to('/admin/testimonials/edit-'.$testimonial->id ) }}"
                                        class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"> <i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="javascript:void(0)"
                                        @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/testimonials/delete-'.$testimonial->id) }}')" @endif
                                        class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}">
                                        <i class="fa-regular fa-trash"></i></a>
                                </td>
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
