<?php
    class Upload_model extends CI_Model{

        public function create_info($file_name){
            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'nome_arquivo' => $file_name,
                'email' => $this->session->userdata('email')
            );

            return $this->db->insert('videos',$data);

        }

        public function get_videos(){
            $email = $this->session->userdata('email');
            $this->db->where('email', $email);
            $query = $this->db->get('videos');
            return $query->result_array();
        }

        public function delete_video($id){
            
            $this->db->where('id',$id);
            $this->db->delete('videos');
            return true;  

        }

        public function auto_delete($email){
            $this->db->order_by('email','DESC');
            $this->db->where('email',$email);
            $this->db->delete('videos');
            return true;  

        }

    }