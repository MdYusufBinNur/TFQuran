<aside class="main-sidebar sidebar-dark-primary elevation-4 " >
    <!-- Brand Logo -->
    <a href="{{ route('tfq_admin') }}" class="brand-link" style="background-color: #0d0d0d">
        <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Saimoom Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ Auth::user()->name  }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{--<li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>--}}

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Author
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('add_new_author') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Author</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('author_list') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p> Author List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Publishers
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('add_new_publisher') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Publishers</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('publisher_list') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p> Publishers List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Category
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('add_new_category') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('category_list') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p> Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Book Type
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('add_new_book_type') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Book Type</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('book_type_list') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p> Type List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Books
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('add_new_book') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New Book</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('book_list') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p> Book List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Web Info
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('slider') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New Slider</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('slider_list') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p> Slider List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('about') }}"  class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add About Information</p>
                            </a>
                        </li>
                    </ul>


                </li>


                @if(Auth::user()->role_id == 10)
                    <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Editors
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            {{--<a data-target="#addnewuser" data-toggle="modal" class="nav-link">--}}
                            <a href="{{ route('editor')  }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New Editor</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            {{--<a data-target="#addnewuser" data-toggle="modal" class="nav-link">--}}
                            <a href="{{ route('editor_list')  }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Editors List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    <li class="nav-item">
                        <a href="{{ route('comment_list') }}" class="nav-link">
                            <i class="nav-icon fa fa-sms"></i>
                            <p>
                                Comments List
                                <span class="right badge badge-success">New</span>
                            </p>
                        </a>
                    </li>
                @endif

                    <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Ayah & Tafsir Image
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('add_ayah') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>
                                    Add New Ayah
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            {{--<a data-target="#addnewuser" data-toggle="modal" class="nav-link">--}}
                            <a href="{{ route('add_tafsir_image')  }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Image</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(empty($allSuras))

                <li class="nav-item">
                    <a href="{{ route('allsuras') }}" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            See All Suras

                        </p>
                    </a>
                </li>
                @endif
                @if(!empty($allSuras))
                    @php( $i = 1 )
                    @foreach($allSuras as $allSura)
                        <li class="nav-item">
                            <a href="{{ route('single_sura',[$allSura->taf_surah_id]) }}" class="nav-link" >
                                <i class="nav-icon">
                                    <button class="btn-floating btn-sm blue-gradient" style="color: white">{{ $i++ }}</button>

                                </i>

                                <p class="text-white">
                                    {{ $allSura->taf_surah_name }}
                                    {{--<span class="right badge badge-danger">New</span>--}}
                                </p>
                            </a>
                        </li>

                    @endforeach
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
