@extends('admin.layouts.header')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <h6></h6>
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
                    @foreach ($user as $user)
                    <form action="{{ route('support-users.update',$user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <tr>
                            <td>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </td>
                            <td>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            </td>
                            <td><button type="submit" class="btn btn-info btn-sm"><i class="fas fa-check-circle"></i></button></td>
                        </form>
                            <form action="{{ route('support-users.destroy',$user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                            </form>
                        </tr>
                    @endforeach
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
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection