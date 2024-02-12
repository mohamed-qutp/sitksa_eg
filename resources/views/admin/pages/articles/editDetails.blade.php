@extends('admin.layouts.header')
@section('content')
@foreach ($details as $details)
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="font-weight-bolder text-info text-gradient">تعديل تفاصيل المقالة</h3>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('articles.destroyDetails',$details->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('article.updateDetails',$details->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>تفاصيل</label>
                                    <div class="mb-3">
                                        <textarea required name="desc" class="form-control" rows="5">{{ $details->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Tag</label>
                                    <div class="mb-3">
                                        <select name="tag" required class="form-control">
                                            <option {{ $details->tag == 'h1' ? 'selected' : '' }} value="h1">H1</option>
                                            <option {{ $details->tag == 'h2' ? 'selected' : '' }} value="h2">H2</option>
                                            <option {{ $details->tag == 'h3' ? 'selected' : '' }} value="h3">H3</option>
                                            <option {{ $details->tag == 'h4' ? 'selected' : '' }} value="h4">H4</option>
                                            <option {{ $details->tag == 'h5' ? 'selected' : '' }} value="h5">H5</option>
                                            <option {{ $details->tag == 'h6' ? 'selected' : '' }} value="h6">H6</option>
                                            <option {{ $details->tag == 'p' ? 'selected' : '' }} value="p">Paragraph</option>
                                        </select>
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
@endforeach
@endsection