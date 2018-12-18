<?php
    class Upload_model extends CI_Model{

        public function create_info($file_name){
            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'nome_arquivo' => $file_name,
                'email' => $this->session->userdata('email'),
                'data_inicio' => $this->input->post('data_inicio'),
                'data_encerramento' => $this->input->post('data_encerramento'),
                'investimento' => $this->input->post('investimento'),
                'valor_desconto' => $this->input->post('valor_desconto'),
                'num_cupons' => $this->input->post('num_cupons'),
                'categoria' => $this->input->post('categoria'),
                'sub_categoria' => $this->input->post('sub_categoria'),
                'palavras_chave' => $this->input->post('palavras_chave'),
                'pergunta' => $this->input->post('pergunta')
            );

            return $this->db->insert('campanhas',$data);

        }

        
        public function criar_filial($file_name){
            $data = array(
                'nome' => $this->input->post('nome'),
                'cep' => $this->input->post('cep'),
                'rua' => $this->input->post('rua'),
                'numero' => $this->input->post('numero'),
                'complemento' => $this->input->post('complemento'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'),
                'centro_comercial' => $this->input->post('centro_comercial')
            );

            return $this->db->insert('filiais',$data);

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