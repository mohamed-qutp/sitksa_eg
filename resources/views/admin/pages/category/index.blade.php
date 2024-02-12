@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>الخدمات</h6>
        </div>
        <div class="col-6">
            <a href="{{ route('category.create') }}" style="float: left" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($cat as $cat)
        <div class="col-lg-6 mb-lg-0 mb-4 mt-4">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="d-flex flex-column h-100">
                    
                    <h5 class="font-weight-bolder">{{ $cat->name_ar }}</h5>
                    <a class="text-info font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="{{ route('category.edit',$cat->id) }}">
                        تعديل
                        <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                    </a>
                    <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="{{ route('services.index',$cat->id) }}">
                        تفاصيل الخدمات
                        <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-4 me-auto ms-0 text-center">
                    <div class="border-radius-lg min-height-200">
                        <div class="position-relative pt-5 pb-4">
                            <img class="max-width-100 w-100 position-relative z-index-2" src="{{ asset('storage/'.$cat->icon_path) }}">
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection