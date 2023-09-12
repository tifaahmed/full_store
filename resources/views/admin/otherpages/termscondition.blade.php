@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.terms') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <div id="privacy-policy-three" class="privacy-policy">
                        <form action="{{ URL::to('admin/terms-conditions/update') }}" method="post">
                            @csrf
                            <textarea class="form-control" id="ckeditor" name="termscondition">{{ @$gettermscondition->terms_content }}</textarea>
                            @error('termscondition')
                                <span class="text-danger">{{ $message }}</span><br>
                            @enderror
                            <div class="form-group text-end">
                                <button class="btn btn-success btn-succes mt-3"
                                    @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                            </div>
                        </form>
                    </div>
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