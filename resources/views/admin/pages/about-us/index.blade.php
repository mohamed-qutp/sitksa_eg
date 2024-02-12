@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6">
                            <h6>عن الشركة</h6>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('about-us.create') }}" style="float: left" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                <th class="text-uppercase text-secondary text-m font-weight-bolder opacity-7">العنوان</th>
                                <th class="text-uppercase text-secondary text-m font-weight-bolder opacity-7 ps-2">تعديل</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($about) > 0)
                                @foreach ($about as $about)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $about->name_ar }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><a href="{{ route('about-us.edit',$about->id) }}"><i class="fas fa-edit"></i></a></p>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection