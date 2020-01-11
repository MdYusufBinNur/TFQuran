<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>TF Quran</title>

    <link rel=icon type=image/png sizes=32x32 href="{{ asset('img/quran.png') }}">
    {{--<!-- Font Awesome Icons -->--}}
    {{--<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">--}}
    {{--<!-- Theme style -->--}}
    {{--<link rel="stylesheet" href="dist/css/adminlte.min.css">--}}
    {{--<!-- Google Font: Source Sans Pro -->--}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('pro/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('pro/css/mdb.min.css') }}">


    <style>
        #load{
            width:100%;
            height:100%;
            position:fixed;
            z-index:9999;
            background:url("https://www.creditmutuel.fr/cmne/fr/banques/webservices/nswr/images/loading.gif") no-repeat center center rgba(0,0,0,0.25)
        }
    </style>
    {{--background:url({{ asset('img/loaderimage.gif') }}) no-repeat center center rgba(0,0,0,0.25)--}}
</head>


<body class="wrapper" onload="fetchBookmarks()">
<div id="load"></div>
<div class="content">
    <!-- Content Header (Page header) -->
    @if(!empty($preview))
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">


                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row fixed-top" style="margin-bottom: 10px">
                <div class="col-sm-2"></div>
                <div class="col-sm-8"></div>
                <div class="col-sm-2">
                    {{--<a class="btn btn-floating btn-dark"  href="javascript:void(0)" onClick="return rudr_favorite(this); " title="Bookmark This Book"><i class="fa fa-star"></i> Bookmark</a>--}}
                    {{--<br>--}}
                    <a class="btn btn-floating btn-primary" data-toggle="modal" data-target="#modalPush" href="javascript:void(0)"  title="Comments"><i class="fa fa-comment"></i> Comments</a>

                </div>
            </div>
            <div class="row">


                <!-- /.col-md-6 -->

                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="card " style="max-height: 780px">
                        {{--<div class="card-header">--}}
                            {{--<div class="row">--}}

                                {{--<div class="col-sm-12">--}}
                                    {{--<h5 class="text-center" >--}}
                                        {{--BOOK NAME--}}

                                    {{--</h5>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row text-center">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6 text-center">

                                    <p style="font-size: 50px" class="text-center"><strong>{{ $book_name_autors->book_name }}</strong></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6 text-center">
                                    <img src='{{ asset($book_name_autors->book_image) }}' alt='title' />
                                    <h3 style="margin-top: 80px;">লেখক</h3>
                                    <p style="font-size: 40px" class="text-center"><strong>{{ $book_name_autors->author_name }}</strong></p>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-sm-2 text-right">

                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
            <div class="row">


                <!-- /.col-md-6 -->

                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="card " style="max-height: 780px">
                    {{--<div class="card-header">--}}
                    {{--<div class="row">--}}

                    {{--<div class="col-sm-12">--}}
                    {{--<h5 class="text-center" >--}}
                    {{--BOOK NAME--}}

                    {{--</h5>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row text-center">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6 text-center">

                                    <p style="font-size: 30px" class="text-center"><strong>সূচিপত্র</strong></p>
                                </div>

                            </div>
                            <div class="row">


                                    @php($cp = 0)
                                    @php($i = 1)
                                    @foreach($preview as $pre)
                                        @if($pre->chapter_no == $cp)
                                            <div class="col-sm-6">
                                                <p style="margin-left: 20px">{{ $pre->sub_chapter_no }} &nbsp;: &nbsp; {{ $pre->sub_chapter_name }}</p>
                                            </div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3">

                                            </div>

                                        @else
                                        <div class="col-sm-6">
                                            <h5 class="text-left">

                                                <strong>
                                                    {{ $pre->chapter_name }}
                                                </strong>

                                            </h5>


                                            <p style="margin-left: 20px">{{ $pre->sub_chapter_no }} &nbsp;: &nbsp; {{ $pre->sub_chapter_name }}</p>

                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <h5 class="text-right">
                                                {{ $i }}
                                            </h5>
                                        </div>
                                            @php($cp++)
                                            @php($i++)
                                        @endif

                                    @endforeach


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

    <div class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
            <div class="row">


                <!-- /.col-md-6 -->

                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="card " >

                        <div class="card-body">

                            <div class="row">


                                    @php($cp = 0)

                                    @foreach($preview as $pre)
                                        @if($pre->chapter_no == $cp)
                                            <div class="col-sm-12">
                                                <p style="margin-left: 20px">{{ $pre->sub_chapter_no }} &nbsp;: &nbsp; {{ $pre->sub_chapter_name }}</p>
                                            </div>
                                            <div class="col-sm-3">

                                            </div>
                                            <div class="col-sm-3">

                                            </div>

                                        @else
                                        <div class="col-sm-12">
                                            <h5 class="text-center">

                                                <strong>
                                                    {{ $pre->chapter_name }}
                                                </strong>

                                            </h5>
                                        </div>
                                        <br>
                                        <div class="col-sm-12">

                                            <p style="margin-left: 20px">{{ $pre->sub_chapter_no }} &nbsp;: &nbsp; {{ $pre->sub_chapter_name }}</p>

                                        </div>

                                        <div class="col-sm-12">
                                            <p style="padding: 10px;" align="justify">{{ $pre->meta_info }}</p>
                                        </div>

                                        <div class="col-sm-3">
                                            <h5 class="text-right">

                                            </h5>
                                        </div>
                                            @php($cp++)

                                        @endif

                                    @endforeach


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

    @endif
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    Press Ctrl+D to bookmark this page.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Comments Box:
                        <strong></strong>
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <form action="{{ url('comments') }}" method="post">
                    <!--Body-->
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-3">
                                <p></p>
                                <p class="text-center">
                                    <i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>

                                </p>
                            </div>

                            <div class="col-9">
                                <p>Give your any suggestion about this book. this might help us to improve </p>
                                <input type="text" class="form-control" value="{{ $book_name_autors->book_name }}" name="book_name" hidden>
                                <input type="text" class="form-control" value="{{ $book_name_autors->author_name }}" name="author_name" hidden>
                                <label for="">Chapter & Sub Chapter</label>
                                <input type="text" class="form-control" name="chapter_sub" placeholder="Ex(Ch:1 Sub: 1.1)">
                                <label for="">Comments</label>
                                <textarea type="text"  rows="2" class="form-control" name="comments" placeholder="Ex(Ch:1 Sub: 1.1)">

                            </textarea>

                                {{--<h2>
                                    <span class="badge">v52gs1</span>
                                </h2>--}}

                            </div>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                        <button type="submit" class="btn btn-danger">Submit
                            <i class="fa fa-check ml-1 white-text"></i>
                        </button>
                        <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>
                    </div>
                </form>

            </div>
            <!--/.Content-->
        </div>
    </div>


</div>



<script type="text/javascript" src="{{ asset('pro/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pro/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pro/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pro/js/mdb.min.js') }}"></script>
<script type="text/javascript">

    $(function() {

    });

    $(document).ready(function () {
        //Disable cut copy paste
        $(document).bind('cut copy paste', function (e) {
            e.preventDefault();
        });

        //Disable mouse right click
        $(document).on("contextmenu",function(e){
            return false;
        });
    });

    document.onreadystatechange = function () {
        var state = document.readyState
        if (state == 'interactive') {

        } else if (state == 'complete') {
            setTimeout(function(){
                document.getElementById('interactive');
                document.getElementById('load').style.visibility="hidden";

            },800);
        }
    }

</script>


<script>
    function rudr_favorite(a) {
        pageTitle=document.title;
        pageURL=document.location;

        try {
            // Internet Explorer solution
            eval("window.external.AddFa-vorite(pageURL, pageTitle)".replace(/-/g,''));
        }
        catch (e) {
            try {
                // Mozilla Firefox solution
                window.sidebar.addPanel(pageTitle, pageURL, "");
            }
            catch (e) {
                // Opera solution
                if (typeof(opera)=="object") {
                    a.rel="sidebar";
                    a.title=pageTitle;
                    a.url=pageURL;
                    return true;
                }
                else {
                    // The rest browsers (i.e Chrome, Safari)
                    // $("#myModal").modal('show');
                    alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Cmd' : 'Ctrl') + '+D to bookmark this page.');
                }
            }
        }
        return false;
    }
</script>

</body>
</html>
