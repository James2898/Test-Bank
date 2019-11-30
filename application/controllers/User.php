<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index($user_no = ''){

        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $user = $this->User_Model->get_user($user_no);
        $data = array(
            'user'      =>  $user,
        );
        $this->load->view('user/index',$data);
    }

    public function save(){
        $user_no = $this->input->post('user_no') + 0;
        $data = array(
            'first_name'        =>  $this->input->post('first_name'),
            'last_name'         =>  $this->input->post('last_name'),
            'username'	        =>	$this->input->post('username'),
            'authorization'     =>  $this->input->post('authorization') + 0,
        );
        if( !empty($this->input->post('password')) && !empty($this->input->post('confirm_password')) ){
            $data['password']   =  $this->input->post('password');
        }
        if($user_no > 0){
            $result = $this->User_Model->update($data,$user_no);
        }else{
            $result = $this->User_Model->create($data,$user_no);
        }
        // print_r($result);
        $_SESSION['result'] = ($result) ? 'Success' : 'Error';
        redirect(base_url().'index.php/user/index/'.$result);
    }

    public function delete($user_no){
        $this->User_Model->delete($user_no+0);
        $_SESSION['result'] = 'Success';
        redirect(base_url().'index.php/home');
    }
}
?>