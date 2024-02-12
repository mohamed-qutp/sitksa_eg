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
                    <form method="POST" action="{{ route('about-us.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>العنوان باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <input name="name_en" type="text" style="text-align: left;direction: ltr" class="form-control" placeholder="العنوان باللغة الانجليزية" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>العنوان باللغة العربية</label>
                                <div class="mb-3">
                                    <input name="name_ar" type="text" class="form-control" placeholder="العنوان باللغة العربية" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label>التفاصيل باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <textarea name="description_en" style="text-align: left;direction: ltr" class="form-control" rows="10" placeholder="التفاصيل باللغة الانجليزية" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>التفاصيل باللغة العربية</label>
                                <div class="mb-3">
                                    <textarea name="description_ar" class="form-control" rows="10" placeholder="التفاصيل باللغة العربية" required></textarea>
                                </div>
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
@endsection