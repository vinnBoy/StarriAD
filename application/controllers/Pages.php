<?php
    class Pages extends CI_Controller{

        public function campanhas(){

            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $data['title'] = 'Campanhas';
            $data['videos'] = $this->upload_model->get_videos();
            
            $this->load->view('templates/header');
            $this->load->view('pages/campanhas',$data);
            $this->load->view('templates/footer');

           
        }

        public function home(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Home';

            $this->load->view('templates/header');
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');

        }

        
        // Upload video
        public function upload(){ 
            include('assets/getid3/getid3/getid3.php');
            $getID3 = new getID3();
            
            $allowedExts = array("mp4", "MP4", "3gp", "3GP");
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if ((($_FILES["file"]["type"] == "video/mp4")
            || ($_FILES["file"]["type"] == "video/MP4")
            || ($_FILES["file"]["type"] == "video/3gp")
            || ($_FILES["file"]["type"] == "video/3GP"))
           
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
                    . ' já existe. Por favor envie outro vídeo.');
                    redirect('pages/campanhas');
                    }
                    else
                    {
                    
                    // Inserir dados em BD
                    $this->form_validation->set_rules('titulo','Título','required');
                    
                    if($this->form_validation->run() === FALSE){
                        redirect('pages/campanhas');
                    } else {
                        move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/" . $_FILES["file"]["name"]);
                        $file_name = $_FILES["file"]["name"];
                        $this->upload_model->create_info($file_name);
                        $filename = $getID3->analyze('uploads/'.$file_name);
                        $playtime = explode(':',$filename['playtime_string']);
                        $duracao = (int)$playtime[1];
                        

                        if($duracao > 15){                           
                           $this->session->set_flashdata('long_file','Por favor, envie arquivos menores que 15 segundos. Duração:' .$duracao.'s');
                            
                           //Apagar arquivos do BD e servidor
                           $email = $this->session->userdata('email');
                           $this->upload_model->auto_delete($file_name);
                           unlink('uploads/'.$file_name);

                           redirect('pages/campanhas');
                        }else{
                           $this->session->set_flashdata('upload_success','Arquivo enviado com sucesso. ');
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
        public function delete($id){
            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $nome_arquivo = $this->input->post('nome_arquivo');
           
            $this->upload_model->delete_video($id);
            // Apaga arquivo do servidor
            unlink('uploads/'.$nome_arquivo);

            redirect('pages/campanhas');
            

        }

        
    }
    