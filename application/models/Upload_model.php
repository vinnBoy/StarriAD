<?php
    class Upload_model extends CI_Model{

        public function create_info($file_name){
            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'nome_arquivo' => $file_name,
                'email' => $this->session->userdata('email')
            );

            return $this->db->insert('campanhas',$data);

        }

        public function get_videos(){
            $email = $this->session->userdata('email');
            $this->db->where('email', $email);
            $query = $this->db->get('campanhas');
            return $query->result_array();
        }

        public function delete_video($id){
            
            $this->db->where('id',$id);
            $this->db->delete('campanhas');
            return true;  

        }

        public function auto_delete($file_name){
            $this->db->where('nome_arquivo',$file_name);
            $this->db->delete('campanhas');
            return true;  

        }

    }