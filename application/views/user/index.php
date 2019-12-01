<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<?php include APPPATH.'views/include_top.php' ?>

<script>
	$(document).ready(function(){
		$("#idUserForm").validationEngine();
		// $('#idPassword').addClass('validate[required]');
		<?php
		echo (empty($user)) ? "$('#idPassword, #idCPassword').addClass('validate[required]').prop('placeholder','');":'';
		?>

	});

	function validate(){
		var password 	= $('#idPassword').val();
		var cpassword 	= $('#idCPassword').val();

		if((password && !cpassword) || (!password && cpassword)){
			alert('Fill Both Password Field')
			return false;
		}

		if((password && cpassword) && (password != cpassword)){
			alert("Password Does not Match!");
			return false;
		}
		if($("#idUserForm").validationEngine('validate')){
			return confirm('Submit?');
		}
	}
</script>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 8%;">
	<a href="<?php echo base_url() ?>index.php/faculty" class="btn btn-primary" style="margin: 5px 0px;">Back</a>
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			<?php echo empty($user) ? 'Create User' : 'Edit User'; ?>
		</h2>
	</div>
	<div class="panel-body">
	<div class="tab-content">
	<div class="row">
		<div class="col-md-12">
			<form  id="idUserForm" class="form-horizontal" method="POST" action="<?php echo base_url() ?>index.php/user/save" autocomplete="off" onsubmit="return validate();">
				<input type="hidden" name="user_no" value="<?php if(!empty($user->first_name)) echo $user->user_no; ?>">
				<div class="form-group">
					<span class="col-md-1"></span>
					<div class="col-md-4">
						First Name
						<input id="idFirstname" type="text"  class="form-control validate[required]" name="first_name" value="<?php if(!empty($user->first_name)) echo $user->first_name; ?>">
					</div>
					<div class="col-md-4">
						Last Name
						<input id="idLastname" type="text" class="form-control validate[required]" name="last_name" value="<?php if(!empty($user->last_name)) echo $user->last_name ?>">
					</div>
				</div>
				<div class="form-group">
					<span class="col-md-1"></span>
					<div class="col-md-4">
						Username
						<input id="idUsername" type="text"  class="form-control validate[required]" name="username" value="<?php if(!empty($user->first_name)) echo $user->first_name; ?>">
					</div>
					<div class="col-md-4">
					Authorization
						<select id="idAuthorization" name="authorization" class="form-control">
							<option value="1" <?php if(!empty($user) && $user->authorization == 1) echo "selected" ?>>Admin</option>
							<option value="2" <?php if(!empty($user) && $user->authorization == 2) echo "selected" ?>>Faculty</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<span class="col-md-1"></span>
					<div class="col-md-4">
						Password
						<input id="idPassword" type="password" class="form-control" name="password" placeholder="Leave blank to remain unchage">
					</div>
					<div class="col-md-4">
						Confirm Password
						<input id="idCPassword" type="password" class="form-control" name="cpassword" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-success btn-lg">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</body>
</html>
