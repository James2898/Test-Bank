<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php include 'include_top.php' ?>
</head>
<body>
	<?php include 'header.php' ?>
	<div class="container" style="margin-top: 5%;">
	<div class="panel panel-default">
	<div class="panel-body">
		<ul class="nav nav-tabs">
		  <li class="active"><a href="<?php echo base_url() ?>">Profile</a></li>
		  <li><a href="<?php echo base_url() ?>index.php/faculty/members">Faculty Members</a></li>
		  <li><a href="#">Faculty Activity</a></li>
		</ul>
		<div class="container">
			<form action="admin/update" method="POST">
				<div class="form-row" style="margin: 10px 0px">
					<div class="form-group col-md-4">
				      <label for="first_name">First Name</label>
				      <input type="text" class="form-control" id="first_name">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="last_name">Last Name</label>
				      <input type="text" class="form-control" id="first_name">
				    </div>
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>
</body>
</html>