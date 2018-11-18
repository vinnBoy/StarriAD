<?php
    class Upload_model extends CI_Model{

        public function create_info($file_name){
            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'nome_arquivo' => $file_name,
                'telefone' => $this->session->userdata('telefone')
            );

            return $this->db->insert('videos',$data);

        }

        public function get_videos(){
            $telefone = $this->session->userdata('telefone');
            $this->db->where('telefone', $telefone);
            $query = $this->db->get('videos');
            return $query->result_array();
        }

    }