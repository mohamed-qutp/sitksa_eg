@extends('admin.layouts.header')
@section('content')
@foreach ($about as $about)
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="font-weight-bolder text-info text-gradient">تعديل {{ $about->name_ar }}</h3>
                        </div>
                        {{-- <div class="col-sm-6">
                            <form action="{{ route('about-us.destroy',$about->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('about-us.update',$about->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <label>العنوان باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <input name="name_en" style="text-align: left;direction: ltr" type="text" class="form-control" value="{{ $about->name_en }}" placeholder="العنوان باللغة الانجليزية" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>العنوان باللغة العربية</label>
                                <div class="mb-3">
                                    <input name="name_ar" type="text" class="form-control" value="{{ $about->name_ar }}" placeholder="العنوان باللغة العربية" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label>التفاصيل باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <textarea name="description_en" style="text-align: left;direction: ltr" class="form-control" rows="10" placeholder="التفاصيل باللغة الانجليزية" required>{{ $about->description_en }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>التفاصيل باللغة العربية</label>
                                <div class="mb-3">
                                    <textarea name="description_ar" class="form-control" rows="10" placeholder="التفاصيل باللغة العربية" required>{{ $about->description_ar }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection