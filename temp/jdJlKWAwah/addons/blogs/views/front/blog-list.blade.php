@extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec">
    <div class="container">
        <nav class="px-3">
            <h3 class="page-title text-white mb-2">{{trans('labels.our_latest_blogs')}}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">   {{trans('labels.home')}}</a></li>
                <li class="breadcrumb-item {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}"><a href="{{URL::to(@$storeinfo->slug.'/blog-list')}}" class="text-white">  {{trans('labels.blogs')}}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.our_latest_blogs')}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- breadcrumb end -->
@if(count($blogs) > 0)
<!-- Our Lestes Blogs section start -->
<section class="theme-1-margin-top">
    <div class="container">
         <div class="row blogs-card pt-0 g-3">
            @foreach ($blogs as $blog)
            <div class="col-lg-3">
                <a href="{{URL::to(@$storeinfo->slug.'/blog-details-'.$blog->slug)}}">
                    <div class="card h-100 rounded-5">
                        <img src="{{ helper::image_path($blog->image) }}" alt="" class="rounded-5">
                        <div class="card-body py-4">
                            <p class="title mt-2 blog-title">{{ $blog->title }}</p>
                            <span class="blog-description">{!!$blog->description!!}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center align-items-center m-auto mb-3">
            <nav aria-label="Page navigation example">
                @if($blogs->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item {{($blogs->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link {{session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'}}" href="{{ $blogs->url(1)}}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @for($i = 1; $i <= $blogs->lastPage() ; $i++)
                    <li class="page-item {{ ($blogs->currentPage() == $i) ? 'active' : '' }}"><a class="page-link" href="{{ $blogs->url($i)}}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item {{($blogs->currentPage() == $blogs->lastPage()) ? 'disabled' : '' }}">
                        <a class="page-link {{session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'}}" href="{{ $blogs->url($blogs->currentPage() + 1)}}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
                @endif
            </nav>
        </div>
    </div>
</section>
@else
    @include('front.nodata')
@endif
<!-- Our Lestes Blogs section end -->
@endsection
