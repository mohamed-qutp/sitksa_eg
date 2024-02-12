@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="mb-1">سلايدر الصفحة الرئيسية</h6>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($slider as $slider)
                                <div class="carousel-item">
                                    <form action="{{ route('slider.destroy',$slider->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <center>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </center>
                                    </form>
                                    <img class="d-block w-100" src="{{ asset('storage/'.$slider->img_path) }}">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
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
                <form autocomplete="off" action="{{ route('slider.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" name="file" class="form-control" required>
                            <small>يجب أن تكون أبعاد الصورة width: 2445px و height: 1241px</small>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" name="submit" class="btn btn-primary btn-sm" value="حفظ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection