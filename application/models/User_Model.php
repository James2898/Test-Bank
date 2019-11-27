<?php

	Class User_Model extends CI_Model {

        public function get_user($user_no){
            $where = "user_no = '{$user_no}'";
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where($where);
            $this->db->limit(1);

            $query = $this->db->get();

            if($query->num_rows() == 1){
                return $query;
            }
        }

		public function get_all_faculty() {
            $where = "authorization = '2'";
			$this->db->select('*');
            $this->db->from('user');
            $this->db->where($where);

			$query = $this->db->get();

			if($query->num_rows() > 0){
                return $query->result_array();
			}else{
				return false;
			}
		}

	}

?>