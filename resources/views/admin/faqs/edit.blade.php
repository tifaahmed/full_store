@extends('admin.layout.default')
@section('content')
        <div class="row justify-content-between align-items-center">
            <div class="col-12">
                <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
                @include('admin.layout.breadcrumb')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="{{ URL::to('/admin/faqs/update-' . $getfaq->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.question') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="question"
                                        value="{{ $getfaq->question }}" placeholder="{{ trans('labels.question') }}"
                                        required>
                                    @error('question')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.answer') }}<span class="text-danger"> *
                                        </span></label>
                                    <textarea class="form-control" name="answer" placeholder="{{ trans('labels.answer') }}" rows="5" required>{{ $getfaq->answer }}</textarea>
                                    @error('answer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/faqs') }}"
                                    class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                                <button
                                    @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                    class="btn btn-success btn-succes m-1">{{ trans('labels.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
