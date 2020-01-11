@extends('front_end.book_master')
@section('styles')
    <style>
        .trans{
            display: none;
        }
    </style>

@endsection
@section('book')
    <div class="new-book-area pb-100" style="padding: 20px;">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title bt text-center pt-50 mb-10 section-title-res"  >
                                @if(!empty($name))
                                    <h3 style="background-color: #FFFCF4;color: #8e8131"><i class="fa fa-question-circle-o" id="suraa_name"></i><strong>{{  $name->surah_name }}</strong></h3>
                                    <input type="text" id="surahh_name" value="{{  $name->surah_name }}" hidden readonly>
                                @endif

                            </div>

                        </div>


                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="th">
                            @if(!empty($sura_descriptions))
                                @php($i = ($ayah-1))

                                @foreach($sura_descriptions as $sura_description)
                                    @if($sura_description->ayah_no == $i)

                                        <div class="row">
                                            <div class="col-xs-10">
                                                <h3 style="margin-left: 20px">

                                                    <strong>
                                                        <p class="text-justify" style="font-family: Kalpurush; ">

                                                            {{ $sura_description->token_trans }}
                                                            <a href="#?" onclick="explanation({{$sura_description->taf_token_id}})">
                                                                <sup>{{ $sura_description->token_expl_no }}</sup>
                                                            </a>
                                                        </p>
                                                    </strong>

                                                </h3>
                                                {{--<h4 style="margin-left: 20px">--}}
                                                {{--<p class="text-justify">--}}
                                                {{--{{ $sura_description->token_trans }}--}}
                                                {{--<a href="#?" onclick="explanation({{$sura_description->taf_token_id}})">--}}
                                                {{--<sup>{{ $sura_description->token_expl_no }}</sup></a>--}}
                                                {{--</p>--}}
                                                {{--</h4>--}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            {{--<div class="col-xs-10">--}}

                                                {{--<p class="text-justify trans" style="margin-left: 20px" id="{{$sura_description->taf_token_id}}">--}}
                                                    {{--{{ $sura_description->token_expl }}--}}
                                                {{--</p>--}}

                                            {{--</div>--}}
                                            <div class="col-xs-10 trans mr-2"  id="{{$sura_description->taf_token_id}}" style="text-align: justify;margin-left: 20px;  font-family: Kalpurush; font-size: 20px">

                                                <u>
                                                    <p>
                                                        <strong style="text-underline: black">
                                                            ব্যাখ্যা
                                                        </strong>
                                                    </p>
                                                </u>
                                                {!! $sura_description->token_expl !!}
                                                <br> <br>

                                            </div>

                                        </div>

                                    @else
                                        <hr style="color: #028478;" >

                                        <div class="row " style="margin-top: 10px">
                                            <div class="col-xs-9 ">
                                                <div class="row">
                                                    <div class="col-xs-1 text-left " style="margin-left: 5px">

                                                        <h3 style="color: #028478">
                                                            {{ $sura_description->taf_surah_id.':'.$sura_description->ayah_no }}
                                                        </h3>
                                                    </div>
                                                    <div class="col-xs-10 text-right" style="font-size: 25px" >
                                                        <h2>
                                                            <strong class="" >
                                                                {{ $sura_description->ayah_text }}
                                                            </strong>
                                                        </h2>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-10">
                                                        <h3 style="margin-left: 20px">

                                                            <strong>
                                                                <p class="text-justify" style="font-family: Kalpurush;">

                                                                    {{ $sura_description->token_trans }}
                                                                    <a href="#?" onclick="explanation({{$sura_description->taf_token_id}})">
                                                                        <sup>{{ $sura_description->token_expl_no }}</sup>
                                                                    </a>
                                                                </p>
                                                            </strong>

                                                        </h3>
                                                        {{--<h4 style="margin-left: 20px">--}}
                                                            {{--<p class="text-justify">--}}
                                                                {{--{{ $sura_description->token_trans }}--}}
                                                                {{--<a href="#?" onclick="explanation({{$sura_description->taf_token_id}})">--}}
                                                                    {{--<sup>{{ $sura_description->token_expl_no }}</sup></a>--}}
                                                            {{--</p>--}}
                                                        {{--</h4>--}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {{--<div class="col-xs-10">--}}

                                                        {{--<p class="text-justify trans"  style="margin-left: 20px" id="{{$sura_description->taf_token_id}}">--}}
                                                            {{--{{ strip_tags($sura_description->token_expl) }}--}}
                                                        {{--</p>--}}

                                                        {{----}}
                                                    {{--</div>--}}


                                                    <div class="col-xs-10 trans mr-2"  id="{{$sura_description->taf_token_id}}" style="text-align: justify;margin-left: 20px;  font-family: Kalpurush; font-size: 20px">

                                                        <u>
                                                            <p>
                                                                <strong style="text-underline: black">
                                                                    ব্যাখ্যা
                                                                </strong>
                                                            </p>
                                                        </u>
                                                        {!! $sura_description->token_expl !!}
                                                        <br> <br>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <a href="#?" class="btn btn-floating btn-danger" title="Remove Bookmark" onclick="remove_bookmark('{{ $sura_description->taf_surah_id }}' ,'{{ $sura_description->ayah_no }}')" >
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                <a class="btn btn-floating btn-primary" data-toggle="modal" data-target="#modalPush" href="javascript:void(0)"  title="Comments"><i class="fa fa-comment"></i> Comments</a>

                                            </div>
                                        </div>

                                        @php($i++)
                                    @endif

                                @endforeach

                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>




@endsection

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
                        {{--<div class="col-3">--}}
                            {{--<p></p>--}}
                            {{--<p class="text-center">--}}
                                {{--<i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>--}}
                            {{--</p>--}}
                        {{--</div>--}}


                        <div class="col-9" style="margin: 5px">
                            <p>Give your any suggestion about this surah/ayah. this might help us to improve </p>
                            <label for="">Chapter & Sub Chapter</label>
                            <input type="text" class="form-control" name="chapter_sub" placeholder="Ex(Sura:1 Ayah: 1)">
                            <label for="">Comments</label>
                            <textarea type="text"  rows="2" class="form-control" name="comments" >

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
