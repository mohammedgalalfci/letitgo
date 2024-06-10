@extends('site.layouts.master')

@section('title')
{{__('language.about_us')}}
@endsection

@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="{{asset('site/assets/img/bg/about-us.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- choose-area -->
<section class="choose-area choose-area-two choose-bg" data-background="assets/img/bg/choose_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <span class="sub-title">{{__('language.about')}} {{__('language.let_it_go')}}</span>
                    <h2 class="title">{{__('language.why_choose_our_shop')}}</h2>
                    <div class="title-shape" data-background="{{asset('site/assets/img/images/title_shape.png')}}"></div>
                </div>
            </div>
        </div>
        <div class="choose-item-wrap">
            <div class="row justify-content-center">
                @foreach($aboutUs as $bout)
                <div class="col-lg-4 col-md-6">
                    <div class="choose-item">
                        <div class="choose-shape">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408 325" preserveAspectRatio="none">
                                <path
                                    d="M330.5,2316h368a20,20,0,0,1,20,20l-29,285a20,20,0,0,1-20,20h-299a20,20,0,0,1-20-20l-40-285A20,20,0,0,1,330.5,2316Z"
                                    transform="translate(-310.5 -2316)" />
                            </svg>
                        </div>
                        <div class="choose-icon">
                            <i class="flaticon-online-shop"></i>
                        </div>
                        <div class="choose-content">
                            <div class="line" data-background="{{asset('site/assets/img/images/line.png')}}"></div>
                            <p>{{$bout->about}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- choose-area-end -->

@endsection