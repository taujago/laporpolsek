<p>&nbsp;</p>
<?php 
$n=0;
foreach($rec_saksi->result() as $row ) : 
$n++;
?>
<table width="100%"  class='table table-bordered'>
<tr  class="separator">

    <td colspan="2" ><b><?php echo  $n. ". ". strtoupper($row->saksi_nama); ?> </b>   </td>
    </tr>
  <tr>
    <td width="30%" >Jenis Kelamin</td>
    <TD><?php echo $row->saksi_jk; ?></TD>
  </tr>
  <tr>
    <td>Suku </td>
    <TD><?php echo $row->suku; ?></TD>
  </tr>
  <tr>
    <td>Tempat Lahir </td>
    <TD><?php echo $row->saksi_tmp_lahir; ?></TD>
  </tr>
  <tr>
    <td>Tanggal Lahir </td>
    <TD><?php echo $row->saksi_tgl_lahir; ?></TD>
  </tr>
  <tr>
    <td>Agama </td>
    <TD><?php echo $row->agama; ?></TD>
  </tr>
  <tr>
    <td>Pekerjaan</td>
    <TD><?php echo $row->pekerjaan; ?></TD>
  </tr>
  <tr>
    <td>Email </td>
    <TD><?php echo $row->saksi_email; ?></TD>
  </tr>
  <tr>
    <td>Telpon </td>
    <TD><?php echo $row->saksi_telpon; ?></TD>
  </tr>
  <tr>
    <td>Pendidikan </td>
    <TD><?php echo $row->pendidikan; ?></TD>
  </tr>
  <tr>
    <td>Warga Negara </td>
    <TD><?php echo $row->saksi_wn; ?></TD>
  </tr>
  <tr>
    <td>No. KTP</td>
    <TD><?php echo $row->saksi_nik; ?></TD>
  </tr>
  <tr>
    <td>No. Passport</td>
    <TD><?php echo $row->saksi_no_passport; ?></TD>
  </tr>
  <tr>
    <td>No. Kitas</td>
    <TD><?php echo $row->saksi_no_kitas; ?></TD>
  </tr>
  <tr>
    <td>Residivis ? </td>
    <TD><?php echo $row->saksi_residivis; ?></TD>
  </tr>
  <tr>
    <td>Jika Ya, Apa </td>
    <TD><?php echo $row->saksi_klasifikasi; ?></TD>
  </tr>
  <tr>
    <td>Alamat </td>
    <TD><?php echo $row->saksi_alamat; ?></TD>
  </tr>
</table>

<p>
</p>
<?php 
endforeach;
?>