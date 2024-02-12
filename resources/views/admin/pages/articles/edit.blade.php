@extends('admin.layouts.header')
@section('content')
@foreach ($article as $article)
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="font-weight-bolder text-info text-gradient">تعديل المقالة</h3>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('article.destroy',$article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('article.update',$article->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label>العنوان</label>
                                <div class="mb-3">
                                    <input name="title" type="text" class="form-control" value="{{ $article->title }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>صورة المقالة</label>
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                    <small>يجب أن تكون أبعاد الصورة width: 800px و height: 460px</small>
                                </div>
                                <img src="{{ asset('storage/'.$article->img_path) }}" width="100%">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>وصف الصورة (Alt Text)</label>
                                <div class="mb-3">
                                    <input name="alt_img" type="text" class="form-control" value="{{ $article->alt_img }}" placeholder="لا يوجد">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>لينك فيديو</label>
                                <div class="mb-3">
                                    @if ($article->video != null)
                                        <input name="video" type="text" class="form-control" value="https://www.youtube.com/watch?v={{ $article->video }}" >
                                    @else
                                        <input name="video" type="text" class="form-control" placeholder="لا يوجد" >
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Meta Description</label>
                                <div class="mb-3">
                                    <textarea name="meta_tag" rows="3" class="form-control" placeholder="Meta Description">{{ $article->meta_tag }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label>المقالة</label>
                                <div class="mb-3">
                                    <textarea name="editor1" class="form-control">{!! $article->description !!}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">تعديل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="{{ asset('editor/js/config.js') }}"></script>

<script>
    CKEDITOR.replace( 'editor1', {
        language: 'ar',
    });
</script>

@endforeach
@endsection