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
    <td width="50%" align="left">&nbsp;</td>
    <td width="50%" align="right">IN.8</td>
  </tr>
   
</table>
<p align="center"><strong><H1>KEJAKSAAN NEGERI MAKASSAR</H1></strong><br />
<HR/></p>
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td width="12%">Nomor</td>
     <td width="1%">:</td>
     <td width="54%"><?php echo $nomor; ?></td>
     <td width="33%">Makassar, <?php echo tgl_indo(flipdate($tanggal)); ?> </td>
   </tr>
   <tr>
     <td>Sifat</td>
     <td>:</td>
     <td><?php echo $sifat; ?></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Lampiran</td>
     <td>:</td>
     <td><?php echo $lampiran; ?></td>
     <td>KEPADA YTH. </td>
   </tr>
   <tr>
     <td>Perihal</td>
     <td>:</td>
     <td><strong><em><u>Permintaan Keterangan</u></em></strong></td>
     <td><?php echo $kepada; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>Di -</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td align="center"><?php echo $di; ?></td>
   </tr>
 </table>
 <p>&nbsp;</p>
<p>&nbsp;</p>
 <table width="100%" border="0" cellspacing="0" cellpadding="3">
   <tr>
     <td width="12%">&nbsp;</td>
     <td colspan="3">Dengan ini diharapkan kehadiran Saudara pada : </td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td width="21%">H a r i </td>
     <td width="2%">:</td>
     <td width="65%"><?php echo hari($isi_tanggal); ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>Tanggal</td>
     <td>:</td>
     <td><?php echo tgl_indo(flipdate($isi_tanggal)); ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>Pukul</td>
     <td>:</td>
     <td><?php echo $isi_jam; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>Tempat</td>
     <td>:</td>
     <td><?php echo $tempat; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>Bertemu dengan</td>
     <td>:</td>
     <td><?php //echo $bertemu_dengan; ?>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <?php  
		$arr_narsum = explode("#",$bertemu_dengan); 
		$x = 0;
		foreach($arr_narsum as $index => $value) : 
		$x++;
		?>
        
          <tr>
            <td width="4%"><?php echo $x; ?>.</td>
            <td width="96%"><?php echo ltrim($value); ?></td>
          </tr>
         <?php endforeach; ?>  
     </table></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>Untuk</td>
     <td>:</td>
     <td><?php echo $untuk; ?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="3">Atas kehadiran Saudara diucapkan terima kasih. </td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="3">Catatan : <em><u>Dengan membawa dokumen-dokumen terkait. </u></em></td>
   </tr>
</table>
 <p>&nbsp;</p>
