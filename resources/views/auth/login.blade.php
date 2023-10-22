<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<script>
// Close alert when close button is clicked
document.addEventListener("DOMContentLoaded", function() {
    var closeButtonList = document.querySelectorAll(".alert button.close");
    closeButtonList.forEach(function(button) {
        button.addEventListener("click", function() {
            var alert = button.closest(".alert");
            alert.style.display = "none";
        });
    });
});

</script>
@error('userType')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong> <br>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@enderror
@error('username')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>  <br>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@enderror
@error('password')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong> <br>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@enderror
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
	<img class="logo" src="{{ asset('css/style.css') }}">
	<img class="wave" src="{{ asset('img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('img/pic2.png') }}">
		</div>
		<div class="login-content">

			<form action="{{ url('/') }}/login" method="post">
                @csrf
				<h2 class="title">Welcome</h2>
                <div class="option">
                    <input type="radio" id="Student" name="userType" value="Student">
                    <label for="Student" style="margin-right: 50px; font-size: 1.3rem;">Student</label>
                    <input type="radio" id="Professor" name="userType" value="Professor">
                    <label for="Professor" style="margin-right: 30px; font-size: 1.3rem;">Professor</label>
                </div>


           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">

           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input"name="password">
            	   </div>
            	</div>
            	<div class="login-links">
														<a href="forgot.php">Forgot Password?</a>
														<a href="{{ url('/') }}/signup">Create Account?</a>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
</html>
