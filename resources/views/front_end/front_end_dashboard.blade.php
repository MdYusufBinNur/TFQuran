@extends('front_end.frond_end_master')

@section('book')

    <div class="slider-area">

        @if(!empty($slider_image_first && $slider_image_second))
            <div class="slider-area">

                <div class="slider-active owl-carousel">
                    <div class="single-slider pt-135 pb-180 bg-img" style="background-image:url({{ $slider_image_first->slider_image }});">
                        <div class="container">
                            <div class="slider-content-3 slider-animated-1">
                                <h1>SAIMOOM <br>DIGITAL <BR>LIBRARY</h1>
                                <p class="slider-sale">

                                </p>
                                <a href="#">A ONLINE BOOK LIBRARY</a>
                            </div>
                        </div>
                    </div>

                    <div class="single-slider pt-135 pb-180 bg-img" style="background-image:url({{ $slider_image_second->slider_image }});">
                        <div class="container">
                            <div class="slider-content-3 slider-animated-1">
                                <h1>HUGE <br> COLLECTION<br> OF BOOKS</h1>
                                <p class="slider-sale">

                                </p>
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else

            <div class="slider-active owl-carousel">
                <div class="single-slider pt-135 pb-180 bg-img" style="background-image:url({{asset('front_end/img/slider/10.jpg')}});">
                    <div class="container">
                        <div class="slider-content-3 slider-animated-1">
                            <h1>SAIMOOM <br>DIGITAL <BR>LIBRARY</h1>
                            <p class="slider-sale">

                            </p>
                            <a href="#">A ONLINE BOOK LIBRARY</a>
                        </div>
                    </div>
                </div>

                <div class="single-slider pt-135 pb-180 bg-img" style="background-image:url({{asset('front_end/img/slider/9.jpg')}});">
                    <div class="container">
                        <div class="slider-content-3 slider-animated-1">
                            <h1>HUGE <br> COLLECTION<br> OF BOOKS</h1>
                            <p class="slider-sale">

                            </p>
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <div class="new-book-area pb-100" style="padding: 20px;">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title bt text-center pt-50 mb-30 section-title-res" >
                                <h2 style="padding: 10px">New Books</h2>

                            </div>

                        </div>


                    </div>
                    <div class="tab-active owl-carousel" style="padding: 10px">

                        @if(!empty($newbooks))
                            @foreach($newbooks as $book)

                                    <div class="tab-total">
                                        <!-- single-product-start -->

                                        <div class="product-wrapper mb-40">

                                            <div class="product-img">

                                                <a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">
                                                    <img src="{{ $book->book_image }}" alt="book"  class="primary" />
                                                </a>

                                                <div class="quick-view">
                                                    <a class="action-view" href="{{ url('book_view/'.$book->book_id) }}" target="_blank"  title="Quick View">
                                                        <i class="fa fa-eye"></i>

                                                    </a>
                                                    <br>

                                                </div>

                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span> <br></li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="product-details text-center">
                                                <h4><a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">{{ $book->book_name }}</a></h4>
                                            </div>
                                            <div class="text-center">
                                                <p>{{ $book->author_name }}</p>
                                            </div>

                                        </div>
                                    </div>

                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="new-book-area pb-100" >

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="section-title bt text-left pt-50 mb-30 section-title-res" >
                                <h2 style="padding: 10px">Islamic Books</h2>

                            </div>

                        </div>
                        <div class="col-xs-6">
                            <div class="section-title bt text-right pt-50 mb-30 section-title-res">
                                <a href="{{ url('categorical_book_view/Islamic') }}" class="btn btn-outline-dark btn-rounded  btn-lg ">VIEW ALL</a>
                            </div>

                        </div>

                    </div>
                    <div class="tab-active owl-carousel" style="padding: 10px">

                        @if(!empty($books))
                            @foreach($books as $book)
                                @if($book->type == 'Islamic')
                                    <div class="tab-total">
                                        <!-- single-product-start -->
                                        <input type="text" id="book_type_id" name="book_type_id" hidden value="{{ $book->type }}">
                                        <div class="product-wrapper mb-40">

                                            <div class="product-img">

                                                <a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">
                                                    <img src="{{ $book->book_image }}" alt="book"  class="primary" />
                                                </a>

                                                <div class="quick-view">
                                                    <a class="action-view" href="{{ url('book_view/'.$book->book_id) }}" target="_blank"  title="Quick View">
                                                        <i class="fa fa-eye"></i>

                                                    </a>
                                                    <br>

                                                </div>

                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span> <br></li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="product-details text-center">
                                                <h4><a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">{{ $book->book_name }}</a></h4>
                                            </div>
                                            <div class="text-center">
                                                <p>{{ $book->author_name }}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="new-book-area pb-100" >

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="section-title bt text-left pt-50 mb-30 section-title-res" >
                                <h2 style="padding: 10px">Kid's Books</h2>

                            </div>

                        </div>
                        <div class="col-xs-6">
                            <div class="section-title bt text-right pt-50 mb-30 section-title-res">
                                <a href="{{ url('categorical_book_view/Kids') }}" class="btn btn-outline-dark btn-rounded  btn-lg " >VIEW ALL</a>
                            </div>

                        </div>

                    </div>
                    <div class="tab-active owl-carousel" style="padding: 10px">

                        @if(!empty($books))
                            @foreach($books as $book)
                                @if($book->type == 'Kids')
                                    <div class="tab-total">
                                        <!-- single-product-start -->

                                        <div class="product-wrapper mb-40">

                                            <div class="product-img">

                                                <a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">
                                                    <img src="{{ $book->book_image }}" alt="book"  class="primary" />
                                                </a>

                                                <div class="quick-view">
                                                    <a class="action-view" href="{{ url('book_view/'.$book->book_id) }}" target="_blank"  title="Quick View">
                                                        <i class="fa fa-eye"></i>

                                                    </a>
                                                    <br>

                                                </div>

                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span> <br></li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="product-details text-center">
                                                <h4><a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">{{ $book->book_name }}</a></h4>
                                            </div>
                                            <div class="text-center">
                                                <p>{{ $book->author_name }}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="new-book-area pb-100" >

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="section-title bt text-left pt-50 mb-30 section-title-res" >
                                <h2 style="padding: 10px">Science fiction</h2>

                            </div>

                        </div>
                        <div class="col-xs-6">
                            <div class="section-title bt text-right pt-50 mb-30 section-title-res">
                                <a  href="{{ url('categorical_book_view/Science fiction') }}" class="btn btn-outline-dark btn-rounded  btn-lg " >VIEW ALL</a>
                            </div>

                        </div>

                    </div>
                    <div class="tab-active owl-carousel" style="padding: 10px">

                        @if(!empty($books))
                            @foreach($books as $book)
                                @if($book->type == 'Science fiction')
                                    <div class="tab-total">
                                        <!-- single-product-start -->

                                        <div class="product-wrapper mb-40">

                                            <div class="product-img">

                                                <a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">
                                                    <img src="{{ $book->book_image }}" alt="book"  class="primary" />
                                                </a>

                                                <div class="quick-view">
                                                    <a class="action-view" href="{{ url('book_view/'.$book->book_id) }}" target="_blank"  title="Quick View">
                                                        <i class="fa fa-eye"></i>

                                                    </a>
                                                    <br>

                                                </div>

                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span> <br></li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="product-details text-center">
                                                <h4><a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">{{ $book->book_name }}</a></h4>
                                            </div>
                                            <div class="text-center">
                                                <p>{{ $book->author_name }}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="new-book-area pb-100" >

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="section-title bt text-left pt-50 mb-30 section-title-res" >
                                <h2 style="padding: 10px">Historical fiction</h2>

                            </div>

                        </div>
                        <div class="col-xs-6">
                            <div class="section-title bt text-right pt-50 mb-30 section-title-res">
                                <a href="{{ url('categorical_book_view/Historical fiction') }}" class="btn btn-outline-dark btn-rounded  btn-lg " >VIEW ALL</a>
                            </div>

                        </div>

                    </div>
                    <div class="tab-active owl-carousel" style="padding: 10px">

                        @if(!empty($books))
                            @foreach($books as $book)
                                @if($book->type == 'Historical fiction')
                                    <div class="tab-total">
                                        <!-- single-product-start -->

                                        <div class="product-wrapper mb-40">

                                            <div class="product-img">

                                                <a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">
                                                    <img src="{{ $book->book_image }}" alt="book"  class="primary" />
                                                </a>

                                                <div class="quick-view">
                                                    <a class="action-view" href="{{ url('book_view/'.$book->book_id) }}" target="_blank"  title="Quick View">
                                                        <i class="fa fa-eye"></i>

                                                    </a>
                                                    <br>

                                                </div>

                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span> <br></li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="product-details text-center">
                                                <h4><a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">{{ $book->book_name }}</a></h4>
                                            </div>
                                            <div class="text-center">
                                                <p>{{ $book->author_name }}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="new-book-area pb-100" >

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="section-title bt text-left pt-50 mb-30 section-title-res" >
                                <h2 style="padding: 10px">Poetry</h2>

                            </div>

                        </div>
                        <div class="col-xs-6">
                            <div class="section-title bt text-right pt-50 mb-30 section-title-res">
                                <a href="{{ url('categorical_book_view/Poetry') }}"  class="btn btn-outline-dark btn-rounded  btn-lg " >VIEW ALL</a>
                            </div>

                        </div>

                    </div>
                    <div class="tab-active owl-carousel" style="padding: 10px">

                        @if(!empty($books))
                            @foreach($books as $book)
                                @if($book->type == 'Poetry')
                                    <div class="tab-total">
                                        <!-- single-product-start -->

                                        <div class="product-wrapper mb-40">

                                            <div class="product-img">

                                                <a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">
                                                    <img src="{{ $book->book_image }}" alt="book"  class="primary" />
                                                </a>

                                                <div class="quick-view">
                                                    <a class="action-view" href="{{ url('book_view/'.$book->book_id) }}" target="_blank"  title="Quick View">
                                                        <i class="fa fa-eye"></i>

                                                    </a>
                                                    <br>

                                                </div>

                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span> <br></li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="product-details text-center">
                                                <h4><a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">{{ $book->book_name }}</a></h4>
                                            </div>
                                            <div class="text-center">
                                                <p>{{ $book->author_name }}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>


@endsection

