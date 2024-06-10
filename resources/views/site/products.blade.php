@extends('site.layouts.master')

@section('title')
{{__('language.products')}}
@endsection
@section('css')
<style>
    .header-top-left .list-wrap li {
        color: #c23632;
    }
    .header-top-left .list-wrap li a {
        color: #c23632;
    }
    .header-top-menu .list-wrap li a {
        color: #c23632;
    }
    .language-switcher .dropdown-toggle{
        color: #c23632;
    }
</style>
@endsection
@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="{{asset('site/assets/img/bg/products.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- shop-area -->
<section class="shop-area shop-bg" data-background="{{asset('site/assets/img/bg/shop_bg.jpg')}}">
    <div class="container custom-container-five">
        <div class="shop-inner-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-item-wrap">
                        <div class="row justify-content-center">
                            @if(count($products)>0)
                            @foreach($products as $product)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-item-three inner-product-item">
                                    <div class="product-thumb-three">
                                        <a href="{{route('site.product.show',$product->id)}}"><img height="180px" src="{{ url('images/products/' . $product->file)}}"
                                                alt="{{$product->name}}"></a>
                                        <span class="batch">{{__('language.new')}}<i class="fas fa-star"></i></span>
                                    </div>
                                    <div class="product-content-three">
                                        <a href="{{route('site.product.show',$product->id)}}" class="tag">{{__('language.organic')}}</a>
                                        <h2 class="title"><a href="{{route('site.product.show',$product->id)}}">{{$product->name}}</a></h2>
                                    </div>
                                    <div class="product-shape-two">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445"
                                            preserveAspectRatio="none">
                                            <path
                                                d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z"
                                                transform="translate(-309 -3802)" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="text-center">{{__('language.not_found_products')}}</div>
                            @endif
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop-area-end -->

@endsection