<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'assets/vendor/autoload.php';

    class Pages extends CI_Controller{

        public function campanhas(){

            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $email = $this->session->userdata('email');
            $data['updated'] = $this->user_model->check_register($email);
            if(empty($data['updated'])){
                $this->session->set_flashdata('not_updated', 'Por favor, atualize seu cadastro para criar uma campanha.');
               redirect('users/atualizar_cadastro');
            }else{

            $data['title'] = 'Campanhas';
            $data['campanhas'] = $this->upload_model->get_videos();
            $data['filiais'] = $this->upload_model->get_filiais();
            $data['categorias'] = $this->upload_model->get_categorias();
            
            
            $this->load->view('templates/header');
            $this->load->view('pages/campanhas',$data);
            $this->load->view('templates/footer');
               
            }
            
        }

        public function criar_campanha(){

            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $email = $this->session->userdata('email');
            $data['updated'] = $this->user_model->check_register($email);
            if(empty($data['updated'])){
                $this->session->set_flashdata('not_updated', 'Por favor, atualize seu cadastro para criar uma campanha.');
               redirect('users/atualizar_cadastro');
            }else{

            $data['title'] = 'Criar Campanha';
            $data['filiais'] = $this->upload_model->get_filiais();
            $data['categorias'] = $this->upload_model->get_categorias();
            
            $this->load->view('templates/header');
            $this->load->view('pages/criar_campanha',$data);
            $this->load->view('templates/footer');
               
            }
            
        }

        public function home(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $email = $this->session->userdata('email');
            $data['admin'] = $this->user_model->check_admin($email);
            $data['title'] = 'Home';
            $data['campanhas'] = $this->upload_model->get_campanhas();
            $data['destaques'] = $this->upload_model->get_destaques();
            $data['users'] = $this->upload_model->get_ranking();


            if(!$data['admin']){
                $this->load->view('templates/header');
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer');

            }else{
                $this->load->view('templates/header');
                $this->load->view('admin/home', $data);
                $this->load->view('templates/footer');

            }         

        }

        public function filiais(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Filiais';

            $this->load->view('templates/header');
            $this->load->view('pages/filiais', $data);
            $this->load->view('templates/footer');
        }

        public function cupons(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Cupons';
            $data['cupons'] = $this->user_model->getAllCuponsModel();

//            var_dump($data["cupons"]);

            $this->load->view('templates/header');
            $this->load->view('pages/cupons', $data);
            $this->load->view('templates/footer');
        }
        public function cuponsCamp(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Cupons';
            $data['cupons'] = $this->user_model->getAllCuponsCampModel($_GET["id"]);

//            var_dump($data["cupons"]);

            $this->load->view('templates/header');
            $this->load->view('pages/cupons', $data);
            $this->load->view('templates/footer');
        }
       

        public function termos(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Termos Legais';

            $this->load->view('templates/header');
            $this->load->view('pages/termos', $data);
            $this->load->view('templates/footer');
        }

        public function patrocinio(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Patrocinio';

            $this->load->view('templates/header');
            $this->load->view('pages/patrocinio', $data);
            $this->load->view('templates/footer');
        }

        // Upload video
        public function upload(){
            include('assets/getid3/getid3/getid3.php');
            $getID3 = new getID3();

            $allowedExts = array("mp4", "MP4", "jpeg", "JPEG","png", "PNG","gif","jpg");
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if ((($_FILES["file"]["type"] == "video/mp4")
                    || ($_FILES["file"]["type"] == "video/MP4")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/JPEG")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/png")
                    || ($_FILES["file"]["type"] == "image/PNG"))

                && ($_FILES["file"]["size"] < 1000000)
                && in_array($extension, $allowedExts))

            {
                if ($_FILES["file"]["error"] > 0)
                {
                    $this->session->set_flashdata('upload_error','Erro ao enviar. Por favor tente novamente.');
                    redirect('pages/campanhas');
                }
                else
                {

                    if (file_exists("uploads/" . $_FILES["file"]["name"]))
                    {
                        $this->session->set_flashdata('file_exists','Arquivo ' . $_FILES["file"]["name"]
                            . ' já existe. Por favor envie outro arquivo.');
                        redirect('pages/campanhas');
                    }
                    else
                    {

                        $this->form_validation->set_rules('titulo','Título','required');

                        if($this->form_validation->run() === FALSE){
                            redirect('pages/campanhas');
                        } else {
                            $unique_name = uniqid().".mp4";
                            move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/" . $unique_name );
                            $file_name = $unique_name;

                            $name = explode('.',$file_name);
                            $thumb_name = $name['0'].'.jpg';

                            // Converter Data
                            $data_enc = $this->input->post('data_encerramento');
                            $date = str_replace('/', '-', $data_enc);
                            $data_encerramento = date('Y-m-d', strtotime($date));

                            $this->upload_model->create_info($file_name,$thumb_name, $data_encerramento);

                            $filename = $getID3->analyze('uploads/'.$file_name);
                            $playtime = explode(':',$filename['playtime_string']);
                            $duracao = (int)$playtime[1];


                            if($duracao > 15){
                                $this->session->set_flashdata('long_file','Por favor, envie arquivos menores que 15 segundos. Duração:' .$duracao.'s');

                                // Apagar arquivos do BD e servidor
                                $email = $this->session->userdata('email');
                                $this->upload_model->auto_delete($file_name);
                                unlink('uploads/'.$file_name);
                                unlink('uploads/'.$thumb_name);

                                redirect('pages/campanhas');
                            }else{

                                // Extrair imagem
                                $ffmpeg = FFMpeg\FFMpeg::create(array(
                                    'ffmpeg.binaries'  => 'assets/vendor/ffmpeg/bin/ffmpeg.exe',
                                    'ffprobe.binaries' => 'assets/vendor/ffmpeg/bin/ffprobe.exe',
                                    'timeout'          => 3600, // The timeout for the underlying process
                                    'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
                                ), $logger);
                                $video = $ffmpeg->open('uploads/'.$file_name);
                                $video
                                    ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))
                                    ->save("uploads/".$thumb_name);

                                $this->session->set_flashdata('upload_success','Arquivo enviado com sucesso. ');

                                include(FCPATH.'assets/PHPMailer/src/Exception.php');
                                include(FCPATH.'assets/PHPMailer/src/PHPMailer.php');
                                include(FCPATH.'assets/PHPMailer/src/SMTP.php');

                                $mail = new PHPMailer\PHPMailer\PHPMailer();                            // Passing `true` enables exceptions
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
                                    $mail->setFrom('starriad.contato@gmail.com', 'StarriAD');
                                    $mail->addAddress('starriad.contato@gmail.com', 'starriad.contato@gmail.com');     // Add a recipient


                                    //Content
                                    $mail->isHTML(true);                                  // Set email format to HTML
                                    $mail->Subject = 'Campanha Criada';
                                    $mail->Body    = 'Sua campanha foi criada! Realize o pagamento para que sua campanha seja publicada.';
                                    $mail->AltBody = '';

                                    $mail->send();

                                } catch (Exception $e) {
                                    $this->session->set_flashdata('email_fail','E-mail não enviado. '.$mail->ErrorInfo);
                                }
                                redirect('pages/campanhas');
                            }

                        }

                    }
                }
            }
            else
            {
                $this->session->set_flashdata('invalid_file','Arquivo não selecionado ou inválido.');
                redirect('pages/campanhas');
            }
        }

        public function setEditeCampanha(){
            $data_enc = $this->input->post('data_encerramento');
            $date = str_replace('/', '-', $data_enc);
            $data_encerramento = date('Y-m-d', strtotime($date));

            $data_ini = $this->input->post('data_inicio');
            $date = str_replace('/', '-', $data_ini);
            $data_inicio = date('Y-m-d', strtotime($date));

            $this->upload_model->edite_info($data_encerramento, $data_inicio);
            redirect('pages/campanhas');

        }

        public function criar_filial(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $email = $this->session->userdata('email');        
            $this->upload_model->criar_filial($email);  
            $this->session->set_flashdata('filial_criada','Filial adicionada com sucesso.');
            redirect('pages/filiais');      
           
        }

        // Upload video
        public function uploadPatrocinio(){

            $allowedExts = array("jpeg", "JPEG","png", "PNG","gif","jpg");
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if ((($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/JPEG")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/png")
                    || ($_FILES["file"]["type"] == "image/PNG"))

                && in_array($extension, $allowedExts))

            {
                if ($_FILES["file"]["error"] > 0)
                {
                    $this->session->set_flashdata('upload_error','Erro ao enviar. Por favor tente novamente.');
                    redirect('pages/patrocinio');
                }
                else
                {

                    $unique_name = uniqid();

                    $file = $_FILES['file'];
                    $configuracao = array(
                        'upload_path'   => './uploads/',
                        'allowed_types' => array("jpeg","JPEG","png", "PNG","gif","jpg"),
                        'file_name'     => $unique_name.'.jpg',
                    );
                    $this->load->library('upload');
                    $this->upload->initialize($configuracao);

                    if ($this->upload->do_upload('file')){

                        $this->form_validation->set_rules('titulo','Título','required');

                        // Converter Data
                        $data_enc = $this->input->post('data_encerramento');
                        $date = str_replace('/', '-', $data_enc);
                        $data_encerramento = date('Y-m-d', strtotime($date));

                        // Converter Data
                        $data_inicio = $this->input->post('data_inicio');
                        $date = str_replace('/', '-', $data_inicio);
                        $data_inicio = date('Y-m-d', strtotime($date));

                        $this->upload_model->create_patricio($data_encerramento,$data_inicio, $unique_name.'.jpg');
                        redirect('pages/campanhas');

                    }
                    else {
                        $this->session->set_flashdata('upload_error', $this->upload->display_errors());
                        echo $this->upload->display_errors();
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('invalid_file','Arquivo não selecionado ou inválido.');
                redirect('pages/home');
            }
        }
        
        public function delete($id){
            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $nome_arquivo = $this->input->post('nome_arquivo');
            $name = explode('.',$nome_arquivo);
            $thumb_name = $name['0'].'.jpg';

            $this->upload_model->delete_video($id);
            // Apaga arquivo do servidor
            unlink('uploads/'.$nome_arquivo);
            unlink('uploads/'.$thumb_name);

            redirect('pages/campanhas');
            

        }

        public function verPatrocinio(){


            $data["title"] = "Participantes";
            $data["patrocinios"] = $this->upload_model->get_ranking_user_web($_GET['id']);

            $this->load->view('templates/header');
            $this->load->view('pages/participantes',$data);
            $this->load->view('templates/footer');

        }

        public function editarCampanha(){

            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $email = $this->session->userdata('email');
            $data['updated'] = $this->user_model->check_register($email);
            if(empty($data['updated'])){
                $this->session->set_flashdata('not_updated', 'Por favor, atualize seu cadastro para criar uma campanha.');
                redirect('users/atualizar_cadastro');
            }else{

                $data['title'] = 'Criar Campanha';
                $data['campanha'] = $this->upload_model->get_campamnha($_GET["id"]);
                $data['filiais'] = $this->upload_model->get_filiais();
                $data['categorias'] = $this->upload_model->get_categorias();

                $this->load->view('templates/header');
                $this->load->view('pages/editar_campanha',$data);
                $this->load->view('templates/footer');

            }

        }

        
    }
    