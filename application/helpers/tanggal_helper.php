<?php

function ribuan($angka) {
	return number_format($angka,0,',','.');
}

function ora_date($date){

	$mo = array(1=>"JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");

	$tmp = explode("-", $date);

	$tgl = $tmp[0]."-".$mo[intval($tmp[1])]."-".$tmp[2];
	return $tgl;

}


function arr_bulan(){
	$mo = array(1=>
	"JANUARI","FEBRUARI","MARET",
	"APRIL","MEI","JUNI",
	"JULI","AGUSTUS","SEPTEMBER",
	"OKTOBER","NOVEMBER","DESEMBER");
	return $mo;
}


function hari($tgl) {
		// format tanggal haru Y-m-d
		$tgl = str_replace("-", "/", $tgl);
		$tgl = strtotime($tgl);
		$hari = date("l",$tgl);
		$arr_hari = array("Sunday"=>"Minggu",
						   "Monday" => "Senin",
						   "Tuesday" => "Selasa",
						   "Wednesday" => "Rabu",
						   "Thursday"  => "Kamis",
						   "Friday" => "Jum'at",
						   "Saturday" => "Sabtu"	);

		return $arr_hari[$hari];
}


function indo_date($date){

	$mo = array(1=>"JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
	$mo = array_flip($mo);
	$tmp = explode("-", $date);

	$tgl = $tmp[0]."-".$mo[$tmp[1]]."-".$tmp[2];
	return $tgl;

}

function tgl_indo($date){

	$mo = array(1=>
	"JANUARI","FEBRUARI","MARET",
	"APRIL","MEI","JUNI",
	"JULI","AGUSTUS","SEPTEMBER",
	"OKTOBER","NOVEMBER","DESEMBER");
	//$mo = array_flip($mo);
	$tmp = explode("-", $date);

	$tgl = $tmp[0]." ".$mo[intval($tmp[1])]." ".$tmp[2];
	return $tgl;

}


function todate($date) {

	if(empty($date)) return "";

	$thn = substr($date,0,4);
	$bln = substr($date,4,2);
	$tgl = substr($date,6,2);

	$jam = substr($date,8,2);
	$menit = substr($date,10,2);
	$detik = substr($date,12,2);
	return "$tgl-$bln-$thn $jam:$menit:$detik ";

}


function todate2($date) {

	if(empty($date)) return "";

	$thn = substr($date,0,4);
	$bln = substr($date,4,2);
	$tgl = substr($date,6,2);

	// $jam = substr($date,8,2);
	// $menit = substr($date,10,2);
	// $detik = substr($date,12,2);
	return "$thn-$bln-$tgl";

}



function service_date($tgl){
	$tmp = explode("-", $tgl);
	$ret = $tmp[2].$tmp[1].$tmp[0];
	return $ret;
}


function umur($tanggal){
	$tz  = new DateTimeZone('Asia/Jakarta');
	$age = DateTime::createFromFormat('Y-m-d', $tanggal, $tz)
     ->diff(new DateTime('now', $tz))
     ->y;
     return $age;
}


function add_arr_head($arr,$index,$str) {
	$res[$index] = $str;
	foreach($arr as $x => $y) : 
	$res[$x] = $y;
	endforeach;
	return $res;
}


// function flipdate($date){
// 	$r=explode("-",$date);
// 	if(count($r) < 3){
// 		return "";
// 	}
// 	else {
// 		return $r[2]."-".$r[1]."-".$r[0];
// 	}
// }

?>