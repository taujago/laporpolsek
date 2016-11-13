<p>
</p>
<table width="100%" class="table table-striped">
<tr><th width="8%">NO.</th>
<TH width="92%">PASAL</TH>
</tr>
<?php 
$no = 0 ;
foreach($rec_pasal->result() as $row) : 
$no++;
?>
<tr>
  <td><?php echo $no; ?></td>
  <td><?php echo $row->pasal; ?></td>
</tr>

<?php endforeach; ?>
</table>
