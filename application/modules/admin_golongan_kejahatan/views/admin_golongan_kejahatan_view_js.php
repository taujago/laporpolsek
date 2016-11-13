<?php 
$userdata = $this->session->userdata("userdata");
?>
<script>
var daft_id = false;



$(document).ready(function(){

  



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
				 .columns(2).search($("#txt_id_kelompok").val())			 
				 .draw();

				});
			$("#btn_reset").click(function(){
				$("#txt_cari").val('');
				$("#txt_id_kelompok").val('').attr('selected','selected');
				$("#btn_cari").click();
			});
	
});

function hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA POLSEK. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA POLSEK',
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
 		 
	  


function baru(){
	$("#pengguna_modal").modal("show");
	$("#formulir").attr('action','<?php echo site_url("$controller/simpan") ?>');
	$("#titleModal").html('TAMBAH DATA GOLONGAN KEJAHATAN');
}

function edit(id){

$("#pengguna_modal").modal("show");
$("#formulir").attr('action','<?php echo site_url("$controller/update") ?>');	
$("#titleModal").html('EDIT DATA GOLONGAN KEJAHATAN');

	$.ajax({
		url : '<?php echo site_url("$controller/get_json_detail") ?>/'+id, 
		dataType : 'json',
		success : function(obj) {
			$("#id_kelompok").val(obj.id_kelompok).attr('selected','selected');
			$("#golongan_kejahatan").val(obj.golongan_kejahatan);
			$("#id").val(obj.id);
			 
			 


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