<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    {{-- title of the page --}}
    <title> Admin Login | Shopping-Elite </title>

    {{-- link section start here --}}

    <link rel="icon" href="image/Hood_01.png" type="image/png" sizes="16x16">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    {{-- link section end here --}}
    <style>
        .checkbox label,
        .radio label {
            margin-left: -200px;
        }
    </style>
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h6 class="logo-name"> <img src="image/hood.png" width='150px' height='150px' style="margin-top: -50px;"></h6>
            </div>
            <h5> Welcome to Blog Admin</h5>
            <form class="m-t" role="form" name="loginForm" id="loginForm" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" placeholder="Enter Email" name="email"> @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" placeholder="Enter Password" type="password" class="form-control" name="password">                    @if ($errors->has('password'))
                    <span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span> @endif
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Remember Me </label>
                    </div>
                </div>
                <button type="submit" id="signin" class="btn btn-primary block full-width m-b"> <strong> Sign In </strong></button>
            
                <a class="text-muted text-center" href="{{ url('/password/reset') }}">Forgot your password?</a>
            </form>
        </div>
    </div>

    <!-- Mainly start scripts here -->

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

    <!-- Mainly end scripts here -->

</body>
</html>

<script>
     $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
    $("form[name='loginForm']").validate({
         rules: {
             email:{
                required:true,
                email:true,
            },
            password:"required"
         },
          messages:{
            email: {
                required:"Email isn't blank",
                'email': 'Email is not valid'
                    },
            password:{
                required:"Password isn't blank"}
         }
});
</script>