@extends('admin.layouts.header')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-6">
                <h6>العملاء</h6>
            </div>
            <div class="col-6">
                <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    @foreach ($clients as $clients)
                        <div class="col-md-2 mt-md-0 mt-4 mb-4">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div class="icon icon-shape icon-lg bg-gradient-light shadow text-center border-radius-lg">
                                        <img src="{{ asset('storage/'.$clients->img_path) }}" width="60px" height="60px">
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">{{ $clients->name_ar }}</h6>
                                    <hr class="horizontal dark my-3">

                                    
                                    <form action="{{ route('changeOrder',$clients->id) }}" method="POST">
                                        <a href="{{ route('clients.edit',$clients->id) }}" class="mb-0"><i class="fas fa-edit"></i></a>
                                        @csrf

                                        <button type="submit" {{ $loop->first ? 'disabled' : '' }} name="changeOrder" value="up" style="outline: none;border:none;padding:0;background:none;" class="mb-0"><i class="fas fa-arrow-up"></i></button>

                                        <button type="submit" {{ $loop->last ? 'disabled' : '' }} name="changeOrder" value="down" style="outline: none;border:none;padding:0;background:none;" class="mb-0"><i class="fas fa-arrow-down"></i></button>

                                        <button type="submit" {{ $loop->first ? 'disabled' : '' }} name="changeOrder" value="first" style="outline: none;border:none;padding:0;background:none;" class="mb-0"><b>1</b></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">رفع سلايدر</h5>
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name"  value="{{ old('name') }}" placeholder="اسم العميل باللغة الانجليزية" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name_ar"  value="{{ old('name_ar') }}" placeholder="اسم العميل باللغة العربية" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="file" name="file" class="form-control" required>
                            <small>يجب أن تكون أبعاد الصورة width: 949px و height: 824px</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input name="website" type="text" class="form-control" value="{{ old('website') }}" placeholder="الموقع الالكتروني" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="حفظ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection