<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Csv_import extends CI_Controller{
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}

	function index(){
		$this->load->view('csv_import');
	}

	function load_data(){
		$result = $this->csv_import_model->select(); 
		$output = '
			
			<h3 align="center">Imported User Detail from CSV File</h3>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
				        <th rowspan="2">No</th>
				        <th rowspan="2">EQU</th>
				        <th rowspan="2" colspan="2">BOARDID TYPE</th>
				        <th rowspan="2">DIR</th>
				        <th rowspan="2">TSR</th>
				        <th colspan="3">IDF</th>
				    </tr>

				    <tr>
				        <th colspan="2">K 256</th>
				        <th>KLEM</th>
				    </tr>
		';

		$count = 0;
		if($result->num_rows() > 0){
			foreach ($result->result() as $row) {
				$count = $count + 1;
				$output .= '
					<tr>
						<td>'.$count.'</td>
						<td>'.$row->EQU.'</td>
						<td>'.$row->BOARDID_TYPE.'</td>
						<td>'.$row->DIR.'</td>
						<td>'.$row->TSR.'</td>
						<td>'.$row->IDF.'</td>
					</tr>
				';
			}
		}else{
			$output .= '
				<tr>
					<td colspan="5" align="center">Data not Available</td>
				</tr>
			';
		}
		$output .=  '</table></div>';
		echo $output;

	}

	function import(){
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);

		foreach ($file_data as $row) {
			$data[] = array(
				'no_equ'	=> $row["EQU"],
				'tipe_1'	=> $row["BOARDID TYPE"],
				'tipe_2'	=> $row["BOARDID TYPE"],
				'dir'		=> $row["DIR"],
				'tsr'		=> $row["TSR"],
				'huruf'		=> $row["IDF 1"],
				'angka'		=> $row["IDF 2"],
				'klem'		=> $row["KLEM"]
			);
		}
		$this->csv_import_model->insert($data)
	}
}