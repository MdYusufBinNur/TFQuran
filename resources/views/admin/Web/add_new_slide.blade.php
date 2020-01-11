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

                            <li class="breadcrumb-item active"> </li>

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
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <div class="card card-dark">
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-8">
                                        <h5 class="text-left" >
                                            ADD NEW SLIDER
                                            <br>
                                            @if(Session::get('message'))
                                                <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-md-4  text-right" >
                                        <a class="" href="{{ route('slider_list') }}">
                                            <strong> SLIDER LIST → </strong>
                                        </a>
                                    </div>


                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" action="{{ url('save_slider_image') }}" method="POST" enctype="multipart/form-data">
                                    <!-- text input -->

                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Slider Image Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Slider name" id="slider_image" name="image_name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
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
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <div class="form-group">
                                                <button class="btn btn-dark btn-sm btn-rounded" type="submit">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
@endsection
