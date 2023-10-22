<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<img class="logo" src="../img/logo.jpeg">
	<img class="wave" src="../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../img/verify.png">
		</div>
		<div class="login-content">
			<form action="forgot.php" method="post">
				<h2 class="title">Forgot Password</h2>
    <div class="input-div one">
    <div class="i">
       <i class="fas fa-user"></i>
    </div>
    <div class="div">
       <h5>Username</h5>
       <input type="text" class="input" name="username">
    </div>
    </div>
    <div class="input-div one">
					<div class="i">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="email" class="input" name="email">
					</div>
				</div>

     <input type="submit" class="btn" value="Send OTP">
   </form>
  </div>
 </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>

