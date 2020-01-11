@extends('front_end.book_master')

@section('book')
    <div class="new-book-area pb-100" style="padding: 20px;">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title bt text-center pt-50 mb-30 section-title-res" >
                                @if(!empty($type))
                                    <h2 >{{ $type }}</h2>
                                @endif
                            </div>

                        </div>


                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="th">
                            <div class="row">

                                @if(!empty($preview))
                                    @foreach($preview as $book)

                                            <div class="col-lg-3 col-md-4 col-sm-6">
                                                <!-- single-product-start -->

                                                <div class="product-wrapper mb-40">

                                                    <div class="product-img">

                                                        <a href="{{ url('book_view/'.$book->book_id) }}" target="_blank">
                                                            <img src="{{ '../'.$book->book_image }}" alt="book"  class="primary" />
                                                        </a>

                                                        <div class="quick-view">
                                                            <a class="action-view" href="{{ url('book_view/'.$book->book_id) }}" target="_blank"  title="Quick View">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <br>

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
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    {{ $preview->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
