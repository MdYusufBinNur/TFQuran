@extends('admin.admin_master')
@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Book List</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                </div>
                <div class="row">


                    <!-- /.col-md-6 -->

                    <div class="col-lg-12">

                        <div class="card card-dark">
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-8">
                                        <h5 class="text-left" >
                                            BOOK LIST
                                            &nbsp &nbsp

                                        </h5>
                                    </div>
                                    <div class="col-md-4  text-right" >
                                        <a class="" href="{{ route('add_new_book') }}">
                                            <strong> ADD NEW → </strong>
                                        </a>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        @if(Session::get('message'))
                                            <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                        @endif
                                    </div>

                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-responsive-md btn-table">

                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Status</th>
                                        <th>Book</th>
                                        <th>Author</th>
                                        <th>Publisher</th>
                                        <th>Category </th>
                                        <th>Language</th>
                                        <th>Add Meta Info</th>

                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php( $i = 1)
                                    @if(empty($books))

                                        <td colspan="8" style="text-align: center"> NO Record Found</td>
                                        @else

                                        @foreach($books as $book)
                                            <tr>
                                                <td scope="row">{{ $i++ }}</td>
                                                <td>
                                                    @if($book->status == 0)
                                                        <a style="color: red">[Draft]</a>
                                                    @else
                                                        <a style="color: #00c853"><i class="fa fa-check"></i>Published</a>
                                                    @endif
                                                </td>
                                                <td>{{ $book->book_name }}</td>
                                                <td>{{ $book->author_name }}</td>
                                                <td>{{ $book->publisher_name }}</td>
                                                <td>{{ $book->category_name }}</td>
                                                <td>{{ $book->language }}</td>

                                                <td>
                                                    <a href="{{ route('meta_information', $book->book_id ) }}" class="btn btn-rounded btn-sm btn-dark" title="Add Meta Info" style="color: white" ><i class="fas fa-edit"></i>  Add Meta Info</a>

                                                </td>
                                                <td>

                                                    <a class="btn-floating btn-sm btn-teal" title="Edit" data-toggle="modal" data-target="#edit_book" style="margin: 2px" onclick="updatedBook({{ $book->book_id }})"><i class="fas fa-pen"></i></a>

                                                    &nbsp;
                                                    <br>
                                                    <a class="btn-floating btn-sm btn-slack" title="View" data-toggle="modal" data-target="#book_preview"  style="margin: 2px" onclick="preview_book({{ $book->book_id }})" ><i class="fas fa-eye"></i></a>

                                                    &nbsp;
                                                    <br>
                                                    <a class="btn-floating btn-sm btn-danger ts-delete-al"  data-target="#delete_book" data-toggle="modal"  style="margin: 2px" onclick="delete_book({{ $book->book_id }})"  title="Delete"><i class="fas fa-times"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                                <div class="row " style="margin: 10px">
                                    <div class="col-12 float-right">
                                        {{ $books->links() }}
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="edit_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg " role="document">

            <form action="{{ route('update_book_info') }}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="modal-content">
                    <div class="modal-header">


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Book name" id="m_book_name" name="book_name" required>
                                    <input type="text" class="form-control" id="single_book_id" name="book_id" value="" hidden >
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group author">
                                    <label>Author</label>
                                    <select class="browser-default custom-select" name="author_name" id="m_author_name">




                                        @if(!empty($authors))
                                            <option >Select Author</option>
                                            @foreach($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                            @endforeach
                                        @endif

                                        {{--<option value="10">Make Admin</option>--}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Publisher</label>
                                    <select class="browser-default custom-select" name="publisher_name" id="publisher_name">

                                        @if(!empty($publishers))
                                            <option >Select Publisher</option>
                                            @foreach($publishers as $publisher)
                                                <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
                                            @endforeach
                                        @endif
                                        {{--<option value="10">Make Admin</option>--}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Languages</label>
                                    <select class="browser-default custom-select" name="language_name" id="language_name">
                                        <option selected>Select Language</option>
                                        <option value="Bengali">Bengali</option>
                                        <option value="English">English</option>
                                        <option value="Arabic">Arabic</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">

                                        <select id="category_name" class="mdb-select md-form" multiple searchable="Search for..." name="category_name[]" >
                                            <option value="" disabled >Select Category</option>
                                            @if(!empty($categories))
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Book Type</label>

                                    <select class="browser-default custom-select" name="m_book_type" id="m_book_type" >


                                        <option value="" disabled >Select Book Types</option>
                                        @if(!empty($book_types))
                                            <option >Select Author</option>
                                            @foreach($book_types as $book_type)
                                                <option value="{{ $book_type->book_type }}">{{ $book_type->book_type }}</option>
                                            @endforeach
                                        @endif
                                        {{--<option value="Action and adventure">Action and adventure</option>--}}
                                        {{--<option value="Health">Health</option>--}}
                                        {{--<option value="Historical fiction">Historical fiction</option>--}}
                                        {{--<option value="Horror">Horror</option>--}}
                                        {{--<option value="Islamic">Islamic</option>--}}
                                        {{--<option value="Kids">Kid's</option>--}}
                                        {{--<option value="Poetry">Poetry</option>--}}
                                        {{--<option value="Science fiction">Science fiction</option>--}}
                                        {{--<option value="Textbook">Textbook</option>--}}
                                        {{--<option value="Thriller">Thriller</option>--}}

                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Topics Name</label>
                                    <input type="text" class="form-control" placeholder="Topics" id="m_topics_name" name="topics_name" >
                                </div>
                            </div>


                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="file-field">
                                    <div class="btn btn-teal btn-sm btn-rounded float-left">
                                        <span>Choose files</span>
                                        <input type="file" name="image" >
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate form-control"  type="text" placeholder="Upload one or more files" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <img src=""  class="book_image" style="height: 100px;width: auto" id="book_image" name="book_image" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-dark btn-rounded btn-sm">Update Records</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <div class="modal fade " id="delete_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel" style="font-family: Algerian;">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <img src="{{ asset('img/alert-icon.png') }} " style="height: 100px;width: auto;text-align: center">
                </div>
                <div class="modal-body" style="text-align: center">
                    <h3 style="text-align: center">Are You Sure????</h3>
                </div>
                <div class="modal-footer" >

                    <a type="button" class="btn btn-danger btn-sm" id="del">Yes</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="book_preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg " role="document">

            <form action="{{ route('publish') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header card card-dark">

                        <input type="text" id="book_i" name="book_id" hidden>
                            <h4 class="modal-title w-100 text-center" id="myModalLabel ">
                                <strong id="book_Name"></strong>
                            </h4>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="row">
                            <div class="col-12" id="book_intro">

                            </div>
                        </div>

                        <div class="row" >
                            <table class="table-bordered" id="xml_export">

                                <thead>
                                    <tr>
                                        <th>Chapter</th>
                                        <th>Chapter_Name</th>
                                        <th>Sub Chapter</th>
                                        <th>Sub Chapter Name</th>
                                        <th>Meta Info</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <a  class="btn btn-dark btn-rounded btn-sm" onclick="exportto()" id="exportto">Export In XML</a>
                        <button type="submit" class="btn btn-teal btn-rounded btn-sm" id="pb">Publish Book</button>

                        <a onclick="unpublish()"  class="btn btn-danger btn-rounded btn-sm" id="upb">Unpublished Book</a>


                    </div>

                </div>
            </form>


        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        function preview_book(id)
        {
            $('#xml_export tbody tr').remove();
            $('#xml_export').hide();
            $('#book_intro').find('.row').remove().end();
            $.ajax({
                type:'get',
                url: 'preview_book/'+id,
                success: function (response)
                {
                    let book_data = JSON.parse(response);
                    console.log(book_data)

                    $('#book_i').val(id)

                    let cp_no = 0;
                    $.each(book_data, function(i, data)
                    {

                        let sub_chapter_no = data.sub_chapter_no;
                        let sub_chapter_name = data.sub_chapter_name;
                        let chapter_no = data.chapter_no;
                        let book_intro = data.meta_info;
                        let book_name = data.book_name;
                        let chapter_name = data.chapter_name;

                        $('#book_Name').text(book_name)

                        if (data.chapter_no == cp_no)
                        {
                            $('#book_intro').append(
                                '<div class="row">' +
                                '<div class="col-12">' +
                                '<h5 class="text-bold" style="margin-left: 40px">' + sub_chapter_no + sub_chapter_name +'</h5>'+
                                '<p style="margin-left: 40px">' + book_intro +'</p>'+
                                '</div>' +
                                '</div>'
                            )
                        }
                        else
                        {
                            $('#book_intro').append(
                                '<div class="row">' +
                                '<div class="col-12">' +
                                '<h3 class="text-bold" id="chp"> Chapter ' + chapter_no + '(' +chapter_name + ')'+ '</h3>'+
                                '<h5 class="text-bold" style="margin-left: 40px">' + sub_chapter_no + sub_chapter_name +'</h5>'+
                                '<p style="margin-left: 40px">' + book_intro +'</p>'+
                                '</div>' +
                                '</div>'
                            )
                        }

                        cp_no = chapter_no;
                    });

                    $.each(book_data,function (i, data) {
                        let sub_chapter_no = data.sub_chapter_no;
                        let sub_chapter_name = data.sub_chapter_name;
                        let chapter_no = data.chapter_no;
                        let book_intro = data.meta_info;
                        let book_name = data.book_name;
                        let chapter_name = data.chapter_name;
                        $('#xml_export tbody').append(
                            '<tr>' +
                                '<td>'+chapter_no+'</td>' +
                                '<td>'+chapter_name+'</td>' +
                                '<td>'+sub_chapter_no+'</td>' +
                                '<td>'+sub_chapter_name+'</td>' +
                                '<td>'+book_intro+'</td>' +

                            '</tr>'
                        )
                    })
                },
                error: function (resp)
                {
                    console.log(resp)
                }

            })
            //alert(id)
        }

        function unpublish() {
            let id = $('#book_i').val();
            //$('#upb').attr('href','unpublish/'+id)
            $('#upb').attr("href","unpublish/"+id)
            //alert(id);
        }


        function exportto() {
            let id = $('#book_i').val();
            //$('#upb').attr('href','unpublish/'+id)
            $('#exportto').attr("href","exportto/"+id)
        }
    </script>

    <script>
        function updatedBook(id) {
            // alert(id)

            $.ajax({
                type : 'get',
                url : 'get_single_book/'+id,
                success : function (response) {
                    //alert(response)
                    let data = JSON.parse(response);
                    //alert(data.id);
                    $('#single_book_id').val(data.book_inc_id);
                    $('#m_book_name').val(data.book_name);
                    //$('#selected_author').val(data.author_name);
                    $('#m_topics_name').val(data.topics);

                    $('#edit_book select[name="author_name"] option:selected').text(data.author_name);
                    $('#edit_book select[name="author_name"] option:selected').val(data.author_id);

                    $('#edit_book select[name="m_book_type"] option:selected').text(data.type);
                    $('#edit_book select[name="m_book_type"] option:selected').val(data.type);

                    $('#edit_book select[name="publisher_name"] option:selected').text(data.publisher_name);
                    $('#edit_book select[name="publisher_name"] option:selected').val(data.publisher_id);

                    $('#edit_book select[name="language_name"] option:selected').text(data.language);
                    $('#edit_book select[name="language_name"] option:selected').val(data.language);

                    /*$('#edit_book select[name="category_name"] option:selected').text(data.category_name);
                    $('#edit_book select[name="category_name"] option:selected').val(data.category_name);

    */
                    $('#edit_book img.book_image').attr('src', data.book_image);


                    // $("#m_author_name option[value= "+data.author_name+" ]").prop('selected', true);
                    // $("div.author select").val(data.author_name);

                },
                error: function (resp) {
                    console.log(resp)
                }
            })

        }

        function delete_book(id) {

            $("#del").attr("href", "/delete_book/" + id);
        }

    </script>

@endsection
