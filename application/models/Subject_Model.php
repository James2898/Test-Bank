<?php

	Class Subject_Model extends CI_Model {

        public function get_user_subjects($user_no){
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

        public function get_user_subject_no($user_no){
            $this->db->select('subject_no');
            $this->db->from('faculty_subject');
            $this->db->where('user_no',$user_no);

            $query = $this->db->get();

            if($query->num_rows() > 0){
                foreach ($query->result_array() as $row){
                    $data[$row['subject_no']] = true;
                }
                return $data;
            }else{
                return false;
            }
        }

        public function add_user_subject($data,$user_no){
            $this->db->where('user_no',$user_no);
            $this->db->delete('faculty_subject');

            foreach ($data as $subject_no){
                $row = array(
                    'subject_no'    => $subject_no,
                    'user_no'       => $user_no,
                );
                $this->db->insert('faculty_subject',$row);
            }
        }

		public function get_all_subjects() {
			$this->db->select('*');
            $this->db->from('subject');
            $this->db->order_by('subject_name','asc');
			$query = $this->db->get();

			if($query->num_rows() > 0){
                return $query->result_array();
			}else{
				return false;
			}
        }

        public function delete_user_subject($user_no,$subject_no) {
            $where = "user_no = {$user_no} AND subject_no = {$subject_no}";
            $this->db->where($where);
            $this->db->delete('faculty_subject');
        }
	}

?>