@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>تفاصيل الخدمات</h6>
        </div>
        <div class="col-6">
            <a href="{{ route('services.create') }}" style="float: left" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($services as $services)
        <div class="col-lg-6">
            <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('{{ asset('storage/'.$services->img_path)}}');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 p-3 h-100">
                    <div class="d-flex flex-column h-100">
                        <h5 class="text-white font-weight-bolder mb-4 pt-2">{{ $services->name_ar }}</h5>
                        <a class="text-white font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="{{ route('services.edit',$services->id) }}">تعديل
                        <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection