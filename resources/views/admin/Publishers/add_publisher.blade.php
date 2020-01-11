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

                            <li class="breadcrumb-item active">Publisher List</li>

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

                        <form action="{{ route('add_publisher') }}" method="POST">

                            @csrf
                            <div class="card card-dark">
                                <div class="card-header">
                                    <div class="row">

                                        <div class="col-md-8">
                                            <h5 class="text-left" >
                                                Publisher
                                                &nbsp &nbsp
                                                @if(Session::get('message'))
                                                    <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="col-md-4  text-right" >
                                            <a class="" href="{{ route('publisher_list') }}">
                                                <strong> Publisher LIST → </strong>
                                            </a>
                                        </div>


                                    </div>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form">
                                        <!-- text input -->

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Publisher Name</label>
                                                    <input type="text" name="publisher_name" class="form-control" placeholder="Enter ...">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Publisher Info</label>
                                                    <input type="text" class="form-control" name="publisher_info" placeholder="Enter ...">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-dark btn-sm btn-rounded">Create</button>
                                            </div>
                                        </div>





                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </form>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
