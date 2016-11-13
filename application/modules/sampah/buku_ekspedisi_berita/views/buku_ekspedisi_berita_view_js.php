<?php 
$userdata = $this->session->userdata("userdata");
?>
<script>
// var daft_id = false;



$(document).ready(function(){

  

	$(".tanggal").datepicker()
		.on('changeDate', function(ev){                 
		    $(this).datepicker('hide');
		});
	



		 var dt = $("#leasing").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": true } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$controller/get_data") ?>'
		 	});

		 
		 $("#leasing_filter").css("display","none");  
			$("#btn_cari").click(function(){


				 

			 
				 
				 var tgl_awal = $("#tgl_awal").val();
				 var tgl_akhir = $("#tgl_akhir").val();
				 var sifat = $("#sifat").val();
				 
			
				 

				 dt.columns(1).search(tgl_awal).columns(2).search(tgl_akhir)
				 .columns(3).search(sifat)						 
				 .draw();

				});
			$("#btn_reset").click(function(){
				$("#tgl_awal").val('');
				$("#tgl_akhir").val('');
				$("#sifat").val('').attr('selected','selected');
				$("#btn_cari").click();
			});
	
});

function hapus(id){

BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA BUKU EKSPEDISI BERITA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA BUKU EKSPEDISI BERITA',
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



function cetak(){
	$("#exampleModal").modal('show');
}


function cetak_go(){
	$("#exampleModal").modal('hide');
	var tahun = $("#tahun").val();
	var bulan = $("#bulan").val();
	var sifat =  $("#sifat_cetak").val();
	window.open('<?php echo site_url("$controller/cetak_agenda") ?>'+'/'+tahun+'/'+bulan+'/'+sifat);}

</script>