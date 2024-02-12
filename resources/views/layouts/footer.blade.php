<!-- Call to Action Start -->
<form action="{{ route('newsletter') }}" method="post" autocomplete="off">
    @csrf
    <div class="call-to-action newsletter">
        <div class="container">
            <h2 class="text-center">{{ __('messages.joinournewsletter') }}</h2>
            <div class="row align-items-center">

                <div class="col-md-10">
                    <input type="email" name="newsletteremail" class="newsletterinput" placeholder="{{ __('messages.email') }}" required>
                </div>
                <div class="col-md-2">
                    <button class="btn" type="submit">{{ __('messages.joinus') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Call to Action End -->

<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-about">
                    <h2 class="text-right">{{ __('messages.title') }}</h2>
                    <p>
                        {{ __('messages.brief') }}
                    </p>
                    <br>
                    <p><i class="fa fa-map-marker-alt"></i>{{ __('messages.address') }}</p>
                    <p><i class="fa fa-phone-alt"></i><big style="direction: ltr">{{ __('messages.tel') }}</big></p>
                    <p><i class="fa fa-envelope"></i>{{ __('messages.mail') }}</p> </br>
                    <img src="{{ asset('img/2030.png') }}" style="width: 200px">
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-link">
                            <h2 class="text-right">{{ __('messages.menu') }}</h2>
                            <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
                            <a href="{{ route('about') }}">{{ __('messages.about') }}</a>
                            <a href="{{ route('services') }}">{{ __('messages.services') }}</a>
                            <a href="{{ route('projects') }}">{{ __('messages.projects') }}</a>
                            <a href="{{ route('clients') }}">{{ __('messages.clients') }}</a>
                            {{-- <a href="{{ route('hosting') }}">{{ __('messages.packages') }}</a>
                            <a href="{{ route('domain') }}">{{ __('messages.domainorder') }}</a> --}}
                            {{-- <a href="services.html">{{ __('messages.offers') }}</a> --}}
                            <a href="{{ route('article') }}">{{ __('messages.news') }}</a>
                            <a href="{{ route('careers') }}">{{ __('messages.jobs') }}</a>
                            <a href="{{ route('contact') }}">{{ __('messages.contactus') }}</a>
                            <a href="{{ route('polices') }}">{{ __('policy.policy') }}</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="footer-link">
                            <h2 class="text-right">{{ __('messages.contactus') }}</h2>
                            <!-- {{-- <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=400&amp;hl=en&amp;q=المصدر الوحيد لتقنية المعلومات، عامر بن عمران، Medina Saudi Arabia&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fnfgo.com/">FNF Online</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div></br> --}} -->
                            <div class="d-flex resp">
                                <div class="col-md-4 d-flex justify-content-between flex-column">
                                    <div class="mapouter">
                                        <p class="edit-font" style="color: white">المصدر لتقنية المعلومات -فرع المدينة</p>
                                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=437&amp;height=162&amp;hl=en&amp;q=7374 عامر بن عمران، Qurban, Medina 42316, Saudi Arabia&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF</a></div>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                text-align: right;
                                                width: 145% !important;
                                                height: 185px;
                                            }
                                            .edit-font
                                            {
                                                font-size: 14px !important;
                                            }
                                            .gmap_canvas {
                                                overflow: hidden;
                                                background: none !important;
                                                width: 50%;
                                                height: 185px;
                                            }

                                            .gmap_iframe {
                                                height: 185px !important;
                                            }
                                             @media (max-width: 500px) {
                                                .resp {
                                                    display: block !important;
                                                }
                                        </style>
                                    </div></br>

                                    <div class="mapouter mt-2">
                                        <p class="edit-font" style="color: white">السيف العربية للمشاريع</p>
                                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=437&amp;height=162&amp;hl=en&amp;q=السيف للحاسب الآلي&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF Mods</a></div>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                text-align: right;
                                                width: 100%;
                                                height: 185px;

                                            }

                                            .gmap_canvas {
                                                overflow: hidden;
                                                background: none !important;
                                                width: 100%;
                                                height: 185px;
                                            }

                                            .gmap_iframe {
                                                height: 185px !important;
                                            }
                                        </style>
                                    </div></br>
                                </div>

                                <div class="col-md-2"></div>

                                <div class="col-md-4 d-flex justify-content-between flex-column ">
                                    <div class="mapouter">
                                        <p class="edit-font" class="" style="color: white">المصدر لتقنية المعلومات -فرع الدمام</p>
                                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=437&amp;height=162&amp;hl=en&amp;q=26.4463501,  50.1129408&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF Online Games</a></div>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                text-align: right;
                                                width: 100%;
                                                height: 160px;
                                            }

                                            .gmap_canvas {
                                                overflow: hidden;
                                                background: none !important;
                                                width: 100%;
                                                height: 160px;
                                            }

                                            .gmap_iframe {
                                                height: 160px !important;
                                            }
                                        </style>
                                    </div></br>

                                    <div class="mapouter mt-3">
                                        <p class="edit-font" style="color: white ">ادارة برامج المصدر</p>
                                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=437&amp;height=162&amp;hl=en&amp;q=24.444170, 39.623847&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF Online Games</a></div>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                text-align: right;
                                                width: 100%;
                                                height: 185px;
                                            }

                                            .gmap_canvas {
                                                overflow: hidden;
                                                background: none !important;
                                                width: 100%;
                                                height: 185px;
                                            }

                                            .gmap_iframe {
                                                height: 185px !important;
                                            }
                                        </style>
                                    </div></br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    // footer social media
    <div class="container copyright">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; {{ __('messages.copyrights')." ".date("Y") }}</p>
            </div>
            <div class="col-md-6">
                <p>
                    <!--<a href="https://www.youtube.com/channel/UCsdV95alqtbUlX1rcE7okxw" target="_blank"><i class="fab fa-youtube"></i></a>-->
                    <a href="https://twitter.com/sitksasoftware" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/sitksasoftware/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/sitksa.software/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/sitksasoftware" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
</div>

<!-- social media on right -->
<div class="icon-bar right">
    <a href="https://www.facebook.com/sitksasoftware" style="background-color: #0000ff75" target="_blank" class="facebook"><i class="fab fa-facebook"></i></a>
    <a href="https://twitter.com/sitksasoftware" style="background-color: #00bfff80" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
    <a href="https://www.instagram.com/sitksa.software/" style="background-color: #e9595099" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
    <a href="https://www.linkedin.com/company/sitksasoftware/" style="background-color: #1e90ff78" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a>
    <!--<a href="https://www.youtube.com/channel/UCsdV95alqtbUlX1rcE7okxw" style="background-color: #ff000073" target="_blank" class="youtube"><i class="fab fa-youtube"></i></a>-->
</div>
<div class="icon-bar left ">
    <a href="https://www.alsaifco-ksa.com/"  target="_blank" class="bg-transparent icon-width p-0"><img  src="{{ asset('storage/Icons/alsaif.png') }}" alt="alsaifco"></a>
    <a href="https://zatca.gov.sa/ar/E-Invoicing/Pages/default.aspx"  target="_blank" class="bg-transparent icon-width p-0"><img  src="{{ asset('storage/Icons/Fatoorah-logo.png') }}" alt="fatoora"></a>
    <a href="https://zatca.gov.sa/ar/Pages/default.aspx"  target="_blank" class="bg-transparent icon-width p-0"><img class="" src="{{ asset('storage/Icons/header_logo.png') }}" alt="header_fatoora"></a>
    <!--<a href="https://www.nca.gov.sa/"  target="_blank" class="bg-transparent icon-width p-0"><img  src="{{ asset('storage/Icons/Vat-(1).png') }}" alt="vat"></a>-->
    <style>
    .right{left: 97%;}
        .left{left: 0;}
        .icon-width{width: 60px !important;
        height: 60px;}
        .icons-website{
        margin: -10px;}
    </style>
</div>
<div id="sy-whatshelp">
   
       
        <a href="https://wa.me/+966548250999" data-toggle="tooltip" title="WhatsApp" data-tooltip="WhatsApp" data-placement="left" target="_blank">
            <img src="{{ asset('img/logowp.png')}}" style="width:40px;height:40px; margin:5px;">
        </a>
 
   
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        (function($) {

            $('a.sywh-open-services').click(function() {
                if ($('.sywh-services').hasClass('active')) {
                    $('.sywh-services').removeClass('active');
                    $('a.sywh-open-services i.fa-times').hide();
                    $('a.sywh-open-services i.fa-comments').show();
                    $('a.sywh-open-services').removeClass('data-tooltip-hide');
                    $('.sywh-services a:nth-child(1)').delay(0).fadeOut();
                    $('.sywh-services a:nth-child(2)').delay(50).fadeOut();
                } else {
                    $('.sywh-services').addClass('active');
                    $('a.sywh-open-services i.fa-comments').hide();
                    $('a.sywh-open-services i.fa-times').show();
                    $('a.sywh-open-services').addClass('data-tooltip-hide');
                    $('.sywh-services a:nth-child(2)').delay(0).fadeIn();
                    $('.sywh-services a:nth-child(1)').delay(50).fadeIn();
                }
            });

        })(jQuery);
    });


    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'اخرى' ? 'block' : 'none';
    }
</script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/slick/slick.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('js/script.js') }}"></script>