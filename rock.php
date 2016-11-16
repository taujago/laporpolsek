<?php 



_simpan

$this->cm->set_unsync("lap_laka_lantas","lap_laka_lantas_id",$data['lap_laka_lantas_id']);


tmp_update
$this->cm->set_unsync2("lap_laka_lantas","lap_laka_lantas_id","lap_laka_pengemudi","lap_laka_lantas_pengemudi_id",$data['lap_laka_lantas_pengemudi_id']);

_hapus 
	$this->cm->set_unsync2("lap_laka_lantas","lap_laka_lantas_id","lap_laka_pengemudi","lap_laka_lantas_pengemudi_id",$data['id']);

update 
$this->cm->set_unsync("lap_laka_lantas","lap_laka_lantas_id",$data['lap_laka_lantas_id']);


update lap_a set sync=0; 
update lap_b set sync=0;
update lap_c set sync=0;
update lap_d set sync=0;
update lap_laka_lantas set sync=0;
