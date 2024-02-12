@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    @foreach ($cat as $cat)
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="font-weight-bolder text-info text-gradient">تعديل العنصر</h3>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('category.destroy',$cat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('category.update',$cat->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <label>العنوان باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <input name="name_en" type="text" style="text-align: left;direction: ltr" class="form-control" value="{{ $cat->name_en }}" placeholder="العنوان باللغة الانجليزية" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>العنوان باللغة العربية</label>
                                <div class="mb-3">
                                    <input name="name_ar" type="text" class="form-control" value="{{ $cat->name_ar }}" placeholder="العنوان باللغة العربية" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <label>التفاصيل باللغة العربية</label>
                                <div class="mb-3">
                                    <textarea name="description_ar" class="form-control" rows="10" placeholder="التفاصيل باللغة العربية" required>{{ $cat->description_ar }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>التفاصيل باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <textarea name="description_en" style="text-align: left;direction: ltr" class="form-control" rows="10" placeholder="التفاصيل باللغة الانجليزية" required>{{ $cat->description_en }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>تعديل صورة الخدمة</label>
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                    <small>يجب أن تكون أبعاد الصورة width: 100px و height: 100px</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>الصورة الداخلية</label>
                                <div class="mb-3">
                                    <input type="file" name="file2" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('storage/'.$cat->icon_path) }}" width="100px">
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('storage/'.$cat->img_path) }}" width="100px">
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
    @endforeach
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