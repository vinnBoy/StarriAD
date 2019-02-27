<?php
    class User_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }

        public function cadastrar($enc_senha){
            // User data array
            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'telefone' => $this->input->post('telefone'),
                'nome_empresa' => $this->input->post('nome_empresa'),
                'cnpj' => $this->input->post('cnpj'),
                'senha'=> $enc_senha,
            );

            // Insert User
            return $this->db->insert('users', $data );

        }

        public function cadastrarApp($data){
            // User data array
            $data = array(
                'nome' => $data->nome,
                'email' => $data->email,
                'telefone' => $data->telefone,
                'senha'=> $data->senha,
            );

            // Insert User
             $this->db->insert('users', $data);

             $this->db->where("id", $this->db->insert_id());
             return $this->db->get("users")->result();

        }
        public function participarPatrocinioModel($data){

            // Insert User
            return $this->db->insert('patrocinio_participantes', $data );

        }
        public function getParticipoModel($data){

            $this->db->where("user_id",$data->user_id);
            $this->db->where("patrocinio_id",$data->patrocinio_id);
            return $this->db->get('patrocinio_participantes')->num_rows();

        }


        public function getPatrocinioModel(){
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d');
            $this->db->where("data_inicio <=", $date);
            $this->db->where("data_encerramento >=", $date);
            return $this->db->get("patrocinio")->result();
        }

        public function atualizar_cadastro($email){
            $data = array(
                'nome' => $this->input->post('nome'),
                'nome_empresa' => $this->input->post('nome_empresa'),
                'telefone' => $this->input->post('telefone'),
                'razao_social' => $this->input->post('razao_social'),
                'cnpj' => $this->input->post('cnpj'),
                'banco' => $this->input->post('banco'),
                'agencia' => $this->input->post('agencia'),
                'conta' => $this->input->post('conta'),
                'cep' => $this->input->post('cep'),
                'rua' => $this->input->post('rua'),
                'numero' => $this->input->post('numero'),
                'complemento' => $this->input->post('complemento'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado')
            );
            $this->db->where('email', $email);
            $this->db->update('users', $data);
        }

        public function aceitar_termos($email){
            $this->db->set('termos', '1');
            $this->db->where('email', $email);
            $this->db->update('users');
        }

        public function login($email, $senha){
            // Validate
            $this->db->where('email', $email);
            $this->db->where('senha', $senha);

            $result = $this->db->get('users');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }else{
                return false;
            }
        }

        public function loginAppModel($telefone, $senha){
            // Validate
            $this->db->where('telefone', $telefone);
            $this->db->where('senha', $senha);

            $result = $this->db->get('users');
            $data = $result->result();
            if($result->num_rows() == 1){
                return array('success' => $result->row(0)->id, 'id'=> $data);
            }else{
                return  array('success' => false);;
            }


        }

        public function get_users($email){
            $this->db->where('email',$email);
            $query = $this->db->get('users');
            return $query->result_array();

        }
        public function check_register($email){
            $this->db->where('email',$email);
            $this->db->select('cep');
            $query = $this->db->get('users');
            $result = $query->row();
            return $result->cep;

        }

        public function createCupomModel($data){
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d');

            $data = array(
                'user_id' => $data->user_id,
                'empresa_id' => $data->empresa_id,
                'valor' => $data->valor,
                'status' => $data->status,
                'datacad' => date('Y-m-d', strtotime($date. ' + 2 days')),
                'campanha_id' => $data->id,

            );

            $this->db->insert('cupom', $data );

            $data->num_cupons = (int)$data->num_cupons - 1;

            $this->db->set("num_cupons", $data->num_cupons);
            $this->db->where("id", $data->id);
            return $this->db->update("campanhas");
        }



        public function check_admin($email){
            $this->db->where('email',$email);
            $this->db->select('admin');
            $query = $this->db->get('users');
            $result = $query->row();
            return $result->admin;

        }

        // Check username's existence
        public function check_telefone_exists($telefone){
            $query= $this->db->get_where('users', array('telefone' => $telefone));
            if (empty($query->row_array())) {
                return true;
            }else{
                return false;
            }

        }

        // Check email's existence
        public function check_email_exists($email){
            $query= $this->db->get_where('users', array('email' => $email));
            if (empty($query->row_array())) {
                return true;
            }else{
                return false;
            }

        }

        public function get_campanhas_cat(){
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d');
            $this->db->select('categoria');
            $this->db->group_by('categoria');
            $this->db->order_by("categoria", "asc");
            $categorias = $this->db->get('campanhas')->result();
            $data = array();
            foreach ($categorias as $cat){
                $this->db->where("categoria", $cat->categoria);
                $this->db->where("data_encerramento >= ", $date);
                $this->db->where("num_cupons > ", 0);
                array_push($data,array('categorias'=>$cat->categoria,'campanhas'=>$this->db->get("campanhas")->result()));

            }

            return $data;
        }

        public function getCuponsModel($data){

            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d');

            $this->db->select("cupom.id, cupom.valor, users.nome, campanhas.nome_thumbnail");
            $this->db->where("user_id", $data->id);
            $this->db->where("datacad >= ", $date);
            $this->db->where("status", 1);
            $this->db->from('cupom');
            $this->db->join("users", "users.id = cupom.empresa_id");
            $this->db->join("campanhas", "campanhas.id = cupom.campanha_id");
            return $this->db->get()->result();

        }

        public function getAllCuponsModel(){
            $this->db->select("cupom.id, cupom.valor, users.nome, cupom.codigo");
            $this->db->where("empresa_id", $this->session->userdata('user_id'));
            $this->db->from('cupom');
            $this->db->join("users", "users.id = cupom.user_id");
            return $this->db->get()->result();
        }
        public function getAllCuponsCampModel($id){
            $this->db->select("cupom.id, cupom.valor, users.nome, cupom.codigo");
            $this->db->where("empresa_id", $this->session->userdata('user_id'));
            $this->db->where("campanha_id",$id);
            $this->db->from('cupom');
            $this->db->join("users", "users.id = cupom.user_id");
            return $this->db->get()->result();
        }
        public function useCuponsModel($data){

            $id =  uniqid();

            $this->db->set("status", 2);
            $this->db->set("codigo", $id);
            $this->db->where("id", $data->id);
            $this->db->update("cupom");

            $response["codigo"] = $id;

            $this->db->where("id", $data->id);
            $response["id"] = $this->db->get("cupom")->result()[0]->user_id;

            return $response;

        }
        public function set_destaqueModel($data){


            $this->db->set("campanha_id", $data);
            $return = $this->db->insert("destaques");

            return $return;

        }
        public function delete_destaqueModel($data){

            $return = $this->db->delete('destaques', array('destaques_id' => $data));

            return $return;

        }
        public function pesquisarVideoModel($data){

            $this->db->like('titulo', $data);
            $this->db->or_like('descricao', $data);
            $this->db->or_like('u.nome', $data);
            $this->db->join("users as u", "u.id = campanhas.empresa_id");
            $result = $this->db->get("campanhas")->result();

            return $result;

        }

    }

    
