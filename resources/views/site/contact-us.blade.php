@extends('site.layouts.master')

@section('title')
{{__('language.contact_us')}}
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .contact-wrap {
        padding: 0px 0px 120px 0px;
    }
    .contact-area{
        margin-top: 140px;
    }
    @media (max-width: 768px) {
        .contact-area{
            margin-top: 80px;
        }
    }
    @media (max-width: 576px) {
        .contact-area{
            margin-top: 0px;
        }
    }
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

<!-- contact-area -->
<section class="contact-area">
    <div class="contact-info-wrap contact-info-bg" data-background="assets/img/bg/contact_info_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item" style="height:270px !important">
                        <div class="icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">{{__('language.phone')}}</h4>
                            <span>0549638363-0552316663-05100550671</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item" style="height:270px !important">
                        <div class="icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">{{__('language.email')}}</h4>
                            <span>naseemalmurooj@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item" style="height:270px !important">
                        <div class="icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">{{__('language.address')}}</h4>
                            <span>{{__('language.riyadh_casablanca_masnaai_strict')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="section-title mb-15">
                            <span class="sub-title">{{__('language.contact_us')}}</span>
                            <h2 class="title">{{__('language.get_it')}} <span>{{__('language.touch')}}</span></h2>
                        </div>

                        <form id="contact-form">
                            @csrf
                            <div class="contact-form-wrap">
                                <div class="form-grp">
                                    <input name="fullname" type="text" placeholder="{{__('language.your_name')}} *">
                                </div>
                                <div class="form-grp">
                                    <input name="email" type="email" placeholder="{{__('language.your_email')}} *">
                                </div>
                                <div class="form-grp">
                                    <input name="phone" type="text" placeholder="{{__('language.your_phone')}} *" required>
                                </div>
                                <div class="form-grp">
                                    <textarea name="message" placeholder="{{__('language.message')}}"></textarea>
                                </div>
                                <button type="submit">{{__('language.send_message')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3628.762977651096!2d46.74845098500303!3d24.562851584195208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDMzJzQ2LjMiTiA0NsKwNDQnNDYuNSJF!5e0!3m2!1sar!2seg!4v1717839931868!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function() {

    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("site.add.contact-us") }}',
            type: 'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            data: $(this).serialize(),
            success: function(response) {
                toastr.success(response.success);
                $('#contact-form')[0].reset();
            },
            error: function(response) {
                toastr.error(response.error);
                console.log(response);
            }
        });
    });
});
</script>
@endsection