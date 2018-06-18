<?php

class Form extends CI_Controller {

    public function index()
    {
        $this->load->helper(array('form'));

        $this->load->library('Form_validation');
        //$username = $this->input->post('username');
        //var_dump($username);
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Myform';
//            echo 'false';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/myform1');
            $this->load->view('templates/footer');
        }
        else
        {
            $data['title'] = 'Formsuccess';
//            echo 'true';
            $this->load->view('templates/header', $data);
            $this->load->view('formsuccess');
            $this->load->view('templates/footer');
        }
    }

  /* public function index()
   {
       redirect('pages/login','refresh');
       $this->load->library('form_validation');
   }*/
    public function login()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('Form_validation');

        $post=$this->input->post();
      //  if (!empty($post)){
            //print_r($post);
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/login');
            $this->load->view('templates/footer');
        }
        else
        {
            $data['title'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/dashboard');
            $this->load->view('templates/footer');
        }
        //}
    }

    public function register()
    {
       // $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $email = $this->input->post('email');
        var_dump($email);
        $data['title'] = 'Registration';
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/registration');
            $this->load->view('templates/footer', $data);
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/registration');
            $this->load->view('templates/footer', $data);
        }
    }
}