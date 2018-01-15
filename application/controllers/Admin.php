<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan extends CI_Controller {
 
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> equ_model
		$this->load->model('equ_model');
	}
	
	public function index()
	{
		$data ['equ'] = $this->equ_model->all(); 
		$this->load->view('backend/view_all_lapangan', $data);
	}
	
	public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('name', 'Place', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|integer');
		//$this->form_validation->set_rules('userfile', 'Image', 'required');
        

        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('backend/form_tambah');
		}else{
			//load uploading file library
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']	= '1000';//MB
			$config['max_width']  = '2000';//pixels
			$config['max_height']  = '2000';//pixels

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()){
				//file gagal diupload -> kembali ke form tambah
				$this->load->view('backend/form_tambah');
			}else{
				//file berhasil di upload -> lanjutkan ke query INSERT
				//eksekusi query INSERT
				$gambar = $this->upload->data();
				$data_lapangan = array(
					'name'		=> set_value('name'),
					'address'	=> set_value('address'),
					'price'		=> set_value('price'),
					'image'		=> $gambar['file_name']
				);
				$this->model_lapangan->create($data_lapangan);
				redirect('admin/lapangan');
			}
		}
	}
	public function update($id){
		$this->form_validation->set_rules('name', 'Place', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|integer');
        

        if ($this->form_validation->run() == FALSE)
        {
			$data ['lapangan'] = $this->model_lapangan->find($id);
			$this->load->view('backend/form_edit', $data);
		}else {
			if($_FILES['userfile']['name'] != '' ){	
				//form submit dengan gambar diisi
				//load uploading file library
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']	= '1000';//MB
				$config['max_width']  = '2000';//pixels
				$config['max_height']  = '2000';//pixels

				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload()){
					$data ['lapangan'] = $this->model_lapangan->find($id);
					$this->load->view('backend/form_edit', $data);
				}
				else{ 
					$gambar = $this->upload->data();
					$data_lapangan = array(
						'name'		=> set_value('name'),
						'address'	=> set_value('address'),
						'price'		=> set_value('price'),
						'image'		=> $gambar['file_name']
					);
					$this->model_lapangan->update($id, $data_lapangan);
					redirect('admin/lapangan');
				}				
			}else{
				//form submit dengan gambar dikosongkan
				$gambar = $this->upload->data();
				$data_lapangan = array(
					'name'		=> set_value('name'),
					'address'	=> set_value('address'),
					'price'		=> set_value('price')
				);
				$this->model_lapangan->update($id, $data_lapangan);
				redirect('admin/lapangan');
			}
		}
	}
	
	public function delete($id){
		$this->model_lapangan->delete($id);
		redirect('admin/lapangan');
	}
	
}