@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6>موظفين الدعم</h6>
        </div>
        <div class="col-6">
            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="table-reponsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>اسم الموظف</td>
                        <td>رقم الموظف</td>
                        <td>تعديل</td>
                        <td>حذف</td>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) > 0)
                    @foreach ($users as $users)
                        <tr>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->phone }}</td>
                            <td><a href="{{ route('support-users.edit',$users->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a></td>
                            <form action="{{ route('support-users.destroy',$users->id) }}" method="post">
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
                <form autocomplete="off" action="{{ route('support-users.store') }}" method="post" enctype="multipart/form-data">
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