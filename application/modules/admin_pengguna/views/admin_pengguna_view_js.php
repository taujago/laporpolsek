<?php 
$userdata = $this->session->userdata("userdata");
?>
<script>
var daft_id = false;



$(document).ready(function(){

  $("#tr_polsek").hide();
  $("#tr_polres").hide();
  $("#tr_satuan").hide();

  


  $("#jenis").change(function(){

  	if(   $("#jenis").val() == "polda"   || $("#jenis").val() == "x"   ){
  		$("#tr_polsek").hide();
  		$("#tr_polres").hide();
  		$("#tr_satuan").show();
  	}
  	else if($("#jenis").val() == "polres") {
  		$("#tr_polres").show();
  		$("#tr_polsek").hide();
  		$("#tr_satuan").hide();
  	}
  	else {
  		$("#tr_polres").show();
  		$("#tr_polsek").show();
  		$("#tr_satuan").hide();
  	}

  });



		 var dt = $("#datagrid").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": true } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$controller/get_data") ?>'
		 	});

		 
		 $("#datagrid_filter").css("display","none");  
			$("#btn_cari").click(function(){


				 

			 
				 
				 var nama = $("#txt_cari").val();
				 
			
				 

				 dt.columns(1).search(nama)
				 .columns(2).search($("#txt_level").val())			 
				 .draw();

				});
			$("#btn_reset").click(function(){
				$("#txt_cari").val('');
				$("#txt_level").val('x').attr('selected','selected');
				$("#btn_cari").click();
			});
	
});

function hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PENGGUNA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA PENGGUNA',
            draggable: true,
            buttons : [
              {
                label : 'YA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$controller/hapus") ?>',
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

                  		$('#datagrid').DataTable().ajax.reload();		
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
 		 
	  

function cari(){
	var dtx = $("#leasing").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": true } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$controller/get_data") ?>'
		 	});

	 dtx.columns(1).search($("txt_cari").val()).draw();
				 // .column(4).search(tanggal_awal)
				 // .column(6).search(tanggal_akhir)
				 // .column(7).search(status)
				 


}

function baru(){
	$("#pengguna_modal").modal("show");
	$("#formulir").attr('action','<?php echo site_url("$controller/simpan") ?>');
	$("#titleModal").html('TAMBAH DATA PENGGUNA');
}

function edit(id){

$("#pengguna_modal").modal("show");
$("#formulir").attr('action','<?php echo site_url("$controller/update") ?>');	
$("#titleModal").html('EDIT DATA PENGGUNA');

	$.ajax({
		url : '<?php echo site_url("$controller/get_json_detail") ?>/'+id, 
		dataType : 'json',
		success : function(obj) {
			$("#id").val(obj.id);
			$("#user_id").val(obj.user_id);
			$("#nama").val(obj.nama);
			$("#user_pass").val('');
			$("#user_pass2").val('');
			$("#nomor_hp").val(obj.nomor_hp);
			$("#email").val(obj.email);
			$("#id_pangkat").val(obj.id_pangkat).attr('selected','selected');
			$("#level").val(obj.level).attr('selected','selected');
			$("#jenis").val(obj.jenis).attr('selected','selected');



			if(   obj.jenis == "polda" ){
			  		$("#tr_polsek").hide();
			  		$("#tr_polres").hide();
			  	}
			  	else if(obj.jenis== "polres") {
			  		$("#tr_polres").show();
			  		$("#tr_polsek").hide();
			  		$("#id_polres").val(obj.id_polres).attr('selected','selected');
			  	}
			  	else {
			  		$("#tr_polres").show();
			  		$("#tr_polsek").show();
			  		// alert('polsek');
			  		 $.ajax({
					      url:'<?php echo site_url("general/get_data_polres_edit"); ?>/',
					      data : {id_polres : obj.id_polres, 
					      		  id_polsek : obj.id_polsek },
					      type : 'post',
					      success: function(data){
					        $("#id_polsek").html('').append(data);
					      }
					    });


			  	}
			 

			 



			


		}

	});
}


function pengguna_simpan(){
	$('#myPleaseWait').modal('show');
	$.ajax({
		url : $("#formulir").prop('action'),
		data : $("#formulir").serialize(), 
		method : 'post',
		dataType : 'json',
		success : function(obj) {
			$('#myPleaseWait').modal('hide');

			if(obj.error==false){
					 	 
			 	 BootstrapDialog.alert({
	                type: BootstrapDialog.TYPE_PRIMARY,
	                title: 'Informasi',
	                message: obj.message,
	                 
	            });   
				 
				$("#pengguna_modal").modal('hide'); 
				$('#datagrid').DataTable().ajax.reload();	
				if($obj.mode == "I") {
					$("#formulir")[0].reset();
				}		
				 
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

}



</script>