<!DOCTYPE html>
<html>
<head>
	<title>Faculty</title>
	<?php include APPPATH.'views/include_top.php' ?>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 9%;">
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			List of Faculty Members
		</h2>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<!-- FACULTY LIST TAB -->
			<div id="faculty" class="tab-pane active">
				<div class>
					<a style="margin: 5px 0;" href="<?php echo base_url() ?>index.php/user/index/" class="btn btn-success">Add User</a>
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
							<a href="<?php echo base_url() ?>index.php/faculty/detail/<?php echo $row['user_no'] ?>" class="btn btn-primary">View</a>
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