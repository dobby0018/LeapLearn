<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
});</script>
@error('username')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong> <br>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@enderror
@error('email')
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

	<img class="logo" src="img/logo.jpeg"> <!--Logo-->
 	<img class="wave" src="img/wave.png">  <!--Backgound-->
	<div class="container">
		<div class="img">
			<img src="../img/pic1.png">  <!--Side image-->
		</div>
		<div class="login-content">
				<form action="{{ url('/') }}/signup" method="post">
                    @csrf
				<h2 class="title">Registration</h2>

				<div class="input-group" >
					<div class="input-div">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>First Name</h5>
							<input type="text" class="input" name="firstname" value="{{ old('firstname') }}">
						</div>
					</div>
					<div class="input-div">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Last Name</h5>
							<input type="text" class="input"name="lastname"value="{{ old('lastname') }}">
						</div>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="email" class="input"name="email"value="{{ old('email') }}">
					</div>
				</div>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username"value="{{ old('username') }}">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" >
            	   </div>
            	</div>
            	<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" class="input" name="password_confirmation">
            	   </div>
            	</div>
            	<a href="{{ url('/') }}/login" class="account">Already have an account?</a>
            	<input type="submit" class="btn" value="send">
            </form>
   	</div>
   </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
