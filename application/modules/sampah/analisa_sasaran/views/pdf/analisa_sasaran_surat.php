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
    <td width="50%" align="right">IN.3</td>
  </tr>
</table><br />
<p>&nbsp;</p>
<p align="center"><strong><u>ANALISA SASARAN</u></strong><br />
</p>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5%"><strong>1.</strong></td>
    <td width="95%"><strong>SASARAN</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><?php echo $sasaran; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>2.</strong></td>
    <td align="justify"><strong>KONDISI DAN SITUASI SASARAN</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><?php echo $kondisi; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>3.</strong></td>
    <td align="justify"><strong>KEKUATAN, KELAMAHAN DAN KEHENDAK SASARAN</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     
        
          <tr>
            <td width="4%"><strong>A.</strong></td>
            <td width="96%"><strong>KEKUATAN</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php echo $kekuatan; ?></td>
          </tr>
          <tr>
            <td><strong>B.</strong></td>
            <td><strong>KELEMAHAN</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php echo $kelemahan; ?></td>
          </tr>
          <tr>
            <td><strong>C.</strong></td>
            <td><strong>KEHDNDAK SASARAN</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php echo $kehendak; ?></td>
          </tr>
         
    
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
    <td><strong>4.</strong></td>
    <td align="justify"><strong>OPOSISI</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="justify"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%"><strong>A.</strong></td>
        <td width="96%"><strong>AKTIF</strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php echo $oposisi_aktif; ?></td>
      </tr>
      <tr>
        <td><strong>B.</strong></td>
        <td><strong>PASIF</strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php echo $oposisi_pasif; ?></td>
      </tr>
      <tr>
        <td><strong>C.</strong></td>
        <td><strong>PENDUKUNG</strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php echo $oposisi_pendukung; ?></td>
      </tr>
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
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

 