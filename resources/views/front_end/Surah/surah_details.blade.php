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
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="section-title bt text-center pt-50 mb-10 section-title-res"  >
                                        @if(!empty($name))
                                            <h2 style="background-color: #FFFCF4;color: #8e8131"><i class="fa fa-question-circle-o" id="suraa_name"></i><strong style="font-family: Kalpurush;">{{  $name->surah_name }}</strong></h2>

                                            <br>
                                            <a href="#" data-toggle="modal" data-target="#TafseerModal">
                                                <h4 ><i class="fa fa-question-circle-o" id="suraa_name"></i><strong>SEE TAFSIR → </strong></h4>
                                            </a>
                                            <input type="text" id="surahh_name" value="{{  $name->surah_name }}" hidden readonly>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="tab-content">
                                <div class="tab-pane active" id="th">


                                    @if(!empty($sura_descriptions))
                                        @php($i = 0)


                                        @foreach($sura_descriptions as $sura_description)
                                            @if($sura_description->ayah_no == $i)
                                                <div class="row">
                                                    <div class="col-xs-1 text-center">

                                                </div>
                                                    <div class="col-xs-9 text-right">

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

                                                        {{--<h3 class="ml-2 mt-3 mb-4" >--}}
                                                            {{--<p class="text-justify trans text-center"  style="margin-left: 20px;font-family: Kalpurush;" id="{{$sura_description->taf_token_id}}">--}}

                                                            {{--{{ strip_tags(htmlspecialchars_decode($sura_description->token_expl)) }}--}}
{{--                                                            {!! $sura_description->token_expl !!}--}}



                                                            {{--<br>--}}
                                                            {{--@if(!empty($sura_description->image_token))--}}
                                                                {{--<img src="{{ asset($sura_description->image_token) }}" style="align-content: center" >--}}
                                                            {{--@endif--}}
{{--                                                            {!! $sura_description->token_expl !!}--}}
                                                        {{--</p>--}}
                                                        {{--</h3>--}}

                                                </div>
                                                    <div class="col-xs-2 text-center">

                                                </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-1 text-center">

                                                    </div>

                                                    <div class="col-xs-9 trans mr-2"  id="{{$sura_description->taf_token_id}}" style="text-align: justify;margin-left: 20px;  font-family: Kalpurush; font-size: 20px">
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
                                                <hr style="height: 1px;
                                                color: rgba(2,132,120,0.08);
                                                background-color: rgba(2,132,120,0.12);
                                                border: none;">

                                                <div class="row">

                                                    <div class="col-xs-1 text-center">
                                                        <h3  style="color: #028478">
                                                            {{ $sura_description->taf_surah_id.':'.$sura_description->ayah_no }}
                                                        </h3>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <h2>
                                                            <strong class="" style="font-size: 40px;font-family: ”Droid Arabic Naskh”, serif;" >
                                                                {{--{!! $sura_description->ayah_text !!}--}}
                                                                {{  $sura_description->ayah_text  }}
                                                            </strong>
                                                        </h2>

                                                        <br> <br> <br>

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



                                                        {{--<h3 class="ml-2 mt-3 mb-4">--}}
                                                            {{--<p class="text-justify trans center"  style="margin-left: 20px;font-family: Kalpurush;" id="{{$sura_description->taf_token_id}}">--}}
                                                                {{--{{ strip_tags(htmlspecialchars_decode($sura_description->token_expl)) }}--}}
                                                                {{--{!! $sura_description->token_expl !!}--}}
                                                                {{--<br>--}}

                                                            {{--</p>--}}

                                                        {{--</h3>--}}

                                                    </div>
                                                    <div class="col-xs-2 text-center">
                                                        <a href="#?" class="btn btn-floating btn-dark" title="Bookmark" onclick="bookmark_this('{{  $sura_description->taf_surah_id }}' ,'{{ $sura_description->ayah_no }}')" >
                                                            <i class="fa fa-bookmark"></i>
                                                        </a>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-1 text-center">

                                                    </div>
                                                    <div class="col-xs-9 trans mr-2"  id="{{$sura_description->taf_token_id}}" style="text-align: justify;margin-left: 20px;  font-family: Kalpurush; font-size: 20px">

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

                                                @php($i++)
                                            @endif

                                        @endforeach

                                        {{--@foreach($sura_descriptions as $sura_description)--}}
                                            {{--@if($sura_description->ayah_no == $i)--}}

                                                {{--<div class="row">--}}
                                                    {{--<div class="col-xs-10">--}}
                                                        {{--<h4 style="margin-left: 20px">--}}
                                                            {{--<p class="text-justify">--}}
                                                                {{--{{ $sura_description->token_trans }}--}}
                                                                {{--<a href="#?" onclick="explanation({{$sura_description->taf_token_id}})">--}}
                                                                    {{--<sup>{{ $sura_description->token_expl_no }}</sup>--}}
                                                                {{--</a>--}}
                                                            {{--</p>--}}
                                                        {{--</h4>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<br>--}}
                                                {{--<div class="row">--}}
                                                    {{--<div class="col-xs-10">--}}

                                                        {{--<p class="text-justify trans" style="margin-left: 20px" id="{{$sura_description->taf_token_id}}">--}}
                                                            {{--{{ strip_tags($sura_description->token_expl) }}--}}
                                                        {{--</p>--}}

                                                    {{--</div>--}}
                                                    {{--<div class="col-xs-2"></div>--}}
                                                {{--</div>--}}



                                            {{--@else--}}
                                                {{--<hr style="color: #028478;" >--}}

                                                {{--<div class="row " style="margin-top: 10px">--}}
                                                    {{--<div class="col-xs-10">--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-xs-1 text-left " style="margin-left: 5px">--}}

                                                                {{--<h3 style="color: #028478">--}}
                                                                    {{--{{ $sura_description->taf_surah_id.':'.$sura_description->ayah_no }}--}}
                                                                {{--</h3>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-xs-10 text-right"  >--}}
                                                                {{--<h2>--}}
                                                                    {{--<strong class="" style="font-size: 40px; text-align: end" >--}}
                                                                        {{--{{ $sura_description->ayah_text }}--}}
                                                                    {{--</strong>--}}
                                                                {{--</h2>--}}


                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<br>--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-xs-10">--}}
                                                                {{--<h4 style="margin-left: 20px">--}}
                                                                    {{--<p class="text-justify">--}}
                                                                        {{--{{ $sura_description->token_trans }}--}}
                                                                        {{--<a href="#?" onclick="explanation({{$sura_description->taf_token_id}})">--}}
                                                                            {{--<sup>{{ $sura_description->token_expl_no }}</sup>--}}
                                                                        {{--</a>--}}
                                                                    {{--</p>--}}
                                                                {{--</h4>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-xs-2"></div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-xs-10">--}}

                                                                {{--<p class="text-justify trans"  style="margin-left: 20px" id="{{$sura_description->taf_token_id}}">--}}
                                                                    {{--{{ strip_tags(htmlspecialchars_decode($sura_description->token_expl)) }}--}}
                                                                {{--</p>--}}

                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="col-xs-2"></div>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="col-xs-2 text-center">--}}
                                                        {{--<a href="#?" class="btn btn-floating btn-dark" title="Bookmark" onclick="bookmark_this({{  $sura_description->taf_surah_id }} ,{{ $sura_description->ayah_no }})" >--}}
                                                            {{--<i class="fa fa-bookmark"></i>--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<br>--}}
                                                {{--@php($i++)--}}
                                            {{--@endif--}}

                                        {{--@endforeach--}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal fade" id="TafseerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">

                <!-- Change class .modal-sm to change the size of the modal -->
                <div class="modal-dialog modal-lg " role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                                @if(!empty($name))
                                    <h4 class="modal-title w-100 text-center" id="myModalLabel"><strong>{{ $name->surah_name }}</strong></h4>
                                @endif

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-12" style="text-align: justify; white-space: pre-line; font-family: Kalpurush; font-size: medium">

                                             @if(!empty($surah_intro))
{{--                                                {{ strip_tags($surah_intro->surah_intro) }}--}}
                                                {!! $surah_intro->surah_intro !!}
                                             @endif

                                    </div>
                                </div>

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

@section('footer_js')



@endsection
