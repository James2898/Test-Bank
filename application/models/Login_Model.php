<?php 
	
	Class Login_Model extends CI_Model {

		public function login($data) {
			$where = "username ='".$data['username']."' AND password = '".$data['password']."'";
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($where);
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1){
				return array(
					'user_no'		=>	$query->row()->user_no,
					'first_name'	=>	$query->row()->first_name,
					'last_name'		=> 	$query->row()->last_name,
					'authorization'	=>	$query->row()->authorization
				);
			}else{
				return false;
			}
		}

	}

?>