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
                        <form method="POST" action="{{ route('support.storeVideos',$id) }}" name="add_support" id="add_support" autocomplete="off">
                            @csrf
                            <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field">
                                    <thead>
                                        <tr>
                                            <td>عنوان الفيديو</td>
                                            <td colspan="2">رابط الفيديو من اليوتيوب</td>
                                        </tr>
                                    </thead>
                                    <tr>  
                                        <td><input required name="title[]" placeholder="ادخل عنوان الفيديو" class="form-control name_list"></td>
                                        <td>
                                            <input required name="video[]" placeholder="ادخل رابط الفيديو" class="form-control name_list">
                                        </td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                                </table>
                            </div>

                            <div class="row">
                                <div class="text-center">
                                    <button type="submit" id="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">حفظ المقالة</button>
                                </div>
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
        var postURL = "<?php echo route('support.storeVideos',".$id."); ?>";
        var i=1;  


        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input required name="title[]" placeholder="ادخل عنوان الفيديو" class="form-control name_list"></td><td><input required name="video[]" placeholder="ادخل رابط الفيديو" class="form-control name_list"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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
                data:$('#add_support').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_support')[0].reset();
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