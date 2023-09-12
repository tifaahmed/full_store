@extends('admin.layout.default')
@section('content')
<div class="row settings mb-7">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2">{{ trans('labels.language-settings') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="{{ URL::to('/admin/language-settings/language/add')}}" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i>
                    {{ trans('labels.add') }}
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-3">
        <div class="card card-sticky-top border-0">
            <div class="card-body">
                <ul class="list-group list-options">
                    @foreach($getlanguages as $data)
                    <a href="{{ URL::to('admin/language-settings/'.$data->code) }}" class="list-group-item basicinfo p-3 list-item-primary mb-2 @if($currantLang->code == $data->code) active  @endif" aria-current="true">
                        <div class="d-flex justify-content-between align-item-center">
                            {{$data->name}}
                            <div class="d-flex align-item-center">
                                @if($data->is_default == '1')
                                <span>{{ trans('labels.default') }}</span>
                                @endif
                                <i class="fa-regular fa-angle-right ps-2"></i>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-9">
        <div class="dropdown">
            @php
            $title = $currantLang->layout == 1 ? trans('labels.ltr') : trans('labels.rtl') ;
            @endphp
            <button class="btn btn-secondary dropdown-toggle rounded-5 px-4 rtlbtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{$title}}
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @if ($currantLang->layout == 1)
                <a class="dropdown-item w-auto" @if(env('Environment')=='sendbox' ) onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/language-settings/layout/update-' . $currantLang->id . '/2') }}')" @endif> {{ trans('labels.rtl') }} </a>
                @else
                <a class="dropdown-item w-auto" @if(env('Environment')=='sendbox' ) onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/language-settings/layout/update-' . $currantLang->id . '/1') }}')" @endif> {{ trans('labels.ltr') }} </a>
                @endif
            </ul>

            <a class="btn btn-info text-white rounded-5 px-4 mx-2 bg-dark border-0" href="{{ URL::to('/admin/language-settings/language/edit-'.$currantLang->id)}}"> {{ trans('labels.edit') }} </a>
            @if(Strtolower($currantLang->name) != "english")
            <a class="btn btn-danger rounded-5 px-4 text-white bg-danger border-0" @if(env('Environment')=='sendbox' ) onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/language-settings/layout/status-' . $currantLang->id . '/2') }}')" @endif> {{ trans('labels.delete') }} </a>
            @endif
        </div>
        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="labels-tab" data-bs-toggle="tab" data-bs-target="#labels" type="button" role="tab" aria-controls="labels" aria-selected="true">Labels</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="message-tab" data-bs-toggle="tab" data-bs-target="#message" type="button" role="tab" aria-controls="message" aria-selected="false">Messages</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="landing-tab" data-bs-toggle="tab" data-bs-target="#landing" type="button" role="tab" aria-controls="landing" aria-selected="false">Landing</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="labels" role="tabpanel" aria-labelledby="labels-tab">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form method="post" action="{{URL::to('admin/language-settings/update')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="currantLang" value="{{$currantLang->code}}">
                            <input type="hidden" class="form-control" name="file" value="label">
                            <div class="row">
                                @foreach($arrLabel as $label => $value)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="example3cols1Input">{{$label}} </label>
                                        <input type="text" class="form-control" name="label[{{$label}}]" value="{{$value}}">
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end">
                                            @if (env('Environment') == 'sendbox')
                                            <button type="button" class="btn btn-success btn-succes m-1" onclick="myFunction()"><i class="fa fa-check-square-o"></i> {{trans('labels.save')}} </button>
                                            @else
                                            <button type="submit" class="btn btn-success btn-succes m-1"><i class="fa fa-check-square-o"></i> {{trans('labels.save')}} </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form method="post" action="{{URL::to('admin/language-settings/update')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="currantLang" value="{{$currantLang->code}}">
                            <input type="hidden" class="form-control" name="file" value="message">
                            <div class="row">
                                @foreach($arrMessage as $label => $value)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="example3cols1Input">{{$label}} </label>
                                        <input type="text" class="form-control" name="message[{{$label}}]" value="{{$value}}">
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end">
                                            @if (env('Environment') == 'sendbox')
                                            <button type="button" class="btn btn-success btn-succes m-1" onclick="myFunction()"><i class="fa fa-check-square-o"></i> {{trans('labels.save')}} </button>
                                            @else
                                            <button type="submit" class="btn btn-success btn-succes m-1"><i class="fa fa-check-square-o"></i> {{trans('labels.save')}} </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="landing" role="tabpanel" aria-labelledby="landing-tab">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form method="post" action="{{URL::to('admin/language-settings/update')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="currantLang" value="{{$currantLang->code}}">
                            <input type="hidden" class="form-control" name="file" value="landing">
                            <div class="row">
                                @foreach($arrLanding as $label => $value)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="example3cols1Input">{{$label}} </label>
                                        <input type="text" class="form-control" name="landing[{{$label}}]" value="{{$value}}">
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end">
                                            @if (env('Environment') == 'sendbox')
                                            <button type="button" class="btn btn-success btn-succes m-1" onclick="myFunction()"><i class="fa fa-check-square-o"></i> {{trans('labels.save')}} </button>
                                            @else
                                            <button type="submit" class="btn btn-success btn-succes m-1"><i class="fa fa-check-square-o"></i> {{trans('labels.save')}} </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/settings.js') }}"></script>
@endsection