@extends('layouts.header')
@section('body')
@foreach ($projects as $projects)
@section('title')
    {{ $projects->name_ar }}
@endsection
    <div class="wrapper">
        <div class="about">
            <div class="container-fluid" style="direction: rtl; text-align:right">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        @if($projects->video)
                        <iframe style="width: 100%;height: 300px;" src="https://www.youtube.com/embed/{{ $projects->video }}?autoplay=0&mute=1&rel=0"></iframe>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $projects->name_ar }}</h1>

                        <p>
                            {{ $projects->desc }}
                        </p>

                        <button class="btn" id="gfq-badge">{{ __('messages.ordernow') }}</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h2>مميزات نظام {{ $projects->name_ar }}</h2>
                        {!! $projects->details !!}
                    </div>
                    
                </div>

                @if ($projects->file_path != null)
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                               <h2>  شرح مميزات النظام</h2>
                                <a href="https://sitksa-eg.com/storage/{{$projects->file_path}}" target="_blank" style="background: crimson;" class="btn btn-danger">
                                    <i class="fa fa-download"></i>
                                </a>
                                <!--<form action="{{ route('fileDownload2',$projects->id) }}" method="get">-->
                                <!--    @csrf-->
                                <!--    <h2>حمل شرح مميزات النظام</h2>-->
                                <!--    <button type="submit" style="background: crimson;" class="btn btn-danger"><i class="fa fa-download"></i></button>-->
                                <!--</form>-->
                            </center>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
<div class="gfq-wrap">
    <div class="gfq-panel" style="direction: {{ __('messages.direction') }};text-align: {{ __('messages.align') }};background-image: url('{{ asset('img/curved.png') }}');background-repeat: no-repeat;
    background-size: auto;border-radius: 15px;">
        <h3>{{ __('messages.ordernow') }}</h3>

        <form action="{{route('projectEmail',$projects->name_ar)}}" method="POST" enctype="multipart/form-data">
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
                    <button class="btn btn-primary" type="submit">{{ __('messages.submit') }}</button>
                </div>
            </form>
    </div>
    <div class="gfq-badge">
        <img src="https://jetsloth.com/wp-content/uploads/2019/02/mail-1.svg" alt="Icon"/>
    </div>
</div>
@endsection