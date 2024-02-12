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
                    <form method="POST" action="{{ route('article.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>العنوان</label>
                                <div class="mb-3">
                                    <input name="title" type="text" class="form-control" value="{{ old('title') }}" placeholder="العنوان" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>صورة المقالة</label>
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control" required>
                                    <small>يجب أن تكون أبعاد الصورة width: 800px و height: 460px</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>وصف الصورة (Alt Text)</label>
                                <div class="mb-3">
                                    <input name="alt_img" type="text" class="form-control" value="{{ old('alt_img') }}" placeholder="وصف الصورة (Alt Text)">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>لينك فيديو</label>
                                <div class="mb-3">
                                    <input name="video" type="text" class="form-control" value="{{ old('video') }}" placeholder="لينك الفيديو">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label>Meta Description</label>
                                <div class="mb-3">
                                    <textarea name="meta_tag" rows="3" class="form-control" value="{{ old('meta_tag') }}" placeholder="Meta Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label>المقالة</label>
                                <div class="mb-3">
                                    <textarea name="editor1" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">اضافة التفاصيل <i class="fas fa-arrow-left"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1', {
        language: 'ar',
    });
</script>
@endsection