<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			is_logged_in();
	}


	public function index()
	{
        // $data['title'] = 'DBS Admin';
         $data['user'] = $this->db->get_where('users', ['email' =>
         $this->session->userdata('email')])->row_array();

				 $data['kategori'] = $this->db->get('kategori')->result_array();
				 $data['baju'] = $this->db->get('view_baju', 4, 0)->result_array();
				 $data['baju_all'] = $this->db->get('view_baju')->result_array();

				 $this->load->view('user/beranda', $data);
	}

	public function edit_profile()
	{
         $data['user'] = $this->db->get_where('users', ['email' =>
         $this->session->userdata('email')])->row_array();

				 $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

				 if($this->form_validation->run() == false){
					 $this->load->view('user/edit_profile', $data);
				 }else{
					 	$name = $this->input->post('nama');
						$email = $this->input->post('email');

						$upload_image = $_FILES['image']['name'];


						if($upload_image){
							$config['allowed_types'] = 'jpg|jpeg|png';
							$config['max_size'] = '2048';
							$config['upload_path'] = './assets/img/';

							$this->load->library('upload', $config);

							if($this->upload->do_upload('image')){

								$old_image = $data['user']['image_profile'];


								if($old_image != 'default.png'){
										unlink(FCPATH . 'assets/img/' . $old_image);

								}

								$new_image = $this->upload->data('file_name');
								$this->db->set('image_profile', $new_image);


							}else{
								echo $this->upload->display_errors();
								die;
							}
						}

						$this->db->set('name_user', $name);
						$this->db->where('email', $email);
						$this->db->update('users');

						$this->session->set_flashdata('message',
						'<div class = "alert alert-success role="alert">
						Berhasil mengubah profile
						</div>');
						redirect('user/edit_profile');
				 }


	}

	public function view_baju($id){
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['select_baju'] = $this->db->get_where('tbl_baju', ['id_baju' => $id])->row_array();

		$this->load->view('user/view_baju', $data);
	}

	public function view_kategori($id){
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();


		$data['kategori_baju'] = $this->db->get_where('tbl_baju', ['id_kategori' => $id])->result_array();

		$this->load->view('user/view_kategori', $data);
	}


}
