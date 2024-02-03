(function($) {
	
	"use strict";
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.loader-wrap').length){
			$('.loader-wrap').delay(1000).fadeOut(500);
		}
	}

	if ($(".preloader-close").length) {
        $(".preloader-close").on("click", function(){
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
	
	$("#signup").click(function() {
		$("#first").fadeOut("fast", function() {
			$("#second").fadeIn("fast");
		});
	});

	$("#signin").click(function() {
		$("#second").fadeOut("fast", function() {
			$("#first").fadeIn("fast");
		});
	});


    $(function() {
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
            submitHandler: function(form) {
				form.submit();
            }
        });
    });
         
	$(function() {
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
			submitHandler: function(form) {
				form.submit();
			}
		});
	});
	

	//Fact Counter + Text Count
	
	$('.fs-toggle-menu').click (function(){
		$(this).toggleClass('active');
		$('#fs-menu').toggleClass('open');
	});
	


	// Progress Bar
	


	

	//Tabs Box
	



	//Accordion Box
	








	/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
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

    jQuery(document).ready(function(e) {
        background();
    });
    function background()
    {
        var img=$('.background-image');
        img.css('background-image', function () {
        var bg = ('url(' + $(this).data('background') + ')');
        return bg;
        });
    }
	
	
	/* ==========================================================================
   When document is loaded, do
   ========================================================================== */
	
	$(window).on('load', function() {
		handlePreloader();
	});

	

})(window.jQuery);