<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php 
		include 'include_top.php';
	?>
</head>
<body>
	<div class="wrapper">
		<form class="form-signin" method="POST" action="<?php echo base_url() ?>index.php/Login/login">
			<h2 class="form-signin-heading text-center">AMA Test Bank</h2>
			<div>
				<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
			</div>
			<div>
				<input type="password" class="form-control" name="password" placeholder="Password" required=""/> 
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
		</form>
  </div>
</body>
</html>