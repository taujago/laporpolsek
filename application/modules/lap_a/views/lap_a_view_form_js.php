<script>


$(document).ready(function(){


$("#tr_barbuk_baru").hide();
$("#tr_satuan_baru").hide();

$(".tanggal").datepicker()
		.on('changeDate', function(ev){                 
		    $(this).datepicker('hide');
		});



		var dt_terlapor = $("#terlapor").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 7, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo $json_url_terlapor ?>'
		 	});



		 /// saksi section 
			var dt_saksi = $("#saksi").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 7, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo $json_url_saksi ?>'
		 	});

		 	
		 	var dt_korban = $("#korban").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 7, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo $json_url_korban ?>'
		 	});

		 	var dt_barbuk = $("#barbuk").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 3, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo $json_url_barbuk; ?>'
		 	});



		 	var dt_pasal = $("#pasallap").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 1, "orderable": true } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo $json_url_pasal; ?>'
		 	});



$("#txt_id_fungsi").change(function(){

		$.ajax({

			url : '<?php echo site_url("general/get_pasal") ?>',
			data : {id_fungsi : $(this).val()},
			type : 'post',
			success : function(htmldata) {
				$("#id_pasal").html(htmldata);
			}

		});

	});



	
	$("#formulir").submit(function(){

		// $('#myPleaseWait').modal('show');
		
		$.ajax({
			url : $("#formulir").attr('action'),
			data : $(this).serialize(),
			dataType : 'json',
			type : 'post',
			success : function(obj) {
				$('#myPleaseWait').modal('hide');
				 console.log(obj);
				if(obj.error==false){
					 	 
					 	 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_PRIMARY,
			                title: 'Informasi',
			                message: obj.message,
			                 
			            });   
						 
						
						if($("#mode").val() == "I") { 
							$('#terlapor').DataTable().ajax.reload();
							$('#saksi').DataTable().ajax.reload();
							$('#korban').DataTable().ajax.reload();
							$('#barbuk').DataTable().ajax.reload();
							
						$("#formulir")[0].reset(); }


						
						 
					}
					else {
						 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_DANGER,
			                title: 'Error',
			                message: obj.message ,
			                 
			            }); 
					}
			}
		});
		return false;
	 
	});





<?php if($mode == "U") : ?>
$.ajax({
	url : '<?php echo site_url("$controller/get_detail_json/$lap_a_id") ?>',
	dataType : 'json',
	type : 'post',
 	success : function(jsonData){
 		$("#formulir").loadJSON(jsonData);
 		$("#id_gol_kejahatan").val(jsonData.id_gol_kejahatan).attr('selected','selected');
 		$("#id_jenis_lokasi").val(jsonData.id_jenis_lokasi).attr('selected','selected');
 		$("#id_fungsi").val(jsonData.id_fungsi).attr('selected','selected');
 		$("#pelapor_id_pangkat").val(jsonData.pelapor_id_pangkat).attr('selected','selected');
 		$("#kp_id_motif_kejahatan").val(jsonData.kp_id_motif_kejahatan).attr('selected','selected');
 		$("#pen_lapor_id_pangkat").val(jsonData.pen_lapor_id_pangkat).attr('selected','selected');
 		$("#mengetahui_id_pangkat").val(jsonData.mengetahui_id_pangkat).attr('selected','selected');

 		$("#id_kelompok").val(jsonData.id_kelompok).attr('selected','selected');

 		$("#pelapor_id_kesatuan").val(jsonData.pelapor_id_kesatuan).attr('selected','selected');
 		$("#pen_lapor_id_kesatuan").val(jsonData.pen_lapor_id_kesatuan).attr('selected','selected');



 		$.ajax({
	      url:'<?php echo site_url("general/get_dropdown_gol_kejahatan"); ?>/',
	      data : {id_kelompok : jsonData.id_kelompok, 
	      		id_gol_kejahatan : jsonData.id_gol_kejahatan },
	      type : 'post',
	      success: function(data){
	        $("#id_gol_kejahatan").html('').append(data);
	      }
	    });


 		
 		 

 		$.ajax({
 			url : '<?php echo site_url("$controller/get_pasa_edit_dropdown/") ?>',
			type : 'post',
			data : {id_fungsi : jsonData.id_fungsi, id_pasal : jsonData.id_pasal  },
			success : function(pasalData) {
				$("#id_pasal").html(pasalData);
			}
 		});







 		$.ajax({
	      url:'<?php echo site_url("general/get_dropdown_kota_by_prop"); ?>/',
	      data : {id_prop : jsonData.kp_tempat_prov_id, 
	      		id_kota : jsonData.kp_tempat_kota_id },
	      type : 'post',
	      success: function(data){
	        $("#kp_tempat_id_kota").html('').append(data);
	      }
	    });


	    $.ajax({
	      url:'<?php echo site_url("general/get_dropdown_kec_by_kota"); ?>/',
	      data : { id_kota : jsonData.kp_tempat_kota_id, id_kec : jsonData.kp_tempat_kec_id },
	      type : 'post',
	      success: function(data){
	        $("#kp_tempat_id_kecamatan").html('').append(data);
	      }
	    });


	    $.ajax({
	      url:'<?php echo site_url("general/get_dropdown_desa_by_kec"); ?>/',
	      data : { id_kec : jsonData.kp_tempat_kec_id, id_desa : jsonData.kp_tempat_id_desa  },
	      type : 'post',
	      success: function(data){
	        $("#kp_tempat_id_desa").html('').append(data);
	      }
	    });
 		
 		
 		
 		
 		
	 	}
});

<?php endif; ?>






});
 





var tersangka_couter = 1;
function tersangka_row_add(){

	var row_data = $("#row_tersangka").html();
	//alert(row_data);
	
	id_row = "tr_tersangka_"+tersangka_couter;
	row_data = row_data.replace("<table>",'');
	row_data = row_data.replace("</table>",'');
	row_data = row_data.replace("someid",id_row);
	row_data = row_data.replace("someid",id_row);
	console.log(row_data);
//	alert(row_data);
	$("#table_tersangka").append(row_data);
	//$("#table_tersangka").html('<h1>asshome</h1>');
	tersangka_couter++;
}


function hapus_row_tersangka(id){
	id = "#"+id;
	$(id).remove();

	//alert(id);
}


function tambah_pasal() {
	id_fungsi = $("#id_fungsi").val();
	//alert('adfdfjdk' + id_fungsi);
	$('#pasalmodal').modal('show');

}



function pasal_simpan(){
	$('#myPleaseWait').modal('show');
		
		$.ajax({
			url : $("#form_pasal").attr('action'),
			data : $("#form_pasal").serialize(),
			dataType : 'json',
			type : 'post',
			success : function(obj) {
				$('#myPleaseWait').modal('hide');
				 console.log(obj);
				if(obj.error==false){
					 	 
					 	 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_PRIMARY,
			                title: 'Informasi',
			                message: obj.message,
			                 
			            });   
						 
						$("#pasalmodal").modal('hide'); 
						$('#pasallap').DataTable().ajax.reload();						 
						$('#form_pasal')[0].reset();
						 		
						 
					}
					else {
						 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_DANGER,
			                title: 'Error',
			                message: obj.message ,
			                 
			            }); 
					}
			}
		});
		return false;
}



 
function tersangka_add() {
	 
	$('#tersangka_modal').modal('show');

	// $("#form_tersangka").attr('action','<?php echo site_url("$controller/tmp_tersangka_simpan") ?>'); 

	$("#form_tersangka").attr('action','<?php echo $tersangka_add_url; ?>');
	

}

function tersangka_edit(id) {
	 
$('#tersangka_modal').modal('show');
$("#form_tersangka").attr('action','<?php echo site_url("$controller/tmp_tersangka_update") ?>'); 

$.ajax({
    url : '<?php echo site_url("$controller/get_lap_a_tersangka_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $('#tersangka_modal').modal('show');
       $("#modal_tersangka_judul").html('EDIT DATA TERSANGKA');
       $(".tombol").prop('value','UPDATE DATA TERSANGKA');     

       $("#form_tersangka").loadJSON(jsonData);


      
      $("#tersangka_jk").val(jsonData.tersangka_jk).attr('selected','selected');
      $("#tersangka_id_suku").val(jsonData.tersangka_id_suku).attr('selected','selected');
    
      $("#tersangka_id_agama").val(jsonData.tersangka_id_agama).attr('selected','selected');
      $("#tersangka_id_pekerjaan").val(jsonData.tersangka_id_pekerjaan).attr('selected','selected');
      $("#tersangka_residivis").val(jsonData.tersangka_residivis).attr('selected','selected');
      $("#tersangka_klasifikasi").val(jsonData.tersangka_klasifikasi).attr('selected','selected');
       $("#tersangka_id").val(jsonData.id);
      $("#tersangka_id_provinsi").val(jsonData.tersangka_prov_id).attr('selected','selected');

    
    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_kota_by_prop"); ?>/',
      data : {id_prop : jsonData.tersangka_prov_id, id_kota : jsonData.tersangka_kota_id },
      type : 'post',
      success: function(data){
        $("#tersangka_id_kota").html('').append(data);
      }
    });


    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_kec_by_kota"); ?>/',
      data : { id_kota : jsonData.tersangka_kota_id, id_kec : jsonData.tersangka_kec_id },
      type : 'post',
      success: function(data){
        $("#tersangka_id_kecamatan").html('').append(data);
      }
    });


    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_desa_by_kec"); ?>/',
      data : { id_kec : jsonData.tersangka_kec_id, id_desa : jsonData.tersangka_id_desa  },
      type : 'post',
      success: function(data){
        $("#tersangka_id_desa").html('').append(data);
      }
    });

      
    }
  });
	

}

function tersangka_simpan(){
	$('#myPleaseWait').modal('show');
		
		$.ajax({
			url : $("#form_tersangka").attr('action'),
			data : $("#form_tersangka").serialize(),
			dataType : 'json',
			type : 'post',
			success : function(obj) {
				$('#myPleaseWait').modal('hide');
				 console.log(obj);
				if(obj.error==false){
					 	 
					 	 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_PRIMARY,
			                title: 'Informasi',
			                message: obj.message,
			                 
			            });   
						 
						$("#tersangka_modal").modal('hide'); 
						$('#terlapor').DataTable().ajax.reload();						 
						$('#form_tersangka')[0].reset();
						 		
						 
					}
					else {
						 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_DANGER,
			                title: 'Error',
			                message: obj.message ,
			                 
			            }); 
					}
			}
		});
		return false;
}


function tersangka_hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA TERSANGKA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA ',
            draggable: true,
            buttons : [
              {
                label : 'IYA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$controller/tersangka_hapus") ?>',
                  	type : 'post',
                  	data : {id : id},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  		$('#terlapor').DataTable().ajax.reload();	



                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });
}


function korban_add() {
	 

	$('#korban_modal').modal('show');
	// $("#form_korban").attr('action','<?php echo site_url("$controller/tmp_korban_simpan") ?>');
	$("#form_korban").attr('action','<?php echo  $korban_add_url; ?>');


	

}

function korban_simpan(){
	$('#myPleaseWait').modal('show');
		
		$.ajax({
			url : $("#form_korban").attr('action'),
			data : $("#form_korban").serialize(),
			dataType : 'json',
			type : 'post',
			success : function(obj) {
				$('#myPleaseWait').modal('hide');
				 console.log(obj);
				if(obj.error==false){
					 	 
					 	 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_PRIMARY,
			                title: 'Informasi',
			                message: obj.message,
			                 
			            });   
						 
						$("#korban_modal").modal('hide'); 
						$('#korban').DataTable().ajax.reload();						 
						$('#form_korban')[0].reset();
						 		
						 
					}
					else {
						 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_DANGER,
			                title: 'Error',
			                message: obj.message ,
			                 
			            }); 
					}
			}
		});
		return false;
}


function korban_edit(id){


	$('#korban_modal').modal('show');
	$("#form_korban").attr('action','<?php echo site_url("$controller/tmp_korban_update") ?>'); 


	$.ajax({
    url : '<?php echo site_url("$controller/get_lap_a_korban_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#modal_korban").modal('show');
       $("#modal_korban_judul").html('EDIT DATA KORBAN');
       $(".tombol").prop('value','UPDATE DATA KORBAN');
       $("#form_korban").loadJSON(jsonData);
       $("#korban_jk").val(jsonData.korban_jk).attr('selected','selected');
      $("#korban_id_suku").val(jsonData.korban_id_suku).attr('selected','selected');
     
      $("#korban_id_agama").val(jsonData.korban_id_agama).attr('selected','selected');
      $("#korban_id_pekerjaan").val(jsonData.korban_id_pekerjaan).attr('selected','selected');
    
      $("#korban_id").val(jsonData.id);
      $("#korban_id_provinsi").val(jsonData.korban_prov_id).attr('selected','selected');
		$("#korban_residivis").val(jsonData.korban_residivis).attr('selected','selected');
		$("#korban_klasifikasi").val(jsonData.korban_klasifikasi).attr('selected','selected');

      


    
    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_kota_by_prop"); ?>/',
      data : {id_prop : jsonData.korban_prov_id, id_kota : jsonData.korban_kota_id },
      type : 'post',
      success: function(data){
        $("#korban_id_kota").html('').append(data);
      }
    });


    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_kec_by_kota"); ?>/',
      data : { id_kota : jsonData.korban_kota_id, id_kec : jsonData.korban_kec_id },
      type : 'post',
      success: function(data){
        $("#korban_id_kecamatan").html('').append(data);
      }
    });


    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_desa_by_kec"); ?>/',
      data : { id_kec : jsonData.korban_kec_id, id_desa : jsonData.korban_id_desa  },
      type : 'post',
      success: function(data){
        $("#korban_id_desa").html('').append(data);
      }
    });

      
    }
  });
}




function korban_hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA KORBAN. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA ',
            draggable: true,
            buttons : [
              {
                label : 'IYA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$controller/korban_hapus") ?>',
                  	type : 'post',
                  	data : {id : id},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  		$('#korban').DataTable().ajax.reload();	



                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });
}






// #SAKSI SECTION 


function saksi_add() {
	 

	$('#saksi_modal').modal('show');
	// $("#form_saksi").attr('action','<?php echo site_url("$controller/tmp_saksi_simpan") ?>');
	$("#form_saksi").attr('action','<?php echo $saksi_add_url; ?>');


}

function saksi_simpan(){
	$('#myPleaseWait').modal('show');
		
		$.ajax({
			url : $("#form_saksi").attr('action'),
			data : $("#form_saksi").serialize(),
			dataType : 'json',
			type : 'post',
			success : function(obj) {
				$('#myPleaseWait').modal('hide');
				 console.log(obj);
				if(obj.error==false){
					 	 
					 	 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_PRIMARY,
			                title: 'Informasi',
			                message: obj.message,
			                 
			            });   
						 
						$("#saksi_modal").modal('hide'); 
						$('#saksi').DataTable().ajax.reload();						 
						$('#form_saksi')[0].reset();
						 		
						 
					}
					else {
						 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_DANGER,
			                title: 'Error',
			                message: obj.message ,
			                 
			            }); 
					}
			}
		});
		return false;
}


function saksi_edit(id){


	$('#saksi_modal').modal('show');
	$("#form_saksi").attr('action','<?php echo site_url("$controller/tmp_saksi_update") ?>'); 


	$.ajax({
    url : '<?php echo site_url("$controller/get_lap_a_saksi_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#modal_saksi").modal('show');
       $("#modal_saksi_judul").html('EDIT DATA saksi');
       $(".tombol").prop('value','UPDATE DATA saksi');
    
      $("#form_saksi").loadJSON(jsonData);
      $("#saksi_jk").val(jsonData.saksi_jk).attr('selected','selected');
      $("#saksi_id_suku").val(jsonData.saksi_id_suku).attr('selected','selected');
    
      $("#saksi_id_agama").val(jsonData.saksi_id_agama).attr('selected','selected');
      $("#saksi_id_pekerjaan").val(jsonData.saksi_id_pekerjaan).attr('selected','selected');
      
      $("#saksi_id").val(jsonData.id);
      $("#saksi_id_provinsi").val(jsonData.saksi_prov_id).attr('selected','selected');
      $("#saksi_residivis").val(jsonData.saksi_residivis).attr('selected','selected');
      $("#saksi_klasifikasi").val(jsonData.saksi_klasifikasi).attr('selected','selected');

      


    
    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_kota_by_prop"); ?>/',
      data : {id_prop : jsonData.saksi_prov_id, id_kota : jsonData.saksi_kota_id },
      type : 'post',
      success: function(data){
        $("#saksi_id_kota").html('').append(data);
      }
    });


    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_kec_by_kota"); ?>/',
      data : { id_kota : jsonData.saksi_kota_id, id_kec : jsonData.saksi_kec_id },
      type : 'post',
      success: function(data){
        $("#saksi_id_kecamatan").html('').append(data);
      }
    });


    $.ajax({
      url:'<?php echo site_url("general/get_dropdown_desa_by_kec"); ?>/',
      data : { id_kec : jsonData.saksi_kec_id, id_desa : jsonData.saksi_id_desa  },
      type : 'post',
      success: function(data){
        $("#saksi_id_desa").html('').append(data);
      }
    });

      
    }
  });
}




function saksi_hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA KORBAN. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA ',
            draggable: true,
            buttons : [
              {
                label : 'IYA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$controller/saksi_hapus") ?>',
                  	type : 'post',
                  	data : {id : id},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  		$('#saksi').DataTable().ajax.reload();	



                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });
}

// #BARBUK SECTION 


function barbuk_add() {
	 

	$('#barbuk_modal').modal('show');
	// $("#form_barbuk").attr('action','<?php echo site_url("$controller/tmp_barbuk_simpan") ?>');
	$("#form_barbuk").attr('action','<?php echo $barbuk_add_url ?>');



}


function pasal_add() {
	 

	$('#pasalmodal').modal('show'); 
	$("#form_pasal").attr('action','<?php echo $pasal_add_url ?>');
	$("#exampleModalLabel").html('TAMBAH PASAL');



}

function barbuk_simpan(){
	$('#myPleaseWait').modal('show');
		
		$.ajax({
			url : $("#form_barbuk").attr('action'),
			data : $("#form_barbuk").serialize(),
			dataType : 'json',
			type : 'post',
			success : function(obj) {
				$('#myPleaseWait').modal('hide');
				 console.log(obj);
				if(obj.error==false){
					 	 
					 	 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_PRIMARY,
			                title: 'Informasi',
			                message: obj.message,
			                 
			            });   
						 
						$("#barbuk_modal").modal('hide'); 
						$('#barbuk').DataTable().ajax.reload();						 
						$('#form_barbuk')[0].reset();
						 		
						 
					}
					else {
						 BootstrapDialog.alert({
			                type: BootstrapDialog.TYPE_DANGER,
			                title: 'Error',
			                message: obj.message ,
			                 
			            }); 
					}
			}
		});
		return false;
}


function barbuk_edit(id){


	$('#barbuk_modal').modal('show');
	$("#form_barbuk").attr('action','<?php echo site_url("$controller/tmp_barbuk_update") ?>'); 


	$.ajax({
    url : '<?php echo site_url("$controller/get_lap_a_barbuk_detail/"); ?>/'+id,
    dataType : 'json',
    success : function(jsonData) {
    $("#modal_barbuk").modal('show');
       $("#modal_barbuk_judul").html('EDIT DATA BARANG BUKTI');
       $(".tombol").prop('value','UPDATE DATA BARANG BUKTI');
       
      $("#barbuk_nama").val(jsonData.barbuk_nama);
      $("#barbuk_satuan").val(jsonData.barbuk_satuan);
      $("#barbuk_jumlah").val(jsonData.barbuk_jumlah);
      $("#barbuk_id").val(jsonData.id);
      

      

      
    }
  });
}




function barbuk_hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA BARANG BUKTI. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA ',
            draggable: true,
            buttons : [
              {
                label : 'IYA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$controller/barbuk_hapus") ?>',
                  	type : 'post',
                  	data : {id : id},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  		$('#barbuk').DataTable().ajax.reload();	



                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });
}


function barbuk_baru_simpan(){
	$.ajax({
		url : '<?php echo site_url("$this->controller/barbuk_baru_simpan") ?>',
		data : { barang_bukti : $("#barbuk_baru").val() },
		type : 'post',
		success : function(obj) {
			$("#barbuk_nama").html('').append(obj);
			$("#tr_barbuk_baru").hide();
			$("#barbuk_baru").val('');
		}

	});

}

function show_barbuk_baru(){
	$("#tr_barbuk_baru").show();
}

function barbuk_baru_batal(){
	$("#tr_barbuk_baru").hide();
}




function satuan_baru_simpan(){
	$.ajax({
		url : '<?php echo site_url("$this->controller/satuan_baru_simpan") ?>',
		data : { satuan : $("#satuan_baru").val() },
		type : 'post',
		success : function(obj) {
			$("#barbuk_satuan").html('').append(obj);
			$("#tr_satuan_baru").hide();
			$("#satuan_baru").val('');
		}

	});

}

function show_satuan_baru(){
	$("#tr_satuan_baru").show();
}

function satuan_baru_batal(){
	$("#tr_satuan_baru").hide();
}





function pasal_hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PASAL. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA ',
            draggable: true,
            buttons : [
              {
                label : 'IYA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$controller/pasal_hapus") ?>',
                  	type : 'post',
                  	data : {id : id},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  		 

						$('#pasallap').DataTable().ajax.reload();						 
						 



                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });
}


</script>