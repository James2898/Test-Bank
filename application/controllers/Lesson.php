<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Lesson extends CI_Controller {
    function __construct(){
        // this is your constructor
        parent::__construct();
    	$this->load->model('Lesson_Model');
    	$this->load->model('Subject_Model');
    	$this->load->database();
    	$this->load->library('form_validation');
    	$this->load->helper('form');;
		$this->load->helper('url');
    }

    public function index($subject_no = ''){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }

        $lessons     = $this->Lesson_Model->get_lessons($subject_no);
        $subject    = $this->Subject_Model->get_subject($subject_no);

        $data = array(
            'lessons' => $lessons,
            'subject' => $subject,
        );

        $this->load->view('lesson/index',$data);
    }

    public function detail($subject_no = '',$lesson_no = ''){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }

        $lesson = $this->Lesson_Model->get_lesson($lesson_no);

        $data = array(
            'subject_no'    => $subject_no,
            'lesson'        => $lesson,
        );

        // print_r($data);
        $this->load->view('lesson/detail',$data);
    }

    public function save($subject_no){
        $lesson_no  = $this->input->post('lesson_no') + 0;

        $data = array(
            'lesson_name'   =>  $this->input->post('lesson_name'),
            'subject_no'    =>  $subject_no,
            'user_no'       =>  $_SESSION['user_no'],
        );

        if($lesson_no > 0){
            $result = $this->Lesson_Model->update($data,$lesson_no);
        }else{
            $result = $this->Lesson_Model->create($data);
        }
        $_SESSION['result'] = ($result) ? 'Success' : 'Error';
        redirect(base_url().'index.php/lesson/index/'.$subject_no);
    }

    public function delete($subject_no = '',$lesson_no = ''){
        $result = $this->Lesson_Model->delete($lesson_no);

        $_SESSION['result'] = ($result) ? 'Success' : 'Error: Subject Assgined';
        redirect(base_url().'index.php/lesson/index/'.$subject_no);
    }
}
?>