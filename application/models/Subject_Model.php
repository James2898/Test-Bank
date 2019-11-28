<?php

	Class Subject_Model extends CI_Model {

        public function get_faculty_subjects($user_no){
            $where = "faculty_subject.user_no = '{$user_no}'";
            $this->db->select('*');
            $this->db->from('faculty_subject');
            $this->db->join('subject','subject.subject_no = faculty_subject.subject_no');
            $this->db->where($where);

            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }
        }

		public function get_all_subjects() {
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