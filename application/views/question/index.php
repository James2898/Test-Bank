<!DOCTYPE html>
<html>
<head>
	<title>Questions</title>
	<?php include APPPATH.'views/include_top.php' ?>
	<script>
		$(document).ready(function(){
			$('#idQuestionForm').validationEngine();
			$("#idTypeExam").change(function(){
				$this = $(this);
				window.location.href = "<?php echo base_url()?>index.php/question/index/<?php echo $lesson->lesson_no ?>/"+$this.val();
			});

			$("#idSaveQuestion").click(function(){
				if(!$("#idQuestionForm").validationEngine('validate')){
					return;
				}
				var q_arr 	= $('input[name*="question_no"]').toArray();
				<?php if($type == 'trueorfalse'): ?>
				var a_arr 	= $('select[name*="answer_no"]').toArray();
				<?php else: ?>
				var a_arr	= $('input[name*="answer_no"]').toArray();
				<?php endif ?>
				console.log(a_arr);
				var q = {};
				for(i in q_arr){
					q[q_arr[i].value] = a_arr[i].value;
				}
				var data = {
					questions 	: JSON.stringify(q),
					type 		: "<?php echo $type ?>"
				}
				var url = "<?php echo base_url() ?>index.php/question/save/<?php echo $lesson->lesson_no ?>";
				if(confirm('Save?')){
					$.post(url, data ,function(json){
						if(json.result == "true"){
							location.reload();
						}
					},"json");
				}
			});

			$("#idAddQuestion").click(function(){
				var target	= "#idQuestions";
				var index	= $(".clQuestion").length + 1;
				if(index == 1){
					$('#idSaveQuestion').toggleClass('hide');
					$('#idEmpty').toggleClass('hide');
				}
				var div = $('<div>',{
					class : "form-group col-md-10 clQuestion"
				}).append(
					$('<label>',{
						text: "Question No."+index
					}),
					$('<input>',{
						type: "text",
						class: "form-control validate[required]",
						name: "question_no."+index,
					}),
					$('<br>'),
				);
				<?php if($type == 'trueorfalse'): ?>
				div.append(
					$('<label>',{
						text: "Answer No."+index
					}),
					$('<select>',{
						class: "form-control",
						name: "answer_no"+index,
					}).append(
						$('<option>',{
							value: "true",
							text: "True"
						}),
						$('<option>',{
							value: "false",
							text: "False"
						}),
					)
				);
				<?php elseif($type == 'essay'): ?>
				div.append(
					$('<input>',{
						type: "hidden",
						class: "form-control validate[required]",
						name: "answer_no"+index
					})
				);
				<?php else: ?>
				div.append(
					$('<label>',{
						text: "Answer No."+index
					}),
					$('<input>',{
						type: "text",
						class: "form-control validate[required]",
						name: "answer_no"+index
					})
				);
				<?php endif ?>
				div.append(
					$('<div class="text-right">').append(
						$('<a>',{
							class : "btn btn-danger",
							text: "Delete"
						}).click(function(){
							if(confirm('Remove?')){
								$(this).parent().parent().remove();
							}
						})
					)
				);
				div.appendTo(target);
			})
			if($(".clQuestion").length){
				$('#idSaveQuestion').toggleClass('hide');
			}
		});
	</script>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 9%;">
	<a style="margin: 5px 0;" href="<?php echo base_url() ?>index.php/lesson/index/<?php echo $lesson->subject_no ?>" class="btn btn-primary">Back</a>
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			<?php echo $lesson->lesson_name;  ?> - Questions
		</h2>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="faculty" class="tab-pane active">
				<div class="row" style="padding: 10px;">
					<div class="col-md-2">
						<label class="text-center">Type of Question</label>
						<select id="idTypeExam" class="form-control">
							<option <?php if($type == 'indentification') echo 'selected' ?> value="identification">
								Identification
							</option>
							<option <?php if($type == 'enumeration') echo 'selected' ?> value="enumeration">
								Enumeration
							</option>
							<option <?php if($type == 'trueorfalse') echo 'selected' ?> value="trueorfalse">
								True or False</option>
							<option <?php if($type == 'essay') echo 'selected' ?> value="essay">
								Essay
							</option>
						</select>
						<br>
						<div class="form-group">
							<a id="idAddQuestion" class="btn btn-success ">Add Question</a>
						</div>
					</div>
					<div class="col-md-10 " style="padding: 5px;">
						<form id="idQuestionForm">
							<div id="idQuestions">
								<?php if($questions){
									$i = 1;
									foreach($questions as $question){
								?>
								<div class="form-group col-md-10 clQuestion">
									<label>Question No.<?php echo $i ?></label>
									<input type="text" class="form-control validate[required]" name="question_no.<?php echo $i ?>" value="<?php echo $question['question']; ?>">
									<br>
									<?php if($type == 'trueorfalse'): ?>
										<label>Answer No.<?php echo $i ?></label>
										<select class="form-control" name="answer_no.<?php echo $i++ ?>">
											<option value="<?php echo "true" ?>" <?php if($question['answer'] == 'true'){echo 'selected';} ?>>True</option>
											<option value="<?php echo "false"?>" <?php if($question['answer'] == 'false'){echo 'selected';} ?>>False</option>
										</select>
									<?php elseif($type == 'essay'): ?>
										<input type="hidden" name="answer_no.<?php echo $i++?>">
									<?php else: ?>
									<label>Answer No.<?php echo $i ?></label>
									<input type="text" class="form-control validate[required]" name="answer_no.<?php echo $i++?>" value="<?php echo $question['answer'] ?>">
									<?php endif ?>
									<div class="text-right">
										<a onclick="confirmDelete('<?php echo base_url() ?>index.php/question/delete/<?php echo $lesson->lesson_no ?>/<?php echo $question['question_no'] ?>/<?php echo $type ?>')"  class="btn btn-danger">Delete</a>
									</div>
								</div>
								<?php }?>
							</div>
							<?php }else{ ?>
							<div id="idEmpty" class="form-group text-center">
								<h3>No Question for this Type</h3>
							</div>
							<?php } ?>
						</form>
					</div>
					<div class="form-group text-center col-md-12">
						<a id="idSaveQuestion" class="btn btn-success btn-lg hide">Save</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>