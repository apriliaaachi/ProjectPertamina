<?php

//Validasi input
echo validation_errors('<div class="alert alert-warning">','</div>');

//Buka Form
echo form_open(base_url('home/tambah'));
?>

<div class="col-md-6">
    <div class="form-group form-group-lg">
    <label>EQU</label>
    <input type="text" name="no_equ" class="form-control" placeholder="Masukkan Nomor EQU" value="<?php echo set_value('no_equ') ?>">
    </div>

    <div class="form-group form-group-lg">
    <label>Boardid Type 1</label>
    <input type="text" name="tipe_1" class="form-control" placeholder="Masukkan Nilai Boardid Type 1" value="<?php echo set_value('tipe_1') ?>">
    </div>

    <div class="form-group form-group-lg">
    <label>Boardid Type 2</label>
    <input type="text" name="tipe_2" class="form-control" placeholder="Masukkan Nilai Boardid Type 2" value="<?php echo set_value('tipe_2') ?>">
    </div>

     <div class="form-group form-group-lg">
    <label>DIR</label>
    <input type="text" name="dir" class="form-control" placeholder="Masukkan Nomor DIR" value="<?php echo set_value('dir') ?>">
    </div>

</div>

<div class="col-md-6">
    
     <div class="form-group form-group-lg">
    <label>TSR</label>
    <input type="text" name="tsr" class="form-control" placeholder="Masukkan Nomor TSR" value="<?php echo set_value('tsr') ?>">
    </div>

    <div class="form-group form-group-lg">
    <label>IDF 1</label>
    <input type="text" name="huruf" class="form-control" placeholder="Masukkan Nomor IDF 1" value="<?php echo set_value('huruf') ?>">
    </div>

    <div class="form-group form-group-lg">
    <label>IDF 2</label>
    <input type="text" name="angka" class="form-control" placeholder="Masukkan Nomor IDF 2" value="<?php echo set_value('angka') ?>">
    </div>

    <div class="form-group form-group-lg">
    <label>Klem</label>
    <input type="text" name="klem" class="form-control" placeholder="Masukkan Nilai Klem" value="<?php echo set_value('klem') ?>">
    </div>

</div>

<div class="col-md-6">
    <div class="form-group">
    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
    <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
    </div>


<!-- UPLOAD FILE 

    <br>
    <h3> Atau </h3>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

<!-- <?php include('config.php') ;?>
<?php
    if (isset($_POST['uploadBtn'])) {
        $fileName = $_FILES['myFile']['name'];
        $fileTmpName = $_FILES ['myFile']['tmp_name'];
        //lets find the extension of file

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        //let check what is the extension
        //echo $fileExtension;

        //difine your allowed extension
        $allowedType = array('csv');
        if (!in_array($fileExtension, $allowedType)) {?>
            <div class="alert alert-danger">Invalid File Extension</div>
            <?php 
        }else{
            //upload your file
            $handle = fopen($fileTmpName, 'r');//read mode "r"
            while (($myData = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $no_equ = $myData[0];
                $tipe_1 =  $myData[1];
                $tipe_2 =  $myData[2];
                $dir =  $myData[3];
                $tsr =  $myData[4];
                $huruf =  $myData[5];
                $angka =  $myData[6];
                $kle =  $myData[7];

                $query = "insert into pertamina (no_equ, tipe_1, tipe_2, dir, tsr, huruf, angka, klem) values ('".$no_equ."','".$tipe_1."','".$tipe_2."','".$dir."','".$tsr."','".$huruf."','".$angka."','".$klem."')";
                $run = mysql_query($query);

                
            }
            if(!$run){
                die("error in uploading file". mysql_error());
            }else{
                ?>
                    <div class="alert alert-success">File Uploaded Succesfully!!!</div>
                <?php
            }
        }
    }
?> -->
   <!--  <div class="container">
        <form action="" method="post" enctype="multipart/form-data ">
            <p>Upload Your File</p>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" name="myFile" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" name="uploadBtn" class="btn btn-info">
                    </div>
                </div>
            </div>
        </form>
    </div> -->
    <hr/>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" name="myFile" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" name="uploadBtn" class="btn btn-info">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
//Tutup form
echo form_close();