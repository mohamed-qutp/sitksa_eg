@extends('admin.layouts.header')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-6">
                <h6>المقالات التقنية</h6>
            </div>
            <div class="col-6">
                <a href="{{ route('article.create') }}" style="float: left" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>عنوان المقالة</th>
                        <th>التاريخ</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $articles)
                        <tr>
                            <td>{{ $articles->title }}</td>
                            <td>{{ $articles->created_at }}</td>
                            <td><a href="{{ route('article.edit',$articles->id) }}"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection