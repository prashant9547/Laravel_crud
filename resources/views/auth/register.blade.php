<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- title of the page --}}
    <title> INSPINIA | Register</title>

    {{-- link section start here --}}
    <link rel="icon" href="image/Hood_01.png" type="image/png" sizes="16x16">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body class="gray-bg">
<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <h1 class="logo-name">IN+</h1>
        </div>
        <h3>Register to IN+</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" method="POST" action="{{ url('/register') }}">
			{{ csrf_field() }}
		    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}" required="" autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" placeholder="Enter Email" name="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

						<input id="password" placeholder="Enter Password" type="password" class="form-control" name="password">

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
				</div>
        <!-- <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

<input id="password" placeholder="Enter Confrim Password" type="password" class="form-control" name="password">

@if ($errors->has('password_confirmation'))
  <span class="help-block">
    <strong>{{ $errors->first('password_confirmation') }}</strong>
  </span>
@endif
</div> -->

                    <button type="submit" id="signup" disabled class="btn btn-primary block full-width m-b"><strong>Sign Up </strong></button>

                    <p class="text-muted text-center"><small>Do have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}"> <strong> Sign In </strong></a>
                </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2018</small> </p>
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            var text_name = $('#name');
            var text_email = $('#email');
            var text_password = $('#password');
            var btn_signup = $('#signup');

            text_name.on('keyup', function () {
                //console.log(1);
                var empty = false
            });
            text_email.on('keyup', function () {
                //console.log(1);
                var empty = false
            });
            text_password.on('keyup', function () {
                //console.log(1);
                var empty = false
                var empty = false
                    if(text_name.val() && text_email.val() && text_password.val() != '') {
                        btn_signup.prop('disabled', false);
                    }else {
                        btn_signup.prop('disabled', true);
                    }
            });
        });
    </script>
</body>
</html>
