<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    {{-- title of the page --}}

    <title> Reset Password | Shopping-Elite </title>

    {{-- link section start here --}}

    <link rel="icon" href="image/Hood_01.png" type="image/png" sizes="16x16">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <form class="m-t" role="form" name="resetemailForm" id="resetemailForm" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Email"
                        name="email"> @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif
                </div>
                <button type="submit" id="signin" class="btn btn-primary block full-width m-b"> <strong> Send Password Reset Link </strong></button>
                <a class="text-muted text-center" href="{{ url('/') }}"><strong> Back </strong></a>
            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

</body>
</html>
<script>
    $("form[name='resetemailForm']").validate({
         rules: {
             email:{
                required:true,
                email:true,
            }
         },
          messages:{
            email: {
                required:"Email isn't blank",
                'email': 'Email is not valid'
                    }
         }
});
</script>

@push("scripts") 
@if(Session::has('send_link'))
    <script>
        toastrDisplay("success","{{ Session::get('send_link') }}");
    </script>
@endif
@endpush
