<!DOCTYPE html>
<html>
<head>
	<title> Lesson - <?php echo empty($lesson) ? 'Create Lesson' : 'Edit Lesson'; ?></title>
	<?php include APPPATH.'views/include_top.php' ?>
	<script>
		$(document).ready(function(){
			$("#idLessonForm").validationEngine();
		});
	</script>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 8%;">
	<a href="<?php echo base_url() ?>index.php/lesson/index/<?php echo $subject_no; ?>" class="btn btn-primary" style="margin: 5px 0px;">Back</a>
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			<?php echo empty($lesson) ? 'Create Lesson' : 'Edit Lesson'; ?>
		</h2>
	</div>
	<div class="panel-body">
	<div class="tab-content">
	<div class="row">
		<div class="col-md-12">
			<form  id="idLessonForm" class="form-horizontal" method="POST" action="<?php echo base_url() ?>index.php/lesson/save/<?php echo $subject_no ?>" autocomplete="off" onsubmit="return validate();">
				<input type="hidden" name="lesson_no" value="<?php if(!empty($lesson)) echo $lesson->lesson_no; ?>">
				<div class="form-group">
					<span class="col-md-1"></span>
					<div class="col-md-4">
						Lesson Name
						<input id="idLessonName" type="text"  class="form-control validate[required]" name="lesson_name" value="<?php if(!empty($lesson->lesson_name)) echo $lesson->lesson_name; ?>">
					</div>
				</div>
				<div class="form-group">
					<span class="col-md-1"></span>
					<div class="col-md-4">
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