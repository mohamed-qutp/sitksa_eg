@extends('layouts.header')
@section('body')
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
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session()->get('locale') == "en")
                                            <h3>{{ $cat->name_en }}</h3>
                                            <img src="{{ asset('storage/'.$cat->icon_path) }}" alt="Service">
                                            {{-- <p style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{!! $cat->description_en !!}</p> --}}
                                        @else
                                            <h3>{{ $cat->name_ar }}</h3>
                                            <img src="{{ asset('storage/'.$cat->icon_path) }}" alt="Service">
                                            {{-- <p style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{!! $cat->description_ar !!}</p> --}}
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('service.details',[$cat->id,$cat->slug]) }}" class="readmore font-weight-bold btn">{{ __('messages.readmore') }} <i class="fas fa-arrow-{{ __('messages.right') }}"></i> </a>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection