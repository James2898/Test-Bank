<?php

	Class Question_Model extends CI_Model {

        public function get_questions($lesson_no,$type){
            $where = "type = '{$type}' AND lesson_no = '{$lesson_no}'";
            $this->db->select('*');
            $this->db->from('question');
            $this->db->where($where);
            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function create($questions,$lesson_no,$type){
            $where = "lesson_no = '{$lesson_no}' AND type = '{$type}'";
            $this->db->where($where);
            $this->db->delete('question');
            foreach ($questions as $question => $answer){
                $row = array(
                    'question'      => $question,
                    'answer'        => $answer,
                    'lesson_no'     => $lesson_no,
                    'type'          => $type
                );
                $this->db->insert('question',$row);
            }
            return true;
        }

        public function delete($question_no){
            $this->db->where('question_no',$question_no);
            $this->db->delete('question');
            return true;
        }
	}

?>