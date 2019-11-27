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
		  <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
		  <li><a data-toggle="tab" href="#faculty">Faculty Members</a></li>
		</ul>
		<div class="tab-content">
			<!-- PROFILE TAB -->
			<div id="profile" class="tab-pane fade in ">
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<td><?php echo $user->first_name ." ". $user->last_name ?></td>
					</tr>
					<tr>
						<th>Username</th>
						<td><?php echo $user->username ?></td>
					</tr>
					<tr>
						<th>Authorization</th>
						<td><?php echo ($user->authorization == '1') ? 'Admin':'Faculty';?></td>
					</tr>
				</table>
				<div>
					<a href="#" class="btn btn-primary">Edit Info</a>
				</div>
			</div>
			<!-- FACULTY LIST TAB -->
			<div id="faculty" class="tab-pane fade in active">
				<div class>
					<a href="#" class="btn btn-success">Add</a>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Action</th>
					</tr>
					<?php foreach ($users as $row ) { ?>
					<tr>
						<td><?php echo $row['last_name'].", ".$row['first_name']; ?></td>
						<td>
							<a href="<?php echo base_url() ?>index.php/faculty/index/<?php echo $row['user_no'] ?>" class="btn btn-primary">View</a>
							<a href="#" class="btn btn-warning">Edit</a>
							<a href="#" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>