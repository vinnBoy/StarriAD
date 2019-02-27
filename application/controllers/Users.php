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
            $this->form_validation->set_rules('termos','Termos de uso', 'required');


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

            $data = json_decode(file_get_contents("php://input"));
            $data->senha = md5($data->senha);
            echo json_encode($this->user_model->cadastrarApp($data));
        }

        public function getPatrocinio(){


            $response = $this->user_model->getPatrocinioModel();

            echo json_encode($response);
        }
        public function participarPatrocinio(){

            $data = json_decode(file_get_contents("php://input"));
            $response = $this->user_model->participarPatrocinioModel($data);

            echo json_encode($response);
        }

        public function userDataRanking(){

            $data = json_decode(file_get_contents("php://input"));



            $response['user'] = $this->upload_model->get_data_user($data)[0];
            $response['ranking'] = $this->upload_model->get_ranking_user($data);

            echo json_encode($response);

        }

        public function getParticipo(){

            $data = json_decode(file_get_contents("php://input"));
            $response = $this->user_model->getParticipoModel($data);

            echo json_encode($response);
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

            $data = json_decode(file_get_contents("php://input"));

            $telefone = $data->telefone;
            $senha = md5($data->senha);

            $user_id = $this->user_model->loginAppModel($telefone, $senha);

            echo json_encode($user_id);
        }

        public function createCupom(){

            $this->load->model("user_model");

            $data = json_decode(file_get_contents("php://input"));

            $response = $this->user_model->createCupomModel($data);

            echo json_encode($response);
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
        public function get_campanhas(){
            echo json_encode($this->user_model->get_campanhas_cat());
        }
        public function get_tickets(){
            $this->load->model("user_model");

            $data = json_decode(file_get_contents("php://input"));

            $response = $this->user_model->getCuponsModel($data);

            echo json_encode($response);
        }
        public function use_tickets(){
            $this->load->model("user_model");
            $this->load->model("upload_model");

            $data = json_decode(file_get_contents("php://input"));

            $response = $this->user_model->useCuponsModel($data);
            $this->upload_model->indicarModel($response["id"]);

            echo json_encode($response["codigo"]);
        }

        public function pesquisarVideo(){
            $this->load->model("user_model");

            $data = json_decode(file_get_contents("php://input"));

            $response = $this->user_model->pesquisarVideoModel($data->text);

            echo json_encode($response);
        }
        public function get_destaque(){
            $this->load->model("upload_model");

            $response = $this->upload_model->get_destaques();

            echo json_encode($response);
        }
        public function denuncia()
        {
            $this->load->model("upload_model");

            $data = json_decode(file_get_contents("php://input"));

            include(base_url().'assets/PHPMailer/src/Exception.php');
            include(base_url().'assets/PHPMailer/src/PHPMailer.php');
            include(base_url().'assets/PHPMailer/src/SMTP.php');

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.googlemail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'starriad.contato@gmail.com';                 // SMTP username
                $mail->Password = 'starriad@2019';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('starriad2019@gmail.com', 'StarriAD');
                $mail->addAddress('starriad2019@gmail.com', 'starriad2019@gmail.com');     // Add a recipient


                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Denuncia na campanha';
                $mail->Body = 'A campanha ' . $data->titulo . ' recebeu uma denuncia do usuario com o codigo ' . $data->username . " e o motivo da denuncia é: " . $data.text;
                $mail->AltBody = '';

                $mail->send();

            } catch (Exception $e) {
                echo json_encode('email_fail', 'E-mail não enviado. ' . $mail->ErrorInfo);
            }

            echo json_encode(true);
        }

        public function indicar()
        {
            $this->load->model("upload_model");

            $data = json_decode(file_get_contents("php://input"));

            include(base_url().'assets/PHPMailer/src/Exception.php');
            include(base_url().'assets/PHPMailer/src/PHPMailer.php');
            include(base_url().'assets/PHPMailer/src/SMTP.php');

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.googlemail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'starriad.contato@gmail.com';                 // SMTP username
                $mail->Password = 'starriad@2019';                           // SMTP password                        // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('starriad2019@gmail.com', 'StarriAD');
                $mail->addAddress('starriad2019@gmail.com', 'starriad2019@gmail.com');     // Add a recipient


                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Indicação';
                $mail->Body = "Indicação do usuário ". $data->user_id. " o nome é ".$data->nome. " e o telefone é ".$data->numero;
                $mail->AltBody = '';

                $mail->send();



            } catch (Exception $e) {
                echo json_encode('email_fail', 'E-mail não enviado. ' . $mail->ErrorInfo);
            }

            $this->upload_model->indicarModel($data->user_id);


            echo json_encode(true);
        }

        public function set_destaque(){
            $this->load->model("user_model");

            $data = $_GET["id"];

            $this->user_model->set_destaqueModel($data);

            redirect("pages/home");
        }

        public function delete_destaque(){
            $this->load->model("user_model");

            $data = $_GET["id"];

            $this->user_model->delete_destaqueModel($data);

            redirect("pages/home");
        }



    }