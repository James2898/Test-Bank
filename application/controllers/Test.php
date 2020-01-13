<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->model('Test_Model');
        $this->load->model('Subject_Model');
        $this->load->model('Lesson_Model');
        $this->load->library('Pdf');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index($subject_no = ''){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $subject   = $this->Subject_Model->get_subject($subject_no);
        $lessons   = $this->Lesson_Model->get_lessons($subject_no);
        $data       = array(
            'subject'   =>  $subject,
            'lessons'   =>  $lessons
        );
        $this->load->view('test/index',$data);
    }

    public function generate($subject_no = ''){
        $post = $this->input->post();

        $post_data = array();
        $temp = array();

        $index = 1;
        $i = 1;

        foreach ($post as $temp_key => $value) {
            list($key) = explode("_",$temp_key);
            if($key == "type" || $key == 'lesson' || $key == 'item' || $key == 'instruction'){
                $temp[$key] = $value;
                if($i++ == 4){
                    $data = array();
                    $data['questions']      = $this->Test_Model->get_exams($subject_no,$temp['type'],$temp['lesson'],$temp['item']);
                    $data["instruction"]    = $temp['instruction'];
                    $data['type']           = $temp['type'];
                    $temp = array();
                    $i = 1;
                    $post_data['exam_'.$index++] = $data;
                }
            }else{
                $post_data[$key] = $value;
            }
        }

        if(isset($post['answer'])){
            $post_data['answer'] = true;
        }
        $post_data['trimester'] = $post['trimester'];

        $subject = $this->Subject_Model->get_subject($subject_no);

        $data = array(
            'exam'      => $post_data,
            'subject'   => $subject,
        );
        $this->load->view('test/generate',$data);
    }
}
