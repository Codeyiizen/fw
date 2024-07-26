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
		var $this = $(this);
	  	$($this).text('Please Wait');
		$($this).attr('disabled', 'true');	
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
					$('.sendFriendRequest').attr('disabled', 'false');
				  $('#success_message').html(res.success);
				  setTimeout(function () {
					window.location.reload(1);
				}, 1000); 

				}
			}
		});
	})
   
	$("body").on("click", ".closeButton", function () {    
       $('#close').attr("src","")
	});

	$("body").on("click", ".addSrc", function () {    
		$('#close').attr("src","https://www.youtube.com/embed/wb_jZlwcmdo")
	 });

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
					window.location.href =BASE_URL + "/user/friends";
				//	window.location.reload();
				}
			}
		});
	})   
    
	$("body").on("click", ".showAllNotify", function (event) {  
		event.stopPropagation(); 
		$("#removeClass").toggleClass('showmore-message');
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
    
	$("body").on("click", ".readMsg", function (){ 
		var userId = $('.readMsg').attr('msg-id');     
		$.ajax({
		 url: BASE_URL + "/user/notification/read",
		 type: "post",
		 data: {
			userId:userId
		 },       
		 success: function (response){
		//	window.location.reload();
		 }
	   });	 
	 })
    
	 $("body").on("click", ".deleteToNotify", function (){ 
			var msgId = $('.deleteToNotify').attr('id'); 
			if (confirm('Are you sure you want to delete this item?')){      
			$.ajax({
			url: BASE_URL + "/user/notification/delete",
			type: "post",
			data: {
				msgId:msgId
			},       
			success: function (response){
				window.location.reload();
			}
		});
	 }	   
   })

	 


	$("body").on("click", ".upDateMassageStatus", function (){
	   var id = $(this).data('id');    
	   var msgId = $('.upDateMassageStatus').attr('msg-id'); 
	   $.ajax({
		url: BASE_URL + "/update/massage/status",
		type: "post",
		data: {
			id:id,
			msgId:msgId  
		},       
		success: function (response){
		   window.location.reload();
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
    
	$("body").on("change",".filter_by_cat_family_wish",function(){
		if($(this).val()!==""){
			window.location.replace(BASE_URL+'/family/wishes?cat='+$(this).val())
		} else {
			window.location.replace(BASE_URL+'/family/wishes')
		}
	}) 

	$("body").on("change",".filter_by_familymember_wish",function(){
		if($(this).val()!==""){
			window.location.replace(BASE_URL+'/family/wishes?family='+$(this).val())
		} else {
			window.location.replace(BASE_URL+'/family/wishes')
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
	
	$("body").on("change",".filter_by_cat_family_wish_list",function(){ 
		var dataId = $(this).attr('data-id');    
		if($(this).val()!==""){
			window.location.replace(BASE_URL+'/user/friends/'+dataId+'/familywish/?cat='+$(this).val())
		} else {
			window.location.replace(BASE_URL+'/user/friends'+dataId+'/familywish')
		}
		
	})
   
	$("body").on("click",".updateFromFriendBirthday", function(){  
	   var id = $(this).attr('id');  
		$.ajax({
			url: BASE_URL + "/user/birthday/status/update",
			type: "post",
			data: {id:id},
			success: function(data) {
				window.location.reload();
			}
		}); 
	});

	$("body").on("click",".updateToFriendBirthday", function(){  
		var id = $(this).attr('id');   
		 $.ajax({
			 url: BASE_URL + "/user/birthday/status/toupdate",
			 type: "post",
			 data: {id:id},
			 success: function(data) {
				 window.location.reload();
			 }
		 }); 
	 });

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
		var accessories = $("#accessories").val(); // alert(accessories); 
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
				accessories:accessories,
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



$(document).ready(function() {
	$('#familyMember_form').on('submit', function(event){    
		event.preventDefault();
        var familyMamber = $("#familyMamber").val();   // alert(familyMamber);
		var childName  =   $("#childName").val();        // alert(childName);
		var childBirthday = $("#childBirthday").val();   // alert(childBirthday);
		var sex           = $("#sex").val();              // alert(sex);
		var familyCategory = $("#familyCategory").val();  // alert(familyCategory); 
		var familyType     = $("#familyType").val();      //  alert(familyType);
		var accessories = $("#accessories").val();        // alert(accessories); 
		var familyBrand    = $("#familyBrand").val();     //  alert(familyBrand);
		var familyColor    = $("#familyColor").val();     //  alert(familyColor);
		var familySize     = $("#familySize").val();      //  alert(familySize);
		var familyStyle    = $("#familyStyle").val();     //  alert(familyStyle);
		$.ajax({
			url: BASE_URL + "/family/wishes/add",
			type: "POST",
			dataType: "json",
			data: {
				familyMamber: familyMamber,
				childName: childName,
				childBirthday: childBirthday,
				sex: sex,
				familyCategory: familyCategory,
				familyType:familyType,
				accessories:accessories,
				familyBrand:familyBrand,
				familyColor:familyColor,
				familySize:familySize,
				familyStyle:familyStyle

			},
			beforeSend: function() {
				$('#registry_contact').attr('disabled', 'disabled');
			},
			success: function(data) {   //alert(data);
				console.log(data);
				if (data.error) {   
					if (data.family_member != '') {
						$('#family_member').html(data.family_member);
					} else {
						$('#family_member').html('');
					}
					if (data.child_name != '') {
						$('#child_name').html(data.child_name);
					} else {
						$('#child_name').html('');
					}
					if (data.child_birthday != '') {
						$('#child_birthday').html(data.child_birthday);
					} else {
						$('#child_birthday').html('');
					}
					if (data.sex != '') {
						$('#sexsss').html(data.sex);
					} else {
						$('#sexsss').html('');
					}
					if (data.cat_id != '') {
						$('#cat_id').html(data.cat_id);
					} else {
						$('#cat_id').html('');
					}
					if (data.type_id != '') {
						$('#type_id').html(data.type_id);
					} else {
						$('#type_id').html('');
					}
					if (data.brand != '') {
						$('#brand').html(data.brand);
					} else {
						$('#brand').html('');
					} 
					if (data.color != '') {
						$('#color').html(data.color);
					} else {
						$('#color').html('');
					}
					if (data.size != '') {
						$('#size').html(data.size);
					} else {
						$('#size').html('');
					}
					if (data.style != '') {
						$('#style').html(data.style);
					} else {
						$('#style').html('');
					}
				}
				if (data.success) {
					$('#success').html(data.success);
					$('#family_member').html('');
					$('#child_name').html('');
					$('#child_birthday').html('');
					$('#sexsss').html('');
					$('#cat_id').html('');
					$('#type_id').html('');
					$('#brand').html('');
					$('#color').html('');
					$('#size').html('');
					$('#style').html('');
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
//	$(".select-category").html('Loading');
	var accessories = $('.accessories').attr('data-accessories');      //   alert(accessories);
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
				var accessories = res?.htmlotherAccessories; // alert(accessories);
				console.log(accessories);
				$(".category-edit").html(res?.html);
				$(".type-edit").html(res?.htmlType);
				if(accessories == ''){  
					
					$('.otherAccessories_edit').addClass('d-none');
				}else{ 
					$(".accessories_edit").val(accessories);
				    $('.otherAccessories_edit').removeClass('d-none');
				}
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
	var type_id = $('.type-edit').val(); 
	var accessories = $('.accessories_edit').val();          // alert(accessories);    
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
			   accessories:accessories,
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
					var accessories = res?.htmlOtherAsseccores;    
					$(".category-registry-edit").html(res?.html);   
					$(".type-registry-edit").html(res?.htmlRegistryType);
					if(accessories == null){  
						$('.otherAccessories_edit').addClass('d-none');
					}else{ 
						$(".accessories_edit").val(accessories);
						$('.otherAccessories_edit').removeClass('d-none');
					}
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
	var accessories = $('.accessories_edit').val();               
	var registry_occasion = $('.occasion-registry-edit').val();          
	var registry_brand = $('.brand-registry-edit').val();              
	var registry_color = $('.color-registry-edit').val();                       
	var registry_size = $('.size-registry-edit').val();                  
	var registry_style = $('.style-registry-edit').val();                
	$.ajax({
		url: BASE_URL + "/registry/update/post",
		type: "post",
		data: {registryId:registryId,
			   accessories:accessories,
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

  $("body").on("change",".otherAccessories", function(){  
     var otherAccessoriesId = $(this).val();
	 if(otherAccessoriesId == 31){
	  $('.otherAccessories_inputbox').removeClass('d-none');
	 }else if(otherAccessoriesId == 32){
	   $('.otherAccessories_inputbox').removeClass('d-none');
	 }else if(otherAccessoriesId == 33){
		$('.otherAccessories_inputbox').removeClass('d-none');
	 }else if(otherAccessoriesId == 34){
		$('.otherAccessories_inputbox').removeClass('d-none');
	 }else if(otherAccessoriesId == 35){
		$('.otherAccessories_inputbox').removeClass('d-none');
	 }
	 else{
		$('.otherAccessories_inputbox').addClass('d-none');
	 }
  });

  $("body").on("change",".accessoriesEdit", function(){   
	var otherAccessoriesId = $(this).val();    
	if(otherAccessoriesId == 31){
	 $('.otherAccessories_edit').removeClass('d-none');
	}else if(otherAccessoriesId == 32){
		$('.otherAccessories_edit').removeClass('d-none');
	}else if(otherAccessoriesId == 33){
		$('.otherAccessories_edit').removeClass('d-none');
	}else if(otherAccessoriesId == 34){
		$('.otherAccessories_edit').removeClass('d-none');
	}else if(otherAccessoriesId == 35){
		$('.otherAccessories_edit').removeClass('d-none');
	}else{
	   $('.otherAccessories_edit').addClass('d-none');
	   $('.accessories_edit').val('');
	}
 });

 //Acording to category palceholder change Start
 $("body").on("change",".showPlaceHolder",function(){
     var catId = $(".showPlaceHolder").val(); 
	 $.ajax({
		url: BASE_URL + "/show/placeholder",
		type: "post",
		data: {catId:catId},
		success: function(data){   
		var res = JSON.parse(data);   
		var category = res?.category;  
			if (category == 'Bottoms') {  
				$(".brandPlaceHolderAdd").attr("placeholder","(e.g., Express, Gap, etc.)");
				$(".colorPlaceHolderAdd").attr("placeholder","(e.g., Black, Blue, etc.)");
				$(".stylePlaceHolderAdd").attr("placeholder","(e.g., Cargo, relaxed, etc.)");
				$(".sizePlaceHolderAdd").attr("placeholder","(e.g., 8,10, 36*40 etc.)");
			} else if(category == 'Shirts') { 
				$(".brandPlaceHolderAdd").attr("placeholder","(e.g., Polo, American Eagle, etc.)");
				$(".colorPlaceHolderAdd").attr("placeholder","(e.g., Red, Blue, etc.)");
				$(".stylePlaceHolderAdd").attr("placeholder"," (e.g., short/long sleeve, v-neck)");
				$(".sizePlaceHolderAdd").attr("placeholder","(e.g., 5,6.5, etc)");
			} else if(category == 'Shoes') { 
				$(".brandPlaceHolderAdd").attr("placeholder","(e.g., Nike, Tory Burch etc.)");
				$(".colorPlaceHolderAdd").attr("placeholder","(e.g., Red, Blue, etc.)");
				$(".stylePlaceHolderAdd").attr("placeholder","(e.g., short/long sleeve, v-neck)");
				$(".sizePlaceHolderAdd").attr("placeholder","(e.g., 5,6.5, etc)");
			} else if(category == 'Misc (e.g.,maternity)') { 
				$(".brandPlaceHolderAdd").attr("placeholder","(e.g., Old Navy, J. Crew)");
				$(".colorPlaceHolderAdd").attr("placeholder","(e.g., Green, Red, etc.)");
				$(".stylePlaceHolderAdd").attr("placeholder","(e.g., dress socks, slouchy beanie hat)");
				$(".sizePlaceHolderAdd").attr("placeholder","(e.g., 8, small etc)");
			} else if(category == 'Pets') {   
				$(".brandPlaceHolderAdd").attr("placeholder"," (e.g., Spark Paws)");
				$(".colorPlaceHolderAdd").attr("placeholder","(e.g., Yellow, Purple, etc.)");
				$(".stylePlaceHolderAdd").attr("placeholder","(e.g., hoodie, pajamas)");
				$(".sizePlaceHolderAdd").attr("placeholder","(e.g., small, medium)");
			}else if(category == 'NULL'){   
				$(".brandPlaceHolderAdd").attr("placeholder","(e.g. Nike, Old Navy, Polo)");
				$(".colorPlaceHolderAdd").attr("placeholder","(e.g. blue, yellow, black)");
				$(".stylePlaceHolderAdd").attr("placeholder","(e.g. Cargo, v-neck)");
				$(".sizePlaceHolderAdd").attr("placeholder","(e.g. 36*40, medium, 8)");
			}
	 }
		
	});
 });
 //Acording to category palceholder change End
 $("body").on("change",".category-edit",function(){ 
	var cat_id = $(this).val();  // alert(cat_id);
	$.ajax({
		url: BASE_URL + "/show/placeholder/edit",
		type: "post",
		data: {cat_id:cat_id},
		success: function(data){   
		var res = JSON.parse(data);   
		var category = res?.category;  
			if (category == 'Bottoms') { 
				$(".accessoriesPlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").val("");
				$(".colorPlaceHolderEdit").val("");
				$(".stylePlaceHolderEdit").val("");
				$(".sizePlaceHolderEdit").val(""); 
				$(".brandPlaceHolderEdit").attr("placeholder","(e.g., Express, Gap, etc.)");
				$(".colorPlaceHolderEdit").attr("placeholder","(e.g., Black, Blue, etc.)");
				$(".stylePlaceHolderEdit").attr("placeholder","(e.g., Cargo, relaxed, etc.)");
				$(".sizePlaceHolderEdit").attr("placeholder","(e.g., 8,10, 36*40 etc.)");
			} else if(category == 'Shirts') { 
				$(".accessoriesPlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").val("");
				$(".colorPlaceHolderEdit").val("");
				$(".stylePlaceHolderEdit").val("");
				$(".sizePlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").attr("placeholder","(e.g., Polo, American Eagle, etc.)");
				$(".colorPlaceHolderEdit").attr("placeholder","(e.g., Red, Blue, etc.)");
				$(".stylePlaceHolderEdit").attr("placeholder"," (e.g., short/long sleeve, v-neck)");
				$(".sizePlaceHolderEdit").attr("placeholder","(e.g., 5,6.5, etc)");
			} else if(category == 'Shoes') {
				$(".accessoriesPlaceHolderEdit").val(""); 
				$(".brandPlaceHolderEdit").val("");
				$(".colorPlaceHolderEdit").val("");
				$(".stylePlaceHolderEdit").val("");
				$(".sizePlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").attr("placeholder","(e.g., Nike, Tory Burch etc.)");
				$(".colorPlaceHolderEdit").attr("placeholder","(e.g., Red, Blue, etc.)");
				$(".stylePlaceHolderEdit").attr("placeholder","(e.g., short/long sleeve, v-neck)");
				$(".sizePlaceHolderEdit").attr("placeholder","(e.g., 5,6.5, etc)");
			} else if(category == 'Misc (e.g.,maternity)') { 
				$(".accessoriesPlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").val("");
				$(".colorPlaceHolderEdit").val("");
				$(".stylePlaceHolderEdit").val("");
				$(".sizePlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").attr("placeholder","(e.g., Old Navy, J. Crew)");
				$(".colorPlaceHolderEdit").attr("placeholder","(e.g., Green, Red, etc.)");
				$(".stylePlaceHolderEdit").attr("placeholder","(e.g., dress socks, slouchy beanie hat)");
				$(".sizePlaceHolderEdit").attr("placeholder","(e.g., 8, small etc)");
			} else if(category == 'Pets') { 
				$(".accessoriesPlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").val("");
				$(".colorPlaceHolderEdit").val("");
				$(".stylePlaceHolderEdit").val("");
				$(".sizePlaceHolderEdit").val("");  
				$(".brandPlaceHolderEdit").attr("placeholder"," (e.g., Spark Paws)");
				$(".colorPlaceHolderEdit").attr("placeholder","(e.g., Yellow, Purple, etc.)");
				$(".stylePlaceHolderEdit").attr("placeholder","(e.g., hoodie, pajamas)");
				$(".sizePlaceHolderEdit").attr("placeholder","(e.g., small, medium)");
			}else if(category == 'NULL'){  
				$(".accessoriesPlaceHolderEdit").val("");
				$(".brandPlaceHolderEdit").val("");
				$(".colorPlaceHolderEdit").val("");
				$(".stylePlaceHolderEdit").val("");
				$(".sizePlaceHolderEdit").val(""); 
				$(".brandPlaceHolderEdit").attr("placeholder","(e.g. Nike, Old Navy, Polo)");
				$(".colorPlaceHolderEdit").attr("placeholder","(e.g. blue, yellow, black)");
				$(".stylePlaceHolderEdit").attr("placeholder","(e.g. Cargo, v-neck)");
				$(".sizePlaceHolderEdit").attr("placeholder","(e.g. 36*40, medium, 8)");
			}
	 }
	});
 });

//family Wishes Start
$("body").on("click", ".showFamilyWishesCategory",function(){
	$(".select-category_registry").html('Loading');  
	var familyWishesId = $(this).attr('data-id');
	$.ajax({
		url: BASE_URL + "/getCategory/subcategory/family_wishid",
		type: "post",
		data: {familyWishesId:familyWishesId,
			},
		success: function (response) { // alert(response);   
			var res = JSON.parse(response);
			if (res?.code == 200){   
				var accessories = res?.otherAssecceries;   
				$(".family-member-edit").html(res?.htmlFamilyMember); 
				$(".family-childname-edit").val(res?.htmlChildName); 
				$(".family-child-birthday-edit").val(res?.htmlChildBirthDay);
				$(".family-wish-sex").html(res?.htmlSex); 
				$(".category-familywish-edit").html(res?.html);   
				$(".type-familywish-edit").html(res?.htmlFamilyWishesType);
				if(accessories == null){   
					$('.otherAccessories_edit').addClass('d-none');
				}else{ 
					$(".accessories_edit").val(accessories);
					$('.otherAccessories_edit').removeClass('d-none');
				}
				$(".brand-familywish-edit").val(res?.htmlFamilyWishesBrand);
				$(".color-familywish-edit").val(res?.htmlFamilyWishesColor);
				$(".size-familywish-edit").val(res?.htmlFamilyWishessize);
				$(".style-familywish-edit").val(res?.htmlFamilyWishesstyle);
				$(".familywish_id").val(res?.htmlFamilyWishesId);
			}
		}
	}); 
});
// family Wishes End

$("body").on("click", "#familyWishUpdate", function () {  
	var familyWishId = $('.familywish_id').val();                    
	var familyWishMember = $('.family-member-edit').val();           
	var familyWishChildName = $('.family-childname-edit').val();      
	var familyWishBirthday = $('.family-child-birthday-edit').val();      
	var familyWishSex = $('.family-wish-sex').val();                  
	var familyWishCatId = $('.category-familywish-edit').val(); 
	var accessories = $('.accessories_edit').val();                            
	var familyWishTypeId = $('.type-familywish-edit').val();         
	var familyWishBrand = $('.brand-familywish-edit').val();            
	var familyWishColor = $('.color-familywish-edit').val();                       
	var familyWishSize = $('.size-familywish-edit').val();                 
	var familyWishStyle = $('.style-familywish-edit').val();               
	$.ajax({
		url: BASE_URL + "/familywish/update/post",
		type: "post",
		data: {familyWishId:familyWishId,
				familyWishMember :familyWishMember,
				familyWishChildName:familyWishChildName,
				familyWishBirthday:familyWishBirthday,
				familyWishSex:familyWishSex,
				familyWishCatId:familyWishCatId,
				accessories:accessories,
				familyWishTypeId:familyWishTypeId,
				familyWishBrand:familyWishBrand,
				familyWishColor:familyWishColor,
				familyWishSize:familyWishSize,
				familyWishStyle:familyWishStyle,
		      },
		success: function (data) { 
		var res = JSON.parse(data); 
		if (res?.error) {
				if (res?.familyMamber != '') {  
					$('#familyMember').html(res?.familyMamber);
				} else {
					$('#familyMember').html('');
				}
				if (res?.childName != '') {  
					$('#childname').html(res?.childName);
				} else {
					$('#childname').html('');
				}
				if (res?.birthday != '') {  
					$('#birthday').html(res?.birthday);
				} else {
					$('#birthday').html('');
				}
				if (res?.sex != '') {  
					$('#editSex').html(res?.sex);
				} else {
					$('#editSex').html('');
				}
				if (res?.category != '') {  
					$('#categoryFamily').html(res?.category);
				} else {
					$('#categoryFamily').html('');
				}
				if (res?.type != '') {  
					$('#typeeee').html(res?.type);
				} else {
					$('#typeeee').html('');
				}
				if (res?.brand != '') {
					$('#familyBranddd').html(res?.brand);
				} else {
					$('#familyBranddd').html('');
				}
				if (res?.color != '') {
					$('#familyColorrr').html(res?.color);
				} else {
					$('#familyColorrr').html('');
				}
				if (res?.size != '') {
					$('#familySizeee').html(res?.size);
				} else {
					$('#familySizeee').html('');
				}
				if (res?.style != '') {
					$('#familyStyleee').html(res?.style);
				} else {
					$('#familyStyleee').html('');
				}	
		}
		if (res?.success) {
			$('#success_message_registry_massage').html(res?.success);
			$('#familyMember').html('');
			$('#childname').html('');
			$('#birthday').html('');
			$('#editSex').html('');
			$('#categoryFamily').html('');
			$('#typeeee').html('');
			$('#familyBranddd').html('');
			$('#familyColorrr').html('');
			$('#familySizeee').html('');
			$('#familyStyleee').html('');
		//	$('#contact_form_edit')[0].reset();
			window.location.reload();
		}
	 }
		
	});
});  


$("body").on("click", "#familyWish_delete", function (){  
	var familyWishId = $(this).attr('data-id');    
	$('.familyWishDeleteId').attr('data-id',familyWishId);
});

$("body").on("click", ".familyWishDeleteId", function (){
	var familyWishId = $('.familyWishDeleteId').attr('data-id'); 
	  $.ajax({
	 url: BASE_URL + "/familywish/delete",
	 type: "post",
	 data: {familyWishId:familyWishId},
	 success: function (data) {
		 var res = JSON.parse(data);   
		 if (res?.delete) {
			 $('#success_message_delete').html(res?.delete);
			 window.location.reload();
		 }
	 }
	 
   });   
  });

  

 $("body").on("click",".status", function(){   
	var messageId = $(this).attr("massage-id");
	$('.msgid').val(messageId);
	var id_d = "#showAction-";  
	var newone = id_d+messageId;
	var chkTypeUser = $('#massage_id-'+messageId).attr("data-user-type");  
	if(chkTypeUser == 'from_user'){
		var status = $(this).attr("form-userss"); 
		 if(status == 1){  
			$(newone).addClass('d-none');
		 }else{  
			$(newone).removeClass('d-none');
		}
	}else{
		var status = $(this).attr("to-userss"); 
		 if(status == 0){  
			$(newone).removeClass('d-none');
		 }else{  
			$(newone).addClass('d-none');
		}
	}       
 });
  
 

$("body").on("click",".emojioneemoji", function(){  
	var emoji = $(this).attr("data-src"); 
	var messageId = $('.msgid').val();   
	var chkTypeUser = $('#massage_id-'+messageId).attr("data-user-type"); 
	if(chkTypeUser == 'from_user'){
		var status = $(".massage_id").attr("from-status");  
	}else{
		var status = $(".massage_id").attr("to-status");
	}   
	$.ajax({
		url: BASE_URL + "/save/emoji", 
		type: "post",
		data: {emoji:emoji,
			   messageId:messageId,
			   status:status,
			   chkTypeUser:chkTypeUser
			},
		success: function (response) {   
			window.location.reload();
		}
	}); 
});

//   $(document).ready(function() {
//         $(".emojionearea").emojioneArea({
//         pickerPosition: "bottom",
//         filtersPosition: "bottom",
//         tonesStyle: "checkbox",
// 		recentEmojis: false
//     });
// });


//Emoji on chat room [Mobile Viewport]
$(window).on("load", function () {
	var width = $(window).width();
	if (width <= 575) {
		$(".emojionearea").emojioneArea({
			pickerPosition: "bottom",
			filtersPosition: "bottom",
			tonesStyle: "checkbox",
			recentEmojis: false
		});
	}
	else {
		$(".chat-message-left .emojionearea").emojioneArea({
			pickerPosition: "left",
			filtersPosition: "bottom",
			tonesStyle: "checkbox",
			recentEmojis: false
		});

		$(".chat-message-right .emojionearea").emojioneArea({
			pickerPosition: "bottom",
			filtersPosition: "bottom",
			tonesStyle: "checkbox",
			recentEmojis: false
		});
	}
});


$("body").on("change",".fileClick", function(){ 
    $('.messageClick').addClass('d-none');
	$('.show').removeClass('d-none');
	
});
$("body").on("click",".messageClick", function(){  
    $('.fileHide').addClass('d-none');
});



jQuery(function ($) {
    $("ul a")
        .click(function(e) {
            var link = $(this);

            var item = link.parent("li");
            
            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }

            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                link.attr("href", "#");
                setTimeout(function () { 
                    link.attr("href", href);
                }, 300);
                e.preventDefault();
            }
        })
        .each(function() {
            var link = $(this);
            if (link.get(0).href === location.href) {
                link.addClass("active").parents("li").addClass("active");
                return false;
            }
        });
});


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("childBirthday").setAttribute("max", today);


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("childBirthdayEdit").setAttribute("max", today);








