@extends('layouts.header')
@section('body')
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
                        {{-- <li data-filter=".web-dev">Development</li>
                        <li data-filter=".dig-mar">Digital Marketing</li> --}}
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
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
                        <div class="col-lg-3 col-md-6 col-sm-6 portfolio-item {{ $projects->service_id }}" style="right: 0">
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
        </div>
    </div>
    <!-- Portfolio Start -->
@endsection