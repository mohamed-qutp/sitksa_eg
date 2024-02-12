@extends('layouts.header')
@section('body')
    @foreach ($cat as $cat)
        
    <!-- Service Row Start -->
    <div class="service-row">
        <div class="container">
            <div class="section-header">
                @if (session()->get('locale') == "en")
                    <h2>{{ $cat->name_en }}</h2>
                @else
                    <h2>{{ $cat->name_ar }}</h2>
                @endif
            </div>
            <!-- Service Row Start -->
            <div class="service-row">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 d-md-none d-block">
                            <div class="service-row-img">
                                <img src="{{ asset('storage/'.$cat->img_path) }}" alt="{{ $cat->name_ar }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-row-text">
                                @if (session()->get('locale') == "en")
                                    <p>{!! $cat->description_en !!}</p>
                                @else
                                    <p>{!! $cat->description_ar !!}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 d-md-block d-none">
                            <div class="service-row-img">
                                <img src="{{ asset('storage/'.$cat->img_path) }}" alt="{{ $cat->name_ar }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service Row End -->
            @foreach ($services as $services)
                @if ($services->align == "right")
                    <!-- Service Row Start -->
                    <div class="service-row">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6 d-md-none d-block">
                                    <div class="service-row-img">
                                        <img src="{{ asset('storage/'.$services->img_path) }}" alt="{{ $services->name_ar }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-row-text">
                                        @if (session()->get('locale') == "en")
                                            <h2 class="section-title">{{ $services->name_en }}</h2>
                                            <p>
                                                {!! $services->description_en !!}
                                            </p>
                                        @else
                                            <h2 class="section-title">{{ $services->name_ar }}</h2>
                                            <p>
                                                {!! $services->description_ar !!}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 d-md-block d-none">
                                    <div class="service-row-img">
                                        <img src="{{ asset('storage/'.$services->img_path) }}" alt="{{ $services->name_ar }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Service Row End -->
                @else
                    <!-- Service Row Start -->
                    <div class="service-row">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="service-row-img">
                                        <img src="{{ asset('storage/'.$services->img_path) }}" alt="{{ $services->name_ar }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-row-text">
                                        @if (session()->get('locale') == "en")
                                            <h2 class="section-title">{{ $services->name_en }}</h2>
                                            <p>
                                                {!! $services->description_en !!}
                                            </p>
                                        @else
                                            <h2 class="section-title">{{ $services->name_ar }}</h2>
                                            <p>
                                                {!! $services->description_ar !!}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Service Row End -->
                @endif

            @endforeach
        </div>
    </div>
    <!-- Service Row End -->
    
    @endforeach
@endsection


