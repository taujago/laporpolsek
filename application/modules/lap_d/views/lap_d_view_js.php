<?php 
$userdata = $this->session->userdata("userdata");
?>
<script>
var daft_id = false;



$(document).ready(function(){

  


$(".tanggal").datepicker()
		.on('changeDate', function(ev){                 
		    $(this).datepicker('hide');
		});



		 var dt = $("#leasing").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$controller/get_data") ?>'
		 	});

		 
		 $("#leasing_filter").css("display","none");  
		 
			$("#cari_button").click(function(){

				


				 

			 
				 var tanggal_awal = $("#tanggal_awal").val();
				 var tanggal_akhir = $("#tanggal_akhir").val();
				 // var id_fungsi = $("#id_fungsi").val();
			 

				 dt.column(1).search(tanggal_awal)
				 .column(2).search(tanggal_akhir)
				 // .column(3).search(id_fungsi)
				 .draw();

				 return false;

				});


	
});

function hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PANGKAT. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA PANGKAT',
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

                  		$('#leasing').DataTable().ajax.reload();		
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
 		 
	  

function reset_cari(){

$("#tanggal_awal").val('');
$("#tanggal_akhir").val('');
$("#id_fungsi").val(0).attr('selected','selected');
$("#cari_button").click();
return false;

}

</script>