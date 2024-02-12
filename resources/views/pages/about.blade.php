@extends('layouts.header')
@section('body')
    <!-- Story Start -->
    <div class="story">
        <div class="container-fluid">
            <div class="section-header">
                <h2>{{ __('messages.title') }}</h2>
                <p>{{ __('messages.brief') }}</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="story-container">
                        <div class="story-end">
                            <p>{{ __('messages.about') }}</p>
                        </div>
                        <div class="story-continue">
                            @foreach ($about as $about)
                                @if ($about->align == "right")
                                    @if (session()->get('locale') == "en")
                                        <div class="row story-right">
                                            <div class="col-md-6">
                                                <p class="story-date">
                                                    {{ $about->name_en }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="story-box">
                                                    <div class="story-icon">
                                                        <i class="fa fa-business-time"></i>
                                                    </div>
                                                    <div class="story-text">
                                                        <h3>{!! $about->description_en !!}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row story-right">
                                            <div class="col-md-6">
                                                <p class="story-date">
                                                    {{ $about->name_ar }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="story-box">
                                                    <div class="story-icon">
                                                        <i class="fa fa-business-time"></i>
                                                    </div>
                                                    <div class="story-text">
                                                        <h3>{!! $about->description_ar !!}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if (session()->get('locale') == "en")
                                        <div class="row story-left">
                                            <div class="col-md-6 d-md-none d-block">
                                                <p class="story-date">
                                                    {{ $about->name_en }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="story-box">
                                                    <div class="story-icon d-md-none d-block">
                                                        <i class="fa fa-business-time"></i>
                                                    </div>
                                                    <div class="story-text">
                                                        <h3>{!! $about->description_en !!}</h3>
                                                    </div>
                                                    <div class="story-icon d-md-block d-none">
                                                        <i class="fa fa-business-time"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-md-block d-none">
                                                <p class="story-date">
                                                    {{ $about->name_en }}
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row story-left">
                                            <div class="col-md-6 d-md-none d-block">
                                                <p class="story-date">
                                                    {{ $about->name_ar }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="story-box">
                                                    <div class="story-icon d-md-none d-block">
                                                        <i class="fa fa-business-time"></i>
                                                    </div>
                                                    <div class="story-text">
                                                        <h3>{!! $about->description_ar !!}</h3>
                                                    </div>
                                                    <div class="story-icon d-md-block d-none">
                                                        <i class="fa fa-business-time"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-md-block d-none">
                                                <p class="story-date">
                                                    {{ $about->name_ar }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Story End -->
@endsection