<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php include APPPATH.'views/include_top.php' ?>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 5%;">
	<div class="panel panel-default">
	<div class="panel-body">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#profile">Faculty Info</a></li>
		  <li><a data-toggle="tab" href="#faculty">Faculty Subjects</a></li>
		</ul>
		<div class="tab-content">
			<!-- PROFILE TAB -->
			<div id="profile" class="tab-pane fade in active">
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
					<a href="<?php echo base_url()?>/faculty/detail/<?php echo $user->user_no ?>" class="btn btn-primary">Edit Info</a>
				</div>
			</div>
			<!-- FACULTY LIST TAB -->
			<div id="faculty" class="tab-pane fade in">
				<div class>
					<a href="#" class="btn btn-success">Add Subject</a>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Subject Name</th>
						<th>Action</th>
					</tr>
					<?php foreach ($subject as $row ) { ?>
					<tr>
						<td><?php echo $row['subject_name'] ?></td>
						<td>
							<a href="<?php echo base_url() ?>index.php/faculty/" class="btn btn-primary">View</a>
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