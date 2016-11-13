<script>


$(document).ready(function(){








$(".tanggal").datepicker()
		.on('changeDate', function(ev){                 
		    $(this).datepicker('hide');
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
	url : '<?php echo site_url("$controller/get_detail_json/$lap_c_id") ?>',
	dataType : 'json',
	type : 'post',
 	success : function(jsonData){
 		$("#formulir").loadJSON(jsonData);
 

 		$("#pelapor_jk").val(jsonData.pelapor_jk).attr('selected','selected');

 		$("#pelapor_id_pekerjaan").val(jsonData.pelapor_id_pekerjaan).attr('selected','selected');

 		$("#pelapor_id_provinsi").val(jsonData.pelapor_prov_id).attr('selected','selected');



 		$.ajax({
	      url:'<?php echo site_url("general/get_dropdown_kota_by_prop"); ?>/',
	      data : {id_prop : jsonData.pelapor_prov_id, id_kota : jsonData.pelapor_kota_id },
	      type : 'post',
	      success: function(data){
	        $("#pelapor_id_kota").html('').append(data);
	      }
	    });


	    $.ajax({
	      url:'<?php echo site_url("general/get_dropdown_kec_by_kota"); ?>/',
	      data : { id_kota : jsonData.pelapor_kota_id, id_kec : jsonData.pelapor_kec_id },
	      type : 'post',
	      success: function(data){
	        $("#pelapor_id_kecamatan").html('').append(data);
	      }
	    });


	    $.ajax({
	      url:'<?php echo site_url("general/get_dropdown_desa_by_kec"); ?>/',
	      data : { id_kec : jsonData.pelapor_kec_id, id_desa : jsonData.pelapor_id_desa  },
	      type : 'post',
	      success: function(data){
	        $("#pelapor_id_desa").html('').append(data);
	      }
	    });





	    $("#pelapor_id_agama").val(jsonData.pelapor_id_agama).attr('selected','selected');
	    $("#pelapor_id_pendidikan").val(jsonData.pelapor_id_pendidikan).attr('selected','selected');
	    $("#pelapor_id_warga_negara").val(jsonData.pelapor_id_warga_negara).attr('selected','selected');
 

	    


 		$("#pen_lapor_id_pangkat").val(jsonData.pen_lapor_id_pangkat).attr('selected','selected');
 		 

 		
 		// dropdonwn pasal 

 		$.ajax({
 			url : '<?php echo site_url("$controller/get_pasa_edit_dropdown/") ?>',
			type : 'post',
			data : {id_fungsi : jsonData.id_fungsi, id_pasal : jsonData.id_pasal  },
			success : function(pasalData) {
				$("#id_pasal").html(pasalData);
			}
 		});
 		
 		
 		
 		
 		
	 	}
});

<?php endif; ?>






});
 



 
 

</script>