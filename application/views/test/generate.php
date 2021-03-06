<?php
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle($subject->subject_name);
// set default header data

// set header and footer fonts

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
$pdf->AddPage();

// create some HTML content
$html = '
<table border="1" cellpadding="2">
	<tr>
		<td rowspan="2"><img src="'.base_url().'/assets/img/brand.png"/></td>
        <td rowspan="2" style="text-align:center">
            <b>'.$exam['term'].' Examination<br>
            '.$exam['trimester'].'<br>
            SY '.$exam['syear'].' - '.$exam['eyear'].'</b>
        </td>
        <td><b>Course Code:</b> '.$subject->subject_code.' </td>
        <td><b>No of Copies:</b> </td>
    </tr>
    <tr>
        <td><b>Instructor:</b>'.$exam['instructor'].'</td>
        <td><b>Proctor:</b></td>
    </tr>
    <tr>
        <td colspan="2"><b>Course Title:</b> '.$subject->subject_name.'</td>
        <td><b>Date:</b> </td>
        <td><b>Room:</b> </td>
    </tr>
</table>';
// print_r($exam);
$exam_no = 1;
$answer_keys = array();
foreach ($exam as $temp_key => $test) {
    list($key) = explode("_",$temp_key);
    if($key != 'exam'){
        continue;
    }

    ksort($test);
    $questions = array();
    $type;
    foreach($test as $q_key => $q_value){
        if($q_key == 'instruction'){
            $html .= "
                <table style='margin-top: 10px;'>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Test ".$exam_no++.". ".$q_value."</b></td>
                    </tr>
                </table>
            ";
        }else if($q_key == 'questions'){
            $questions = $q_value;
        }else if($q_key == 'type'){
            $type = $q_value;
        }
    }
    if($questions == NULL){ continue; }
    if($type == 'identification'){
        // print_r($questions);
        $item_no = 1;
        $html .= '<table cellspacing="3"><tr><td></td></tr>';
        $temp_answer = array();
        foreach ($questions as $question => $answer){
            array_push($temp_answer,$answer);
            $html .= '
                <tr>
                    <td>____________________ '.$item_no++.'. '.$question.'</td>
                </tr>
            ';
        }
        array_push($answer_keys, $temp_answer);
        $html .= "</table>";
    }else if($type == 'enumeration'){
        $item_no = 1;
        $html .= '<table><tr><td></td></tr>';
        $temp_answer = array();
        foreach ($questions as $question => $answer) {
            array_push($temp_answer, $answer);
            $html .= '
                <tr>
                    <td><p>'.$item_no++.'. '.$question.'</p></td>
                </tr>';
        }
        array_push($answer_keys, $temp_answer);
        $html .="</table>";
    }elseif ($type == 'multiple'){
        $item_no = 1;
        $html .= '<table><tr><td></td></tr>';
        $temp_answer = array();
        foreach ($questions as $question => $answer) {
            $html .= '<tr>
                        <td><p>'.$item_no++.'. '.$question.'</p>
                        <ol type="a">
                    ';
            $answer = explode(",",$answer);
            $key = $answer[0];
            shuffle($answer);
            foreach($answer as $value){
                $html .= "<li>".$value."</li>";
            }

            array_push($temp_answer,chr(array_search($key,$answer) + 97).". ".$key);

            $html .= "</ol></td></tr><tr><td></td></tr>";
        }
        array_push($answer_keys, $temp_answer);
        $html .="</table>";
    }elseif ($type == 'trueorfalse') {
        $item_no = 1;
        $html .= '<table cellspacing="3"><tr><td></td></tr>';
        $temp_answer = array();
        foreach ($questions as $question => $answer){
            array_push($temp_answer, $answer);
            $html .= '
                <tr>
                    <td>____________________ '.$item_no++.'. '.$question.'</td>
                </tr>
            ';
        }
        array_push($answer_keys, $temp_answer);
        $html .= "</table>";
    }else if($type == 'essay'){
        $item_no = 1;
        $html .= '<table cellspacing="3"><tr><td></td></tr>';
        foreach ($questions as $question => $answer){
            if(isset($exam['answer'])){
                $html .= '
                    <tr>
                        <td>'.$item_no++.'. '.$question.'</td>
                    </tr>
                ';
            }else{
                $html .= '
                    <tr>
                        <td>'.$item_no++.'. '.$question.'</td>
                    </tr>
                ';
            }
        }
        array_push($answer_keys,array());
        $html .= "</table>";
    }
}


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


if(isset($exam['answer'])){
    $pdf->AddPage();
    $html = '
    <table border="1" cellpadding="2">
        <tr>
            <td rowspan="2"><img src="'.base_url().'/assets/img/brand.png"/></td>
            <td rowspan="2" style="text-align:center">
                <b>'.$exam['term'].' Examination<br>
                '.$exam['trimester'].'<br>
                SY '.$exam['syear'].' - '.$exam['eyear'].'</b>
            </td>
            <td><b>Course Code:</b> '.$subject->subject_code.' </td>
            <td><b>No of Copies:</b> </td>
        </tr>
        <tr>
            <td><b>Instructor:</b>'.$exam['instructor'].'</td>
            <td><b>Proctor:</b></td>
        </tr>
        <tr>
            <td colspan="2"><b>Course Title:</b> '.$subject->subject_name.' (Answer Key)</td>
            <td><b>Date:</b> </td>
            <td><b>Room:</b> </td>
        </tr>
    </table>';
    $ctr = 1;
    foreach ($answer_keys as $answer){
        $html .= "<table>
                    <tr><td></td></tr>
                    <tr>
                        <td><b>Test ".$ctr++."</b></td>
                    </tr>
                    <tr><td></td></tr>
        ";
        $itr = 1;
        foreach ($answer as $item){
            $html .= "<tr><td>".$itr++.". ".$item."</td></tr>";
        }

        $html .= "</table>";
        // print_r($answer);
    }

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
}
// add a page


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
