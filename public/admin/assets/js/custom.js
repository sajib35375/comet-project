(function ($){
    $(document).ready(function(){
        // select2
        $('.select-cls').select2();
        CKEDITOR.replace('editor');



        // logout feature

        $(document).on('click','#logout_btn',function (e){
            e.preventDefault();

            $('#logout_form').submit();
        });

        $(document).on('change','#status_active',function (e){
            e.preventDefault();

            let id = $(this).attr('active_id');
            $.ajax({
                url:'/category/status-active/'+id,
                success:function (data){
                    swal('success','status active successful','success');
                }
            })

        });

        $(document).on('change','#status_inactive',function (e){
            e.preventDefault();

            let id = $(this).attr('inactive_id');
            $.ajax({
                url:'/category/status-inactive/'+id,
                success:function (data){
                    swal('success','status inactive successful','success');
                }
            })

        });

        $(document).on('click','#edit_btn',function (e){
            e.preventDefault();
            let id = $(this).attr('edit_id');
            $.ajax({
                url:'/category/edit/'+id,
                success:function (data){
                    $('#update_form input[name="name"]').val(data.name);
                    $('#update_form input[name="update_id"]').val(data.id);
                    $('#edit_cat_modal').modal('show');
                }
            });

        });
        $(document).on('submit','form#update_form',function (e){
             e.preventDefault();
             $.ajax({
                 url:'/category/update',
                 method:"POST",
                 data:new FormData(this),
                 contentType:false,
                 processData:false,
                 success:function (data){
                     $('#edit_cat_modal').modal('hide');
                     swal('success','category update successful','success');
                 }

             });

        });
        $(document).on('change','#active',function (e){
            e.preventDefault();

            let id = $(this).attr('active');
            $.ajax({
                url:'/tag/status-active/'+id,
                success:function (data){
                    swal('success','status active successful','success');
                }
            })

        });
        $(document).on('change','#inactive',function (e){
            e.preventDefault();

            let id = $(this).attr('inactive');
            $.ajax({
                url:'/tag/status-inactive/'+id,
                success:function (data){
                    swal('success','status inactive successful','success');
                }
            })

        });

        $('#camera_icon').change(function (e){
            e.preventDefault();

            let url = URL.createObjectURL(e.target.files[0]);

            $('img#image').attr('src',url);

        });
        $('#post_format').change(function (){
            let format = $(this).val();
            if (format=='Image'){
                $('.image').show();
            }else{
                $('.image').hide();
            }
            if (format=='Gallery'){
                $('.gallery').show();
            }else{
                $('.gallery').hide();
            }
            if (format=='Video'){
                $('.video').show();
            }else{
                $('.video').hide();
            }
            if (format=='Audio'){
                $('.audio').show();
            }else{
                $('.audio').hide();
            }
        });

        $('#camera_icon_g').change(function (e){

            let image_gall='';
            for (let i=0;i<e.target.files.length;i++){
                let image_url = URL.createObjectURL(e.target.files[i]);
                image_gall += '<img style="width: 200px;height: 200px;" src="'+image_url+'">';
            }
            $('.image-gallery').html(image_gall);

        });

        $('.ok').parent('ul').slideDown();
        $('.ok').children('a').css('color','#5ae8ff');
        $('.ok').parent('ul').parent('li').children('a').css('background-color','#19c1dc');
        $('.ok').parent('ul').parent('li').children('a').addClass('subdrop');
        $('a.ok').css('background-color','#19c1dc');


        // edit-post

        $(document).on('click','#post_edit_btn',function (e){
            e.preventDefault();
            let id = $(this).attr('edit_id');

            $.ajax({
                url:'/post/edit/'+id,
                success:function (data){

                    $('form#edit_form_id input[name="title"]').val(data.title);
                    if (data.featured_type=='Image') {
                        $('form#edit_form_id img#image_id').attr('src','/admin/assets/img/'+data.featured_image);
                    }else if(data.featured_type=='Gallery') {
                        let all_data = data.featured_gal;
                        alert(all_data);
                        // let image_gall='';
                        // for(var data of all_data){
                        //     image_gall = '<img style="width: 200px;height: 200px;" src="'/admin/assets/img/'+data">';
                        //     // alert(image_gall);
                        //     // $('.gallery img').attr('src','/admin/assets/img/'+all_data);
                        // }



                    }
                    $('#post_edit_modal').modal('show');

                }
            });

        });









    });
})(jQuery)
