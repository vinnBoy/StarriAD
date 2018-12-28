<?php

    class Admin extends CI_Controller{

        public function cadastrar_categorias(){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->upload_model->cadastrar_categorias();
        $this->session->set_flashdata('categoria_cadastrada','Nova categoria cadastrada.');
        redirect('admin/administrador');

        }

        public function administrador(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $email = $this->session->userdata('email');
            $data['admin'] = $this->user_model->check_admin($email);
            
            if ($data['admin']) {
                $data['title'] = 'Administrador';
                $this->load->view('templates/header');
                $this->load->view('admin/administrador', $data);
                $this->load->view('templates/footer');
            }
            else{
                redirect('pages/home');
            }


        }

    }