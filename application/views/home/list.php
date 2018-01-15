<?php
//cetak notif
if($this->session->flashdata('sukses'))
{
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<style>
    th, td{
        text-align: center;
    }
</style>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">EQU</th>
        <th rowspan="2" colspan="2">BOARDID TYPE</th>
        <th rowspan="2">DIR</th>
        <th rowspan="2">TSR</th>
        <th colspan="3">IDF</th>
        <th rowspan="2"></th>
    </tr>

    <tr>
        <th colspan="2">K 256</th>
        <th>KLEM</th>
    </tr>
    
</thead>
<tbody>
    <?php $i =1; foreach ($equ as $equ)
    { ?>
    <tr class="odd gradeX">
        <td><?php echo $i ?></td>
        <td><?php echo $equ->no_equ ?></td>
        <td><?php echo $equ->tipe_1 ?></td>
        <td><?php echo $equ->tipe_2 ?></td>
        <td><?php echo $equ->dir ?></td>
        <td><?php echo $equ->tsr ?></td>
        <td><?php echo $equ->huruf ?></td>
        <td><?php echo $equ->angka ?></td>
        <td><?php echo $equ->klem ?></td>
        <td>
            <?=anchor('home/update/' . $equ->no_equ, 'Edit',['class'=>'btn btn-default btn-sm'])?>
            <?=anchor('home/delete/' . $equ->no_equ, 'Delete',['class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm(\'Are you sure?\')'])?> 
                    </td>
    </tr>
    <?php $i++;} ?>
</tbody>
</table>
</div>