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
			<?php echo $subject->subject_name;  ?> - Lessons
		</h2>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="faculty" class="tab-pane active">
				<div class>
					<a style="margin: 5px 0;" href="<?php echo base_url() ?>index.php/lesson/detail/<?php echo $subject->subject_no ?>" class="btn btn-success">Add Lesson</a>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Action</th>
					</tr>
					<?php
                        // print_r($lessons);
						if(!empty($lessons)) {
                            foreach ($lessons as $row) {
                    ?>
					<tr>
                        <td><?php echo $row['lesson_name'] ?></td>
						<td>
							<a href="<?php echo base_url() ?>index.php/question/index/<?php echo $row['lesson_no'] ?>/identification" class="btn btn-primary">View</a>
							<a href="<?php echo base_url() ?>index.php/lesson/detail/<?php echo $subject->subject_no."/".$row['lesson_no'] ?>" class="btn btn-warning">Edit</a>
							<a onclick="confirmDelete('<?php echo base_url() ?>index.php/lesson/delete/<?php echo $subject->subject_no.'/'.$row['lesson_no'] ?>')"  class="btn btn-danger">Delete</a>
						</td>
					</tr>
					<?php }}else{ ?>
					<tr>
						<td colspan="2" class="text-center">No Record of Lesson</td>
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