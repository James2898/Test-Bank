<?php

	Class User_Model extends CI_Model {

        public function create($data){
            $this->db->insert('user',$data);
            return $this->db->insert_id();
        }

        public function update($data,$user_no){
            $where = "user_no = '{$user_no}'";
            $this->db->where($where);
            $this->db->update('user',$data);
            return $user_no;
        }

        public function delete($user_no){
            $this->db->where('user_no',$user_no);
            $this->db->delete('user');
        }

        public function get_user($user_no){
            $where = "user_no = '{$user_no}'";
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where($where);
            $this->db->limit(1);

            $query = $this->db->get();

            if($query->num_rows() == 1){
                return $query->row();
            }else{
                return false;
            }
        }

		public function get_all_faculty() {
			$this->db->select('*');
            $this->db->from('user');
            $this->db->order_by('authorization','asc');
			$query = $this->db->get();

			if($query->num_rows() > 0){
                return $query->result_array();
			}else{
				return false;
			}
		}

	}

?>