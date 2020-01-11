@extends('admin.admin_master')


@section('body')

    {{--<div id="load"></div>--}}

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


    </div>
    <!-- Central Modal Small -->


@endsection
