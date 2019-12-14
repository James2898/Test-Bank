<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php include 'include_top.php' ?>
</head>
<body>
	<?php include 'header.php' ?>
	<div class="container" style="margin-top: 9%;">
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			Home
		</h2>
	</div>
	<div class="panel-body">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
		  <li><a data-toggle="tab" href="#faculty">Subjects</a></li>
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
					<a href="<?php echo base_url()?>index.php/user/index/<?php echo $user->user_no ?>" class="btn btn-primary">Edit Info</a>
				</div>
			</div>
			<!-- FACULTY LIST TAB -->
			<div id="faculty" class="tab-pane fade in">
				<table class="table table-bordered">
					<tr>
						<th>Subject Name</th>
						<th>Subject Code</th>
						<th>Action</th>
					</tr>
					<?php
						if(!empty($subject)) {
						foreach ($subject as $row ) {
					?>
					<tr>
						<td><?php echo $row['subject_code'] ?></td>
						<td><?php echo $row['subject_name'] ?></td>
						<td>
							<a href="<?php echo base_url() ?>index.php/lesson/index/<?php echo $row['subject_no'] ?>" class="btn btn-primary">View</a>
						</td>
					</tr>
					<?php }}else{ ?>
						<td colspan="2" class="text-center">No subjects assigned to this faculty</td>
					<?php }?>
				</table>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>