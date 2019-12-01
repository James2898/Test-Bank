<!DOCTYPE html>
<html>
<head>
	<title>Subject - <?php echo $subject_lesson->subject_name; ?></title>
	<?php include APPPATH.'views/include_top.php' ?>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 8%;">
	<a href="<?php echo base_url() ?>index.php/subject" class="btn btn-primary" style="margin: 5px 0px;">Back</a>
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			<?php echo $subject_lesson->subject_name; ?>
		</h2>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="faculty" class="tab-pane fade in">
				<div style="margin: 5px 0;">
					<a href="<?php echo base_url() ?>index.php/lesson/add/<?php echo $subject_lesson->subject_no ?>" class="btn btn-success">Add Lesson</a>
				</div>
				<table class="table table-bordered">
					<tr>
						<th width="10%">No</th>
						<th>Lesson Name</th>
						<th>Author</th>
						<th>Action</th>
					</tr>
					<?php
						if(!empty($subject)) {
						foreach ($subject as $row ) {
					?>
					<tr>
						<td><?php echo $row['subject_name'] ?></td>
						<td>
							<a href="<?php echo base_url() ?>index.php/faculty/" class="btn btn-primary">View</a>
							<a onclick="confirmDelete('<?php echo base_url() ?>index.php/faculty/delete_subject/<?php echo $user->user_no; ?>/<?php echo $row['subject_no'] ?>')"  class="btn btn-danger">Delete</a>
						</td>
					</tr>
					<?php }}else{ ?>
						<td colspan="4" class="text-center">No lessons in this subject</td>
					<?php }?>
				</table>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>