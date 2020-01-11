<div class="header-mid-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-3">
                <div class="logo-area text-center logo-xs-mrg">
                    <a href="#"><img src="{{ asset('front_end/logo.png') }}" alt="logo" /></a>
                    {{--<a href="#"><img src="{{ asset('front_end/img/logo/5.png') }}" alt="logo" /></a>--}}
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
                <div class="header-search text-center">
                    <form action="#">
                        <input type="text" placeholder="Search Authors "  id="search"/>
                        {{--<a href="#"><i class="fa fa-search"></i></a>--}}
                    </form>
                </div>
                <div style="padding: 5px">
                    <div class="row">
                        <table class="table table-hover example-2 scrollbar-deep-purple bordered-deep-purple thin" id="myTable" style="max-height: 50px">
                            <thead>

                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <div class="header-search text-right">
                    {{--<a href="#" class="btn blue-gradient btn-rounded btn-lg" data-target="#modalLRForm" data-toggle="modal">Sign In</a>--}}
                    <a href="{{ route('login') }}" class="btn blue-gradient btn-rounded btn-lg" >Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>
