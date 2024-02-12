@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">اضف عنصر جديد</h3>
                </div>
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('support.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <select name="projects" class="form-control" required>
                                    <option value="" disabled selected>اختر مشروع</option>
                                    @foreach ($projects as $projects)
                                        <option value="{{ $projects->id }}">{{ $projects->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select name="supportusers" class="form-control" required>
                                    <option value="" disabled selected>اختر موظف الدعم</option>
                                    @foreach ($supportusers as $supportusers)
                                        <option value="{{ $supportusers->id }}">{{ $supportusers->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-success btn-sm" value="save-only">حفظ</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm" value="save-video">حفظ و اضافة فيديوهات الدعم </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection