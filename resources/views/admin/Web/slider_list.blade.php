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
                                    AUTHOR LIST
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
                                                IMAGE LIST
                                            </strong>
                                            <br>
                                            @if(Session::get('message'))
                                                <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-md-4  text-right" >
                                        <a class="" href="{{ route('slider') }}">
                                            <strong> ADD NEW → </strong>
                                        </a>
                                    </div>


                                </div>


                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-responsive-md btn-table">

                                    <thead>
                                    <tr class="text-center">
                                        <th>SL</th>

                                        <th>Name</th>
                                        <th>Image</th>

                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php( $i = 1)
                                    @if(!empty($all_Images))

                                        @foreach($all_Images as $all_Image)
                                            <tr class="text-center">
                                                <td scope="row">{{ $i++ }}</td>

                                                <td>{{ $all_Image->slider_name }}</td>
                                                <td><img src="{{ $all_Image->slider_image }}" alt="" width="300" height="100"></td>

                                                <td>
                                                    {{--<a class="btn-floating btn-sm btn-teal" title="Edit" data-toggle="modal" data-target="#edit_image" onclick="update_image({{ $all_Image->id }})"><i class="fas fa-pen"></i></a>--}}
                                                    &nbsp;
                                                    <a class="btn-floating btn-sm btn-danger ts-delete-al"  data-target="#slider_iamge" data-toggle="modal" onclick="del_slider({{ $all_Image->id }})"  title="Delete"><i class="fas fa-times"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                            </div>
                            <div class="row" style="margin: 20px">
                                {{ $all_Images->links() }}
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


    <div class="modal fade " id="slider_iamge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <a type="button" class="btn btn-danger btn-sm" id="del_img">Yes</a>
                </div>
            </div>
        </div>


    </div>


@endsection
<script>
    function del_slider(id)
    {
        //alert(id);
        $("#del_img").attr("href", "/del_slider/" + id);
    }

</script>
