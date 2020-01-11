

    <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10 ">

                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ url('/') }}">Home</a>

                                </li>

                                <li>
                                    <a href="#">Tafhemul Quran<i class="fa fa-angle-down"></i></a>

                                    <div class="mega-menu example-1 scrollbar-deep-purple bordered-deep-purple thin">

                                        <span>
											@foreach($surah_names_first as $book)


                                                    <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>


                                            @endforeach

										</span>
                                        <span>
											@foreach($surah_name_second as $book)


                                                <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>


                                            @endforeach

										</span>
                                        <span>
											@foreach($surah_name_third as $book)


                                                <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>


                                            @endforeach

										</span>
                                        <span>
											@foreach($surah_name_fourth as $book)


                                                <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>


                                            @endforeach

										</span>

                                    </div>
                                </li>

                                <li><a href="#">Books<i class="fa fa-angle-down"></i></a>

                                    <div class="mega-menu mega-menu-3  example-1 scrollbar-deep-purple bordered-deep-purple thin">


                                        <span>


                                            @foreach($book_types as $book)

                                                @if($loop->iteration % 2 ==0)

                                                    <a href="{{ url('categorical_book_view/'.$book->book_type) }}" class="title">{{ $book->book_type}}</a>

                                                @endif

                                            @endforeach
	                                    </span>

                                        <span>
												    @foreach($book_types as $book)
                                                @if($loop->iteration % 2 !=0)
                                                    <a href="{{ url('categorical_book_view/'.$book->book_type) }}" class="title">{{ $book->book_type }}</a>
                                                @endif
                                            @endforeach
												</span>




                                    </div>
                                    {{-- <div class="sub-menu sub-menu-2">
                                         <ul>
                                             @foreach($books as $book)
                                                 <li><a href="">{{ $book->book_name }}</a></li>
                                             @endforeach
                                         </ul>
                                     </div>--}}
                                </li>

                                <li><a href="#">Authors<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu mega-menu-3  example-1 scrollbar-deep-purple bordered-deep-purple thin">
                                        <span>

                                            @foreach($authors as $book)
                                                @if($loop->iteration % 2 ==0)
                                                    <a href="{{ url('book_by_author/'.$book->author_name) }}" class="title">{{ $book->author_name}}</a>
                                                @endif
                                                {{--@if($loop->iteration == 8)--}}
                                                    {{--@break--}}
                                                {{--@endif--}}
                                            @endforeach
	                                    </span>
                                        <span>
											@foreach($authors as $book)
                                                @if($loop->iteration % 2 !=0)

                                                    <a href="{{ url('book_by_author/'.$book->author_name) }}" class="title">{{ $book->author_name }}</a>
                                                    {{--@if($loop->iteration == 7)--}}
                                                        {{--@break--}}
                                                    {{--@endif--}}
                                                @endif

                                            @endforeach

										</span>
                                    </div>
                                </li>

                                <li>
                                    <a href="#?" data-toggle="modal" data-target="#message_modal">Contact Us</a>

                                </li>

                                <li>
                                    <a href="#">Bookmarks<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu sub-menu-2  example-1 scrollbar-deep-purple bordered-deep-purple thin" >
                                        <ul id="bookmark_list">

                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-12">


                </div>
            </div>
        </div>
    </div>
    <!-- main-menu-area-end -->
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area hidden-md hidden-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul id="nav">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>

                                <li class="scrollbar-deep-purple bordered-deep-purple thin">
                                    <a href="#?">Tafheemul Quran</a>
                                    <ul>

                                                @foreach($surah_names_first as $book)

                                                    <li>
                                                        <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>
                                                    </li>

                                                @endforeach
                                                @foreach($surah_name_second as $book)

                                                    <li>
                                                        <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>
                                                    </li>

                                                @endforeach
                                                @foreach($surah_name_third as $book)

                                                    <li>
                                                        <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>
                                                    </li>

                                                @endforeach
                                                @foreach($surah_name_fourth as $book)

                                                    <li>
                                                        <a href="{{ url('surah_info/'.$book->id) }}" class="title">{{ $book->id }} {{ $book->surah_name }}</a>
                                                    </li>

                                                @endforeach
                                    </ul>
                                </li>

                                <li><a href="#?">Books</a>
                                    <ul>
                                        @foreach($book_types as $book)


                                            <li>

                                                <a href="{{ url('categorical_book_view/'.$book->book_type) }}" class="title">{{ $book->book_type}}</a>
                                            </li>

                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href="#?">Authors</a>
                                    <ul>
                                        @foreach($authors as $book)

                                                <li>
                                                    <a href="{{ url('book_by_author/'.$book->author_name) }}" class="title">{{ $book->author_name}}</a>
                                                </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href="#?">Publishers</a>
                                    <ul>
                                        @foreach($publishers as $book)

                                            <li>
                                                <a href="#" class="title">{{ $book->publisher_name}}</a>
                                            </li>


                                        @endforeach
                                    </ul>
                                </li>

                                <li>
                                    <a href="#?" class="example-1 scrollbar-deep-purple bordered-deep-purple thin">Bookmarks</a>
                                    <ul id="bookmark_listt">


                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-end -->

</header>

