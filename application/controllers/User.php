<?php

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
//        $this->load->helper('language');
        //$this->load->helper('date');
//        $this->lang->load('form_validation','armenian');
    }

    public function index()
     {
//         $this->load->model('User_model');

//         $users = $this->User_model->getUsers();
         $users = $this->users->getUsers();

         $data['users'] = $users;
         $data['title'] = 'Home page';
         $this->load->view('templates/header', $data);
       $this->load->view('home',$data);
         $this->load->view('templates/footer');
     }

     public function home()
     {
         $data['title'] = 'Home page';
         $this->load->view('templates/header', $data);
         $this->load->view('pages/home',$data);
         $this->load->view('templates/footer');
     }

     public function about()
     {
         $data['title'] = 'About page';
         $this->load->view('templates/header', $data);
         $this->load->view('pages/about',$data);
         $this->load->view('templates/footer');
     }
     public function register()
     {
//         $this->load->library('form_validation');

         if ($this->session->userdata('email')!='')
         {
             redirect(base_url().'dashboard');
         }
//         $this->lang->load('form_validation','english');
         $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[users.email]',
             array('is_unique' => 'This %s already exists.'));

         $this->form_validation->set_rules('phone', 'Phone number', 'required|us_phone');

         $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]|password',
             array('required' => 'You must provide a %s.'));
         $this->form_validation->set_rules('password1', 'Password Confirmation', 'matches[password]');
//         var_dump($this->input->post['phone']);
//         var_dump($_POST['phone']);
         if ($this->form_validation->run() == FALSE)
         {
             $data['title'] = 'register';
             $this->load->view('templates/header', $data);
             $this->load->view('register',$data);
             $this->load->view('templates/footer');
         }else
         {
             $password = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
             $insert = array(
                 'id' => NULL,
                 'email' => $this->input->post('email'),
                 'password' => $password,
                 'phone' => $this->input->post('phone')
             );

             $user = $this->users->registration($insert);

            /* if ($user==true)
             {
                 $data['message'] = 'You were registered successfully.';
             }else{
                 $data['message'] = 'Some problem occurred, please contact us.';
             }*/
             $data['message'] = 'You were registered successfully.';
             $data['title'] = 'register';
             $this->load->view('templates/header', $data);
             $this->load->view('register');
             $this->load->view('templates/footer');
         }
     }

     public function login()
     {
         if ($this->session->userdata('email')!='')
         {
             redirect(base_url().'dashboard');
         }
//         $this->load->helper('language');

//         $this->load->helper('language');
         $this->lang->load('form_validation','armenian');
//         $this->lang->load(array('armenian', 'russian'));
         $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email',
             array('valid_email' => $this->lang->line('form_validation_valid_email'),
                'required'=> $this->lang->line('form_validation_required')
                 ));
         $this->form_validation->set_rules('password', 'Password', 'required',
             array('required'=> $this->lang->line('form_validation_required')
             ));

         if ($this->form_validation->run() == TRUE)
         {
             $email = $this->input->post('email');
             $password = $this->input->post('password');
             if ($this->users->login($email,$password))
             {
                 $session_data = array(
                     'email'=>$email
                 );
                 $this->session->set_userdata($session_data);

                 redirect(base_url().'dashboard');
             }else{
                 $this->session->set_flashdata('error','Invalid email or password');
                 redirect(base_url().'login');
             }

         }else {
             $data['title'] = 'login';
             $this->load->view('templates/header', $data);
             $this->load->view('login',$data);
             $this->load->view('templates/footer');
         }

     }
    public function crop(){

        $croppedImage = $_FILES['croppedImage'];
        $to_be_upload = $croppedImage['tmp_name'];
        $new_file = 'public/images/cropped-image.png';
        move_uploaded_file($to_be_upload,$new_file);
        echo 1;

//        echo  "Image Inserted Successfully";
     }

     function dashboard()
     {
         if ($this->session->userdata('email')!='')
         {

             $this->load->helper('date');
             $this->load->helper('number');
//             $data['timezone'] = timezone_menu();
//             date_default_timezone_set("Asia/kathmandu");
//             $data['timezone'] = now();
//             $this->form_validation->set_rules('number', 'number', 'required|numeric');
             date_default_timezone_set('Asia/Yerevan');
             $data['message'] = 'Welcome '.$this->session->userdata('email');
             $data['title'] = 'dashboard';

             $data['date'] = datehelp('us');
//             $data['time'] = date("h:i:sa");
             $data['time'] = timehelp('24');
             $data['wholenumber'] = '';

             $uk = $this->input->post('uk');
             $us = $this->input->post('us');

             $htwelve = $this->input->post('htwelve');
             $htwentyfour = $this->input->post('htwentyfour');

             $wholenumber = $this->input->post('wholenumber');

             $english = $this->input->post('english');
             $armenian = $this->input->post('armenian');

             if ($this->session->userdata('email')=='')
             {
                 redirect(base_url().'login');
             }
             if ($us)
             {
//                 $data['date'] = date("m-d-Y");
                 $data['date'] = datehelp('us');
                 $data['time'] =  $this->input->post('time');
             }
             if ($uk)
             {
                 $data['date'] = datehelp('uk');
                 $data['time'] =  $this->input->post('time');
             }
             if ($htwelve)
             {
                 $data['time'] =  timehelp('12');
                 $data['date'] = $this->input->post('date');
             }
             if ($htwentyfour)
             {
                 $data['time'] =  timehelp('24');
                 $data['date'] = $this->input->post('date');
             }
             if ($wholenumber)
             {
                 $data['date'] = $this->input->post('date');
                 $data['time'] =  $this->input->post('time');
                 $this->form_validation->set_rules('number', 'number', 'is_numeric');
                 if ($this->form_validation->run() == TRUE)
                 {
//                     $data['wholenumber'] = '';
//                     $this->load->view('dashboard',$data);
                     $data['wholenumber'] =  wholenumber($this->input->post('number'));
                 }
//                 $data['wholenumber'] =  wholenumber($this->input->post('number'));

             }

             /*$data['script_to_load'] = '$("#ref_treatment_id").val('.$_GET['referral'].'); '
                 . '$("#doc_upload_title").val("'.$this->input->post('upload_title').'");'
                 . '$("#referral_list").modal("show");';*/
            /* if (isset($armenian))
             {
//                 var_dump($armenian);die;
                 $data['selected_val'] = 'armenian';
                 //$data['selected_val'] = $options;
             }else{
//                 $data['selected_val'] = 'armenian';
                 $data['selected_val'] = 'english';
             }*/

            if (isset($_POST['options']))
            {
             $data['options'] = $_POST['options'];
            }else{
                $data['options'] = 'english';
            }
             if (isset($_POST['submit'])) {
                 $options = $_POST['options'];
//                 var_dump($options);die;
                 $data['selected_val'] = $options;
             }else{
                 $data['selected_val'] = 'english';
             }
            /* if (isset($_POST['options'])) {
                 if ($_POST['options'] == "armenian") {
//                 $options = $_POST['options'];
                     $data['selected_val'] = 'armenian';
                 } else {
                     $data['selected_val'] = 'english';
                 }
             } else {
                 $data['selected_val'] = 'english';
             }*/

         /* if (isset($_POST['armenian'])){
              $data['selected_val'] = 'armenian';
          }else {
              $data['selected_val'] = 'english';
          }*/
        /* $select = isset($_POST['options']);
             if ($select){
                 $data['selected_val'] = $select;
             }else {
                 $data['selected_val'] = 'english';
             }*/
             $this->load->view('templates/header', $data);
             $this->load->view('dashboard');
             $this->load->view('templates/footer');

         }else{
             redirect(base_url().'login');
         }
     }

     function logout()
     {
         $this->session->unset_userdata('email');
         redirect(base_url().'login');
     }

     public function profile($id)
     {
//         $this->load->model('User_model');

//         $users = $this->User_model->getProfile($id);
         $users = $this->users->getProfile($id);
         var_dump($users);
     }

}