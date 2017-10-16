<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Koperasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<h1 style = "color:#35363d">Koperasi</h1>
<!--Start Login-->
 @if (Auth::guest())
<div class="main-agileits">
    <div class="form-w3-agile">
        <h2>Login</h2>
        <form action="{{route('login')}}" method="post">
        {{ csrf_field() }}
            <div class="form-sub-w3">
                <input type="text" class="warnaph" name="username" placeholder="Username" required="" />
            <div class="icon-w3">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            </div>
            <div class="form-sub-w3">
                <input type="password" class="warnaph" name="password" placeholder="Password" required="" />
            <div class="icon-w3">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            </div>
            </div>
            @if ($errors->has('username'))
                <span class="help-block" style="color:white">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block" style="color:white">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <p class="p-bottom-w3ls">Belum terdaftar ?<a class="w3_play_icon1" href="#small-dialog1" style="color:#0e8fba;">  Register here</a></p>
            
            <div class="submit-w3l">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</div>
<!--end Login-->

<!--Start Register-->
<div id="small-dialog1" class="mfp-hide">
    <div class="contact-form1">
        <div class="contact-w3-agileits">
        <h3 style="color:black">Register Form</h3>
            <form action="{{route('register')}}" method="post">
            {{ csrf_field() }}
                <div class="form-sub-w3ls">
                    <input style="color:black" placeholder="Username"  type="text" name="username" required="">
                    <div class="icon-agile">
                        <i class="fa fa-user" style="color:black" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input style="color:black" placeholder="Email" class="mail" type="email" name="email" required="">
                    <div class="icon-agile">
                        <i class="fa fa-envelope-o" style="color:black" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input style="color:black" placeholder="Password"  type="password" name="password" required="">
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" style="color:black" aria-hidden="true"></i>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="form-sub-w3ls">
                    <input style="color:black" placeholder="Confirm Password"  type="password" name="password_confirmation" required="">
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" style="color:black" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="submit-w3l">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>  
</div>
@else

<div class="main-agileits">
    <div class="form-w3-agile">
        <h2>Selamat Datang</h2>
            <div class="form-sub-w3" style="color:white;text-align:center">
                {{Auth::user()->username}}
            </div>
            <form action="{{url('home')}}">
            <div class="submit-w3l">
                <input type="submit" value="Home">
            </div>
            </form>
        </form>
    </div>
</div>
@endif
<!--end Register-->

<!-- copyright -->
    <!-- //copyright --> 
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- pop-up-box -->  
        <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--//pop-up-box -->
    <script>
        $(document).ready(function() {
        $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
                                                                        
        });
    </script>
</body>
</html>