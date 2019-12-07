<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Question extends CI_Controller {
    function __construct(){
        // this is your constructor
        parent::__construct();
        $this->load->model('Lesson_Model');
        $this->load->model('Question_Model');
    	$this->load->database();
    	$this->load->library('form_validation');
    	$this->load->helper('form');;
		$this->load->helper('url');
    }

    public function index($lesson_no = '', $type = ''){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }

        $lesson    = $this->Lesson_Model->get_lesson($lesson_no);
        $questions  = $this->Question_Model->get_questions($lesson_no,$type);

        $data = array(
            'lesson'    => $lesson,
            'questions' => $questions,
            'type'      => $type,
        );

        $this->load->view('question/index',$data);
    }

    public function save($lesson_no = ''){
        $type = $this->input->post('type');
        $questions = json_decode($this->input->post('questions'));
        $this->Question_Model->create($questions,$lesson_no,$type);
        echo json_encode(array(
            'result' => 'true'
        ));
        $_SESSION['result'] = 'Success';
    }

    public function delete($lesson_no = '',$question_no = '',$type=''){
        $result = $this->Question_Model->delete($question_no);

        $_SESSION['result'] = ($result) ? 'Success' : 'Error: Subject Assgined';
        redirect(base_url().'index.php/question/index/'.$lesson_no.'/'.$type);
    }
}
?>