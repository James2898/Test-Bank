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
                var data = {};

                if($('#idAnswerKey').ischecked()){
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
                $('<label>',{
                    text: "Type of Exam"
                }),
            );

            var select = $('<select>',{
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
                    name    : "Select_"+index,
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
                $(this).parent().remove();
            })
            div.append(select,lblLesson,$('<br>'),lesson,$('<br>'),items,$('<br>'),remove);
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
                    <div class="col-md-2">
						<table>
							<tr>
								<td width="2%" class="text-center">
                                    <input type="checkbox" value="true" id="idAnswerKey"/>
                                </td>
                                <td width="10%">
									Generate Answer Key
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
					<div class="col-md-10">
					    <form id="idExamForm">
                            <div id="idExams">
                            </div>
					    </form>
					</div>
                </div>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>