<?php 
$setting = $this->cm->get_setting();

?>
<style>
* {
	font-size:10px;
	margin:0px;
	padding:0px;
}


table.cetak th {
	border : 1px solid #000;
/*	border:#000 solid 3px;
	border-style:double;*/
	padding:5px;
}

table.cetak td {
	 
	border:0.5px solid #000;
	padding:5px;
	
} 

hr {
	margin:10px 0px;
}
</style>
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
<thead>
  <tr>
    <th width="4%" align="center" scope="col"><strong>NO.</strong></th>
    <th width="18%" align="center" scope="col"><strong>NO. &amp; TGL SURAT PERINTAH</strong></th>
    <th width="8%" align="center" scope="col"><strong>PELAKSANA</strong></th>
    <th width="14%" align="center" scope="col"><strong>ISI PERINTAH</strong></th>
    <th width="15%" align="center" scope="col"><strong>WAKTU PENERIMAAN PERINTAH</strong></th>
    <th width="13%" align="center" scope="col"><strong>HASIL PELAKSANAN</strong></th>
    <th width="13%" align="center" scope="col">WAKTU PELAPORAN</th>
    <th width="12%" align="center" scope="col"><strong>KETERANGAN</strong></th>
  </tr>
  <tr>
    <th width="4%" align="center" scope="col">1</th>
    <th width="18%" align="center" scope="col">2</th>
    <th width="8%" align="center" scope="col">3</th>
    <th width="14%" align="center" scope="col">4</th>
    <th width="15%" align="center" scope="col">5</th>
    <th width="13%" align="center" scope="col">6</th>
    <th width="13%" align="center" scope="col">7</th>
    <th width="12%" align="center" scope="col">8</th>
  </tr>
  </thead>
  </table>