@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>تواصل معنا</h6>
        </div>
    </div>
    <div class="row mt-4">
        <div class="table-reponsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>الاسم</td>
                        <td>رقم الجوال</td>
                        <td>البرنامج المطلوب</td>
                        <td>التفاصيل</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contacts)
                        <tr>
                            <td>{{ $contacts->name }}</td>
                            <td>{{ $contacts->phone }}</td>
                            <td>{{ $contacts->reason }}</td>
                            <td><a href="{{ route('contactDetails',$contacts->id) }}"><i class="fas fa-info-circle"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection