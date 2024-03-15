(function ($) {

	"use strict";

	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if ($('.loader-wrap').length) {
			$('.loader-wrap').delay(1000).fadeOut(500);
		}
	}

	if ($(".preloader-close").length) {
		$(".preloader-close").on("click", function () {
			$('.loader-wrap').delay(200).fadeOut(500);
		})
	}

	//Update Header Style and Scroll to Top
	function headerStyle() {
		/*if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-top');
			if (windowpos >= 110) {
				siteHeader.addClass('fixed-header');
				scrollLink.addClass('open');
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.removeClass('open');
			}
		}*/
	}

	headerStyle();

	//Contact Form Validation

	$("#signup").click(function () {
		$("#first").fadeOut("fast", function () {
			$("#second").fadeIn("fast");
		});
	});

	$("#signin").click(function () {
		$("#second").fadeOut("fast", function () {
			$("#first").fadeIn("fast");
		});
	});


	$(function () {
		$("form[name='login']").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
				}
			},
			messages: {
				email: "Please enter a valid email address",
				password: {
					required: "Please enter password",
				}
			},
			submitHandler: function (form) {
				form.submit();
			}
		});
	});

	$(function () {
		$("form[name='registration']").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 5
				}
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				email: "Please enter a valid email address"
			},
			submitHandler: function (form) {
				form.submit();
			}
		});
	});
	//Fact Counter + Text Count
	$('.fs-toggle-menu').click(function () {
		$(this).toggleClass('active');
		$('#fs-menu').toggleClass('open');
	});
	$("body").on("click", ".sendFriendRequest", function () {
		var tokenObj = $(this).data('token');
		var params = { "token": tokenObj };
		$.ajax({
			url: BASE_URL + "/user/friends/request",
			type: "post",
			data: JSON.stringify(params),
			contentType: "application/json; charset=utf-8",
			success: function (response) {    
				var res = JSON.parse(response); 
				if (res?.code == 200) {
				  $('#success_message').html(res.success);
				  setTimeout(function () {
					window.location.reload(1);
				}, 1000); 

				}
			}
		});
	})
	$("body").on("click", ".acceptFriendRequest", function () {
		var tokenObj = $(this).data('token');
		var params = { "token": tokenObj };
		$.ajax({
			url: BASE_URL + "/user/friends/accept",
			type: "post",
			data: JSON.stringify(params),
			contentType: "application/json; charset=utf-8",
			success: function (response) {
				var res = JSON.parse(response);
				if (res?.code == 200) {
					window.location.reload();
				}
			}
		});
	})
	$("body").on("click", ".removeFriend", function () {
		var tokenObj = $(this).data('token');
		var params = { "token": tokenObj,type:'remove' };
		$.ajax({
			url: BASE_URL + "/user/friends/remove",
			type: "post",
			data: JSON.stringify(params),
			contentType: "application/json; charset=utf-8",
			success: function (response) {
				var res = JSON.parse(response);
				if (res?.code == 200) {
					$('#success_message').html(res.unfriend);
					setTimeout(function () {
					  window.location.reload(1);
				  }, 1000); 
				}
			}
		});
	})
	$("body").on("click", ".declineFriend", function () {
		var tokenObj = $(this).data('token');
		var params = { "token": tokenObj,type:'decline' };
		$.ajax({
			url: BASE_URL + "/user/friends/remove",
			type: "post",
			data: JSON.stringify(params),
			contentType: "application/json; charset=utf-8",
			success: function (response) {
				var res = JSON.parse(response);
				if (res?.code == 200) {
					window.location.reload();
				}
			}
		});
	})
	$("body").on("click", ".cancelFriend", function () {
		var tokenObj = $(this).data('token');
		var params = { "token": tokenObj,type:'cancel' };
		$.ajax({
			url: BASE_URL + "/user/friends/remove",
			type: "post",
			data: JSON.stringify(params),
			contentType: "application/json; charset=utf-8",
			success: function (response) {
				var res = JSON.parse(response);
				if (res?.code == 200) {
					window.location.reload();
				}
			}
		});
	})
	$("body").on("change",".select-category",function(){
		var params = { "id": $(this).val()}; 
		$.ajax({
			url: BASE_URL + "/getSubCat",
			type: "post",
			data: JSON.stringify(params),
			contentType: "application/json; charset=utf-8",
			success: function (response) {
				var res = JSON.parse(response);
				if (res?.code == 200) {
					console.log(res);
					$(".select-type").html(res?.html);
					//window.location.reload();
				}
			}
		});
	});
	$("body").on("change",".filter_by_cat",function(){
		if($(this).val()!==""){
			window.location.replace(BASE_URL+'/user-dashboard?cat='+$(this).val())
		} else {
			window.location.replace(BASE_URL+'/user-dashboard')
		}
		
	})
	$("body").on("change",".filter_by_cat_registry",function(){
		if($(this).val()!==""){
			window.location.replace(BASE_URL+'/user/registry?cat='+$(this).val())
		} else {
			window.location.replace(BASE_URL+'/user/registry')
		}
		
	})
	$("body").on("change",".filter_by_cat_wish",function(){ 
		var dataId = $(this).attr('data-id');
		if($(this).val()!==""){
			window.location.replace(BASE_URL+'/user/friends/detail/'+dataId+'/wish/?cat='+$(this).val())
		} else {
			window.location.replace(BASE_URL+'/user/friends/detail'+dataId+'/wish')
		}
		
	})
   
	$("body").on("change",".filter_by_cat_registry_list",function(){ 
		var dataId = $(this).attr('data-id'); 
		if($(this).val()!==""){
			window.location.replace(BASE_URL+'/user/friends/detail/'+dataId+'/registry/?cat='+$(this).val())
		} else {
			window.location.replace(BASE_URL+'/user/friends/detail'+dataId+'/registry')
		}
		
	})
	
	$("body").on("change",".select-family",function(){
		var famliyId = $(this).val();
		if(famliyId!=''){
			var toUserId = $(this).attr('to-user-id');
			var params = { "id": famliyId,to_user_id:toUserId}; 
			//console.log(params);return false;
			$.ajax({
				url: BASE_URL + "/user/family/request",
				type: "post",
				data: JSON.stringify(params),
				contentType: "application/json; charset=utf-8",
				success: function (response) {
					var res = JSON.parse(response);
					console.log(res);
					if (res?.code == 200) {
						//window.location.reload();
						$('#success_message').html(res?.success);
					}else{
						$('#error_message').html(res?.error);
					}
					setTimeout(function () {
						 $('#success_message').html('');
						 $('#error_message').html('');
					 }, 1000); 
				}
			});
		}
		
	});
	$("body").on("click",".remove_account",function(){
		var varThis = $(this);
		varThis.html('Loading...');
		var user_id = $(this).attr('data-user-id');
		if(user_id=='account'){
			var params = { "user_id": user_id}; 
			$.ajax({
				url: BASE_URL + "/user/account/remove",
				type: "post",
				data: JSON.stringify(params),
				contentType: "application/json; charset=utf-8",
				success: function (response) {
					var res = JSON.parse(response);
					console.log(res);
					if (res?.code == 200) {
						varThis.html('');
			            varThis.html('Yes');
						$('#success_message').html(res?.success);
						setTimeout(function () {
						 $('#success_message').html('');
						 window.location.replace(BASE_URL+'sign-in');
					 }, 1000); 
						//window.location.replace(BASE_URL+'sign-in')
					}else{
						varThis.html('');
			            varThis.html('Yes');
						$('#error_message').html(res?.error);
					}
					setTimeout(function () {
						 $('#success_message').html('');
						 $('#error_message').html('');
					 }, 1000); 
				}
			});
		}else{
			varThis.html('');
			varThis.html('Yes');
			setTimeout(function () {
				 $('#error_message').html('Something wents wrong!');
			 }, 1000); 
		}
		
	});
	// Progress Bar





	//Tabs Box




	//Accordion Box









	/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */

	$(window).on('scroll', function () {
		headerStyle();
		if ($(window).scrollTop() > 200) {
			$('.scroll-top-inner').addClass('visible');
		} else {
			$('.scroll-top-inner').removeClass('visible');
		}
	});


	/* =============================
	Show background image as data-background 
	========================== */

	jQuery(document).ready(function (e) {
		background();
	});
	function background() {
		var img = $('.background-image');
		img.css('background-image', function () {
			var bg = ('url(' + $(this).data('background') + ')');
			return bg;
		});
	}


	/* ==========================================================================
   When document is loaded, do
   ========================================================================== */

	$(window).on('load', function () {
		handlePreloader();
	});



})(window.jQuery);


$(document).ready(function() {
	$('#registry_form').on('submit', function(event){    
		event.preventDefault();
		var category = $("#category").val(); // alert(category);
		var type = $("#type").val();       // alert(type); 
		var brand = $("#brand").val();    // alert(brand);
		var occasion = $("#occasion").val();  //  alert(occasion);
		var color = $("#color").val();   //  alert(color);
		var size = $("#size").val();  // alert(size);
		var style = $("#style").val();  // alert(style);

		$.ajax({
			url: BASE_URL + "user/add/registry",
			type: "POST",
			dataType: "json",
			data: {
				category: category,
				type: type,
				brand: brand,
				occasion: occasion,
				color: color,
				size: size,
				style: style
			},
			beforeSend: function() {
				$('#registry_contact').attr('disabled', 'disabled');
			},
			success: function(data) {  // alert(data.error);
				if (data.error) {
					if (data.category != '') {
						$('#categorys').html(data.category);
					} else {
						$('#categorys').html('');
					}
					if (data.type != '') {
						$('#types').html(data.type);
					} else {
						$('#types').html('');
					}
					if (data.occasion != '') {
						$('#occasions').html(data.occasion);
					} else {
						$('#occasions').html('');
					}
					if (data.brand != '') {
						$('#brands').html(data.brand);
					} else {
						$('#brands').html('');
					}
					if (data.color != '') {
						$('#colors').html(data.color);
					} else {
						$('#colors').html('');
					}
					if (data.size != '') {
						$('#sizes').html(data.size);
					} else {
						$('#sizes').html('');
					}
					if (data.style != '') {
						$('#styles').html(data.style);
					} else {
						$('#styles').html('');
					}
				}
				if (data.success) {
					$('#success_message').html(data.success);
					$('#categorys').html('');
					$('#types').html('');
					$('#occasions').html('');
					$('#brands').html('');
					$('#colors').html('');
					$('#sizes').html('');
					$('#styles').html('');
					window.location.reload();
				}
				$('#registry_contact').attr('disabled', false);
			}
		});
	});
});

// function previewFile(input,varId){   alert('ok1');
// 	var file = $("input[type=file]").get(0).files[0]; 
// 	 console.log(file); 
// 	if(file){
// 		var reader = new FileReader();
// 		reader.onload = function(){
// 			$("#"+varId).attr("src", reader.result);
// 		}
// 		reader.readAsDataURL(file);
// 	}
// }

function Coverphoto(input){ 
	var file = $(".profilePhoto").get(0).files[0];
    
	if(file){
		var reader = new FileReader();

		reader.onload = function(){
			$("#Coverphotoview").attr("src", reader.result);
		}

		reader.readAsDataURL(file);
	}
}
function profilephoto(event,varId){
	var file = event.target.files[0];
    if(file){
		var reader = new FileReader();

		reader.onload = function(){
			$("#"+varId).attr("src", reader.result);
		}

		reader.readAsDataURL(file);
	}
}

$("body").on("click", ".showCategory", function () { 
	$(".select-category").html('Loading');
	var wish_id = $(this).attr('data-id');         // alert(cat_id);
	var brand = $('.brand').attr('data-brand');   // alert(brand); 
	var color = $('.color').attr('data-color');   // alert(color);       
	var size = $('.size').attr('data-size');      // alert(size);
	var style = $('.style').attr('data-style');      // alert(size);
	
	$.ajax({
		url: BASE_URL + "/getSubCat/Cat_id",
		type: "post",
		data: {wish_id:wish_id,
			   brand:brand,
			   color:color,
			   size:size,
			   style:style
		      },
		success: function (response) { // alert(response);
			var res = JSON.parse(response);
			if (res?.code == 200) {
				console.log(res);
				$(".category-edit").html(res?.html);
				$(".type-edit").html(res?.htmlType);
				$(".brand-edit").val(res?.htmlBrand);
				$(".color-edit").val(res?.htmlColor);
				$(".size-edit").val(res?.htmlsize);
				$(".style-edit").val(res?.htmlstyle);
				$(".wish_id").val(res?.htmlwish_id);
				//window.location.reload();
			}
		}
	});

});  

$("body").on("click", "#contact_form_edit", function () { 
	var wish_id = $('.wish_id').val();            // alert(wish_id);
	var cat_id = $('.category-edit').val();         //    alert(cat_id);
	var type_id = $('.type-edit').val();           // alert(type_id);    
	var brand = $('.brand-edit').val();             //    alert(brand); 
	var color = $('.color-edit').val();            //   alert(color);       
	var size = $('.size-edit').val();              // alert(size);
	var style = $('.style-edit').val();            //  alert(style);
	$.ajax({
		url: BASE_URL + "/getSubCat/Cat_id/post",
		type: "post",
		data: {wish_id:wish_id,
			   cat_id :cat_id,
			   type_id:type_id,
			   brand:brand,
			   color:color,
			   size:size,
			   style:style
		      },
		success: function (data) { 
		var res = JSON.parse(data); 
		if (res?.error) {
				if (res?.category != '') {  
					$('#category_edit').html(res?.category);
				} else {
					$('#category_edit').html('');
				}
				if (res?.type != '') {  
					$('#types_edit').html(res?.type);
				} else {
					$('#types_edit').html('');
				}
				if (res?.brand != '') {  
					$('#brands_edit').html(res?.brand);
				} else {
					$('#brands_edit').html('');
				}
				if (res?.color != '') {
					$('#colors_edit').html(res?.color);
				} else {
					$('#colors_edit').html('');
				}
				if (res?.size != '') {
					$('#sizes_edit').html(res?.size);
				} else {
					$('#sizes_edit').html('');
				}
				if (res?.style != '') {
					$('#styles_edit').html(res?.style);
				} else {
					$('#styles_edit').html('');
				}	
		}
		if (res?.success) {
			$('#success_message_edit').html(res?.success);
			$('#category_edit').html('');
			$('#types_edit').html('');
			$('#brands_edit').html('');
			$('#colors_edit').html('');
			$('#sizes_edit').html('');
			$('#styles_edit').html('');
		//	$('#contact_form_edit')[0].reset();
			window.location.reload();
		}
	 }
		
	});
});  



$("body").on("click", "#wish_delete", function (){
	var wishId = $(this).attr('data-id');  
	$('.wishDeleteId').attr('data-id',wishId);

}); 
$("body").on("click", ".wishDeleteId", function (){
   var wishId =$('.wishDeleteId').attr('data-id');
     $.ajax({
	url: BASE_URL + "/wish/delete",
	type: "post",
	data: {wishId:wishId},
	success: function (data) {
		var res = JSON.parse(data);   
		if (res?.delete) {
			$('#success_message_delete').html(res?.delete);
			window.location.reload();
		}
    }
	
  });   
 });	
  
 $("body").on("click", ".showRegistryCategory",function(){
		$(".select-category_registry").html('Loading');
		var registry_id = $(this).attr('data-id');  
		$.ajax({
			url: BASE_URL + "/getCategory/subcategory/registry_id",
			type: "post",
			data: {registry_id:registry_id,
				},
			success: function (response) { // alert(response);
				var res = JSON.parse(response);
				if (res?.code == 200) {
					console.log(res);    
					$(".category-registry-edit").html(res?.html);   
					$(".type-registry-edit").html(res?.htmlRegistryType);
					$(".occasion-registry-edit").val(res?.htmlRegistryOccasionType);
					$(".brand-registry-edit").val(res?.htmlRegistryBrand);
					$(".color-registry-edit").val(res?.htmlRegistryColor);
					$(".size-registry-edit").val(res?.htmlRegistrysize);
					$(".style-registry-edit").val(res?.htmlRegistrystyle);
					$(".registry_id").val(res?.htmlRegistry_id);
				}
			}
		}); 
 });

 $("body").on("click", "#registry_contact_update", function () {  
	var registryId = $('.registry_id').val();                   
	var registry_catId = $('.category-registry-edit').val();         
	var registry_typeId = $('.type-registry-edit').val();             
	var registry_occasion = $('.occasion-registry-edit').val();          
	var registry_brand = $('.brand-registry-edit').val();              
	var registry_color = $('.color-registry-edit').val();                       
	var registry_size = $('.size-registry-edit').val();                  
	var registry_style = $('.style-registry-edit').val();                
	$.ajax({
		url: BASE_URL + "/registry/update/post",
		type: "post",
		data: {registryId:registryId,
			   registry_catId :registry_catId,
			   registry_typeId:registry_typeId,
			   registry_occasion:registry_occasion,
			   registry_brand:registry_brand,
			   registry_color:registry_color,
			   registry_size:registry_size,
			   registry_style:registry_style
		      },
		success: function (data) { 
		var res = JSON.parse(data); 
		if (res?.error) {
				if (res?.category != '') {  
					$('#categorys_registry').html(res?.category);
				} else {
					$('#categorys_registry').html('');
				}
				if (res?.type != '') {  
					$('#type_registry').html(res?.type);
				} else {
					$('#type_registry').html('');
				}
				if (res?.occasion != '') {
					$('#occasions_registry').html(res?.occasion);
				} else {
					$('#occasions_registry').html('');
				}
				if (res?.brand != '') {
					$('#brand_registry').html(res?.brand);
				} else {
					$('#brand_registry').html('');
				}
				if (res?.color != '') {
					$('#colors_registry').html(res?.color);
				} else {
					$('#colors_registry').html('');
				}
				if (res?.size != '') {
					$('#sizes_registry').html(res?.size);
				} else {
					$('#sizes_registry').html('');
				}
				if (res?.style != '') {
					$('#styles_registry').html(res?.style);
				} else {
					$('#styles_registry').html('');
				}	
		}
		if (res?.success) {
			$('#success_message_registry_massage').html(res?.success);
			$('#categorys_registry').html('');
			$('#type_registry').html('');
			$('#brand_registry').html('');
			$('#colors_registry').html('');
			$('#sizes_registry').html('');
			$('#styles_registry').html('');
		//	$('#contact_form_edit')[0].reset();
			window.location.reload();
		}
	 }
		
	});
});  

$("body").on("click", "#Registry_delete", function (){ 
	var registryId = $(this).attr('data-id');    
	$('.registryDeleteId').attr('data-id',registryId);
});

$("body").on("click", ".registryDeleteId", function (){
	var registryId =$('.registryDeleteId').attr('data-id'); 
	  $.ajax({
	 url: BASE_URL + "/registry/delete",
	 type: "post",
	 data: {registryId:registryId},
	 success: function (data) {
		 var res = JSON.parse(data);   
		 if (res?.delete) {
			 $('#success_message_delete').html(res?.delete);
			 window.location.reload();
		 }
	 }
	 
   });   
  });