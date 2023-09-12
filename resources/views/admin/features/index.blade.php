@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2">{{ trans('labels.features') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="{{ URL::to('admin/features/add') }}" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}
                </a>
            </div>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class=" fw-500">
                                    <td>{{ trans('labels.srno') }}</td>
                                    <td>{{ trans('labels.image') }}</td>
                                    <td>{{ trans('labels.title') }}</td>
                                    <td>{{ trans('labels.description') }}</td>
                                    <td>{{ trans('labels.action') }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                            @foreach ($features as $feature)
                            <tr class="fs-7">
                                <td>@php
                                    echo $i++;
                                @endphp</td>
                                <td><img src="{{helper::image_path($feature->image)}}" class="img-fluid rounded hw-50" alt=""></td>
                                <td>{{$feature->title}}</td>
                                <td>{{$feature->description}}</td>
                                <td>

                                    <a href="{{ URL::to('/admin/features/edit-' .$feature->id ) }}"
                                        class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"> <i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                            
                                    <a href="javascript:void(0)"
                                        @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/features/delete-'.$feature->id ) }}')" @endif
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
