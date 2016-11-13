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
    <td width="50%" align="left"><strong><u>KEJAKSAAN NEGERI MAKASSAR</u></strong></td>
    <td width="50%" align="right">IN.14</td>
  </tr>
</table><br />
<p>&nbsp;</p>
<p align="center"><strong><u>ANALISA BERITA</u></strong><br />
Hari : <?php echo hari($tanggal); ?> Tanggal <?php echo flipdate($tanggal); ?> <br />
</p>
<p align="center"><br />
  <strong> JUDUL BERITA </strong><br />
  <span align="center"><?php echo $judul; ?> </span>
</p>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5%"><strong>I. </strong></td>
    <td width="95%"><strong>TOPIK UTAMA </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><?php echo $topik_utama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>II. </strong></td>
    <td align="justify"><strong>NARA SUMBER </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%"><strong>1.</strong></td>
        <td width="97%"><strong>Narasumber Pemberitaan : </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php  
		$arr_narsum = explode("#",$nara_sumber); 
		$x = 0;
		foreach($arr_narsum as $index => $value) : 
		$x++;
		?>
        
          <tr>
            <td width="4%">1.<?php echo $x; ?>.</td>
            <td width="96%"><?php echo ltrim($value); ?></td>
          </tr>
         <?php endforeach; ?>  
        </table></td>
      </tr>
      <tr>
        <td><strong>2.</strong></td>
        <td><strong>Narasumber yang banyak dikutip sebagai bahan pemberitaan : </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php echo $nara_sumber_kutip; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>III.</strong></td>
    <td align="justify"><strong>INTI PEMBERITAAN</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php  
		$arr_narsum = explode("#",$inti_pemberitaan); 
		$x = 0;
		foreach($arr_narsum as $index => $value) : 
		$x++;
		?>
        
          <tr>
            <td width="4%"><?php echo $x; ?>.</td>
            <td width="96%"><?php echo ltrim($value); ?></td>
          </tr>
         <?php endforeach; ?>  
    
     <!-- <tr>
        <td width="3%">1.</td>
        <td width="97%">Narasumber Pemberitaan : </td>
      </tr>-->
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>IV. </strong></td>
    <td align="justify"><strong>NILAI PEMBERITAAN</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><?php echo $nilai_pemberitaan; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>V.</strong></td>
    <td align="justify"><strong>LANGKAH - LANGKAH ANTISIPASI </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <?php  
		$arr_narsum = explode("#",$langkah_antisipasi); 
		$x = 0;
		foreach($arr_narsum as $index => $value) : 
		$x++;
		?>
        
          <tr>
            <td width="4%"><?php echo $x; ?>.</td>
            <td width="96%" align="justify"><?php echo ltrim($value); ?></td>
          </tr>
         <?php endforeach; ?>  
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

 