<?php

	Class Test_Model extends CI_Model {

        public function get_exams($subject_no,$type,$lessons,$items){
            $where = "
                type = '{$type}'
            ";

            // foreach ($lessons as $key => $lesson_no) {
            //     $where .= "
            //         '{$lesson_no}'
            //     ";
            // }
            // $where .= ")";

            // print ($where);

            // $where = "subject_no = '{$subject_no}' AND user_no = '{$_SESSION['user_no']}'";
            $this->db->select('question, answer,lesson_no');
            $this->db->from('question');
            $this->db->where($where);
            $this->db->where_in('lesson_no',$lessons);
            $this->db->order_by('question_no','random');
            $this->db->limit($items);


            $query = $this->db->get();

            if($query->num_rows() > 0){
                $data = array();
                foreach ($query->result_array() as $key => $value){
                    $data += [$value['question'] => $value['answer']];
                }
                return $data;
            }else{
                return false;
            }
        }
	}

?>