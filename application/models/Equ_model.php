<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equ_model extends CI_Model {
        public function __construct()
        {
                $this->load->database();
        }
        
		//Listing
		public function listing()
		{
			$this->db->select('equ.*');
			$this->db->from('equ');
			
			$query = $this->db->get();
			return $query->result();
		}
		
		//Tambah
		public function tambah($data)
		{
			$this->db->insert('equ',$data);
		}

		public function create ($data){
		//Query INSERT INTO
		$this ->db->insert('home',$data);
		}
		
		public function update($no_equ , $data){
			//Query UPDATE FROM ... WHERE id = ...
			$this ->db->where('no_equ' ,$no_equ)
					  ->update('equ', $data);
		}
		
		public function delete($no_equ){
			//Query DELETE ... WHERE id= ...
			$this ->db->where('no_equ',$no_equ)
						->delete('equ');
		}
}