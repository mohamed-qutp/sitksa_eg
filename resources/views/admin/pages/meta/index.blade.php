@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>كلمات الMETA TAG</h6>
        </div>
        <div class="col-6">
            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                @foreach ($meta as $meta)
                    <div class="col-md-2 mt-md-0 mt-4">
                        <div class="card">
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0 mt-3" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $meta->text }}</h6>
                                <hr class="horizontal dark my-3">
                                <a href="{{ route('meta.edit',$meta->id) }}" class="mb-0"><i class="fas fa-edit"></i></a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">اضف</h5>
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{ route('meta.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <textarea name="text" placeholder="ادخل الكلمة\الجملة" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="type" class="form-control" required>
                                <option value="" selected disabled>اختر النوع</option>
                                <option value="keyword">KEYWORD</option>
                                <option value="description">DESCRIPTION</option>
                            </select>
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