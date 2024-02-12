@extends('admin.layouts.header')
@section('content')
@foreach ($projects as $projects)
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">تفاصيل المشروع</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('addDetails',$projects->id) }}" enctype="multipart/form-data" name="add_article" id="add_article">
                        @csrf

                        <div class="row" id="dynamic_field">
                            <div class="col-lg-6">
                                <label>المميزات</label>
                                <small>*برجاء ادخال كل ميزة على حدة</small>
                                <input type="text" required placeholder="ادخل ميزة للمشروع" name="feature[]" class="form-control name_list">
                            </div>
                            <div class="col-lg-6">
                                <button type="button" style="margin-top: 20px;" name="add" id="add" class="btn btn-sm btn-success">+</button>
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
@endforeach
@endsection