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

                            <li class="breadcrumb-item active"><strong>
                                    COMMENTS LIST
                                </strong></li>

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
                                            <strong>
                                                COMMENTS LIST
                                            </strong>
                                            &nbsp &nbsp
                                            @if(Session::get('message'))
                                                <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                            @endif
                                        </h5>
                                    </div>



                                </div>


                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-responsive-md btn-table">

                                    <thead>
                                    <tr>
                                        <th>SL</th>

                                        <th>Book Name</th>
                                        <th>Author Name</th>
                                        <th>Chapter Info</th>
                                        <th>Comments</th>

                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php( $i = 1)
                                    @if(!empty($comments))

                                        @foreach($comments as $comment)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>

                                                <td>{{ $comment->book_name }}</td>
                                                <td>{{ $comment->author_name }}</td>
                                                <td>{{ $comment->chapter_sub }}</td>
                                                <td>{{ $comment->comments }}</td>

                                                <td>

                                                    <a class="btn-floating btn-sm btn-danger ts-delete-al"  data-target="#author_delete" data-toggle="modal" onclick="delete_msg({{ $comment->id }})"  title="Delete"><i class="fas fa-times"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>

                            </div>

                            <div class="row" style="margin: 20px">
                                {{ $comments->links() }}
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>



    <div class="modal fade " id="author_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <script>
        function delete_msg(id)
        {

            //alert(id);
            $("#del").attr("href", "/destroy_msg/" + id);
        }
    </script>

@endsection
