@extends('admin.layouts.header')
@section('content')
@foreach ($article as $article)
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-info text-gradient">اضف عنصر جديد</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('article.storeDetails',$article->id) }}" name="add_article" id="add_article">
                            @csrf
                            <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                        <td><textarea required name="desc[]" class="form-control name_list" rows="5"></textarea></td>
                                        <td>
                                            <select name="tag[]" required class="form-control name_list">
                                                <option value="" selected disabled>اختر الtag المناسب</option>
                                                <option value="h1">H1</option>
                                                <option value="h2">H2</option>
                                                <option value="h3">H3</option>
                                                <option value="h4">H4</option>
                                                <option value="h5">H5</option>
                                                <option value="h6">H6</option>
                                                <option value="p">Paragraph</option>
                                            </select>
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
        var postURL = "<?php echo route('article.storeDetails',".$article->id."); ?>";
        var i=1;  


        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><textarea required name="desc[]" class="form-control name_list" rows="5"></textarea></td><td><select name="tag[]" required class="form-control name_list"><option value="" selected disabled>اختر الtag المناسب</option><option value="h1">H1</option><option value="h2">H2</option><option value="h3">H3</option><option value="h4">H4</option><option value="h5">H5</option><option value="h6">H6</option><option value="p">Paragraph</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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