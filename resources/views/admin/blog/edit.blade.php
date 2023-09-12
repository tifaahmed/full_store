@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center">
        <div class="col-6">
            <h5 class="pages-title fs-2">{{trans('labels.edit')}}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{URL::to('admin/blogs/update-'.$getblog->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.title')}}<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="title" value="{{ $getblog->title }}" placeholder="{{trans('labels.title')}}" required>
                                @error('title')
                                <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.description')}}<span class="text-danger"> * </span></label>
                                <textarea class="form-control" id="ckeditor" name="description" required>{!! $getblog->description !!}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-2">{{trans('labels.image')}} <span class="text-danger"> * </span></label>
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span> 
                                @enderror
                                <img src="{{ helper::image_path($getblog->image)}}" class="img-fluid rounded-3 object-fit-cover hw-50" alt="">
                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/blogs') }}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                                <button class="btn btn-success btn-succes m-1" @if(env('Environment')=='sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>

    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
    </script>

@endsection