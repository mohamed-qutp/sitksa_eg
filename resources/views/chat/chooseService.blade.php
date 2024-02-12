@extends('layouts.header')
@section('body')
<style>
    .btn-supp {
        padding: 2em;
        color: white;
    }
</style>
@foreach ($support as $support)
<div class="section-header">
    <h2 style="margin-top: 5rem">{{ $support->projects->name_ar }}</h2>
</div>

<div class="container-fluid h-100" style="padding-bottom: 5rem">
    <div class="row justify-content-center h-100 mt-5 mr-5 ml-5">
        <div class="col-lg-4">
            
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <form action="{{ route('fileDownload2',$support->project_id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-supp">{{ __('messages.writtenexplanation') }}</button>
                            </form>
                        </center>
                    </div>
                </div>
            
        </div>
        <div class="col-lg-4">
            <center>
                <a href="https://www.youtube.com/channel/UCsdV95alqtbUlX1rcE7okxw" target="_blank" class="btn btn-supp">{{ __('messages.visualexplanation') }}</a>
            </center>
        </div>
        <div class="col-lg-4">
            <center>
                <a href="https://wa.me/+{{ $support->users->phone }}" target="_blank" class="btn btn-supp">{{ __('messages.supportchat') }}</a>
            </center>
        </div>
    </div>
</div>
@endforeach
@endsection