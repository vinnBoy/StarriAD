<?php
    class Pages extends CI_Controller{

        public function admin(){

            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $data['title'] = 'Administrador';
            
            $this->load->view('templates/header');
            $this->load->view('pages/admin',$data);
            $this->load->view('templates/footer');
        }
        // Upload video
        public function upload(){     
            $allowedExts = array("mp4", "MP4");
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if ((($_FILES["file"]["type"] == "video/mp4")
            || ($_FILES["file"]["type"] == "video/MP4"))
           
            && ($_FILES["file"]["size"] < 1000000)
            && in_array($extension, $allowedExts))

            {
            if ($_FILES["file"]["error"] > 0)
                {
                    $this->session->set_flashdata('upload_error','Erro ao enviar. Por favor tente novamente.');
                    redirect('pages/admin');
                }
                else
                    {

                    if (file_exists("upload/" . $_FILES["file"]["name"]))
                    {
                    $this->session->set_flashdata('file_exists','Arquivo ' . $_FILES["file"]["name"]
                    . ' já existe. Por favor envie outro video.');
                    redirect('pages/admin');
                    }
                    else
                    {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "upload/" . $_FILES["file"]["name"]);
                    $this->session->set_flashdata('upload_success','Arquivo enviado com sucesso.');
                    redirect('pages/admin');
                    }
                    }
                }
                else
                {
                $this->session->set_flashdata('invalid_file','Arquivo inválido.');
                redirect('pages/admin');
                }
           
        }
    }
    