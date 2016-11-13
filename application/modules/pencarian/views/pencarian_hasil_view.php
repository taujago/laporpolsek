

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="hasil" role="grid">
<thead>
	<tr style="background-color:#CCC">

        <th width="16%">NOMOR</th>
        <th width="10%">TGL. KEJADIAN</th>
        <th width="15%">GOL. KEJAHATAN</th>
        <th width="15%">LOKASI</th>
        <th width="76%">TINDAK PIDANA</th>
        <th width="10%">MOTIF</th>
        <th width="16%">FUNGSI TERKAIT</th>
        <th width="16%">DETAIL</th>
    </tr>
	
</thead>

<tbody>
<?php 
foreach($record->result() as $row) : 
?>  
    <tr>
      <td ><?php echo $row->nomor; ?></td>
        <td ><?php echo flipdate($row->kp_tanggal); ?></td>
        <td ><?php echo $row->golongan_kejahatan; ?></td>
        <td ><?php echo $row->jenis_lokasi; ?></td>
        <td ><?php echo $row->tindak_pidana; ?></td>
        <td ><?php echo $row->motif; ?></td>
        <td ><?php echo $row->fungsi; ?></td>
        <td ><a target="blank" href="<?php  echo site_url("$row->laporan/detail/$row->id") ?>">Detail</a></td>
        </tr>
<?php 
endforeach;
?>

</tbody>
</table>