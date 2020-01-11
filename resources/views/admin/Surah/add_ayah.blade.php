@extends('admin.admin_master')

@section('title')
    ADMIN HOME
@endsection
@section('body')

    <div id="load"></div>
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

                            <li class="breadcrumb-item active"></li>

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

                                    <div class="col-md-12">
                                        <h5 class="text-center dynamic_name" >
                                            CREATE A NEW AYAH
                                            <br>
                                            @if(Session::get('message'))
                                                <span id="" class="text-center"> {{ Session::get('message') }}</span>
                                            @endif
                                        </h5>
                                    </div>

                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <div class="form-check " id="update_ayah_record">
                                                <input type="checkbox" class="form-check-input surha_record" id="materialUnchecked" name="check">
                                                <label class="form-check-label" for="materialUnchecked">Update record from existing surah details </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row add_new_ayah_form">
                                    <form action="{{ url('/save_ayah') }}" method="post">
                                        @csrf
                                        <input type="text" name="key" value="new_ayah" hidden>
                                        <div class="row">

                                            <div class="col-12">
                                                <table class="table">
                                                    <thead>


                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>
                                                            Surah
                                                        </td>
                                                        <td>
                                                            <div class="form-group">


                                                                <select class="browser-default custom-select" name="surah_no" id="surah_no" required >
                                                                    <option value="" disabled selected>Select Surah</option>
                                                                    @if(!empty($all_surahs))
                                                                        @foreach($all_surahs as $all_surah)
                                                                            <option value="{{ $all_surah->taf_surah_id }}">{{ $all_surah->taf_surah_name }}</option>
                                                                        @endforeach
                                                                    @endif

                                                                </select>


                                                            </div>
                                                        </td>
                                                        <td>Ayah No</td>
                                                        <td> <input type="number" name="ayah_no" id="ayah_no" class="form-control"></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Ayah Text</td>
                                                        <td colspan="4">

                                                            <textarea type="text" rows="2" class="form-control" id="ayah_text" name="ayah_text"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Token No</td>
                                                        <td>
                                                            <input type="number" name="token_no" id="token_no" class="form-control">
                                                        </td>
                                                        <td><label for="token_expl_no"></label>Token Expl No </td>
                                                        <td>
                                                            <input type="number" name="token_expl_no" id="token_expl_no" class="form-control">
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Ayah Translation</td>
                                                        <td colspan="4">
                                                            <textarea type="text" rows="2" class="form-control" id="ayah_translation" name="ayah_translation"></textarea>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ayah Explanation</td>
                                                        <td colspan="4">
                                                        <textarea type="text" rows="3" class="form-control" id="ayah_explanation" name="ayah_explanation">

                                                        </textarea>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Select Image
                                                        </td>
                                                        <td colspan="3">
                                                            <div class="form-group">


                                                                <select class="browser-default custom-select" name="image">
                                                                    <option value="" disabled selected>Choose An Image</option>
                                                                    @if(!empty($all_images))
                                                                        @foreach($all_images as $all_image)
                                                                            <option value="{{ $all_image->image }}" name="image" class="rounded-circle">
                                                                                {!! $all_image->image_name !!}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif


                                                                </select>



                                                            </div>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12 text-right">
                                                <button type="submit" class="btn btn-dark btn-rounded btn-sm">Add New Records</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="row update_record_form">
                                    <form action="{{ url('/save_ayah') }}" method="post">
                                        @csrf
                                        <input type="text" name="key" value="old_ayah" hidden>
                                        <div class="row">

                                            <div class="col-12">
                                                <table class="table">
                                                    <thead>


                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>
                                                            Surah
                                                        </td>
                                                        <td>
                                                            <div class="form-group">


                                                                <select class="browser-default custom-select" name="ex_surah_no" id="ex_surah_no" onchange="getAyahs(this)" required >
                                                                    <option value="" disabled selected>Select Surah</option>
                                                                    @if(!empty($all_surahs))
                                                                        @foreach($all_surahs as $all_surah)
                                                                            <option value="{{ $all_surah->taf_surah_id }}">{{ $all_surah->taf_surah_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>


                                                            </div>
                                                        </td>
                                                        <td>Ayah No</td>
                                                        <td>
                                                            <div class="form-group">


                                                                <select class="browser-default custom-select" name="ex_ayah_id" id="ex_ayah_no"  required >
                                                                    <option value="" disabled selected>Select Ayah No</option>

                                                                </select>


                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>Token No</td>
                                                        <td>
                                                            <input type="number" name="token_no" id="ex_token_no" class="form-control" required>
                                                        </td>
                                                        <td><label for="token_expl_no"></label>Token Expl No </td>
                                                        <td>
                                                            <input type="number" name="token_expl_no" id="token_expl_no" class="form-control">
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Ayah Translation</td>
                                                        <td colspan="4">
                                                            <textarea type="text" rows="2" class="form-control" id="ayah_translation" name="ayah_translation"></textarea>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ayah Explanation</td>
                                                        <td colspan="4">
                                                        <textarea type="text" rows="3" class="form-control" id="ayah_explanation" name="ayah_explanation">

                                                        </textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            Select Image
                                                        </td>
                                                        <td colspan="3">
                                                            <div class="form-group">


                                                                <select class="browser-default custom-select" name="image">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    @if(!empty($all_images))
                                                                        @foreach($all_images as $all_image)
                                                                            <option value="{{ $all_image->image }}" name="image" class="rounded-circle">
                                                                                {!! $all_image->image_name !!}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif


                                                                </select>



                                                            </div>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12 text-right">
                                                <button type="submit" class="btn btn-dark btn-rounded btn-sm">Add New Records</button>
                                            </div>
                                        </div>
                                    </form>
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


@endsection
