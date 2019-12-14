<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->model('Subject_Model');
        $this->load->model('Lesson_Model');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index(){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $subjects   = $this->Subject_Model->get_all_subjects();
        $data       = array(
            'subjects'   =>  $subjects
        );
        $this->load->view('subject/index',$data);
    }

    public function detail($subject_no = ''){
        if(!isset($_SESSION['authorization']) || $_SESSION['authorization'] != '1'){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $subject = $this->Subject_Model->get_subject($subject_no);
        $data           = array(
            'subject'  =>  $subject,
        );
        $this->load->view('subject/detail',$data);
    }

     public function save(){
        $subject_no = $this->input->post('subject_no') + 0;
        $data = array(
            'subject_code'      =>  $this->input->post('subject_code'),
            'subject_name'      =>  $this->input->post('subject_name')
        );
        if($subject_no > 0){
            $result = $this->Subject_Model->update($data,$subject_no);
        }else{
            $result = $this->Subject_Model->create($data);
        }
        $_SESSION['result'] = ($result) ? 'Success' : 'Error';
        redirect(base_url().'index.php/subject/index/');
    }

    public function delete($subject){
        $result = $this->Subject_Model->delete($subject);

        $_SESSION['result'] = ($result) ? 'Success' : 'Error: Subject Assgined';
        redirect(base_url().'index.php/subject');
    }
}
