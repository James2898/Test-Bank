<?php

	Class Lesson_Model extends CI_Model {

        public function get_lessons($subject_no){
            $where = "subject_no = '{$subject_no}' AND user_no = '{$_SESSION['user_no']}'";
            $this->db->select('*');
            $this->db->from('lesson');
            if($_SESSION['authorization'] == 1){
                $this->db->where('subject_no',$subject_no);
            }else{
                $this->db->where($where);
            }

            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function get_lesson($lesson_no){
            $this->db->select('*');
            $this->db->from('lesson');
            $this->db->where('lesson_no',$lesson_no);

            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return false;
            }
        }

        public function create($data){
            $this->db->insert('lesson',$data);
            return $this->db->insert_id();
        }

        public function update($data,$lesson_no){
            $this->db->where('lesson_no',$lesson_no);
            $this->db->update('lesson',$data);
            return $lesson_no;
        }

        public function delete($lesson_no){
            $this->db->where('lesson_no',$lesson_no);
            $this->db->delete('lesson');
            return true;
        }
	}

?>