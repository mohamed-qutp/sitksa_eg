@extends('layouts.header')
@section('body')
<style>
    .btn-supp {
        padding: 2em;
    }

    .table {
        text-align: center;
    }
    td {
        font-weight: bolder;
        font-size: larger;
    }
</style>
<div class="section-header">
    <h2 style="margin-top: 5rem">{{ __('messages.supportplatform') }}</h2>
</div>
<div class="container-fluid h-100">
    <div class="table-responsive" style="direction: {{ __('messages.direction') }};text-align: {{ __('messages.align') }}">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.projects') }}</th>
                    <th>{{ __('messages.writtenexplanation') }}</th>
                    <th>{{ __('messages.visualexplanation') }}</th>
                    <th>{{ __('messages.supportchat') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($support as $support)
                    <tr>
                        @if (session()->get('locale') == "en")
                            <td>{{ $support->projects->name_en }}</td>
                        @else
                            <td>{{ $support->projects->name_ar }}</td>
                        @endif
                        
                        @if ($support->projects->file_path != null)                            
                            <td><a href="{{ asset('storage/'.$support->projects->file_path) }}" target="_blank"><i class="fa fa-book-reader"></i></a></td>
                        @else
                            <td></td>
                        @endif
                        <td><a href="{{ route('support.video',$support->id) }}"><i class="fa fa-play"></i></a></td>
                        <td><a href="https://wa.me/+966{{ $support->users->phone }}" target="_blank"><i class="fa fa-headset"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection