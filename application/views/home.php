<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php include 'include_top.php' ?>
	<!-- <script>
		function confirmDelete(url) {
			if(confirm('Are you sure to delete?')){
				redirect(url);
			}else{
				return false;
			}
		}
	</script> -->
</head>
<body>
	<?php include 'header.php' ?>
	<div class="container" style="margin-top: 10%;">
	<div class="panel panel-default">
	<div class="panel-body">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
		  <li><a data-toggle="tab" href="#faculty">Faculty Members</a></li>
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
					<a href="<?php echo base_url() ?>index.php/user/index/<?php echo $user->user_no ?>" class="btn btn-primary">Edit Info</a>
				</div>
			</div>
			<!-- FACULTY LIST TAB -->
			<div id="faculty" class="tab-pane fade in">
				<div class>
					<a href="<?php echo base_url() ?>index.php/user/index/" class="btn btn-success">Add</a>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Authorization</th>
						<th>Action</th>
					</tr>
					<?php
						if(!empty($users)) {
						foreach ($users as $row ) { ?>
					<tr>
						<td><?php echo $row['last_name'].", ".$row['first_name']; ?></td>
						<td><?php echo ($row['authorization'] == '1') ? 'Admin' : 'Faculty'; ?>
						<td>
							<a href="<?php echo base_url() ?>index.php/faculty/index/<?php echo $row['user_no'] ?>" class="btn btn-primary">View</a>
							<a href="<?php echo base_url() ?>index.php/user/index/<?php echo $row['user_no']?>" class="btn btn-warning">Edit</a>
							<a onclick="confirmDelete('<?php echo base_url() ?>index.php/user/delete/<?php echo $row['user_no']?>')"  class="btn btn-danger">Delete</a>
						</td>
					</tr>
					<?php }}else{ ?>
					<tr>
						<td colspan="2" class="text-center">No Faculty Member</td>
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