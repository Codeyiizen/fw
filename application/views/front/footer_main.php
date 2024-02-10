
	</div>

    <!-- jequery plugins -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.fancybox.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/appear.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/parallax-scroll.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/data-animation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lax.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/particles.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <!-- main-js -->
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
	
	<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
	
	<!-- Script -->
	<script>
		tinymce.init({ 
			selector:'.editor',
			theme: 'modern',
			height: 200
		});
	</script>

<script type="text/javascript">


$(document).ready(function() {
    $(".btn-submit").click(function(e){  
        e.preventDefault();
        var first_name = $("input[name='first_name']").val();
        var last_name = $("input[name='last_name']").val();
        var email = $("input[name='email']").val();
        var address = $("textarea[name='address']").val();

        $.ajax({
            url: "/itemForm",
            type:'POST',
            dataType: "json",
            data: {first_name:first_name, last_name:last_name, email:email, address:address},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg").css('display','none');
                    alert(data.success);
                }else{
                    $(".print-error-msg").css('display','block');
                    $(".print-error-msg").html(data.error);
                }
            }
        });
    }); 
});


</script>
</body>
</html>