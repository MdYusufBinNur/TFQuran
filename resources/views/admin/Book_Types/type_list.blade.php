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

                            <li class="breadcrumb-item active">Type List</li>

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
                                            Type List
                                            &nbsp &nbsp
                                            @if(Session::get('message'))
                                                <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-md-4  text-right" >
                                        <a class="" href="{{ route('add_new_book_type') }}">
                                            <strong> ADD NEW → </strong>
                                        </a>
                                    </div>


                                </div>


                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-responsive-md btn-table">

                                    <thead>
                                    <tr>
                                        <th>SL</th>

                                        <th>Name</th>


                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php( $i = 1)
                                    @if(!empty($booktypes))

                                        @foreach($booktypes as $booktype)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>

                                                <td>{{ $booktype->book_type }}</td>


                                                <td>
                                                    <a class="btn-floating btn-sm btn-teal" title="Edit" data-toggle="modal" data-target="#edit_book_type" onclick="update_book_type({{ $booktype->id }})"><i class="fas fa-pen"></i></a>
                                                    &nbsp;
                                                    <a class="btn-floating btn-sm btn-danger ts-delete-al"  data-target="#dele_book_type" data-toggle="modal" onclick="delete_book_type({{ $booktype->id }})"  title="Delete"><i class="fas fa-times"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="row " style="margin: 10px">
                        <div class="col-12 float-right">
                            {{ $booktypes->links() }}
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="edit_book_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog" role="document">

            <form  action="{{ route('update_book_type') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title w-100 text-center" id="myModalLabel"><strong>Change  Records</strong></h4>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table">

                            <input type="text" id="book_type_id" name="book_type_id" hidden>
                            <tbody>
                            <tr >
                                <td>

                                    <label for="name" class="col-form-label">{{ __('Book Type') }}</label>

                                    <input id="m_book_type" type="text" class="form-control" name="book_type" value="" required autofocus>

                                </td>
                            </tr>





                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-sm">Update Records</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="modal fade " id="dele_book_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


@endsection
