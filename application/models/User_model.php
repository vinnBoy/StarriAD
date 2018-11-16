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
                'senha'=> $enc_senha,
            );

            // Insert User
            $this->db->insert('users', $data );

        }

        // Log user in
        public function login($telefone, $senha){
        // Validate
            $this->db->where('telefone', $telefone);
            $this->db->where('senha', $senha);

            $result = $this->db->get('users');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }else{
                return false;
            }


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

    }

    
