<?php
    class Pages extends CI_Controller{

        public function admin(){
            $data['title'] = 'Administrador';
            
            $this->load->view('templates/header');
            $this->load->view('pages/admin',$data);
            $this->load->view('templates/footer');
        }
    }