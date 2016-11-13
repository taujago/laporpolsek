<script>


$(document).ready(function(){
	$("#formulir").submit(function(){

		$('#myPleaseWait').modal('show');
		
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

});
 



 
 

</script>