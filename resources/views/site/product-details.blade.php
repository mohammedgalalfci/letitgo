@extends('site.layouts.master')

@section('title')
{{__('language.product_details')}}
@endsection
@section('css')
<style>
    .slick-slider .slick-track, .slick-slider .slick-list{
        direction: rtl;
    }
</style>
@endsection

@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
    data-background="{{asset('site/assets/img/bg/product_details.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- shop-details-area -->
<section class="shop-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="shop-details-images-wrap">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="itemOne-tab-pane" role="tabpanel"
                            aria-labelledby="itemOne-tab" tabindex="0">
                            <a href="{{ url('images/products/' . $product->file)}}" class="popup-image">
                                <img src="{{ url('images/products/' . $product->file)}}" alt="{{$product->name}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shop-details-content">
                    <h2 class="title">{{$product->name}}</h2>
                    <div class="review-wrap">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-desc-wrap">
                    <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description-tab-pane" type="button" role="tab"
                                aria-controls="description-tab-pane" aria-selected="true">{{__('language.description')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                aria-controls="reviews-tab-pane" aria-selected="false">{{__('language.components')}}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="descriptionTabContent">
                        <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                            aria-labelledby="description-tab" tabindex="0">
                            <div class="product-description-content">
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab"
                            tabindex="0">
                            <div class="product-desc-review">
                                <div class="product-desc-review-title mb-15">
                                    <h5 class="title">{{$product->name}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop-details-area-end -->

<!-- product-area -->
<section class="related-product-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <span class="sub-title">{{__('language.our_shop')}}</span>
                    <h2 class="title">{{__('language.our_products')}}</h2>
                    <div class="title-shape" data-background="assets/img/images/title_shape.png"></div>
                </div>
            </div>
        </div>
        <div class="product-item-wrap-three">
            <div class="row justify-content-center rp-active">
                @foreach($products as $product)
                <div class="col-xl-3">
                    <div class="product-item-three inner-product-item">
                        <div class="product-thumb-three">
                            <a href="{{route('site.product.show',$product->id)}}"><img src="{{ url('images/products/' . $product->file)}}" alt=""></a>
                            <span class="batch">{{__('language.new')}}<i class="fas fa-star"></i></span>
                        </div>
                        <div class="product-content-three">
                            <a href="{{route('site.product.show',$product->id)}}" class="tag">{{__('language.organic')}}</a>
                            <h2 class="title"><a href="{{route('site.product.show',$product->id)}}">{{$product->name}}</a></h2>
                        </div>
                        <div class="product-shape-two">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                <path
                                    d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z"
                                    transform="translate(-309 -3802)" />
                            </svg>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- product-area-end -->

@endsection