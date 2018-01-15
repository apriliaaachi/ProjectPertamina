<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	//Load Database
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('equ_model');
                $this->load->helper('url');
        }

	//index	
	public function index()
	{
		$equ = $this->equ_model->listing();
		$data = array ( 'title'		=> 'Page 1 - Data EQU',
						'equ'		=> $equ,
						'isi'		=> 'home/list');
		
		$this->load->view('layout/wrapper', $data);
	}

	//Tambah
	public function tambah()
	{
		//validasi
		$valid= $this->form_validation;
		

		$valid->set_rules('no_equ','EQU','required',
			array('required' => 'Nomor EQU Harus diisi'));


		$valid->set_rules('tsr','TSR','required',
			array('required' => 'Nilai TSR Harus diisi'));


		$valid->set_rules('huruf','IDF_1','required',
			array('required' => 'Nilai IDF 1 Harus diisi'));

		$valid->set_rules('angka','IDF_2','required',
			array('required' => 'Nilai IDF 2 Harus diisi'));

		$valid->set_rules('klem','Klem','required',
			array('required' => 'Nilai Klem Harus diisi'));

			
		if($valid->run()===FALSE)
		{ 	//End Validasi 	 	
		$data = array(		'title'		=> 'Page 2 - Tambah Data',
							'isi'		=> 'home/tambah');
		$this->load->view('layout/wrapper',$data);
		//Masuk database
		}
		else
		{
			$i = $this->input;
			$data =array( 'no_equ'			=> 	$i->post('no_equ'),
						  'tipe_1'			=> 	$i->post('tipe_1'),
						  'tipe_2'			=> 	$i->post('tipe_2'),
						  'dir'				=> 	$i->post('dir'),
						  'tsr'				=> 	$i->post('tsr'),
						  'huruf'			=> 	$i->post('huruf'),
						  'angka'			=> 	$i->post('angka'),
						  'klem'			=> 	$i->post('klem'),
						  //'id_jurusan' 		=> $this->input->post("jurusan")
						);
			$this->equ_model->tambah($data);

			$this->session->set_flashdata('sukses','Data EQU telah ditambah');
			redirect(base_url('home'));
			// print_r($data);
		}//END MASUK DATABASE		
	}

	/* public function create(){
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
				$data = array(
					'no_equ'		=> set_value('no_equ'),
						'tipe_1'		=> set_value('tipe_1'),
						'tipe_2'		=> set_value('tipe_2'),
						'dir'			=> set_value('dir'),
						'tsr'			=> set_value('tir'),
						'huruf'			=> set_value('huruf'),
						'angka'			=> set_value('angka'),
						'klem'			=> set_value('klem')
				);
				$this->equ_model->create($data);
				redirect('home');
			}
		}
	} */

	public function update($no_equ){
		$this->form_validation->set_rules('no_equ', 'EQU', 'required');
        $this->form_validation->set_rules('tipe_1', 'BOARDID TYPE 1', 'required');
        $this->form_validation->set_rules('tipe_2', 'BOARDID TYPE 2', 'required');
        $this->form_validation->set_rules('dir', 'DIR', 'required');
        $this->form_validation->set_rules('tsr', 'TSR', 'required');
        $this->form_validation->set_rules('huruf', 'IDF 1', 'required');
        $this->form_validation->set_rules('angka', 'IDF 2', 'required');
        $this->form_validation->set_rules('klem', 'KLEM', 'required');
        

        if ($this->form_validation->run() == FALSE)
        {
			//$data ['Home'] = $this->equ_model->find($id);
			$data = array('title'		=> 'Edit Data',
						   'equ'		=> '$this->equ_model->find($no_equ)',
						  'isi'			=> 'home/form_edit');
			$this->load->view('layout/wrapper',$data);
			
			
		}else {
			/*
			if($_FILES['userfile']['name'] != '' ){	
				//form submit dengan gambar diisi
				//load uploading file library
				$config['upload_path'] = './csv/';
				$config['allowed_types'] = 'csv';
				$config['max_size']	= '1000';//MB
			//	$config['max_width']  = '2000';//pixels
			//	$config['max_height']  = '2000';//pixels


				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload()){
					$data ['Home'] = $this->equ_model->find($id);
					$this->load->view('home/form_edit', $data);
				}
				else{ 
					$gambar = $this->upload->data();
					$data = array(
						'no_equ'		=> set_value('no_equ'),
						'tipe_1'		=> set_value('tipe_1'),
						'tipe_2'		=> set_value('tipe_2'),
						'dir'			=> set_value('dir'),
						'tsr'			=> set_value('tir'),
						'huruf'			=> set_value('huruf'),
						'angka'			=> set_value('angka'),
						'klem'			=> set_value('klem')
					);
					$this->equ_model->update($id, $data);
					redirect('home');
				}				
			}else{
				//form submit dengan gambar dikosongkan
				$gambar = $this->upload->data();
				$data = array(
						'no_equ'		=> set_value('no_equ'),
						'tipe_1'		=> set_value('tipe_1'),
						'tipe_2'		=> set_value('tipe_2'),
						'dir'			=> set_value('dir'),
						'tsr'			=> set_value('tir'),
						'huruf'			=> set_value('huruf'),
						'angka'			=> set_value('angka'),
						'klem'			=> set_value('klem')
					); */
				$this->equ_model->update($no_equ, $data);
				redirect('home');
			//}
		}
	}
	
	public function delete($no_equ){
		$this->equ_model->delete($no_equ);
		redirect('home');
	}
	
}