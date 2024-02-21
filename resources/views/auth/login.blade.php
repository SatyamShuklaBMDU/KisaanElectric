<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kissan Electric</title>
<!-- Meta -->
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon icon -->
		<link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
	<link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">

	<!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- waves css -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/Waves/waves.min.css">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="assets/css/color/color-1.min.css" id="color"/>
</head>
<body>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-card card-block">
                    <div class="text-center">
                        <img src="assets/images/kishan-logo.png" alt="logo" style="width:30%">
                    </div>
                    <h3 class="text-center text-dark">Sign In to your account</h3>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-input-wrapper">
                                    <input type="email" name="email" class="md-form-control" required/>
                                    <label class="text-dark">Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="md-input-wrapper">
                                    <input type="password" name="password" class="md-form-control" required/>
                                    <label class="text-dark">Password</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
                                    <label class="input-checkbox checkbox-primary">
                                        <input type="checkbox" id="remember" name="remember">
                                        <span class="checkbox"></span>
                                    </label>
                                    <div class="captions">Remember Me</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                                <a href="{{ route('password.request') }}" class="text-right f-w-600 text-dark"> Forget Password?</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10 offset-xs-1">
                                <button type="submit" class="btn btn-dark btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

<!-- Required Jqurey -->
<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- waves effects.js -->
<script src="assets/plugins/Waves/waves.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/elements.js"></script>


</html>
