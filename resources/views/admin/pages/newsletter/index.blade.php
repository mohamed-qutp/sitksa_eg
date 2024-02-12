@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>القائمة البريدية</h6>
        </div>
    </div>
    <div class="row mt-4">
        <div class="table-reponsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>البريد الالكتروني</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $news)
                        <tr>
                            <td>{{ $news->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection