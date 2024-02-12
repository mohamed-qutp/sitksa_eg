@extends('layouts.header')
@section('body')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">{{ __('messages.contactdetails') }}</h2>
                    <div class="contact-info">
                        {{-- <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=400&amp;hl=en&amp;q=المصدر الوحيد لتقنية المعلومات، عامر بن عمران، Medina Saudi Arabia&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fnfgo.com/">FNF Online</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div><br> --}}
                            <h5 style="text-align: right">المصدر لتقنية المعلومات</h5>
                            <p><i class="fa fa-map-marker-alt"></i> {{ __('messages.address') }}</p>
                            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=437&amp;height=162&amp;hl=en&amp;q=7374 عامر بن عمران، Qurban, Medina 42316, Saudi Arabia&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:162px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:162px;}.gmap_iframe {height:162px!important;}</style></div></br>
                            
                            <h5 style="text-align: right">السيف العربية للمشاريع</h5>
                            <p><i class="fa fa-map-marker-alt"></i> {{ __('messages.address') }}</p>
                            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=437&amp;height=162&amp;hl=en&amp;q=السيف للحاسب الآلي&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF Mods</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:162px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:162px;}.gmap_iframe {height:162px!important;}</style></div></br>

                            <h5 style="text-align: right">ادارة برامج المصدر</h5>
                            <p><i class="fa fa-map-marker-alt"></i> المملكة العربية السعودية - المدينة المنورة - نهاية قربان الطالع</p>
                            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=437&amp;height=162&amp;hl=en&amp;q=24.444170, 39.623847&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF Online Games</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:162px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:162px;}.gmap_iframe {height:162px!important;}</style></div></br>
                        <h3>{{ __('messages.howtoreachus') }}:</h3>
                        
                        <p><i class="fa fa-phone-alt"></i><big style="direction: ltr"> {{ __('messages.tel') }}</big></p>
                        <p><i class="fa fa-envelope"></i> {{ __('messages.mail') }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <section class="pricing py-5">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body" style="direction: {{ __('messages.direction') }};text-align: {{ __('messages.align') }};background-image: url('{{ asset('img/1 (1).svg') }}');background-repeat: no-repeat;
                            background-size: cover;border-radius: 15px;">
                                <div class="section-header">
                                    <h3 style="margin-top: 5rem">{{ __('messages.contactus') }}</h3>
                                </div>
                                <form action="{{route('contactEmail')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('messages.name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __('messages.email') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="{{ __('messages.email') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">{{ __('messages.phone') }}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="{{ __('messages.phone') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="contactreason">{{ __('messages.contactreason') }}</label>
                                        <input type="text" name="contactreason" class="form-control" placeholder="{{ __('messages.contactreason') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="message">{{ __('messages.message') }}</label>
                                        <textarea rows="5" name="message" class="form-control" placeholder="{{ __('messages.message') }}" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">{{ __('messages.submit') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    
@endsection