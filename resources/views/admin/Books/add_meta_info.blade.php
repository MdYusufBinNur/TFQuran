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
                                           ADD META INFORMATION TO " {{ $book_name->book_name }} " BOOK
                                            &nbsp &nbsp

                                        </h5>
                                    </div>
                                    <div class="col-md-4  text-right" >
                                        <a class="" href="{{ route('book_list') }}">
                                            <strong> BOOK LIST → </strong>
                                        </a>
                                    </div>


                                </div>
                                <div class="row ">
                                    <div class="col-12 text-center">

                                        @if(Session::get('message'))
                                            <hr>
                                            <span id="" class="text-center"> {{ Session::get('message') }}</span>
                                        @endif
                                    </div>

                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <div class="form-check " id="add_meta_info_check">
                                                <input type="checkbox" class="form-check-input" id="materialUnchecked" name="check">
                                                <label class="form-check-label" for="materialUnchecked">Add meta info to existing chapter </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <form role="form" action="{{ route('meta_info') }}" method="POST" enctype="multipart/form-data" id="new_meta_info">
                                    <!-- text input -->

                                    @csrf
                                    <div class="row">


                                        <div class="col-12" hidden>
                                            <div class="form-group">
                                                <label>Book Id</label>
                                                <input type="text" class="form-control" placeholder="Enter Book name" id="book_id" name="book_id" required value="{{ $book_id }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Chapter No</label>

                                                @if(!empty($chapter_no))
                                                <input type="number" step="0.01" min="0" lang="en" class="form-control" placeholder="Enter Chapter No" id="chapter_no" name="chapter_no" value="{{ $chapter_no }}" required>
                                                @else
                                                    <input type="number" step="0.01" min="0" lang="en" class="form-control" placeholder="Enter Chapter No" id="chapter_no" name="chapter_no" required>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Chapter Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Chapter Name" id="chapter_name" name="chapter_name" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Sub Chapter No</label>
                                                <input type="number" step="0.01" min="0" lang="en"  class="form-control" placeholder="Enter Sub Chapter No" id="sub_chapter_no" name="sub_chapter_no" >
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Sub Chapter Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Chapter No" id="sub_chapter_name" name="sub_chapter_name" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meta_info">Meta Info</label>
                                                <textarea type="text" rows="3" class="form-control" id="meta_info" name="meta_info"></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-dark btn-sm btn-rounded" type="submit">Create</button>
                                        </div>
                                    </div>

                                </form>

                                <form role="form" action="{{ route('update_meta_info') }}" method="POST" enctype="multipart/form-data" id="new_meta_info_to_existing">
                                    <!-- text input -->

                                    @csrf
                                    <div class="row">

                                        <div class="col-12" hidden>
                                            <div class="form-group">
                                                <label>Book Id</label>
                                                <input type="text" class="form-control" placeholder="Enter Book name" id="book_id" name="book_id" required value="{{ $book_id }}">
                                            </div>
                                        </div>
                                        <div class="col-12" hidden>
                                            <div class="form-group">
                                                <label> Id</label>
                                                <input type="text" class="form-control" placeholder="Enter Book name" id="selected_book_id" name="selected_book_id" >
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Chapter No</label>
                                                <select class="browser-default custom-select" name="chapter_no" id="ex_chapter_no" onchange="getValues(this)">
                                                    <option selected>Select Chapter</option>
                                                    @if(!empty($books_chapter))
                                                        @foreach($books_chapter as $book)
                                                            <option value="{{ $book->chapter_no }}">{{ $book->chapter_no }}</option>
                                                        @endforeach
                                                    @endif
                                                    {{--<option value="Bengali">Bengali</option>--}}
                                                    {{--<option value="English">English</option>--}}
                                                    {{--<option value="Arabic">Arabic</option>--}}

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Chapter Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Chapter Name" id="ex_chapter_name" name="chapter_name" required >
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Sub Chapter No</label>
                                                <select class="browser-default custom-select"  name="sub_chapter_no " id='ex_sub_chapter_no' onchange="getSubChapterName(this)">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Sub Chapter Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Chapter No" id="ex_sub_chapter_name" name="sub_chapter_name" >
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meta_info">Meta Info</label>
                                                <textarea type="text" rows="3" class="form-control" id="ex_meta_info" name="meta_info"></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-dark btn-sm btn-rounded" type="submit">Create</button>
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

