@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    @foreach ($projects as $projects)
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="font-weight-bolder text-info text-gradient">تعديل المشروع</h3>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('projects.destroy',$projects->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    @if ($projects->file_path != null)
                        <div class="col-lg-6">
                            <form action="{{ route('fileDownload',$projects->id) }}" method="get">
                                @csrf
                                <div class="col-md-4">
                                    <label> الملف الحالي</label></br>
                                    <button type="submit" class="btn btn-info"><i class="fa fa-download"></i></button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('projects.update',$projects->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <label>الاسم باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <input name="name_en" type="text" style="text-align: left;direction: ltr" class="form-control" value="{{ $projects->name_en }}" placeholder="العنوان باللغة الانجليزية" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>الاسم باللغة العربية</label>
                                <div class="mb-3">
                                    <input name="name_ar" type="text" class="form-control" value="{{ $projects->name_ar }}" placeholder="العنوان باللغة العربية" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>الخدمة</label>
                                <div class="mb-3">
                                    <select name="service" class="form-control" required>
                                        @foreach ($services as $services)
                                            <option value="{{ $services->id }}" {{ $projects->service_id == $services->id ? 'selected' : '' }}>{{ $services->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>شرح /مقدمة</label>
                                <textarea name="desc" class="form-control" rows="5">{{ $projects->desc }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label>تعديل صورة الخدمة</label>
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                </div>
                                {{-- <a href="{{ route('addDetails',$projects->id) }}" class="btn btn-info">اضف تفاصيل للمشروع <i class="fas fa-plus"></i></a> --}}
                            </div>
                            <div class="col-lg-5">
                                <label>الفيديو</label>
                                <div class="mb-3">
                                    <input type="text" name="video" value="https://www.youtube.com/watch?v={{ $projects->video }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <img src="{{ asset('storage/'.$projects->img_path) }}" style="width: 100px;height: 100px">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label>تعديل شرح البرنامج</label>
                                <div class="mb-3">
                                    <input type="file" name="file1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <label>المميزات</label>
                                <textarea name="editor1" class="form-control">{!! $projects->details !!}</textarea>
                            </div>
                        </div>
                        
                        {{-- <div class="table-responsive">
                            <table class="table" style="table-layout:fixed;width:100%;">
                                <thead>
                                    <tr>
                                        <td>تفاصيل</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $details)
                                        <tr>
                                            <td style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">{{ $details->desc }}</td>
                                            <td><a href="{{ route('projectdetails.edit',$details->id) }}"><i class="fas fa-arrow-left"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
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
    CKEDITOR.replace( 'editor1', {
        language: 'ar',
    });
</script>
@endsection

