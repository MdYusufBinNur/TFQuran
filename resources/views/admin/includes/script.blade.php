
<script src="{{ asset('js/app.js') }}"></script>



<script type="text/javascript" src="{{ asset('pro/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pro/js/popper.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('pro/js/bootstrap.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('pro/js/mdb.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/tableExport/tableExport.js') }}"></script>
<script  type="text/javascript" src="{{ asset('js/tableExport/jquery.base64.js') }}"></script>
<script  type="text/javascript" src="{{ asset('js/tableExport/jspdf/libs/sprintf.js') }}"></script>
<script  type="text/javascript" src="{{ asset('js/tableExport/jspdf/jspdf.js') }}"></script>
<script  type="text/javascript" src="{{ asset('js/tableExport/jspdf/libs/base64.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $('#category_name').materialSelect({
        BSsearchIn: true
    });
</script>

<script>


    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

    document.onreadystatechange = function () {
        var state = document.readyState
        if (state == 'interactive') {

        } else if (state == 'complete') {
            setTimeout(function(){
                document.getElementById('interactive');
                document.getElementById('load').style.visibility="hidden";

            },800);
        }
    }

    jQuery(

        function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
    $(document).on('click', '.ts-delete-alt', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        // var userId = $(this).data('user_id');
       // console.log(userId);
        swal({
            title: "Are you sure want to delete?"+id,
            type: "error",
            icon: "warning",
            buttons: [true, "Delete"],
            dangerMode: true,

        })

    });


/*    $(document).on('click', '.ts-delete-al', function (e) {
        e.preventDefault();
        var id = $(this).data('id');


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: 'post',
                        url: 'delete_editor/'+id,
                        success: function (data) {
                            alert(id)
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            }).then(()=>
                            {
                                location.reload();
                            });
                        }
                    })

                } else {
                    swal("Your imaginary file is safe!");
                }
            });

    });*/
    function delete_ayah(id,token_no)
    {
        //alert(token_no)
        $('#del_ayah_no').val(id);
        $('#del_token_noo').val(token_no);
        // $("#del_ayah").attr("href", "/del_ayah/" + id);
    }
    function updatedSura(sura_no,ayah_no,token_no)
    {


        //alert(token_no)
        $.ajax({
            type : 'get',
            url : '/updateSura/',

            data :
                {
                    sura_no: sura_no,
                    ayah_no: ayah_no,
                    token_no: token_no,
                },

            success:function(response) {

                var models = JSON.parse(response);

                console.log(models)
                //alert(models[0].ayah_text)
                for (let i = 0; i <= models.length; i++)
                {

                    // alert(models[i].token_expl)
                    $('#ayah_id').val(models[i].ayah_id)
                    $('#ayah_no').val(models[i].taf_ayah_no)
                    $('#token_no').val(models[i].taf_token_no)
                    $('#ayah_text').val(models[i].ayah_text)
                    $('#ayah_translation').val(models[i].token_trans)
                    // $('#ayah_explanation').val(models[i].token_expl)
                    // $('textarea#ayah_explanation').html(models[i].token_expl)
                    $('#token_expl_no').val(models[i].token_expl_no)
                    tinyMCE.activeEditor.setContent(models[i].token_expl);
                    //alert(models[i].ayah_id)
                    $('#preview_token_iamge').attr('src','../'+models[i].image_token)
                }

            },
            error: function(response){
                alert('Error'+response);
            }
        })
        //alert(ayah_no);
    }

    function delete_editor(id)
    {
        //alert(id);
        $("#del").attr("href", "/delete_editor/" + id);
    }

    function set_role(id)
    {
        $('#rol_id').val(id)

    }

    function updatedEditors(id)
    {
        $.ajax({
            url: 'editor_info/'+id,
            method: 'get',
            success: function (data) {

                let obj = JSON.parse(data)
                //alert(data)
                $('#editor_email').val(obj.email)
                $('#editor_name').val(obj.name)
                $('#editor_id').val(obj.id)

            }
        })
    }

    function delete_author(id)
    {

        //alert(id);
        $("#del").attr("href", "/delete_author/" + id);
    }

    function updatedAuthor(id)
    {
        //alert(id)
        $.ajax({
            url: 'author_info/'+id,
            method: 'get',
            success: function (data) {

                let obj = JSON.parse(data)
                //alert(data)

                $('#author_name').val(obj.author_name)
                $('#author_info').val(obj.author_info)
                $('#author_id').val(obj.id)


            }
        })
    }

    function delete_publisher(id) {

        //alert(id);
        $("#del").attr("href", "/delete_publisher/" + id);
    }

    function updatedPublisher(id)
    {
        $.ajax({
            url: 'publisher_info/'+id,
            method: 'get',
            success: function (data) {

                let obj = JSON.parse(data)
                //alert(data)

                $('#publisher_name').val(obj.publisher_name)
                $('#publisher_info').val(obj.publisher_info)
                $('#publisher_id').val(obj.id)

            }
        })
    }

    function delete_category(id) {

        $("#del").attr("href", "/delete_category/" + id);
    }

    function updatedCateory(id)
    {
        $.ajax({
            url: 'category_info/'+id,
            method: 'get',
            success: function (data) {
                let obj = JSON.parse(data)
                //alert(data)
                $('#category_name').val(obj.category_name)
                $('#category_id').val(obj.id)
            }
        })
    }

    function delete_book_type(id) {
        $("#del").attr("href", "/delete_book_type/" + id);
    }
    function update_book_type(id) {
        $.ajax({
            url: 'book_type_info/'+id,
            method: 'get',
            success: function (data) {
                let obj = JSON.parse(data)
                //alert(data)
                $('#m_book_type').val(obj.book_type)
                $('#book_type_id').val(obj.id)
            }
        })

    }
</script>


<script>
    $(document).ready(function(){

        $('#new_meta_info_to_existing').hide();

        $('#add_meta_info_check').find('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true)
            {
                $('#new_meta_info').hide();
                $('#new_meta_info_to_existing').show();
            }
            else if($(this).prop("checked") == false)
            {
                $('#new_meta_info_to_existing').hide();
                $('#new_meta_info').show();
            }
        });
    });

    $('.update_record_form').hide();

    $('#update_ayah_record').find('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true)
        {
            $('.add_new_ayah_form').hide();
            $('.update_record_form').show();
            $('.dynamic_name').text("Update Record");
        }
        else if($(this).prop("checked") == false)
        {
            $('.update_record_form').hide();
            $('.add_new_ayah_form').show();
            $('.dynamic_name').text("Create New Ayah");
        }
    });
</script>

<script>
    function callback() {

        $("#ex_sub_chapter_no").find('option').remove().end();
        $("#ex_sub_chapter_no").append("<option >Select one</option>");
        $('#ex_sub_chapter_name').val('')
        $('#ex_meta_info').val('')
        $('#selected_book_id').val('')
    }

    function getValues(opt) {


        callback();

        let book_id = $('#book_id').val();
        let chapter_no = opt.value;


        $.ajax({
            type: 'get',
            url : '/getChapterDetails/',
            data : {
                book_id : book_id,
                chapter_no : chapter_no
            },
            success: function (response) {

                let data = JSON.parse(response);
                //console.log(data.sub_chapter_no)

                $.each(data, function(i, chat) {
                    let value = chat.sub_chapter_no;
                    let chapter_name = chat.chapter_name;

                    // console.log(value.length)

                    $('#ex_chapter_name').val(chapter_name);

                    $("#ex_sub_chapter_no").append("<option value="+ value +">"+value+"</option>");


                });

            },
            error: function(response){
                console.log(response)
            }
        })

    }

    function getSubChapterName(sub_chapter_val) {


        let book_id = $('#book_id').val();
        let chapter_no = $('#ex_chapter_no').find(":selected").text();
        let sub_chapter_no = sub_chapter_val.value;

        $.ajax({
            type : 'get',
            url : '/getSubChapter/',
            data : {
                book_id: book_id,
                chapter_no: chapter_no,
                sub_chapter_no: sub_chapter_no
            },
            success:function (resp) {

                //console.log(resp)
                let response = JSON.parse(resp);
                console.log(response)
                $('#selected_book_id').val(response.id)
                $('#ex_sub_chapter_name').val(response.sub_chapter_name)
                $('#ex_meta_info').val(response.meta_info)
            },
            error: function(response){
                console.log(response)
            }
        })


    }

</script>

<script>
    let rep = $('#sura_rmve_col').html();
    rep.replace(/['"]+/g, '');
</script>

<script>
    function getAyahs(id) {
        $("#ex_ayah_no").find('option').remove().end();
        let surah_id = id.value;
        //alert(id.value)
        $.ajax({
            type: 'get',
            url : '/getExAyahNo/',
            data : {
                surah_id : surah_id,

            },
            success: function (response) {

                let data = JSON.parse(response);
                console.log(data)

                $.each(data, function(i, chat) {
                    let ayah_no = chat.ayah_no;
                    let val = chat.ayah_id;

                    // console.log(value.length)

                    //$('#ex_chapter_name').val(chapter_name);

                    $("#ex_ayah_no").append("<option value="+ val +">"+ayah_no+"</option>");


                });

            },
            error: function(response){
                console.log(response)
            }
        })
    }
</script>
