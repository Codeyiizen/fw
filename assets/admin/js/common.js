$("body").on("change", ".userStatusChange", function (){  
	var id = $(this).attr('data-id');  
	var status = $(this).attr('data-status');
	if(status == 0){
		status = 1;
	}else{
		status = 0;	
	}  
	$.ajax({
		url: BASE_URL + "/admin/user/status/change",
		type: "post",
		data: {id:id,
			status:status
		},
		success: function (data){
		  	window.location.reload();
		}
  });
})