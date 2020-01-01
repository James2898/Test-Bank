<!DOCTYPE html>
<html>
<head>
	<title>Subject</title>
	<?php include APPPATH.'views/include_top.php' ?>
    <style>
        ul.multiselect-container { width: 100% !important; position: relative !important; }
    </style>
    <script>
        $(document).ready(function(){
            addExam();

            $('#idExamForm').validationEngine();

            $('#idAddExam').click(function(){
                addExam();
            });

            $('#idGenerateExam').click(function(){
                if(!$("#idExamForm").validationEngine('validate')){
					return;
				}
                if(!confirm('Are you sure to generate exam?')){
                    return;
                }

                $('#idExamForm').submit();
                return;



                var data = {};
                if($('#idAnswerKey').prop('checked') == true){
                    data['answer_key'] = true;
                }

                var index = 1;
                $('.clExam').each(function(){
                    $this = $(this);
                    var row = {};
                    row['type']     = $this.find('.clType').val();
                    row['lessons']  = $this.find('.clLesson').val();
                    row['items']    = $this.find('.clItems').val();
                    data['exam_'+index++] = row;
                });

                console.log(data);

                var url = "<?php echo base_url() ?>index.php/test/generate";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType:"json",
                    cache: false,
                    success: function (json) {
                        
                    }
                });
                // $.post(url, data ,function(json){
                // },"json");
            })
        });
        function addExam(){
            var target  = "#idExams";
            var index   = $('.clExam').length + 1;

            var div = $('<div>',{
                class: "form-group col-md-10 clExam"
            }).append(
                $('<label>',{
                    text: "Test No."+index
                }),
                $('<br>'),
            );
            var lblInstruction = $('<label>',{
                    text: "Instruction"
                });
            var instruction =
                $('<input>',{
                    name: "instruction_"+index,
                    class: "form-control clInstruction",
                    type: "text",
                });

            var lblExamType = $('<label>',{
                text: "Exam Type"
            });

            var select = $('<select>',{
                name:  "type_"+index,
                class:  "form-control clType"
            }).append(
                $('<option>',{
                    value   : "identification",
                    text    : "Identification"
                }),
                $('<option>',{
                    value   : "enumeration",
                    text    : "Enumeration"
                }),
                $('<option>',{
                    value   : "multiple",
                    text    : "Multiple"
                }),
                $('<option>',{
                    value   : "trueorfalse",
                    text    : "True or False"
                }),
                $('<option>',{
                    value   : "essay",
                    text    : "Essay"
                }),
            )

            var lesson = $('<select>',{
                    id      : "idSelect_"+index,
                    name    : "lesson_"+index+"[]",
                    class   : "clLesson validate[required]",
                    multiple: "multiple",
                    width: "100%"
                }).append(
                    <?php foreach($lessons as $row): ?>
                    $('<option>',{
                        value   : "<?php echo $row['lesson_no'] ?>",
                        text    : "<?php echo $row['lesson_name'] ?>"
                    }),
                    <?php endforeach ?>
                )
            var lblLesson = $('<label>',{
                    text: "Lesson"
            });
            var items = $('<label>',{
                text: "No. of Items"
            }).append(
                $('<br>'),
                $('<input>',{
                    name: "item_"+index,
                    class: "form-control clItems",
                    type: "number",
                    min: "1",
                    value: "1"
                })
            );

            var remove = $('<a>',{
                class: "btn btn-danger remove",
                text: "Remove Exam",
            }).click(function(){
                 if($('.clExam').length == 1){
                    alert('Minimum 1 Exam')
                    return;
                 }
                 if(confirm('Are you sure to delete?')){
                    $(this).parent().remove();
                 }
            })
            div.append(lblInstruction,$('<br>'),instruction,lblExamType,$('<br>'),select,lblLesson,$('<br>'),lesson,$('<br>'),items,$('<br>'),remove);
            div.appendTo(target);
            initFunction();
        }
        function initFunction(){
            $('.clLesson').select2();
        }
    </script>
</head>
<body>
	<?php include APPPATH.'views/header.php' ?>
	<div class="container" style="margin-top: 9%;">
	<div>
		<a style="margin: 5px 0;" href="<?php echo base_url() ?>index.php/subject" class="btn btn-primary">Back to Subjects</a>
	</div>
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>
			<?php echo $subject->subject_name;  ?> - Generate Exam
		</h2>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="faculty" class="tab-pane active">
				<!-- <div>
					<a style="margin: 5px 0;" href="<?php echo base_url() ?>index.php/lesson/detail/<?php echo $subject->subject_no ?>" class="btn btn-success">Add Lesson</a>
				</div>
				 -->
                <div class="row" style="padding: 0px 10px">
					<form id="idExamForm" action="<?php echo base_url() ?>index.php/test/generate/<?php echo $subject->subject_no ?>" method="POST" target="_blank">
                    <div class="col-md-3">
						<table class="table table-bordered">
                            <tr>
                                <td width="2%">School Year</td>
                                <td class="text-center">
                                    <input type="text" name="syear" placeholder="Start Year">
                                    <input type="text" name="eyear" placeholder="End Year">
                                </td>
                            </tr>
                            <tr>
                                <td width="2%">Trimester</td>
                                <td>
                                    <select class="" name="trimester">
                                        <option value="1st Trimester">1st Trimester</option>
                                        <option value="2nd Trimester">2nd Trimester</option>
                                        <option value="3rd Trimester">3rd Trimester</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="2%">Term</td>
                                <td>
                                    <select class="" name="term">
                                        <option value="Preliminary">Preliminary</option>
                                        <option value="Midterm">Midterm</option>
                                        <option value="Final">Final</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Instructors</td>
                                <td>
                                    <input type="text" name="instructor">
                                </td>
                            </tr>
                            <tr>
                                <td width="10%">
									Generate Answer Key
                                </td>
								<td width="2%" class="text-center">
                                    <input type="checkbox" class="checkbox" name="answer"/>
                                </td>
							</tr>
						</table>
                        <br>
                        <div class="btn btn-group btn-group-vertical">
                        <a id="idAddExam" class="btn btn-success ">Add Exam</a>
                        <br>
                        <a id="idGenerateExam" class="btn btn-info ">Generate Exam</a>
                        </div>
                    </div>
					<div class="col-md-9">
                            <div id="idExams">
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