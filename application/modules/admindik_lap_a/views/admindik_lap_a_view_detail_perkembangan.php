<p>
</p>
<table width="100%" class="table table-striped">
<thead>
  <tr>

        <th width="15%">LIDIK/SIDIK</th>
        <th width="19%">TAHAP</th>
        <th width="19%">NO DOKUMEN</th>
        <th width="19%">TANGGAL</th>
        
        <th width="22%">KETERANGAN</th>
         
         
       
    </tr>
  
</thead>

<?php foreach ($rec_perkembangan->result() as  $value)  : 
	 
 
?>
<tr >

        <td><?php echo ($value->lidik=="1")?"Penyidikan":"Penyelidikan"; ?></td>
        <td><?php echo $value->tahap; ?></td>
        <td><?php echo $value->no_dokumen; ?></td>
        <td><?php echo flipdate($value->tanggal); ?></td>
        
        <td><?php echo $value->keterangan; ?></td>
         
         
       
    </tr>



<?php endforeach; ?>
</table>
