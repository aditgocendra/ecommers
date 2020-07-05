<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


     public function index()
	   {
       $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
       $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == false){
           $data['title'] = 'Login';
           $this->load->view('templates/auth_header', $data);
           $this->load->view('auth/login');
           $this->load->view('templates/auth_footer');
        }else{
          $this->_login();
        }
     }


     private function _login(){

       $email = $this->input->post('email');
       $password = $this->input->post('password');

       $user = $this->db->get_where('users', ['email' => $email])->row_array();

       //user ada
       if($user){

          //check pass
          if(password_verify($password, $user['password'])){

              $data = [
                'email' => $user['email'],
                'role_id' => $user['role_id']
              ];

              if ($data['role_id'] == 2){
                $this->session->set_userdata($data);
                redirect('user');
              }else{
                $this->session->set_userdata($data);
                redirect('admin');
              }

          }else{
            $this->session->set_flashdata('message',
            '<div class = "alert alert-danger role="alert">
            Password salah!
            </div>');
            redirect('auth');
          }

       }else{
         $this->session->set_flashdata('message',
         '<div class = "alert alert-danger role="alert">
         Email belum terdaftar!
         </div>');
         redirect('auth');
       }

     }

    public function register()
	{
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'email',
        'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'This email already register'
        ]);
        $this->form_validation->set_rules('password', 'Password',
        'required|trim|matches[password2]', [
            'matches' => 'password dont match!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2',
        'required|trim|matches[password]');

        if($this->form_validation->run() == false){
            $data['title'] = "Registration";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else{
            $data = [
                'name_user' => htmlspecialchars($this->input->post('username')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password'),
                PASSWORD_DEFAULT),
                'role_id' => 2,
                'image_profile' => 'default.png',
                'date_created' => time()
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message',
            '<div class = "alert alert-succsess role="alert">
            Terimakasih sudah mendaftar, sekarang anda bisa login
            </div>');
            redirect('auth');
        }

    }

    public function logout(){
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');

      $this->session->set_flashdata('message',
      '<div class = "alert alert-succsess role="alert">
      Anda terlah keluar.. datang lagi kapan kapan
      </div>');
      redirect('auth');
    }

}
