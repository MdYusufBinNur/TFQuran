<footer>
    <!-- footer-top-start -->
    <!-- footer-top-start -->
    <!-- footer-mid-start -->
    <div class="footer-mid ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="single-footer br-2 xs-mb">
                                <div class="footer-title mb-20">
                                    <h3>About us</h3>
                                </div>
                                <div class="footer-mid-menu">
                                    <ul>
                                        <li><a href="#?"></a></li>
                                        <li><a href="#?">Saimoom Digital Library </a></li>
                                        <li><a href="#?"> an</a></li>
                                        <li><a href="#?">Online library</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        </div>
                    </div>
                </div>

                @if(!empty($information))
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="single-footer mrg-sm">
                            <div class="footer-title mb-20">
                                <h3>INFORMATION</h3>
                            </div>
                            <div class="footer-contact">
                                <p class="adress">
                                    <span>SAIMOOM DIGITAL LIBRARY</span>
                                    Bangladesh
                                </p>
                                <p><span>Call us now:</span> {{ $information->mobile }}</p>
                                <p><span>Email:</span>  {{ $information->email }}</p>
                                <p><span>Address:</span>  {{ $information->address }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single-footer mrg-sm">
                        <div class="footer-title mb-20">
                            <h3>INFORMATION</h3>
                        </div>
                        <div class="footer-contact">
                            <p class="adress">
                                <span>SAIMOOM DIGITAL LIBRARY</span>
                                Bangladesh
                            </p>
                            <p><span>Call us now:</span> 017XXXXXXXXX</p>
                            <p><span>Email:</span>  support@hastech.com</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- footer-mid-end -->
    <!-- footer-bottom-start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row bt-2">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="copy-right-area">
                        <p>Copyright ©<a href="{{ url('/') }}">SAIMOOM DIGITAL LIBRARY</a>. All Right Reserved.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row fixed-bottom" style="margin-bottom: 10px">
        <div class="col-sm-2"></div>
        <div class="col-sm-8"></div>
        <div class="col-sm-2">
            {{--<a class="btn btn-floating btn-dark"  href="javascript:void(0)" onClick="return rudr_favorite(this); " title="Bookmark This Book"><i class="fa fa-star"></i> Bookmark</a>--}}
            {{--<br>--}}
            <a class="btn btn-floating btn-primary" data-toggle="modal" data-target="#modalPush" href="javascript:void(0)"  title="Comments"><i class="fa fa-comment"></i> Comments</a>

        </div>
    </div>
    <!-- footer-bottom-end -->
</footer>


<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>
                            Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i>
                            Register</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <form class="login" action="{{ route('login') }}" method="post" data-type="json">
                        @csrf
                        <!--Body-->
                            <div class="modal-body mb-1">
                                <div class="md-form form-sm mb-5">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="email" name="email" id="modalLRInput10" class="form-control form-control-sm validate">
                                    <label  for="modalLRInput10">Your email</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" name="password" id="modalLRInput11" class="form-control form-control-sm validate">
                                    <label  for="modalLRInput11">Your password</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button class="btn btn-info" type="submit" >Log in <i class="fa fa-sign-in ml-1"></i></button>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-center text-md-right mt-1">
                                    <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                                    <p>Forgot <a href="#" class="blue-text">Password?</a></p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                            </div>

                        </form>
                    </div>
                    <!--/.Panel 7-->
                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form form-sm mb-5">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="email" id="modalLRInput12" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput12">Your email</label>
                            </div>

                            <div class="md-form form-sm mb-5">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="modalLRInput13" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput13">Your password</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="modalLRInput14" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
                            </div>

                            <div class="text-center form-sm mt-2">
                                <button class="btn btn-info">Sign up <i class="fa fa-sign-in ml-1"></i></button>
                            </div>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-right">
                                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<div class="modal fade" id="message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-side modal-bottom-right modal-notify " role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header" style="background-color: black">

                    <strong style="color: white; text-align: center">
                        Chat Box
                    </strong>


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <form action="{{ url('comments') }}" method="post">
                <!--Body-->
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col-9" style="margin: 10px">

                            <input type="text" hidden>
                            <label for="">Mobile Or Email</label>
                            <input type="text" class="form-control" name="chapter_sub" placeholder="">
                            <label for="">Message</label>
                            <textarea type="text"  rows="2" class="form-control" name="comments" placeholder="Ex(Ch:1 Sub: 1.1)">

                            </textarea>

                        </div>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-rounded btn-dark  waves-effect">SEND
                        <i class="fa fa-send ml-2 white-text"></i>
                    </button>
                </div>
            </form>

        </div>
        <!--/.Content-->
    </div>
</div>
