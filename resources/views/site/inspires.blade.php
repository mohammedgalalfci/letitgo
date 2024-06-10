@extends('site.layouts.master')

@section('title')
{{__('language.inspire')}}
@endsection
@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
    data-background="{{asset('site/assets/img/bg/liveday.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- team-details-area -->
<section class="team-details-area">
    <div class="team-info-wrap team-info-bg" data-background="{{asset('site/assets/img/bg/team_info_bg.jpg')}}">
        <div class="container">
            @foreach($inspires as $inspire)
            <div class="team-info-inner-wrap">
                <div class="team-info-thumb">
                    <img width="300" height="300" src="{{ url('images/inspires/' . $inspire->file)}}" alt="{{$inspire->title}}">
                </div>
                <div class="team-info-content">
                    <h2 class="title">{{$inspire->title}}</h2>
                    <div class="team-contact-list">
                        <ul class="list-wrap">
                            <li><i class="fas fa-certificate"></i>{{$inspire->description}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
<!-- team-details-area-end -->

@endsection