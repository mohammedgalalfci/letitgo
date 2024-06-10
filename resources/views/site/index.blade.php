@extends('site.layouts.master')

@section('title')
{{__('language.let_it_go')}}
@endsection
@section('css')
<style>
/* General Styles */
.banner-area-two {
    position: relative;
    background-size: cover;
    background-position: center;
    background-color: chocolate;
}

.icon-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.icon-inner {
    position: relative;
    width: 100%;
    max-width: 500px;
}

.main-img {
    max-width: 60%;
    height: auto;
    width: 60%;
    display: block;
    margin: 0 auto;
}

.overlay-img {
    max-width: 100%;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60%;
}

.banner-img-two {
    margin-top: 80px;
    font-size: 200%;
    text-align: center;
}

.banner-shape-wrap-two img {
    position: absolute;
}


/* General Styles for Shapes */
.banner-shape-wrap-two {
    position: relative;
}

.shape {
    position: absolute;
    max-width: 100%;
}

/* Specific positioning for each shape */
.shape1 {
    top: 10%;
    left: 5%;
    width: 15%;
}

.shape2 {
    top: 20%;
    right: 5%;
    width: 20%;
}

.shape3 {
    bottom: 15%;
    left: 10%;
    width: 25%;
}

.shape4 {
    bottom: 5%;
    right: 10%;
    width: 18%;
}

.shape5 {
    top: 5%;
    right: 20%;
    width: 10%;
}

.shape6 {
    bottom: 10%;
    left: 25%;
    width: 22%;
}

/* Responsive Styles */
@media (max-width: 768px) {

    .shape1,
    .shape2,
    .shape3,
    .shape4,
    .shape5,
    .shape6 {
        width: 12%;
    }

    .shape1 {
        top: 8%;
        left: 3%;
    }

    .shape2 {
        top: 18%;
        right: 3%;
    }

    .shape3 {
        bottom: 12%;
        left: 8%;
    }

    .shape4 {
        bottom: 3%;
        right: 8%;
    }

    .shape5 {
        top: 3%;
        right: 15%;
    }

    .shape6 {
        bottom: 8%;
        left: 20%;
    }
}

@media (max-width: 576px) {

    .shape1,
    .shape2,
    .shape3,
    .shape4,
    .shape5,
    .shape6 {
        width: 10%;
    }

    .shape1 {
        top: 5%;
        left: 2%;
    }

    .shape2 {
        top: 15%;
        right: 2%;
    }

    .shape3 {
        bottom: 10%;
        left: 5%;
    }

    .shape4 {
        bottom: 2%;
        right: 5%;
    }

    .shape5 {
        top: 2%;
        right: 10%;
    }

    .shape6 {
        bottom: 5%;
        left: 15%;
    }
}


/* .shape02{
    right: 0%;bottom: 15%;width: 25%;
}

.shape04{
    width: 15%;left: 0%;top: 10%;
}

.shape03{
    right: 0%;top: 15%;width: 15%;
}

.shape01{
    left: 0%;bottom: 25%;width: 25%;
} */


/* Responsive Styles */
@media (max-width: 768px) {
    .icon-inner {
        max-width: 300px;
    }

    .main-img,
    .overlay-img {
        max-width: 100%;
        width: 100%;
    }

    .banner-img-two {
        font-size: 150%;
        margin-top: 40px;
    }

    .gallery-item img{
        max-height : 250px !important;
    }
}

@media (max-width: 576px) {
    .icon-inner {
        max-width: 200px;
    }

    .banner-img-two {
        font-size: 120%;
    }
}

.product-shape svg {
    fill: #efe8d9;
}

.category-bg {
    margin-top: 0px;
}

.category-item .icon img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
}

.slick-slider .slick-track,
.slick-slider .slick-list {
    direction: rtl;
}
</style>
@endsection
@section('content')



<!-- banner-area -->
<section class="banner-area-two tg-motion-effects banner-bg-two" data-background="{{asset('site/assets/img/banner/h3_banner_bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Main content of the banner -->
                <div class="banner-content-two">
                    <!-- Icon section with images -->
                    <div class="icon-container icon wow zoomIn" data-wow-delay=".2s">
                        <div class="icon-inner">
                            <img src="{{asset('site/assets/img/banner/banner.png')}}" alt="Banner"
                                class="rotateme main-img">
                            <img src="{{asset('site/assets/img/banner/letitgo.png')}}" alt="Let it go"
                                class="overlay-img">
                        </div>
                    </div>
                </div>
                <!-- Headline section -->
                <div class="banner-img-two wow bounceInLeft" data-wow-delay=".6s">
                    <h1 class="title wow bounceInRight text-white" data-wow-delay=".4s">Chocolate & Sweets</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Decorative shapes with motion effects -->
    <div class="banner-shape-wrap-two">
        <img src="{{asset('site/assets/img/banner/h3_banner_shape01.png')}}" alt="shape1"
            class="shape1 opacity-100 tg-motion-effects4">
        <img src="{{asset('site/assets/img/banner/h3_banner_shape02.png')}}" alt="shape2"
            class="shape2 opacity-100 tg-motion-effects5">
        <img src="{{asset('site/assets/img/banner/h3_banner_shape03.png')}}" alt="shape3"
            class="shape3 opacity-100 tg-motion-effects4">
        <img src="{{asset('site/assets/img/banner/h3_banner_shape04.png')}}" alt="shape4"
            class="shape4 opacity-100 tg-motion-effects5">
        <img src="{{asset('site/assets/img/banner/h3_banner_shape05.png')}}" alt="shape5"
            class="shape5 opacity-100 tg-motion-effects4">
        <img src="{{asset('site/assets/img/banner/h3_banner_shape06.png')}}" alt="shape6"
            class="shape6 opacity-100 tg-motion-effects5">
    </div>
</section>
<!-- banner-area-end -->


<!-- product-area -->
<section class="product-area product-bg" data-background="{{asset('site/assets/img/bg/product_bg01.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-60">
                    <span class="sub-title">{{__('language.our_shop')}}</span>
                    <h2 class="title">{{__('language.our_offer')}}</h2>
                    <div class="title-shape" data-background="{{asset('site/assets/img/images/title_shape.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($offers as $offer)
            <div class="col-lg-4 col-md-6">
                <div class="product-item">
                    <div class="product-img">
                        <a href="{{route('site.product.show',$offer->id)}}"><img height="250px"
                                src="{{ url('images/products/' . $offer->file)}}" alt="{{$offer->name}}"></a>
                    </div>
                    <div class="product-content">
                        <div class="line" data-background="{{asset('site/assets/img/images/line.png')}}"></div>
                        <h4 class="title"><a href="{{route('site.product.show',$offer->id)}}">{{$offer->name}}</a></h4>
                        <h6 class="price">
                            {{\Illuminate\Support\Str::limit($offer->description, 70, $end='...')}}</h6>
                    </div>
                    <div class="product-shape">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 401 314" preserveAspectRatio="none">
                            <path
                                d="M331.5,1829h361a20,20,0,0,1,20,20l-29,274a20,20,0,0,1-20,20h-292a20,20,0,0,1-20-20l-40-274A20,20,0,0,1,331.5,1829Z"
                                transform="translate(-311.5 -1829)" />
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="shop-shape">
        <img src="{{asset('site/assets/img/product/product_shape01.png')}}" alt="product_shape01">
    </div>
</section>
<!-- product-area-end -->


<!-- gallery-area -->
<div class="gallery-area gallery-bg" data-background="{{asset('site/assets/img/bg/product_bg01.jpg')}}">
    <div class="container">
        <div class="gallery-item-wrap">
            <div class="row justify-content-center">
                <div class="col-88">
                    <div class="gallery-active">
                        @foreach($sliders as $slider)
                        <div class="gallery-item">
                            <a href="{{ url('images/sliders/'.$slider->image) }}" class="popup-image"><img height="100%"
                                    style="max-height: 577px;" src="{{ url('images/sliders/'.$slider->image) }}"
                                    alt="{{$slider->title}}"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- gallery-area-end -->


<!-- blog-post-area -->
<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-70">
                    <span class="sub-title">{{__('language.latest_products')}}</span>
                    <h2 class="title">{{__('language.latest_products')}}</h2>
                    <div class="title-shape" data-background="{{asset('site/assets/img/images/title_shape.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($latest3Products as $latestProduct)
            <div class="col-lg-4 col-md-6">
                <div class="blog-post-item">
                    <div class="blog-post-thumb">
                        <a href="{{route('site.product.show',$latestProduct->id)}}"><img height="300"
                                src="{{ url('images/products/' . $latestProduct->file)}}"
                                alt="{{$latestProduct->name}}"></a>
                    </div>
                    <div class="blog-post-content">
                        <h4 class="title"><a
                                href="{{route('site.product.show',$latestProduct->id)}}">{{$latestProduct->name}}</a>
                        </h4>
                        <p>{{ \Illuminate\Support\Str::limit($latestProduct->description, 70, $end='...') }}</p>
                        <div class="blog-post-bottom">
                            <a href="{{route('site.product.show',$latestProduct->id)}}"
                                class="link-btn">{{__('language.read_more')}}</a>
                            <a href="{{route('site.product.show',$latestProduct->id)}}" class="link-arrow"><i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- blog-post-area-end -->


<!-- category-area -->
<div class="category-area category-bg" data-background="{{asset('site/assets/img/bg/category_bg.png')}}">
    <div class="container">
        <div class="row justify-content-center row-cols-1 row-cols-lg-5 row-cols-md-3 row-cols-sm-2">
            @foreach($sliders as $slider)
            <div class="col">
                <div class="category-item text-white">
                    <div class="icon">
                        <img src="{{ url('images/sliders/'.$slider->image) }}" alt="{{$slider->title}}">
                    </div>
                    {{$slider->title}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- category-area-end -->


<!-- cta-area -->
<section class="cta-area position-relative">
    <div class="cta-bg" data-background="{{asset('site/assets/img/bg/liveday.jpg')}}"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <img src="assets/img/icons/cta_icon.png" alt="">
                    <h2 class="title">{{__('language.let_it_go_in_our_daily_lives')}}</h2>
                    <div class="cta-bottom">
                        <a href="{{route('site.inspire')}}" class="btn">{{__('language.watching')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cta-area-end -->


<!-- contact-area -->
<section class="contact-area">
    <div class="contact-wrap p-0">
        <div class="col-lg-12">
            <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3628.762977651096!2d46.74845098500303!3d24.562851584195208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDMzJzQ2LjMiTiA0NsKwNDQnNDYuNSJF!5e0!3m2!1sar!2seg!4v1717839931868!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->
@endsection