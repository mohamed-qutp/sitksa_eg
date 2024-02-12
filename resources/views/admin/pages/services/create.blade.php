@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">اضف عنصر جديد</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>العنوان باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <input name="name_en" type="text" style="text-align: left;direction: ltr" class="form-control" value="{{ old('name_en') }}" placeholder="العنوان باللغة الانجليزية" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>العنوان باللغة العربية</label>
                                <div class="mb-3">
                                    <input name="name_ar" type="text" class="form-control" value="{{ old('name_ar') }}" placeholder="العنوان باللغة العربية" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <label>التفاصيل باللغة العربية</label>
                                <div class="mb-3">
                                    <textarea name="description_ar" class="form-control" rows="10" placeholder="التفاصيل باللغة العربية" required>{{ old('description_ar') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>التفاصيل باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <textarea name="description_en" style="text-align: left;direction: ltr" class="form-control" rows="10" placeholder="التفاصيل باللغة الانجليزية" required>{{ old('description_en') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>الفئة</label>
                                <div class="mb-3">
                                    <select name="category" class="form-control" required>
                                        <option value="" selected disabled>اختر الفئة</option>
                                        @foreach ($cat as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>صورة الخدمة</label>
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control" required>
                                    <small>يجب أن تكون أبعاد الصورة width: 1199px و height: 1160px</small>
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
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'description_en', {
        language: 'en',
    });

    CKEDITOR.replace( 'description_ar', {
        language: 'ar',
    });
</script>
@endsection