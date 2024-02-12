@extends('admin.layouts.header')
@section('content')
@foreach ($supportObj as $supportObj)
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">اضف عنصر جديد</h3>
                </div>
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('support.update',$supportObj->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="projectname">اسم المشروع</label>
                                <input type="text" readonly class="form-control" value="{{ $supportObj->projects->name_ar }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="projectname">اسم موظف الدعم</label>
                                <select name="supportusers" class="form-control" required>
                                    @foreach ($supportusers as $supportusers)
                                        <option {{ $supportusers->id == $supportObj->support_user_id ? 'selected' : '' }} value="{{ $supportusers->id }}">{{ $supportusers->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-sm">حفظ</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <a href="{{ route('support.createVideos',$supportObj->id) }}" class="btn btn-primary btn-sm">اضافة فيديوهات دعم</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>اسم الفيديو</td>
                                    <td>رابط الفيديو</td>
                                    <td>حذف</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportVideos as $supportVideos)
                                    <tr>
                                        <td>{{ $supportVideos->title }}</td>
                                        <td><a href="https://www.youtube.com/watch?v={{ $supportVideos->video }}" target="_blank">https://www.youtube.com/watch?v={{ $supportVideos->video }}</a></td>

                                        <form action="{{ route('support.destroyVideo', $supportVideos->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <td><button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection