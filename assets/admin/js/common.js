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

$("body").on("change", ".updateStatus", function () {
    var id = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    status = status == 0 ? 1 : 0;
    $.ajax({
        url: BASE_URL + "/admin/blog/status/update",
        type: "post",
        data: { id: id, status: status },
        success: function (response) {
            Swal.fire({
               // title: "Good job!",
                text: "Status has been change successfully!",
                icon: "success"
            }).then(() => {
                window.location.reload();
            });
        },
        error: function () {
            Swal.fire({
                title: 'Error!',
                text: 'There was an error updating the status.',
                icon: 'error'
            });
        }
    });
});



$("body").on("change", ".updateCatStatus", function () {  
    var id = $(this).attr('data-id'); 
    var status = $(this).attr('data-status'); 
    status = status == 0 ? 1 : 0;
    $.ajax({
        url: BASE_URL + "/admin/blog/category/status/update",
        type: "post",
        data: { id: id, status: status },
        success: function (data) {
            Swal.fire({
              //  title: "Good job!",
                text: "Status has been change successfully!",
                icon: "success"
            }).then(() => {
                window.location.reload();
            });
        },
        error: function () {
            Swal.fire({
                title: 'Error!',
                text: 'There was an error updating the category status.',
                icon: 'error'
            });
        }
    });
});




