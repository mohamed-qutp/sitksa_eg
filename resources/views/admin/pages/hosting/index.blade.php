@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>باقات الاستضافة</h6>
        </div>
        <div class="col-6">
            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                @foreach ($hosting as $hosting)
                    <div class="col-md-2 mt-md-0 mt-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg bg-gradient-light shadow text-center border-radius-lg">
                                    <i class="fas fa-receipt"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0" style="direction: ltr">{{ $hosting->disk_space }} GB</h6>
                                <hr class="horizontal dark my-3">
                                <form action="{{ route('hosting.destroy',$hosting->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
                <form autocomplete="off" action="{{ route('hosting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>المساحة</label>
                            <div class="mb-3">
                                <input type="number" name="disk_space"  value="{{ old('disk_space') }}" placeholder="المساحة" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>عدد حسابات البريد الإلكتروني</label>
                            <div class="mb-3">
                                <input type="number" name="email_accounts"  value="{{ old('email_accounts') }}" placeholder="عدد حسابات البريد الإلكتروني" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>عدد المواقع</label>
                            <div class="mb-3">
                                <input type="number" name="websites"  value="{{ old('websites') }}" placeholder="عدد المواقع" class="form-control" required>
                            </div>
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