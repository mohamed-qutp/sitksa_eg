@extends('layouts.header')
@section('body')

<style>
    .img-container {
        position: relative;
        width: 100%;
        max-width: 400px;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .3s ease;
        background-color: rgba(58, 53, 53, 0.233);
    }

    .img-container:hover .overlay {
        opacity: 1;
    }

    .icon {
        color: white;
        font-size: 100px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .fa-user:hover {
        color: #eee;
    }
</style>

<!-- Hero Start -->
<div class="hero">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($slider as $slider)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('storage/'.$slider->img_path) }}">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            {{-- <div class="col-md-12">
                    <h2>{{ __('messages.welcometo') }} <span>{{ __('messages.source') }}</span> {{ __('messages.informationtechnology') }}</h2>
            <p>{{ __('messages.brief') }}</p>
        </div> --}}
    </div>
</div>
</div>
<!-- Hero End -->

<!-- Service Start -->
<div class="service">
    <div class="container-fluid">
        <div class="section-header">
            <h2>{{ __('messages.services') }}</h2>
        </div>
        <div class="row">
            @foreach ($cat as $cat)
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <center>
                        @if (session()->get('locale') == "en")
                        <a href="{{ route('service.details',[$cat->id,$cat->slug]) }}" style="color: black">
                            <h3>{{ $cat->name_en }}</h3>
                        </a>
                        <img src="{{ asset('storage/'.$cat->icon_path) }}" alt="Service"></br>

                        @else
                        <a href="{{ route('service.details',[$cat->id,$cat->slug]) }}" style="color: black">
                            <h3>{{ $cat->name_ar }}</h3>
                        </a>
                        <img src="{{ asset('storage/'.$cat->icon_path) }}" alt="Service"></br>

                        @endif
                        <a href="{{ route('service.details',[$cat->id,$cat->slug]) }}" class="readmore font-weight-bold">{{ __('messages.readmore') }} <i class="fas fa-arrow-{{ __('messages.right') }}"></i> </a>
                    </center>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->

{{-- articles --}}
<div>
    <div class="section-header">
        <h2>{{ __('messages.news') }}</h2>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($articles as $articles)
            <div class="col-md-3">
                <img src="{{ asset('storage/'.$articles->img_path) }}" style="width: 100%; border-radius: 10px;">
                <a href="{{ route('article.show',[$articles->id,$articles->slug]) }}">
                    <h4 style="text-align: right; margin: 10px; color:black">{{ $articles->title }}</h4>
                </a>
                <small style="color:grey">{{ $articles->created_at }}</small>
            </div></br>
            @endforeach
        </div>
        <center>
            <a href="{{ route('article') }}" class="btn">{{ __('messages.readmore') }}</a>
        </center>
    </div>
</div>
{{-- articles --}}

{{-- clients --}}
<div>
    <div class="section-header">
        <h2>{{ __('messages.clients') }}</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                <div class="MultiCarousel-inner">
                    @foreach ($clients as $clients)
                    <div class="item">
                        <div class="pad15">
                            <center><img src="{{ asset('storage/'.$clients->img_path) }}" title="{{ $clients->name }}" alt="{{ $clients->name }}" class="img-fluid"></center>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="btn btn-primary leftLst"><i class="fas fa-arrow-left"></i></button>
                <button class="btn btn-primary rightLst"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
{{-- clients --}}

<!-- Portfolio Start -->
<div class="portfolio">
    <div class="container">
        <div class="section-header">
            <h2>{{ __('messages.projects') }}</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <ul id="portfolio-flters">
                    {{-- <li data-filter="*" class="filter-active">{{__('messages.all')}}</li> --}}
                    @foreach ($services as $services)
                    @if (session()->get('locale') == "en")
                    <li data-filter=".{{ $services->id }}">{{ $services->name_en }}</li>
                    @else
                    <li data-filter=".{{ $services->id }}">{{ $services->name_ar }}</li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row portfolio-container" style="max-height: 600px;overflow-y: scroll;">
            @foreach ($projects as $projects)
            @if (session()->get('locale') == "en")
            <div class="col-lg-3 col-md-6 col-sm-6 portfolio-item {{ $projects->service_id }}">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset('storage/'.$projects->img_path) }}" alt="{{ $projects->name_en }}">
                        <a href="{{ route('gallery',$projects->slug) }}" class="link-details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="{{ route('gallery',$projects->slug) }}">{{ $projects->name_en }}</a>
                    </figure>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6 col-sm-6 portfolio-item {{ $projects->service_id }}">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset('storage/'.$projects->img_path) }}" alt="{{ $projects->name_ar }}">
                        <a href="{{ route('gallery',$projects->slug) }}" class="link-details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="{{ route('gallery',$projects->slug) }}">{{ $projects->name_ar }}</a>
                    </figure>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        {{-- <center>
                <a href="{{ route('projects') }}" class="btn">{{ __('messages.readmore') }}</a>
        </center> --}}
    </div>
</div>
<!-- Portfolio Start -->
{{-- pdf laws --}}
<div>
    <div class="section-header">
        <h2>{{ __('messages.laws') }}</h2>
    </div>
    <div class="owl-carousel owl-2">
        @foreach ($pdfs as $pdf)
        <div class="media-29101 img-container">
            <center>
                <a href="{{ asset('storage/Law/'.$pdf->file_path) }}" target="_blank">
                    <img class="w-25" src="{{ asset('storage/PDF_file_icon.svg.png') }}" style="width: 100%; height: 100%"> 
                    <div class="overlay">
                        <a href="{{ asset('storage/Law/'.$pdf->file_path) }}" target="_blank" class="icon" title="User Profile">
                            <span>▶</span>
                        </a>
                    </div>
                </a>
            </center>
        </div>
        @endforeach

    </div>
</div>
{{-- pdf laws --}}

{{-- youtube --}}
<div>
    <div class="section-header">
        <h2>{{ __('messages.youtube') }}</h2>
    </div>
    <div class="owl-carousel owl-2">
        @foreach ($vid as $vid)
        <div class="media-29101 img-container">
            <center>
                <a href="{{ route('home.videos',$vid->id) }}">
                    <img src="https://img.youtube.com/vi/{{ $vid->video }}/hqdefault.jpg" style="width: 100%; height: 100%">
                    <div class="overlay">
                        <a href="{{ route('home.videos',$vid->id) }}" class="icon" title="User Profile">
                            <span>▶</span>
                        </a>
                    </div>
                </a>
            </center>
            <center>
                {{-- <iframe width="400" height="300" src="{{ route('home.videos',$vid->id) }}" srcdoc="<style>
                    * {
                        padding: 0;
                        margin: 0;
                        overflow: hidden
                    }

                    html,
                    body {
                        height: 100%
                    }

                    img,
                    span {
                        position: absolute;
                        width: 100%;
                        top: 0;
                        bottom: 0;
                        margin: auto
                    }

                    span {
                        height: 1.5em;
                        text-align: center;
                        font: 48px/1.5 sans-serif;
                        color: white;
                        text-shadow: 0 0 0.5em black
                    }
                </style><a href={{ route('home.videos',$vid->id) }}><img src=https://img.youtube.com/vi/{{ $vid->video }}/hqdefault.jpg><span>▶</span></a>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
            </center>
        </div>
        @endforeach
    </div>
</div>
{{-- youtube --}}

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    function on() {
        document.getElementById("overlay").style.display = "block";
    }

    function off() {
        document.getElementById("overlay").style.display = "none";
    }
</script>

<script>
    $(document).ready(function() {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function() {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();

        $(window).resize(function() {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function() {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({
                    'transform': 'translateX(0px)',
                    'width': itemWidth * itemNumbers
                });
                $(this).find(itemClass).each(function() {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });
</script>

<style>
    @-webkit-keyframes multicarousel {

        0%,
        20%,
        100% {
            left: 0
        }

        25%,
        45% {
            left: -100%
        }

        50%,
        70% {
            left: 0
        }

        75%,
        95% {
            left: -100%
        }
    }
</style>
@endsection