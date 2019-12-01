<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->model('Subject_Model');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index(){

        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $users = $this->User_Model->get_all_faculty();
        $data = array(
            'users'      =>  $users,
        );
        $this->load->view('faculty/index',$data);
    }

    public function detail($user_no){

        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $user       = $this->User_Model->get_user($user_no);
        $subject    = $this->Subject_Model->get_user_subjects($user_no);
        $data = array(
            'user'      =>  $user,
            'subject'   =>  $subject
        );
        $this->load->view('faculty/detail',$data);
    }

    public function faculty_subject($user_no){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $user           = $this->User_Model->get_user($user_no);
        $user_subject   = $this->Subject_Model->get_user_subject_no($user_no);
        $subject        = $this->Subject_Model->get_all_subjects();

        $data = array(
            'user'          => $user,
            'user_subject'  => $user_subject,
            'subject'       => $subject
        );

        $this->load->view('faculty/faculty_subject',$data);
    }

    public function add_subject($user_no){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $data = array();
        foreach($this->input->post() as $row){
            array_push($data,$row);
        }
        $this->Subject_Model->add_user_subject($data,$user_no);
        $_SESSION['result'] = 'Success';
        redirect(base_url().'index.php/faculty/detail/'.$user_no,'refresh');
    }

    public function delete_subject($user_no = '',$subject_no = ''){
        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $this->Subject_Model->delete_user_subject($user_no+0,$subject_no+0);
        $_SESSION['result'] = 'Success';
        redirect(base_url().'index.php/faculty/detail/'.$user_no,'refresh');
    }
}
