<!-- Header Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-11">
                <div class="topbar">
                    <div class="topbar-col">
                        <a href="tel:8004422221"><i class="fa fa-phone-alt"></i>8004422221</a>
                    </div>
                    <div class="topbar-col">
                        <a href="mailto:info@sitksa-eg.com"><i class="fa fa-envelope"></i>info@sitksa-eg.com</a>
                    </div>
                    <div class="topbar-col">
                        <div class="topbar-social">
                            <!--<a href="https://www.youtube.com/channel/UCsdV95alqtbUlX1rcE7okxw" target="_blank"><i class="fab fa-youtube"></i></a>-->
                            <a href="https://twitter.com/sitksasoftware" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/company/sitksasoftware/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com/sitksa.software/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.facebook.com/sitksasoftware" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="topbar-col">
                        <form action="{{ route('changeLang') }}" method="get">
                            @csrf
                            <div class="switch">
                                <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="submit">
                                <label for="language-toggle"></label>
                                <span class="on">{{ session()->get('locale') == 'ar' ? 'AR' : 'EN' }}</span>
                                <span class="off">{{ session()->get('locale') == 'ar' ? 'EN' : 'AR' }}</span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="navbar navbar-expand-lg navbar-light">
                    <a href="#" class="navbar-brand">{{ __('messages.menu') }}</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="{{ route('home') }}" class="nav-item nav-link">{{ __('messages.home') }}</a>
                            <a href="{{ route('about') }}" class="nav-item nav-link">{{ __('messages.about') }}</a>
                            <a href="{{ route('services') }}" class="nav-item nav-link">{{ __('messages.services') }}</a>
                            <a href="{{ route('projects') }}" class="nav-item nav-link">{{ __('messages.softwaregallery') }}</a>
                            <a href="{{ route('clients') }}" class="nav-item nav-link">{{ __('messages.clients') }}</a>
                            {{-- <a href="{{ route('hosting') }}" class="nav-item nav-link">{{ __('messages.packages') }}</a>
                            <a href="{{ route('domain') }}" class="nav-item nav-link">{{ __('messages.domainorder') }}</a> --}}
                            {{-- <a href="#" class="nav-item nav-link">{{ __('messages.offers') }}</a> --}}
                            <a href="{{ route('article') }}" class="nav-item nav-link">{{ __('messages.news') }}</a>
                            <a href="{{ route('home.pdf') }}" class="nav-item nav-link">{{ __('messages.laws') }}</a>
                            <a href="{{ route('careers') }}" class="nav-item nav-link">{{ __('messages.jobs') }}</a>
                            <a href="{{ route('contact') }}" style="margin: 2px;" class="nav-item nav-link">{{ __('messages.contactus') }}</a>
                            <a href="{{ route('livechat.index') }}" style="margin: 2px;" class="nav-item nav-link">{{ __('messages.supportplatform') }}</a>
                            <a href="http://hr.sitksa-eg.com/" style="margin: 2px;" target="_blank" class="nav-item nav-link">{{ __('messages.stafflogin') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="brand">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logos/logo-2.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->