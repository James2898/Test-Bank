<html>
<head>
<style>
    .select2 {
        width: 100% !important;
    }
</style>
<script>
    $(document).ready(function() {
        $('.multiple').select2({
            placeholder: "Type of Exam"
        });

        $('#idTest').validationEngine();

        addExam();
        initSelect();

        $('#idGetSelect').click(function(){
            var data = {};
            var index = 1; 
            $('.clTest').each(function(){
                $this = $(this);
                var row = {};
                row['type']     = $this.find('.clType').val();
                row['lessons']  = $this.find('.clLesson').val();
                row['items']    = $this.find('.clItems').val();
                data['exam_'+index++] = row;
            });
            console.log(data);
        });

        $('#idAddSelect').click(function(){
            addExam();
            initSelect();
        });
    });

    function initSelect(){
        $('select[class*="clLesson"]').select2({});
    }

    function addExam(){
        var target  = "#idTest"
        var index   = $('.clTest').length + 1;

        var div = $('<div>',{
        class: "form-group col-md-10 clTest"
    }).append(
        $('<label>',{
            text: "Test No." + index
        }),
        $('<br>'),
    );

    var type = $('<label>',{
        text: "Type of Exam:"
    }).append(
        $('<select>',{
            class: "form-control clType",
            name: "type",
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
                value   : "Essay",
                text    : "Essay"
            }),
        ),
    );

    var lesson =  $('<label>',{
        text: "Lesson"
    }).append(
        $('<select>',{
            id      : "idSelect_"+index,
            name    : "Select_"+index,
            class   : "form-control clLesson validate[required]",
            multiple: "multiple"
        }).append(
            $('<option>',{
                value   : "1",
                text    : "1"
            }),
            $('<option>',{
                value   : "2",
                text    : "2"
            }),
            $('<option>',{
                value   : "3",
                text    : "3"
            }),
        )
    );

    var items = $('<label>',{
        text: "No. of Items:"
    }).append(
        $('<input>',{
            type    : "number",
            class   : "form-control clItems validate[required]",
            min     : "1",
            value   : "1",
        })
    );

    div.append(type,$('<br>'),lesson,$('<br>'),items)
    div.appendTo(target)
}
</script>
</head>
<div class="container">
    <form id="idTest" class="row">
        <div class="col-md-6 bg-primary">
        </div>
    </form>
    <div class="col-md-12 bg-danger">
        <button id="idAddSelect" class="btn btn-success">Add</button>
        <button id="idGetSelect" class="btn btn-primary">Get</button>
    </div>
</div>
</html>