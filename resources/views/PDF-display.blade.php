@extends('layouts.header')
@section('body')


<div>
    <div class="section-header">
        <h2>{{ __('messages.laws') }}</h2>
    </div>
    <div class="owl-carousel owl-2">
        @foreach ($PDF as $pdf)
        <div class="media-29101 img-container">
            <center>
                <a href="{{ asset('storage/Law/'.$pdf->file_path) }}" target="_blank">
                    <img class="w-50" src="{{ asset('storage/PDF_file_icon.svg.png') }}" style="width: 100%; height: 100%"> 
                    <div class="overlay">
                        <a href="{{ asset('storage/Law/'.$pdf->file_path) }}" target="_blank" class="icon" title="User Profile">
                            
                        </a>
                    </div>
                </a>
            </center>
        </div>
        @endforeach
       
    </div>
</div>
@endsection