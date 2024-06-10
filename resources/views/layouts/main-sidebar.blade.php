<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu Dashboard-->
                    <li>
                        <a href="{{ route('dashboard.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('language.dashboard') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu Users-->
                    <!-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">{{__('language.users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.users.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li> -->
                     <!-- menu sliders-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sliders">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.slider')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sliders" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.sliders.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu about-us-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#about-us">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.about_us')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="about-us" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.about-us.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu our-message-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#our-messages">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.our_message')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="our-messages" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.our-messages.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu our-vision-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#our-visions">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.our_vision')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="our-visions" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.our-visions.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu our-goals-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#our-goals">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.our_goal')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="our-goals" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.our-goals.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu characterize-us-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#characterize-us">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.characterize_us')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="characterize-us" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.characterize-us.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu history-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#history">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.history')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="history" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.histories.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu why let go-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#why">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.why_let_go')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="why" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.why-let-gos.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu products-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.products')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.products.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu inspires-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#inspires">
                            <div class="pull-left"><i class="ti-image"></i><span
                                    class="right-nav-text">{{__('language.inspire')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="inspires" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.inspires.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>

                    <!-- menu contact us-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_us">
                            <div class="pull-left"><i class="ti-mobile"></i><span
                                    class="right-nav-text">{{__('language.contact_us')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contact_us" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('dashboard.contact-us.index') }}">{{__('language.menue')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
