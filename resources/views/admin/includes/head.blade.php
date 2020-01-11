<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SAIMOOM DIGITAL LIBRARY</title>

    <link rel=icon type=image/png sizes=32x32 href="{{ asset('img/quran.png') }}">
    {{--<!-- Font Awesome Icons -->--}}
    {{--<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">--}}
    {{--<!-- Theme style -->--}}
    {{--<link rel="stylesheet" href="dist/css/adminlte.min.css">--}}
    {{--<!-- Google Font: Source Sans Pro -->--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
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
