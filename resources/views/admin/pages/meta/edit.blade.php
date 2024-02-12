@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    @foreach ($meta as $meta)
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="font-weight-bolder text-info text-gradient">تعديل</h3>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('meta.destroy',$meta->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('meta.update',$meta->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <textarea name="text" type="text" class="form-control" rows="5" required>{{ $meta->text }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <select name="type" required class="form-control">
                                        <option value="keyword" {{ $meta->type == "keyword" ? "selected" : "" }}>KEYWORD</option>
                                        <option value="description" {{ $meta->type == "description" ? "selected" : "" }}>DESCRIPTION</option>
                                    </select>
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
    @endforeach
</div>
@endsection