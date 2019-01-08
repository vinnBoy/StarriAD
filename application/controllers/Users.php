<?php 
    class Users extends CI_Controller{
        
        public function cadastrar(){
            if($this->session->userdata('logged_in')){
                redirect('pages/home');
            }

            $data['title'] = 'Cadastro';

            $this->form_validation->set_rules('nome','Nome', 'required');
            $this->form_validation->set_rules('nome_empresa','Nome da empresa', 'required');
            $this->form_validation->set_rules('telefone','Telefone', 'required|callback_check_telefone_exists');
            $this->form_validation->set_rules('email','Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('senha','Senha', 'required');
            $this->form_validation->set_rules('senha2','Confirmar Senha', 'matches[senha]');

            if($this ->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/cadastrar', $data);
                $this->load->view('templates/footer');
            }else {
                // Encrypt password
                $enc_senha = md5($this->input->post('senha'));
                $this->user_model->cadastrar($enc_senha);
                // Set message
                $this->session->set_flashdata('user_registered', 'Cadastro realizado com sucesso. Por favor, faça o login.');
                
                redirect('users/login');
            }
        }
        public function cadastrarApp(){
            $data = $this->input->post('senha');
            $data->senha = md5($this->input->post('senha'));
            return $this->user_model->cadastrar($data);
        }

        public function atualizar_cadastro(){
            $email = $this->session->userdata('email');
            
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->form_validation->set_rules('nome','Nome', 'required');
            $this->form_validation->set_rules('nome_empresa','Nome da empresa', 'required');
            $this->form_validation->set_rules('telefone','Telefone', 'required');
            $this->form_validation->set_rules('email','Email', 'required');
            $this->form_validation->set_rules('razao_social','Razão Social', 'required');
            $this->form_validation->set_rules('cnpj','CNPJ', 'required');
            $this->form_validation->set_rules('banco','Banco', 'required');
            $this->form_validation->set_rules('agencia','Agência', 'required');
            $this->form_validation->set_rules('conta','Conta', 'required');
            $this->form_validation->set_rules('cep','CEP', 'required');
            $this->form_validation->set_rules('rua','Rua', 'required');
            $this->form_validation->set_rules('numero','Número', 'required');
            $this->form_validation->set_rules('bairro','Bairro', 'required');
            $this->form_validation->set_rules('cidade','Cidade', 'required');
            $this->form_validation->set_rules('estado','Estado', 'required');

            $data['title'] = 'Meu Cadastro';
            $data['users'] = $this->user_model->get_users($email);

            if($this ->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/atualizar_cadastro', $data);
                $this->load->view('templates/footer');
            } else{
                
                $this->user_model->atualizar_cadastro($email);
                $this->session->set_flashdata('cadastro_updated','Cadastro Atualizado. Para continuar, aceite os Termos e Condições.');
                redirect('pages/termos');
             }

        }

        public function aceitar_termos(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $email = $this->session->userdata('email');
            $this->user_model->aceitar_termos($email);
            redirect('pages/campanhas');
        }
        public function loginApp(){

            $this->load->model("user_model");

            var_dump($this->input->post());

            $telefone = $_POST['telefone'];
            $senha = md5($_POST['senha']);

            $user_id = $this->user_model->loginAppModel($telefone, $senha);

            var_dump($user_id);
        }

        public function login(){
            if($this->session->userdata('logged_in')){
                redirect('pages/home');
            }
            
            $data['title'] = 'Login';

            $this->form_validation->set_rules('email','email', 'required');
            $this->form_validation->set_rules('senha','Senha', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else {
                
                $email = $this->input->post('email');
                $senha = md5($this->input->post('senha'));
                $admin = $this->user_model->check_admin($email);
                // Login user
                $user_id = $this->user_model->login($email, $senha);

                if($user_id){
                    // Create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'email' => $email,
                        'admin' => $admin,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    redirect('pages/home');
                }else{
                    // Set message
                    $this->session->set_flashdata('login_failed', 'Login inválido.');
                    redirect('users/login');
                }

            }
        }

        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('email');

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