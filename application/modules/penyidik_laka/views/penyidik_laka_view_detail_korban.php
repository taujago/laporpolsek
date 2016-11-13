<p>&nbsp;</p>
<?php 
$n=0;
foreach($rec_korban->result() as $row ) : 
$n++;
?>
 
<table width="100%"  class='table table-bordered'>
  
<tr  class="separator">
<td colspan="2" ><b><?php echo $n.". ". $row->korban_nama; ?></b></td>

 
</tr>
<tr width="30%" >
<td >Jenis Kelamin</td>
<TD><?php echo $row->korban_jk; ?>
</TD>
</tr>
<tr>
<td>Tanggal Lahir </td>
<TD><?php echo $row->korban_tgl_lahir; ?>
</TD>
</tr>
<tr>
<td>Agama </td>
<TD><?php echo $row->agama; ?>
</TD>
</tr>
<tr>
<td>Pekerjaan</td>
<TD><?php echo $row->pekerjaan; ?>
</TD>
</tr>


<tr><td>Pendidikan </td>
<TD><?php echo $row->pendidikan; ?>

</TD></tr>

<tr><td>Warga Negara </td>
<TD><?php echo $row->korban_wn; ?></TD></tr>

<tr><td>No. KTP</td>
<TD><?php echo $row->korban_nik; ?></TD></tr>

<tr><td>No. Passport</td>
<TD><?php echo $row->korban_no_passport; ?></TD></tr>


<tr><td>No. Kitas</td>
<TD><?php echo $row->korban_no_kitas; ?></TD></tr>


<tr>
<td>Alamat </td>
<TD><?php echo $row->korban_alamat. " - " .$row->desa." - ".$row->kecamatan." - ".$row->kota." - ".$row->provinsi; ?>
</TD>
</tr>
<tr>
<td>Cedera</td>
<TD><?php echo $row->korban_cidera; ?>
</TD>
</tr>
<tr>
<td  >Tempat Dirawat</td>
<TD><?php echo $row->korban_tmp_dirawat; ?>
</TD>
</tr>
</table>  

<p>
</p>
<?php 
endforeach;
?>