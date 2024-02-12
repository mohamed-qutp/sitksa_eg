@extends('layouts.header')
@section('body')

<div class="contact">
    <div class="section-header">
        <h2 style="margin-top: 5rem">{{ __('messages.news') }}</h2>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($articles as $articles)
                <div class="col-md-3">
                    <img src="{{ asset('storage/'.$articles->img_path) }}" style="width: 100%; border-radius: 10px;">
                    <a href="{{ route('article.show',[$articles->id,$articles->slug]) }}"><h4 style="text-align: right; margin: 10px; color:black">{{ $articles->title }}</h4></a>
                    <small style="color:grey">{{ $articles->created_at }}</small>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection