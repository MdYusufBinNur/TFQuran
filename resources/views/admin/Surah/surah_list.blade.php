@extends('admin.admin_master')
@section('head')

    {{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
    <script src="https://cdn.tiny.cloud/1/mw34pc21bdb4huz4mvu639u3pka3tmggjygirmj07to8lhe8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    {{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}

    {{--<script src="{{ asset('js/tinymce.js') }}"></script>--}}
    <script type="text/javascript">

        tinymce.init({
            selector: '#surah_intro',
            plugins: 'image code',
            toolbar: 'undo redo | link image | code',
            // enable title field in the Image dialog
            image_title: true,
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: true,
            // add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            entity_encoding : "raw",
            height: 500,
        });
        tinymce.init({
            selector: '#ayah_explanation',
            plugins: 'image code',
            toolbar: 'undo redo | link image | code',
            // enable title field in the Image dialog
            image_title: true,
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: true,
            // add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            entity_encoding : "raw",
            height: 500,
        });


    </script>
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}
    {{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>--}}
@endsection
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
                            <li class="breadcrumb-item"><a href="{{ route('tfq_admin') }}">Home</a></li>
                            @if(!empty($suras->surah_name))
                                <li class="breadcrumb-item active">{{ $suras->surah_name }}</li>
                            @endif
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
                    <div class="col-lg-12 col-sm-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">

                                    <div class=" col-xs-4 col-sm-4  text-left">
                                        @if(!empty($suras))
                                        <a href="#?" onclick="export_surah({{ $suras->id }})" id="export_surah">Export in XML</a>
                                        @endif
                                    </div>
                                    <div class="col-xs-4 col-sm-4 ">
                                        <h5 class="text-center" >
                                            @if(!empty($suras->surah_name))
                                                {{ $suras->surah_name }}
                                                <br>
                                                @if(Session::get('message'))
                                                    <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                                @endif
                                            @else
                                                আল ফাতিহা
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-xs-4 col-sm-4  text-right" >
                                        <a class="" data-toggle="modal" data-target="#centralTafseerModal">
                                            <strong> SEE TAFSIR → </strong>
                                        </a>
                                    </div>


                                </div>


                            </div>
                            <div class="card-body">
                                {{--<h6 class="card-title">Special title treatment</h6>--}}
                                {{--@if(!empty($suras->surah_intro))--}}
                                {{--{{ $suras->surah_intro }}--}}
                                {{--@endif--}}

                                @if(!empty($sura_descriptions))
                                    @foreach($sura_descriptions as $sura_description)



                                        <div class="row">
                                            <div class="col-md-10">

                                                <div class="col-md-2 text-left label label-sm label-primary">
                                                    {{ $sura_description->taf_surah_id.'.'.$sura_description->ayah_no }}
                                                </div>
                                                <div class="col-md-10 text-right" style="font-size: 35px" >
                                                    <strong class="text-right">
                                                        {{ $sura_description->ayah_text }}
                                                    </strong>
                                                </div>
                                                <br>
                                                <div class="col-md-10">
                                                    <p class="text-justify" style="font-family: Kalpurush;font-size: 20px">
                                                        {{ $sura_description->token_trans }}
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="col-md-2 text-center">
                                                <a class="btn-floating btn-sm btn-dark" title="Edit" data-toggle="modal" data-target="#centralModalSm" onclick="updatedSura( '{{ $sura_description->taf_surah_id}}' ,' {{ $sura_description->ayah_no }}','{{ $sura_description->taf_token_no }}' )"><i class="fas fa-pen"></i></a>
                                                <a class="btn-floating btn-sm btn-danger t-delete-alt"  data-toggle="modal" data-target="#delete_ayah"   onclick="delete_ayah('{{ $sura_description->taf_ayah_id }}','{{ $sura_description->taf_token_no }}')" title="Delete"><i class="fas fa-times"></i></a>
                                            </div>

                                        </div>
                                        <hr>
                                    @endforeach
                                @elseif(!empty($sura_fatiha))
                                    @foreach($sura_fatiha as $sura_description)
                                        <div class="row">
                                            <div class="col-md-10">

                                                <div class="col-md-2 text-left label label-sm label-primary">
                                                    <span class="" title="Surah & Ayah No">{{ $sura_description->taf_surah_id.'.'.$sura_description->ayah_no }}</span></div>
                                                <div class="col-md-10 text-right" style="font-size: 25px" >
                                                    <strong>
                                                        {{ $sura_description->ayah_text }}
                                                    </strong>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    {{ $sura_description->token_trans }}
                                                </div>

                                            </div>
                                            <div class="col-md-2 text-center">
                                                <a class="btn-floating btn-sm btn-dark" title="Edit" data-toggle="modal" data-target="#centralModalSm" onclick="updatedSura( '{{ $sura_description->taf_surah_id}}' ,' {{ $sura_description->ayah_no }}','{{ $sura_description->taf_token_no }}' )"><i class="fas fa-pen"></i></a>
                                                <a class="btn-floating btn-sm btn-danger t-delete-alt"  data-toggle="modal" data-target="#delete_ayah"   onclick="delete_ayah('{{ $sura_description->taf_ayah_id }}','{{ $sura_description->taf_token_no }}')" title="Delete"><i class="fas fa-times"></i></a>
                                            </div>

                                        </div>
                                        <hr>
                                    @endforeach
                                @endif

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
    <!-- Central Modal Small -->
    <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg " role="document">

            <form action="{{ url('editSurah') }}" method="post" accept-charset="UTF-8">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        @if(!empty($suras->surah_name))
                            <h4 class="modal-title w-100 text-center" id="myModalLabel"><strong>{{ $suras->surah_name }}</strong></h4>
                        @endif

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>


                            </thead>
                            <tbody>
                            <tr hidden>
                                <td> <input type="number" name="ayah_id" id="ayah_id" class="form-control" ></td>
                            </tr>
                            <tr>

                                <td>Ayah No</td>
                                <td> <input type="number" name="ayah_no" id="ayah_no" class="form-control"></td>
                                <td>Token No</td>
                                <td> <input type="number" name="token_no" id="token_no" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Ayah Text</td>
                                <td colspan="4">  <input type="text" class="form-control" id="ayah_text" name="ayah_text"></td>
                            </tr>
                            <tr>
                                <td>Ayah Translation</td>
                                <td colspan="4">  <input type="text" class="form-control" id="ayah_translation" name="ayah_translation"></td>
                            </tr>
                            <tr>
                                <td>Token Explanation No</td>
                                <td colspan="4">  <input type="text" class="form-control" id="token_expl_no" name="token_expl_no" > </td>
                            </tr>
                            <tr>
                                <td>Ayah Explanation</td>
                                <td colspan="4">
                                    <textarea type="text" rows="5" class="form-control" id="ayah_explanation" name="ayah_explanation" >

                                    </textarea>
                                </td>
                            </tr>


                            <tr hidden>
                                <td>Select Image</td>
                                <td colspan="4">
                                    <select class="browser-default custom-select" name="image">
                                        <option value="" disabled >Choose your option</option>
                                        <option value="null" selected>Remove Image</option>
                                        {{--@if(!empty($all_images))--}}
                                            {{--@foreach($all_images as $all_image)--}}
                                                {{--<option value="{{ $all_image->image }}" name="image" class="rounded-circle">--}}
                                                    {{--{!! $all_image->image_name !!}--}}
                                                {{--</option>--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <img src="" id="preview_token_iamge" alt="">
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

    <div class="modal fade" id="centralTafseerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg " role="document">

            <form action="{{ url('editSurahsItro') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        @if(!empty($suras->surah_name))
                            <h4 class="modal-title w-100 text-center" id="myModalLabel"><strong>{{ $suras->surah_name }}</strong></h4>
                        @else
                            <h4 class="modal-title w-100 text-center" id="myModalLabel"><strong>আল ফাতিহা</strong></h4>
                        @endif

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">

                            <tbody>
                            <tr hidden>
                                <td>
                                    @if(!empty($surah_intro->id))
                                        <input type="text" name="surah_no" id="surah_no" class="form-control"   value="{{ $surah_intro->id }}">
                                    @else

                                        {{--<input type="text" name="surah_no" id="surah_no" class="form-control"   value="{{  $surah_fatiha_intro->id }}">--}}

                                    @endif
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    {{--<div id="summernote">--}}

                                        {{--<textarea name="surah_intro" id="surah_intro" style="white-space: pre-line;height: 200px" class="form-control" >--}}
                                            {{--@if(!empty($surah_intro))--}}
                                                {{--{{ $surah_intro }}--}}

                                            {{--@else--}}
                                                {{--{{  strip_tags($surah_fatiha_intro->surah_intro) }}--}}
                                            {{--@endif--}}
                                        {{--</textarea>--}}

                                    {{--</div>--}}
                                        <textarea type="text" style="height: 450px;white-space: pre-line" class="form-control" id="surah_intro" name="surah_intro"   >



                                                @if(!empty($surah_intro->surah_intro))
                                                     {{ $surah_intro->surah_intro }}
{{--                                                     {{ strip_tags($surah_intro->surah_intro) }}--}}

                                                @else
{{--                                                    {{  strip_tags($surah_fatiha_intro->surah_intro) }}--}}
                                                {{ $surah_fatiha_intro->surah_intro }}
                                                @endif



                                        </textarea>

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

    <div class="modal fade" id="addnewuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg " role="document">

            <form  action="{{ route('register_editors') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title w-100 text-center" id="myModalLabel"><strong>Register New user</strong></h4>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table">

                            <tbody>
                            <tr>
                                <td>

                                    <label for="name" class="col-form-label">{{ __('Name') }}</label>

                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="glyphicon glyphicon-envelope form-control-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="email" class="col-form-label ">{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="glyphicon glyphicon-envelope form-control-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </td>

                            </tr>

                            <tr>

                                <td>
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="glyphicon glyphicon-lock form-control-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </td>

                            </tr>

                            <tr>

                                <td>
                                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>


                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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

    <div class="modal fade " id="delete_ayah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <form action=""></form>
        <div class="modal-dialog" role="document">

            <form action="{{ url('delete_ayah_trans') }}" method="post" accept-charset="UTF-8">
                @csrf
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

                    <input type="text" name="token_no" id="del_token_noo" hidden="">

                    <input type="text" name="ayah_id" id="del_ayah_no" hidden>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="materialUnchecked" value="all_ayah_trans" name="materialExampleRadios">
                                <label class="form-check-label" for="materialUnchecked">DELETE AYAH & TRANSLATION</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="materialChecked" value="only_trans" name="materialExampleRadios" checked>
                                <label class="form-check-label" for="materialChecked">DELETE TRANSLATION</label>
                            </div>
                        </div>
                    </div>


                    <!-- Material checked -->

                </div>


                <div class="modal-footer" >
                    <a  class="btn btn-dark btn-sm " data-dismiss="modal">Close</a>
                    <button type="submit"  class="btn btn-danger btn-sm" id="del_ayah">Yes</button>
                </div>
            </div>
            </form>
        </div>

    </div>

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>--}}

    <script>
        // $(document).ready(function() {
        //     $('#summernote').summernote();
        //     $('.note-popover').hide();
        // });
        function export_surah(id) {
            $('#export_surah').attr("href","../export_surah/"+id)
        }

    </script>

    <!-- Central Modal Small -->
@endsection
