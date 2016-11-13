<script type="text/javascript">
$(document).ready(function(){

   

		 var dt = $("#grid_penyidik").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": true } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$controller/get_data_penyidik/$lap_d_id") ?>'
		 	});

		 
		// $("#grid_penyidik").css("display","none");  
		 
		 

				


				 
 


	
});




function penyidik_baru() {
   
  $("#peyidik_modal").modal("show");
  $("#formulir_penyidik").attr('action','<?php echo site_url("$controller/penyidik_simpan/$lap_d_id") ?>');
  $("#titleModal").html('TAMBAH DATA PENYIDIK');
}


function penyidik_simpan(){
  $('#myPleaseWait').modal('show');
  $.ajax({
    url : $("#formulir_penyidik").prop('action'),
    data : $("#formulir_penyidik").serialize(), 
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
         
        $("#peyidik_modal").modal('hide'); 
        $('#grid_penyidik').DataTable().ajax.reload(); 
       
         
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


function penyidik_hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PENYIDIK. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA PENYIDIK',
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
                  	url : '<?php echo site_url("$controller/penyidik_hapus") ?>',
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

                  		$('#grid_penyidik').DataTable().ajax.reload(); 
                      
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