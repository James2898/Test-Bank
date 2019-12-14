<!DOCTYPE html>
<html>
<head>
	<title>Subject - <?php  echo (!empty($subject)) ? $subject->subject_name: 'Create';  ?></title>
	<?php include APPPATH.'views/include_top.php' ?>
	<script>
		$(document).ready(function(){
			$("#idSubjectForm").validationEngine();
		});
	</script>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 8%;">
	<a href="<?php echo base_url() ?>index.php/subject" class="btn btn-primary" style="margin: 5px 0px;">Back</a>
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			<?php echo empty($subject) ? 'Create Subject' : 'Edit Subject'; ?>
		</h2>
	</div>
	<div class="panel-body">
	<div class="tab-content">
	<div class="row">
		<div class="col-md-12">
			<form  id="idSubjectForm" class="form-horizontal" method="POST" action="<?php echo base_url() ?>index.php/subject/save" autocomplete="off" onsubmit="return validate();">
				<input type="hidden" name="subject_no" value="<?php if(!empty($subject)) echo $subject->subject_no; ?>">
				<div class="form-group">
					<span class="col-md-1"></span>
					<div class="col-md-4">
						Subject Code
						<input id="idSubjectCode" type="text"  class="form-control validate[required]" name="subject_code" value="<?php if(!empty($subject->subject_code)) echo $subject->subject_code; ?>">
					</div>
					<div class="col-md-4">
						Subject Name
						<input id="idSubjectName" type="text"  class="form-control validate[required]" name="subject_name" value="<?php if(!empty($subject->subject_name)) echo $subject->subject_name; ?>">
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