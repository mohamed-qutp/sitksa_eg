@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">اضف مشروع جديد</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" name="add_article" id="add_article">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>الاسم باللغة الانجليزية</label>
                                <div class="mb-3">
                                    <input name="name_en" type="text" style="text-align: left;direction: ltr" class="form-control" placeholder="الاسم باللغة الانجليزية" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>الاسم باللغة العربية</label>
                                <div class="mb-3">
                                    <input name="name_ar" type="text" class="form-control" placeholder="الاسم باللغة العربية" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <label>الخدمة</label>
                                <div class="mb-3">
                                    <select name="service" class="form-control" required>
                                        <option value="" selected disabled>اختر الخدمة</option>
                                        @foreach ($services as $services)
                                            <option value="{{ $services->id }}">{{ $services->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>صورة المشروع</label>
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>رابط فيديو المشروع</label>
                                <div class="mb-3">
                                    <input type="text" name="video" placeholder="رابط فيديو المشروع" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label>شرح البرنامج</label>
                                <div class="mb-3">
                                    <input type="file" name="file1" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <h4>تفاصيل المشروع</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>شرح /مقدمة</label>
                                <textarea name="desc" class="form-control" placeholder="ادخل شرح المشروع"  rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>المميزات</label>
                                <textarea name="editor1" class="form-control"></textarea>
                            </div>
                        </div>
                        {{-- <div class="row" id="dynamic_field">
                            <div class="col-lg-6">
                                <label>المميزات</label>
                                <small>*برجاء ادخال كل ميزة على حدة</small>
                                <input type="text" placeholder="ادخل ميزة للمشروع" required name="feature[]" class="form-control name_list">
                            </div>
                            <div class="col-lg-6">
                                <button type="button" style="margin-top: 20px;" name="add" id="add" class="btn btn-sm btn-success">+</button>
                            </div>
                        </div> --}}

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1', {
        language: 'ar',
    });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){      
        var postURL = "<?php echo route('projects.store'); ?>";
        var i=1;  


        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added row"><div class="col-lg-6"><input type="text" required placeholder="ادخل ميزة للمشروع" name="feature[]" class="form-control name_list"></div><div class="col-lg-6"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></div>');  
        });  


        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  


        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function(){            
            $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_article').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_article')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
            });  
        });  


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $(".print-success-msg").css('display','none');
            $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });  
</script>
@endsection