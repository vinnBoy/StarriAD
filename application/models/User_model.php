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
            return $this->db->insert('users', $data );

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
                'user_id' => $data['user_id'],
                'empresa_id' => $data['empresa_id'],
                'valor' => $data['valor'],
                'status' => $data['status'],
                'datacad' => $date,
            );

            // Insert User
            return $this->db->insert('cupom', $data );
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
            $this->db->select('categoria');
            $this->db->group_by('categoria');
            $this->db->order_by("categoria", "asc");
            $categorias = $this->db->get('campanhas')->result();
            $data = array();
            foreach ($categorias as $cat){
                $this->db->where("categoria", $cat->categoria);
                array_push($data,array('categorias'=>$cat->categoria,'campanhas'=>$this->db->get("campanhas")->result()));

            }

            return $data;
        }

    }

    
