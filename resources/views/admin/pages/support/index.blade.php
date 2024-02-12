@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>مشاريع الدعم</h6>
        </div>
        <div class="col-3">
            <a href="{{ route('support.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
        </div>
        <div class="col-3">
            <a href="{{ route('support-users.index') }}" class="btn btn-light btn-sm">عرض موظفين الدعم</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="table-reponsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>اسم المشروع</td>
                        <td>اسم مسؤول الدعم</td>
                        <td>تعديل</td>
                        <td>حذف</td>
                    </tr>
                </thead>
                <tbody>
                    @if (count($support) > 0)
                    @foreach ($support as $support)
                        <tr>
                            <td>{{ $support->projects->name_ar }}</td>
                            <td>{{ $support->users->name }}</td>
                            <td><a href="{{ route('support.edit',$support->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a></td>
                            <form action="{{ route('support.destroy',$support->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                            </form>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">اضف موظف دعم</h5>
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{ route('support.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">اسم الموظف</label>
                            <input type="text" name="name" class="form-control" placeholder="اسم الموظف">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">رقم الموظف</label>
                            <input type="text" name="phone" class="form-control" placeholder="رقم الموظف">
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