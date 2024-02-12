@extends('layouts.header')
@section('body')
<style>
    label {
        font-weight: bold;
    }
</style>
<div class="section-header">
    <h2 style="margin-top: 5rem">{{ __('messages.supportplatform') }}</h2>
</div>
<div class="container-fluid h-100">
    <div class="row">
        @foreach ($videos as $videos)
            <div class="col-md-3">
                <center>
                    <label for="video">{{ $videos->title }}</label></br>
                    <iframe width="220" height="180" src="https://www.youtube.com/embed/{{ $videos->video }}&autoplay=1" srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/{{ $videos->video }}?autoplay=1><img src=https://img.youtube.com/vi/{{ $videos->video }}/hqdefault.jpg ><span>▶</span></a>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </center>
            </div>
        @endforeach
    </div>
</div>
@endsection