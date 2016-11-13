<script type="text/javascript">

$(document).ready(function(){

  $(".tanggal").datepicker()
		.on('changeDate', function(ev){                 
		    $(this).datepicker('hide');
		});



		 var dt_terlapor = $("#terlapor").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo site_url("$controller/get_lap_a_terlapor/$lap_a_id") ?>'
		 	});



		 /// saksi section 
			var dt_saksi = $("#saksi").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo site_url("$controller/get_lap_a_saksi/$lap_a_id") ?>'
		 	});

		 	
		 	var dt_korban = $("#korban").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo site_url("$controller/get_lap_a_korban/$lap_a_id") ?>'
		 	});

		 	var dt_korban = $("#barbuk").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "bLengthChange": false,
		        "bInfo": false,
		        "ajax": '<?php echo site_url("$controller/get_lap_a_barbuk/$lap_a_id") ?>'
		 	});




		//  $("#add_tersangka").click(function(){  // tambah baru 
		//  	// alert('hello');

		//    $("#modal_tersangka").modal('show');
		//    $("#modal_tersangka_judul").html('TAMBAH DATA TERSANGKA');
		//    $(".tombol").prop('value','SIMPAN DATA TERSANGKA');
		//    $("#form_tersangka").prop('action','<?php echo site_url("$controller/tersangka_simpan/$lap_a_id") ?>')
		//  });

		
		// $("#add_saksi").click(function(){  // tambah baru 


		//    $("#modal_saksi").modal('show');
		//    // $("#modal_saksi_judul").html('TAMBAH DATA SAKSI');
		//    // $(".tombol").prop('value','SIMPAN DATA SAKSI');
		//    // $("#form_saksi").prop('action','<?php echo site_url("$controller/saksi_simpan/$lap_a_id") ?>');
		//  });


		// $("#form_tersangka").submit

	$("#form_tersangka").submit(function(){  // formulir tersangka handler 




		$('#myPleaseWait').modal('show');
		
		$.ajax({
			url : $("#form_tersangka").attr('action'),
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
						 
						$("#modal_tersangka").modal('hide'); 
						$('#terlapor').DataTable().ajax.reload();			
						 
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






});





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
 		






function saksi_hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA SAKSI. ANDA YAKIN  ?  ',
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
</script>