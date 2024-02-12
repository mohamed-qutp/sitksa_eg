@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>التفاصيل</h6>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($contact as $contact)
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name }}" readonly>
        </div>

        <div class="form-group">
            <label for="email">البريد الالكتروني</label>
            <input type="email" name="email" class="form-control" value="{{ $contact->email }}" readonly>
        </div>

        <div class="form-group">
            <label for="phone">رقم الجوال</label>
            <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" readonly>
        </div>

        <div class="form-group">
            <label for="contactreason">سبب التواصل</label>
            <input type="text" name="contactreason" class="form-control" value="{{ $contact->reason }}" readonly>
        </div>
        @if ($contact->message != "null")
            <div class="form-group">
                <label for="message">الرسالة</label>
                <textarea rows="5" name="message" class="form-control" readonly>{{ $contact->message }}</textarea>
            </div>
        @endif
        @endforeach
    </div>
</div>
@endsection