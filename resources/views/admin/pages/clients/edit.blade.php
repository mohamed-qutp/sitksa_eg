@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    @foreach ($client as $client)
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="font-weight-bolder text-info text-gradient">تعديل بيانات العميل</h3>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('clients.update',$client->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <label>اسم العميل باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <input name="name" type="text" class="form-control" value="{{ $client->name }}" placeholder="اسم العميل باللغة الانجليزية" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>اسم العميل باللغة العربية</label>
                                <div class="mb-3">
                                    <input name="name_ar" type="text" class="form-control" value="{{ $client->name_ar }}" placeholder="اسم العميل باللغة العربية" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label>الموقع الالكتروني</label>
                                <div class="mb-3">
                                    <input name="website" type="text" class="form-control" value="{{ $client->website }}" placeholder="الموقع الالكتروني" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>تعديل صورة العميل</label>
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                    <small>يجب أن تكون أبعاد الصورة width: 949px و height: 824px</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <img src="{{ asset('storage/'.$client->img_path) }}" width="200px">
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
@endsection