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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- main-js -->
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/emojionearea.js"></script>

<!-- Script -->
<script>
tinymce.init({
    selector: '.editor',
    theme: 'modern',
    height: 200
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#contact_form').on('submit', function(event) {
        event.preventDefault();
        var category = $("#category").val(); // alert(category);
        var type = $("#type").val();
        var accessories = $("#accessories").val(); // alert(accessories);
        var brand = $("#brand").val(); // alert(brand);
        var color = $("#color").val(); //  alert(color);
        var size = $("#size").val(); // alert(size);
        var style = $("#style").val(); // alert(style);

        $.ajax({
            url: "<?php echo base_url(); ?>user/add/wish",
            type: "POST",
            dataType: "json",
            data: {
                category: category,
                type: type,
                accessories: accessories,
                brand: brand,
                color: color,
                size: size,
                style: style
            },
            beforeSend: function() {
                $('#contact').attr('disabled', 'disabled');
            },
            success: function(data) {
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
                    $('#brands').html('');
                    $('#colors').html('');
                    $('#sizes').html('');
                    $('#styles').html('');
                    $('#contact_form')[0].reset();
                    window.location.reload();
                }
                $('#contact').attr('disabled', false);
            }
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){

    $.ajax({
        url: "<?php echo base_url(); ?>update/massage/notification/time",
        type: "POST",
        success: function(data) {
            
        }
    });
});
</script>
    </body>

</html>