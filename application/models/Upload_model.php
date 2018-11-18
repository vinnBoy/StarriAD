<?php
    class Upload_model extends CI_Model{

        // public function __construct(){
        //     $this->load->database();
        // }

        public function create_info($file_name){
            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'nome_arquivo' => $file_name
            );

            return $this->db->insert('videos',$data);

        }

    }