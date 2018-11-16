<?php 
    class Users extends CI_Controller{
        // Register user
        public function cadastrar(){
            $data['title'] = 'Cadastro';

            $this->form_validation->set_rules('nome','Nome', 'required');
            $this->form_validation->set_rules('nome_empresa','Nome da empresa', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('telefone','Telefone', 'required|callback_check_telefone_exists');
            $this->form_validation->set_rules('email','Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('senha','Senha', 'required');
            $this->form_validation->set_rules('senha2','Confirmar Password', 'matches[senha]');

            if($this ->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/cadastrar', $data);
                $this->load->view('templates/footer');
            }else {
                // Encrypt password
                $enc_senha = md5($this->input->post('senha'));
                $this->user_model->cadastrar($enc_senha);
                // Set message
                $this->session->set_flashdata('user_registered', 'You are now registered.');

                redirect('login');
            }
        }
        // Login user
        public function login(){
            $data['title'] = 'Login';

            $this->form_validation->set_rules('telefone','Telefone', 'required');
            $this->form_validation->set_rules('senha','Senha', 'required');
            
            if($this ->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else {
                // Get username
                $telefone = $this->input->post('telefone');
                // Get and encrypt password
                $senha = md5($this->input->post('senha'));

                // Login user
                $user_id = $this->user_model->login($telefone, $senha);

                if($user_id){
                    // Create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'telefone' => $telefone,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    redirect('pages/admin');
                }else{
                    // Set message
                    $this->session->set_flashdata('login_failed', 'Login inválido.');
                    redirect('users/login');
                }

            }
        }

        // Log user out
        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('telefone');

            redirect('users/login');

        }
        

        public function check_telefone_exists($telefone){
            $this->form_validation->set_message('check_telefone_exists', 'Telefone já cadastrado. Por favor insira outro.');
            if ($this->user_model->check_telefone_exists($telefone)) {
                return true;
            } else{
                return false;
            }
        }

        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'E-mail já cadastrado. Por favor insira outro.');
            if ($this->user_model->check_email_exists($email)) {
                return true;
            } else{
                return false;
            }
        }

        
    }