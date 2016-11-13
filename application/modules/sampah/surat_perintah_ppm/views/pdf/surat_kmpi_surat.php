<?php 
$setting = $this->cm->get_setting();

?>
<style>
* {
	font-size:10px;
	margin:0px;
	padding:0px;
}
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="50%" align="left"><U>KEJAKSAAN NEGERI MAKASSAR</U></td>
    <td width="50%" align="right">IN.10</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong><u>SUARAT KETERANGAN MEMBAWA PERALATAN INTELIJEN</u></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">NOMOR : <?php echo $nomor; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
   
</table>

 <table width="100%" border="0" cellspacing="0" cellpadding="3">
   <tr>
     <td width="12%">&nbsp;</td>
     <td colspan="3">Yang betandatangan di bawah ini :</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td width="21%">Nama</td>
     <td width="2%">:</td>
     <td width="65%"><?php echo $ttd_nama; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>Pangkat / Golongan</td>
     <td>:</td>
     <td><?php echo $ttd_pangkat; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>N I P / N R P </td>
     <td>:</td>
     <td><?php echo $ttd_nip; ?> / <?php echo $ttd_nrp; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="3">Menerangkan bahwa : </td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>N a m a </td>
     <td>:</td>
     <td><?php echo $pelaksana_nama; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>Pangkat / Golongan </td>
     <td>: </td>
     <td><?php echo $pelaksana_pangkat; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>N I P / N R P </td>
     <td>:</td>
     <td><?php echo $pelaksana_nip; ?> / <?php echo $pelaksana_nrp; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="3">Membawa peralatan Intelijen milik Instansi Kejaksaan Republik Indonesia tujuan ke <?php echo $tujuan; ?> dalam keadaan tertutup dan tersegel tertanda Kejaksaan Agung Republik Indonesia :</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <?php 
	 $x=0;
	 	foreach($rec_alat->result() as $row) : 
		$x++;
	 ?>
       <tr>
         <td width="5%"><?php echo $x; ?>. </td>
         <td width="43%"><?php echo $row->nama_unit; ?></td>
         <td width="12%">sejumlah</td>
         <td width="40%"><?php echo $row->jumlah_unit; ?> Unit.</td>
       </tr>
       <?php endforeach; ?>
     </table></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="3">Demikian Surat Keterangan ini dibuat untuk digunakan sebagaimana mestinya. <em><u></u></em></td>
   </tr>
</table>
 <p>&nbsp;</p>
