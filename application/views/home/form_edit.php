<?php

//Validasi input
echo validation_errors('<div class="alert alert-warning">','</div>');

//Buka Form
echo form_open(base_url('home/list'));
?>

<?php

	$no_equ = $equ->no_equ;

if($this->input->post('is_submitted')){
	//$no_equ		= set_value('no_equ');
	$tipe_1		= set_value('tipe_1');
	$tipe_2		= set_value('tipe_2');
	$dir		= set_value('dir');
	$tsr		= set_value('tsr');
	$huruf		= set_value('huruf');
	$angka		= set_value('angka');
	$klem		= set_value('klem');
}else{
	// $no_equ		= $equ->no_equ;
	 $tipe_1		= $equ->tipe_1;
	 $tipe_2		= $equ->tipe_2;
	 $dir		= $equ->dir;
	 $tsr		= $equ->tsr;
	 $huruf		= $equ->huruf;
	 $angka		= $equ->angka;
	 $klem		= $equ->klem;
	

	/*
	if(isset($_POST['update']) || FALSE){
		$no_equ = $_POST['no_equ'];
		$tipe_1 = $_POST['tipe_1'];
		$tipe_2 = $_POST['tipe_2'];
		$dir = $_POST['dir'];

		//update user data
		$result = mysql_query("UPDATE siswa SET tipe_1='$tipe_1', tipe_2='$tipe_2', dir='$dir' WHERE no_equ='$no_equ'");

	}
	$no_equ = $_GET['no_equ'];

	$result = mysql_query("SELECT * from equ WHERE no_equ=$no_equ");

	while ($user = mysql_fetch_array($result)) {
		$tipe_1 = $user['tipe_1'];
		$tipe_2 = $user['tipe_2'];
		$dir = $user['dir']; */

	}

?>

		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart('home/update/') ?>
			
						<div class="col-md-6">
						    <div class="form-group form-group-lg">
						    <label>Boardid Type 1</label>
						    <input type="text" name="tipe_1" class="form-control" value="<?=$tipe_1?>">
						    </div>

						    <div class="form-group form-group-lg">
						    <label>Boardid Type 2</label>
						    <input type="text" name="tipe_2" class="form-control" value="<?=$tipe_2 ?>">
						    </div>

						     <div class="form-group form-group-lg">
						    <label>DIR</label>
						    <input type="text" name="dir" class="form-control" value="<?=$dir?>">
						    </div>

						     <div class="form-group form-group-lg">
						    <label>TSR</label>
						    <input type="text" name="tsr" class="form-control" value="<?=$tsr?>">
						    </div>

						</div>

						<div class="col-md-6">
						    
						    

						    <div class="form-group form-group-lg">
						    <label>IDF 1</label>
						    <input type="text" name="huruf" class="form-control" value="<?=$huruf?>">
						    </div>

						    <div class="form-group form-group-lg">
						    <label>IDF 2</label>
						    <input type="text" name="angka" class="form-control" value="<?=$angka?>">
						    </div>

						    <div class="form-group form-group-lg">
						    <label>Klem</label>
						    <input type="text" name="klem" class="form-control" value="<?=$klem?>">
						    </div>

						</div>

					<div class="col-md-6">
					    <div class="form-group">
					    <input type="submit" name="simpan" class="btn btn-success btn-lg" value="Save">
					    
					</div>					

					
				<?= form_close() ?>
			</div>
			<div class="col-md-1"></div>
		</div>
		
		<script>
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script>