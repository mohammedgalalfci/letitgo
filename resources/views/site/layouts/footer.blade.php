<footer>
            <div class="footer-area">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer-widget">
                                    <h4 class="fw-title">{{__('language.about_let_it_go')}}</h4>
                                    <div class="footer-contact">
                                        <ul class="list-wrap">
                                            <li>{{__('language.riyadh_casablanca_masnaai_strict')}}</li>
                                            <li><a href="tel:0123456789">0549638363-0552316663-05100550671</a></li>
                                            <li><a href="mailto:naseemalmurooj@gmail.com">naseemalmurooj@gmail.com</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-content">
                                        <h4 class="title">{{__('language.open_hours')}}</h4>
                                        <p>{{__('language.from_sat_to_th')}} <span>07:00-19:00</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer-widget">
                                    <h4 class="fw-title">{{__('language.important_links')}}</h4>
                                    <div class="footer-link">
                                        <ul class="list-wrap">
                                            <li><a href="{{route('site.home')}}">{{__('language.home')}}</a></li>
                                            <li><a href="{{route('site.about-us')}}">{{__('language.about_us')}}</a></li>
                                            <li><a href="{{route('site.products')}}">{{__('language.products')}}</a></li>
                                            <li><a href="{{route('site.about-company')}}">{{__('language.about_company')}}</a></li>
                                            <li><a href="{{route('site.inspire')}}">{{__('language.inspire')}}</a></li>
                                            <li><a href="{{route('site.contact-us')}}">{{__('language.contact_us')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-8">
                                <div class="footer-widget">
                                    <h4 class="fw-title">{{__('language.our_products')}}</h4>
                                    <?php 
                                        $last14products = \App\Models\Product::latest()->take(14)->get();
                                    ?>
                                    <div class="footer-instagram">
                                        <ul class="list-wrap">
                                            @foreach($last14products as $last14product)
                                            <li><a href="{{route('site.product.show',$last14product->id)}}"><img width="80" src="{{ url('images/products/' . $last14product->file)}}" alt="{{$last14product->name}}"></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>