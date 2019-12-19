<!DOCTYPE html>
<html>
<head>
	<title>Subject</title>
	<?php include APPPATH.'views/include_top.php' ?>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 9%;">
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			List of Subjects
		</h2>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="faculty" class="tab-pane active">
				<?php if($_SESSION['authorization'] == '1'): ?>
				<div>
					<a style="margin: 5px 0;" href="<?php echo base_url() ?>index.php/subject/detail/" class="btn btn-success">Add Subject</a>
				</div>
				<?php endif ?>
				<table class="table table-bordered">
					<tr>
						<th width="20%">Subject Code</th>
						<th>Subject Name</th>
						<th width="30%">Action</th>
					</tr>
					<?php
						if(!empty($subjects)) {
						foreach ($subjects as $row ) { ?>
					<tr>
						<td><?php echo $row['subject_code'] ?></td>
                        <td><?php echo $row['subject_name'] ?></td>
						<td>
							<a href="<?php echo base_url() ?>index.php/lesson/index/<?php echo $row['subject_no'] ?>" class="btn btn-primary">View</a>
							<?php if($_SESSION['authorization'] == '1'): ?>
							<a href="<?php echo base_url() ?>index.php/subject/detail/<?php echo $row['subject_no']?>" class="btn btn-warning">Edit</a>
							<a onclick="confirmDelete('<?php echo base_url() ?>index.php/subject/delete/<?php echo $row['subject_no']?>')"  class="btn btn-danger">Delete</a>
							<?php endif; ?>
							<a href="<?php echo base_url() ?>index.php/test/index/<?php echo $row['subject_no'] ?>" class="btn btn-info">Generate Test</a>
						</td>
					</tr>
					<?php }}else{ ?>
					<tr>
						<td colspan="2" class="text-center">No Record of Subject</td>
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