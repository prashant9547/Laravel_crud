<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- title of the page --}}
    <title> Reset Password | Shopping-Elite</title>

    {{-- link section start here --}}
    <link rel="icon" href="../image/Hood_01.png" type="image/png" sizes="16x16">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style1.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            {{--
            <div>
                <h6 class="logo-name"> <img src="image/hood.png" width='150px' height='150px' style="margin-top: -50px;"></h6>
            </div> --}}
            <h4> Reset Password </h4>
            <form class="m-t" role="form" name="resetForm" id="resetForm" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
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
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password_confirmation" placeholder="Enter Password Confirm" type="password" class="form-control" name="password_confirmation">                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span> @endif
                </div>

                <button type="submit" id="signin" class="btn btn-primary block full-width m-b"> <strong> Reset Password </strong></button>

            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/plugins/validate/jquery.validate.min.js"></script>

</body>

</html>
<script>
    $("form[name='resetForm']").validate({
            rules: {
                email:{
                   required:true,
                   email:true,
               },
               password:"required",
               password_confirmation:{
                   equalTo: "#password"
               }
            },
             messages:{
               email: {
                    required:"Email isn't blank",
                    'email': 'Email is not valid'
                       },
               password:{required:"Password isn't blank"}
            }
    });
</script>
@push("scripts") 
@if(Session::has('reset_password'))
    <script>
        toastrDisplay("success","{{ Session::get('reset_password') }}");
    </script>
@endif
@endpush