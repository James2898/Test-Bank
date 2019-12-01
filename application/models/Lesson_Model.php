<?php

	Class Lesson_Model extends CI_Model {

        public function get_subject_lesson($subject_no){
            $this->db->select('*');
            $this->db->from('subject');
            $this->db->join('lesson','subject.subject_no = lesson.subject_no','left');
            $this->db->where('subject.subject_no',$subject_no);

            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return false;
            }
        }
	}

?>