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

                            <li class="breadcrumb-item active">Category List</li>

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

                    <div class="col-lg-3"></div>

                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">

                        <form action="{{ route('add_about_info') }}" method="POST">

                            @csrf
                            <div class="card card-dark">
                                <div class="card-header">
                                    <div class="row">

                                        <div class="col-md-8">
                                            <h5 class="text-left" >
                                                INFORMATION
                                                <br>
                                                @if(Session::get('message'))
                                                    <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="col-md-4  text-right" >
                                            <a class="" href="{{ route('info_list') }}">
                                                <strong> INFO LIST → </strong>
                                            </a>
                                        </div>


                                    </div>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form">
                                        <!-- text input -->

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" name="mobile" class="form-control" placeholder="Enter ...">
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
