<p>
</p>
<table width="100%" class="table table-striped">
<tr><th width="8%">NO.</th>
<TH width="72%">BARANG BUKTI</TH>
<TH width="10%">JUMLAH</TH>
<TH width="10%">SATUAN</TH>
</tr>
<?php 
$no = 0 ;
foreach($rec_barbuk->result() as $row) : 
$no++;
?>
<tr>
  <td><?php echo $no; ?></td>
  <td><?php echo $row->barbuk_nama; ?></td>
  <td><?php echo $row->barbuk_jumlah; ?></td>
  <td><?php echo $row->barbuk_satuan; ?></td>
</tr>

<?php endforeach; ?>
</table>
