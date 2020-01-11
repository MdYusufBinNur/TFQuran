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
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <div class="card card-dark">
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-8">
                                        <h5 class="text-left" >
                                            CREATE A NEW BOOK
                                            &nbsp &nbsp
                                            @if(Session::get('message'))
                                                <span id="message" class="text-center"> {{ Session::get('message') }}</span>
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-md-4  text-right" >
                                        <a class="" href="{{ route('book_list') }}">
                                            <strong> BOOK LIST → </strong>
                                        </a>
                                    </div>


                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" action="{{ route('add_book') }}" method="POST" enctype="multipart/form-data">
                                    <!-- text input -->

                                    @csrf
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Book Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Book name" id="book_name" name="book_name" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Author</label>
                                                <select class="browser-default custom-select" name="author_name" id="author_name">
                                                    <option selected>Select Author</option>

                                                    @if(!empty($authors))
                                                        @foreach($authors as $author)
                                                            <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                                        @endforeach
                                                    @endif

                                                    {{--<option value="10">Make Admin</option>--}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Publisher</label>
                                                <select class="browser-default custom-select" name="publisher_name" id="publisher_name">
                                                    <option selected>Select Publisher</option>
                                                    @if(!empty($publishers))
                                                        @foreach($publishers as $publisher)
                                                            <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
                                                        @endforeach
                                                    @endif
                                                    {{--<option value="10">Make Admin</option>--}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Languages</label>
                                                <select class="browser-default custom-select" name="language_name" id="language_name">
                                                    <option selected>Select Language</option>
                                                    <option value="Bengali">Bengali</option>
                                                    <option value="English">English</option>
                                                    <option value="Arabic">Arabic</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">

                                                        <select id="category_name" class="mdb-select md-form" multiple searchable="Search for..." name="category_name[]" >
                                                            <option value="" disabled selected>Select Category</option>
                                                            @if(!empty($categories))
                                                                @foreach($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Topics Name</label>
                                                <input type="text" class="form-control" placeholder="Topics" id="topics_name" name="topics_name" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Book Type</label>

                                                    <select class="browser-default custom-select" name="book_type" id="book_type" required>
                                                        <option value="" disabled selected>Select Book Types</option>
                                                        @if(!empty($booktypes))
                                                            @foreach($booktypes as $booktype)
                                                                <option value="{{ $booktype->book_type }}">{{ $booktype->book_type }}</option>
                                                            @endforeach
                                                        @endif
                                                        {{--<option value="Action and adventure">Action and adventure</option>
                                                        <option value="Health">Health</option>
                                                        <option value="Historical fiction">Historical fiction</option>
                                                        <option value="Horror">Horror</option>
                                                        <option value="Islamic">Islamic</option>
                                                        <option value="Kids">Kid's</option>
                                                        <option value="Poetry">Poetry</option>
                                                        <option value="Science fiction">Science fiction</option>
                                                        <option value="Textbook">Textbook</option>
                                                        <option value="Thriller">Thriller</option>--}}

                                                    </select>


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
