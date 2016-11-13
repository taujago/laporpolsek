<script>
var daft_id = false;



$(document).ready(function(){

  
 


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
				 var id_fungsi = $("#id_fungsi").val();
			 

				 dt.column(1).search(tanggal_awal)
				 .column(2).search(tanggal_akhir)
				 .column(3).search(id_fungsi)
				 .draw();

				 return false;

				});


	
});




</script>