@extends('admin.layouts.header')
@section('content')
@foreach ($details as $details)
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">تفاصيل المشروع</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('deleteDetails',[$details->id, $details->project_id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')                            
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <button type="submit" style="float: left" class="btn bg-gradient-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('updateDetails',$details->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" value="{{ $details->desc }}" name="desc" class="form-control">
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
</div>
@endforeach
@endsection