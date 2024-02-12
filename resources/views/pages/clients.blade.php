@extends('layouts.header')
@section('body')
    <!-- Team Start -->
    <div class="team">
        <div class="container-fluid">
            <div class="section-header">
                <h2>{{ __('messages.clients') }}</h2>
            </div>
            <div class="row">
                @foreach ($clients as $clients)
                    <div class="col-sm-6 col-lg-3 ">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('storage/'.$clients->img_path) }}" alt="Team">
                            </div>
                            <div class="team-text">
                                @if (session()->get('locale') == "en")
                                    <h3>{{ $clients->name }}</h3>
                                @else
                                    <h3>{{ $clients->name_ar }}</h3>
                                @endif
                            </div>
                            <!-- <div class="team-social">
                                <a href="{{ $clients->website }}" target="_blank"><i class="fas fa-globe"></i></a>
                            </div> -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection