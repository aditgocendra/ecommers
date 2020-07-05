<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			is_logged_in();

			$role_id = $this->session->userdata('role_id');
	    if($role_id == 2){
	      redirect('user');
	    }

	}


	public function index()
	{
        $data['title'] = 'DBS Admin';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_admin');
	}

	public function kategori()
	{
				$data['title'] = 'DBS Admin';
				$data['header'] = 'Kategori';
				$data['kategori'] = $this->db->get('kategori')->result_array();
				$data['user'] = $this->db->get_where('users', ['email' =>
				$this->session->userdata('email')])->row_array();

				$this->form_validation->set_rules('idkategori','IdKategori', 'required');
				$this->form_validation->set_rules('kategori','Kategori', 'required|trim');

				if($this->form_validation->run() == false){

					$this->load->view('templates/header_admin', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar_admin', $data);
					$this->load->view('admin/kategori', $data);
					$this->load->view('templates/footer_table');
				}else{
					$this->db->insert('kategori',
					[
						'idkategori' => $this->input->post('idkategori'),
						'kategori' => $this->input->post('kategori')
					]);
					$this->session->set_flashdata('message',
					'<div class = "alert alert-success role="alert">
					Berhasil menambahkan kategori
					</div>');
					redirect('admin/kategori');

				}

	}

	public function brand()
	{
				$data['title'] = 'DBS Admin';
				$data['header'] = 'Brand';
				$data['brand'] = $this->db->get('tbl_brand')->result_array();
				$data['user'] = $this->db->get_where('users', ['email' =>
				$this->session->userdata('email')])->row_array();

				$this->form_validation->set_rules('idbrand','IdBrand', 'required');
				$this->form_validation->set_rules('brand','Brand', 'required|trim');

				if($this->form_validation->run() == false){

					$this->load->view('templates/header_admin', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar_admin', $data);
					$this->load->view('admin/brand', $data);
					$this->load->view('templates/footer_table');
				}else{
					$this->db->insert('tbl_brand',
					[
						'id_brand' => $this->input->post('idbrand'),
						'brand' => $this->input->post('brand')
					]);
					$this->session->set_flashdata('message',
					'<div class = "alert alert-success role="alert">
					Berhasil menambahkan brand
					</div>');
					redirect('admin/brand');

				}
	}

	public function baju(){
		$data['title'] = 'DBS Admin';
		$data['header'] = 'Baju';

		// query
		$query = "SELECT * FROM `view_baju`";
		$data['baju'] = $this->db->query($query)->result_array();

		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['brand'] = $this->db->get('tbl_brand')->result_array();

		//  end query
		$this->form_validation->set_rules('id_baju','IdBaju', 'required');
		$this->form_validation->set_rules('merk','Merk', 'required|trim');

		$this->form_validation->set_rules('harga','Harga', 'required|trim');
		$this->form_validation->set_rules('terjual','Terjual', 'required|trim');
		$this->form_validation->set_rules('deskripsi','Deskripsi', 'required|trim');

		if($this->form_validation->run() == false){

			$this->load->view('templates/header_admin', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/baju', $data);
			$this->load->view('templates/footer_table');
		}else{

			$upload_image = $_FILES['image_item']['name'];

			if($upload_image){
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/item_img/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image_item')){

					$new_image = $this->upload->data('file_name');

					$this->db->insert('tbl_baju',
					[
						'id_baju' => $this->input->post('id_baju'),
						'merk' => $this->input->post('merk'),
						'image' => $new_image,
						'harga' => $this->input->post('harga'),
						'terjual' => $this->input->post('terjual'),
						'deskripsi' => $this->input->post('deskripsi'),
						'id_kategori' => $this->input->post('kategori'),
						'id_brand' => $this->input->post('brand'),
					]);
					$this->session->set_flashdata('message',
					'<div class = "alert alert-success role="alert">
					Berhasil menambahkan Baju
					</div>');
					redirect('admin/baju');

				}else{
					echo $this->upload->display_errors();
					die;
				}
			}else{
				$this->session->set_flashdata('message',
				'<div class = "alert alert-danger role="alert">
				Gagal menambahkan Baju
				</div>');
				redirect('admin/baju');
			}
		}
	}



	public function deleteKategori($data){
			$this->db->delete('kategori', ['idkategori' => $data]);
			$this->session->set_flashdata('message',
			'<div class = "alert alert-success role="alert">
			Berhasil menghapus kategori
			</div>');
			redirect('admin/kategori');
	}

	public function deleteBrand($data){
			$this->db->delete('tbl_brand', ['id_brand' => $data]);
			$this->session->set_flashdata('message',
			'<div class = "alert alert-success role="alert">
			Berhasil menghapus brand
			</div>');
			redirect('admin/brand');
	}

	public function deleteBaju($data){
			$this->db->delete('tbl_baju', ['id_baju' => $data]);
			$this->session->set_flashdata('message',
			'<div class = "alert alert-success role="alert">
			Berhasil menghapus baju
			</div>');
			redirect('admin/baju');
	}

	public function editKategori($id = ""){
		$data['title'] = 'DBS Admin';
		$data['header'] = 'Edit Kategori';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['select_kategori'] = $this->db->get_where('kategori', ['idkategori' =>
		$id])->row_array();

		$this->form_validation->set_rules('id_kategori','IdKategori', 'required');
		$this->form_validation->set_rules('kategori','Kategori', 'required|trim');


		if($this->form_validation->run() == false){
			$this->load->view('templates/header_admin', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/editKategori', $data);
			$this->load->view('templates/footer_admin');
		}else{
			$this->db->set('kategori', $this->input->post('kategori'));
			$this->db->where('idkategori', $this->input->post('id_kategori'));
			$this->db->update('kategori');

			$this->session->set_flashdata('message',
			'<div class = "alert alert-success role="alert">
			Berhasil mengubah kategori
			</div>');
			redirect('admin/kategori');
		}
	}

	public function editBrand($id = ""){
		$data['title'] = 'DBS Admin';
		$data['header'] = 'Edit Brand';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['select_brand'] = $this->db->get_where('tbl_brand', ['id_brand' =>
		$id])->row_array();

		$this->form_validation->set_rules('id_brand','IdBrand', 'required');
		$this->form_validation->set_rules('brand','Brand', 'required|trim');


		if($this->form_validation->run() == false){
			$this->load->view('templates/header_admin', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/editBrand', $data);
			$this->load->view('templates/footer_admin');
		}else{
			$this->db->set('brand', $this->input->post('brand'));
			$this->db->where('id_brand', $this->input->post('id_brand'));
			$this->db->update('tbl_brand');

			$this->session->set_flashdata('message',
			'<div class = "alert alert-success role="alert">
			Berhasil mengubah brand
			</div>');
			redirect('admin/brand');
		}
	}

	public function editBaju($id = ""){
		$data['title'] = 'DBS Admin';
		$data['header'] = 'Edit Baju';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['select_baju'] = $this->db->get_where('tbl_baju', ['id_baju' =>
		$id])->row_array();

		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['brand'] = $this->db->get('tbl_brand')->result_array();


		$this->form_validation->set_rules('id_baju','IdBaju', 'required');
		$this->form_validation->set_rules('merk','Merk', 'required|trim');


		if($this->form_validation->run() == false){
			$this->load->view('templates/header_admin', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/editBaju', $data);
			$this->load->view('templates/footer_admin');
		}else{

			$upload_image = $_FILES['image_item']['name'];

			if($upload_image){
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/item_img/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image_item')){

					$new_image = $this->upload->data('file_name');

					$this->db->set('image',$new_image);
					$this->db->where('id_baju', $this->input->post('id_baju'));
					$this->db->update('tbl_baju');

					$this->session->set_flashdata('message',
					'<div class = "alert alert-success role="alert">
					Berhasil mengubah data Baju
					</div>');

				}else{
					echo $this->upload->display_errors();
					die;
				}
			}
			$new_data =  [
				'merk' => $this->input->post('merk'),
				'harga' => $this->input->post('harga'),
				'terjual' => $this->input->post('terjual'),
				'deskripsi' => $this->input->post('deskripsi'),
				'id_kategori' => $this->input->post('kategori'),
				'id_brand' => $this->input->post('brand'),
			];

			$this->db->set($new_data);
			$this->db->where('id_baju', $this->input->post('id_baju'));
			$this->db->update('tbl_baju');
			redirect('admin/baju');

		}
	}

	

}
