<?php
    class Upload_model extends CI_Model{

        public function create_info($file_name, $thumb_name, $data_encerramento){
            $filiais = implode(',', $this->input->post('filial'));
                       
            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'nome_arquivo' => $file_name,
                'nome_thumbnail' => $thumb_name,
                'email' => $this->session->userdata('email'),
                'empresa_id' => $this->session->userdata('user_id'),
                'data_inicio' => $this->input->post('data_inicio'),
                'data_encerramento' => $data_encerramento,
                'investimento' => $this->input->post('investimento'),
                'valor_desconto' => $this->input->post('valor_desconto'),
                'num_cupons' => $this->input->post('num_cupons'),
                'categoria' => $this->input->post('categoria'),
                'sub_categoria' => $this->input->post('subcategoria'),
                'palavras_chave' => $this->input->post('palavras_chave'),
                'pergunta' => $this->input->post('pergunta'),
                'resposta1' => $this->input->post('resposta1'),
                'resposta2' => $this->input->post('resposta2'),
                'resposta3' => $this->input->post('resposta3'),
                'resposta4' => $this->input->post('resposta4'),
                'resposta_correta' => $this->input->post('resposta_correta'),
                'filiais' => $filiais
            );

            return $this->db->insert('campanhas',$data);

        }
        public function edite_info($data_encerramento, $data_inicio){

            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'email' => $this->session->userdata('email'),
                'empresa_id' => $this->session->userdata('user_id'),
                'data_inicio' => $data_inicio,
                'data_encerramento' => $data_encerramento,
                'investimento' => $this->input->post('investimento'),
                'valor_desconto' => $this->input->post('valor_desconto'),
                'num_cupons' => $this->input->post('num_cupons'),
                'categoria' => $this->input->post('categoria'),
                'sub_categoria' => $this->input->post('subcategoria'),
                'palavras_chave' => $this->input->post('palavras_chave'),
                'pergunta' => $this->input->post('pergunta'),
                'resposta1' => $this->input->post('resposta1'),
                'resposta2' => $this->input->post('resposta2'),
                'resposta3' => $this->input->post('resposta3'),
                'resposta4' => $this->input->post('resposta4'),
                'resposta_correta' => $this->input->post('resposta_correta'),
            );
            $this->db->where("id", $this->input->post('id'));
            return $this->db->update('campanhas',$data);

        }
        public function create_patricio($data_encerramento, $data_inicio, $file){

            $data = array(
                'nome' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'data_inicio' => $data_inicio,
                'data_encerramento' => $data_encerramento,
                'file' => $file,

            );
            return $this->db->insert('patrocinio',$data);

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
                'centro_comercial' => $this->input->post('centro_comercial'),
                'email' => $this->session->userdata('email')                
            );

            return $this->db->insert('filiais',$data);

        }

        public function cadastrar_categorias(){
            $data = array(
                'categoria' => $this->input->post('categoria'),
                'subcategoria' => $this->input->post('subcategoria')
            );

            return $this->db->insert('categorias', $data);
        }

        public function get_categorias(){
            $query = $this->db->get('categorias');
            return $query->result_array();
        }
        public function get_ranking(){
            $query = $this->db->get('patrocinio');
            return $query->result_array();
        }

        public function get_videos(){
            $email = $this->session->userdata('email');
            $this->db->where('email', $email);
            $query = $this->db->get('campanhas');
            return $query->result_array();
        }

        public function get_campanhas(){
            $query = $this->db->get('campanhas');
            return $query->result_array();
        }
        public function get_destaques(){
            $this->db->from("destaques");
            $this->db->join("campanhas","campanhas.id = destaques.campanha_id");
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_campamnha($id){
            $this->db->where('id',$id);
            $query = $this->db->get('campanhas');
            $result = $query->result_array()[0];
            return $result;

        }
        public function get_filiais(){
            $email = $this->session->userdata('email');
            $this->db->where('email',$email);
            $query = $this->db->get('filiais');
            return $query->result_array();
        }

        public function delete_video($id){
            
            $this->db->where('id',$id);
            $this->db->delete('campanhas');
            return true;  

        }

        public function indicarModel($id){

            $this->db->where('id',$id);
            $response = $this->db->get('users')->result();

            $pontos = $response[0]->pontos + 25;

            $this->db->where('id',$id);
            return $this->db->update("users", array("pontos" => $pontos));

        }

        public function auto_delete($file_name){
            $this->db->where('nome_arquivo',$file_name);
            $this->db->delete('campanhas');
            return true;  

        }

    }