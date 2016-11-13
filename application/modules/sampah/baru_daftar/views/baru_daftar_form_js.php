<script>
 



	$(document).ready(function(){



		$("#fuckyouform").submit(function(){
		 


			
			$.ajax({
				url : '<?php echo site_url("$controller/get_atpm"); ?>',
				dataType:'json',
				beforeSend : function(){
					 
					// $("#benar").show();
					// $("#message2").html('Sedang diproses. Harap menunggu...');

					$('#myPleaseWait').modal('show');
				},
				// complete : function(){
				// 	$("#benar").hide();
				// },
				type : 'post',
				data : $(this).serialize(),
				success : function(obj) {
					$('#myPleaseWait').modal('hide');
					 if(obj.error==true){

							$("#benar").hide('slow');
						 	$("#salah").show('slow');
							$("#message").html(obj.message);
 
					 }
					 else {
							 
						 	$("#salah").hide('slow');
						 	$("#benar").show();
							$("#message2").html(obj.message);
							$("#vNO_RANGKA").val(obj.data.no_rangka);
							$("#vNO_MESIN").val(obj.data.no_mesin);
							 	 
						}
				}
			});
			
			return false;
		});









		
		$("#vDAFT_DATE").datepicker().on('changeDate', function(ev){                 
   			 $('#vDAFT_DATE').datepicker('hide');
		});

		// $(".tanggal").datepicker().on('changeDate', function(ev){                 
  //  			 $('.tanggal').datepicker('hide');
		// });
 		
		
	$("#saa").click(function(){

		if($(this).is(':checked')  == true ) {
			
			$("#pemilik_nama").val($("#nama_pengajuan_leasing").val());
			$("#pemilik_alamat").val($("#alamat_pengajuan_leasing").val());
			$("#pemilik_ktp").val($("#customer_ktp").val());
			$("#pemilik_kelurahan").val($("#customer_kelurahan").val());
			$("#pemilik_kecamatan").val($("#customer_kecamatan").val());
			$("#pemilik_kab").val($("#customer_kab").val());
			$("#pemilik_kota").val($("#customer_kota").val());
			$("#pemilik_prov").val($("#customer_prov").val());

		}
		else {
			//alert('none..');
			$("#pemilik_nama").val('');
			$("#pemilik_alamat").val('');
			$("#pemilik_ktp").val('');
			$("#pemilik_kelurahan").val('');
			$("#pemilik_kecamatan").val('');
			$("#pemilik_kab").val('');
			$("#pemilik_kota").val('');
			$("#pemilik_prov").val('');
		}

	});	 
		 
		
		 
		
		
		/// form daftar 
		
		$("#frm_daftar").submit(function(){

			$('#myPleaseWait').modal('show');
			 
			//var post_data = $(this).serialize();
			//post_data.push({vIS_CARI : $("#vISCari").val()});
			$.ajax({
				
				//als.push({name: 'nameOfTextarea', value: CKEDITOR.instances.ta1.getData()});
				url : '<?php echo site_url("$controller/simpan"); ?>',
				dataType:'json',
				type : 'post',
				beforeSend : function(){
					 
					// $("#benar").show();
					// $("#message2").html('Sedang diproses. Harap menunggu...');

					
				},
				data : $(this).serialize(),
				success : function(obj) {

					$('#myPleaseWait').modal('hide');

					if(obj.error == false){
						$("html, body").animate({ scrollTop: 0 }, "slow");
						$("#message2").html(obj.message);
						$("#salah").hide();
						$("#benar").show();			
						 
						$("#frm_daftar")[0].reset();				 

						
					}
					else {
						$("html, body").animate({ scrollTop: 0 }, "slow");
						$("#message").html(obj.message);
						$("#salah").show();
						$("#benar").hide();
						
						
					}
				}
			});
			
			return false;
		});
	
	
	

		
		
	});
	 
</script>