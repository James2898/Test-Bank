<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php include APPPATH.'views/include_top.php' ?>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 10%;">
	<div class="panel panel-default">
	<div class="panel-heading text-center">
		<h2>
			<?php echo $user->first_name." ".$user->last_name ?> - Subjects
		</h2>
	</div>
	<div class="panel-body">
	<form method="POST" action="<?php echo base_url(); ?>index.php/Faculty/add_subject/<?php echo $user->user_no ?>">
	<table class="table table-bordered table-responsive">
		<?php $n = 0; foreach ($subject as $row ){?>
			<tr>
				<td width="10%" class="text-center">
					<input type="checkbox" name="subject_<?php echo $n++ ?>" value="<?php echo $row['subject_no'] ?>" class="custom-control-input" <?php if(isset($user_subject[$row['subject_no']])){ echo "checked";} ?>/>
				</td>
				<td>
					<p><?php echo $row['subject_name']; ?></p>
				</td>
			</tr>
		<?php } ?>
	</table>
	<div class="form-group">
		<div class="col-md-12 text-center">
			<button type="submit" class="btn btn-success btn-lg">Save</button>
		</div>
	</div>
	</form>
	</div>
	</div>
	</div>
</body>
</html>