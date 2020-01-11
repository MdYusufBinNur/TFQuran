@extends('admin.admin_master')

@section('title')
    ADMIN HOME
@endsection
@section('body')

    {{--<div id="load"></div>--}}

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

                                <li class="breadcrumb-item active">Editor List</li>

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
                            <div class="card-header ">
                                <div class="row">

                                    <div class="col-md-8">
                                        <h5 class="text-left" >
                                           Editor List
                                            &nbsp &nbsp
                                            @if(Session::get('message'))
                                                <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-md-4  text-right" >
                                        <a class="" href="{{ route('editor') }}">
                                            <strong> ADD NEW → </strong>
                                        </a>
                                    </div>


                                </div>


                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-responsive-md btn-table">

                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Approval</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php( $i = 1)
                                    @if(!empty($editor_lists))

                                        @foreach($editor_lists as $editor_list)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>
                                                @if($editor_list->role_id == 0)
                                                        <a onclick="set_role({{ $editor_list->id  }})" data-toggle="modal" data-target="#approval" ><i class="fa fa-circle"></i></a>

                                                    @else

                                                        <a onclick="set_role({{ $editor_list->id  }})" class="text-nowrap" data-toggle="modal" data-target="#approval"><i class="fa fa-check"></i></a>
                                                    @endif


                                                </td>
                                                <td>{{ $editor_list->name }}</td>
                                                <td>{{ $editor_list->email }}</td>
                                                <td>
                                                    @if($editor_list->role_id == 0)
                                                        -
                                                    @endif
                                                    @if($editor_list->role_id == 1)
                                                        Editor
                                                    @endif
                                                    @if($editor_list->role_id == 2)
                                                        Manager
                                                     @endif
                                                </td>
                                                <td>
                                                    <a class="btn-floating btn-sm btn-teal" title="Edit" data-toggle="modal" data-target="#edit_user" onclick="updatedEditors({{ $editor_list->id }})"><i class="fas fa-pen"></i></a>
                                                    &nbsp;
                                                    <a class="btn-floating btn-sm btn-danger ts-delete-al"  data-target="#editor_delete" data-toggle="modal" onclick="delete_editor({{ $editor_list->id }})"  title="Delete"><i class="fas fa-times"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                            </div>
                            <div class="row " style="margin: 10px">
                                <div class="col-12 float-right">
                                    {{ $editor_lists->links() }}
                                </div>
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

    <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog" role="document">

            <form  action="{{ route('update_editors') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title w-100 text-center" id="myModalLabel"><strong>Change Editor Records</strong></h4>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table">

                            <input type="text" id="editor_id" name="editor_id" hidden>
                            <tbody>
                            <tr >
                                <td>

                                    <label for="name" class="col-form-label">{{ __('Name') }}</label>

                                    <input id="editor_name" type="text" class="form-control" name="name" value="" required autofocus>

                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="email" class="col-form-label ">{{ __('E-Mail Address') }}</label>

                                    <input id="editor_email" type="email" class="form-control" name="email" value="" required>

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

    <div class="modal fade " id="editor_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-danger btn-sm" id="del">Yes</a>
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade " id="approval" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form  action="{{ route('update_role') }}" method="post">
                    @csrf
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-center" id="exampleModalLabel" style="font-family: Algerian;">Approval Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body" style="text-align: center">
                        <!--Blue select-->
                        <input type="text" name="rol_id" id="rol_id" class="form-control" hidden>
                        <select class="browser-default custom-select" name="role">
                            <option selected>select menu</option>
                            <option value="1">Make Editor</option>
                            <option value="2">Make Manager</option>
                            {{--<option value="10">Make Admin</option>--}}
                        </select>

                        <!--/Blue select-->
                    </div>
                    <div class="modal-footer" >

                        <button type="submit" class="btn btn-teal btn-sm" id="del">Approve</button>
                    </div>
                </form>

            </div>
        </div>


    </div>
    <!-- Central Modal Small -->
@endsection
