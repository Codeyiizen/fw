<style>
toastr.options= {
    "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "3000",
}

;
</style>
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>Blog List Page
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <div class="d-flex align-items-center py-2">
                <a href="<?php echo base_url(); ?>admin/blog/add" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>Add Blog
                </a>
            </div>
        </ul>
    </nav>
</div>
<?php if (validation_errors()) { ?>
<div class="alert alert-danger">
    <?php echo validation_errors(); ?>
</div>
<?php } ?>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Blog Page List</h4>
            </div>
            <?php if($this->session->flashdata('success')){?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('success')?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('Successupdate')){?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('Successupdate')?>
                </div>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 1;
                    foreach($blog as $blogs){  ?>
                    <tr></tr>
                    <th scope="row"><?php  echo $index++;  ?></th>
                    <td><?php  echo  $blogs->title ?></td>
                    <?php  
                           $explodeBlogtag = explode(',',$blogs->tag);
                        ?>
                    <td scope="col">
                        <?php if(!empty($explodeBlogtag[0])){ ?>
                        <?php foreach($explodeBlogtag as $tag){  ?>
                        <span class="bg-secondary text-white"><?php echo $tag  ?></span>
                        <?php } } ?>
                    </td>
                    <td>
                        <div class="toggle-switch">
                            <input type="checkbox" class="switch_status updateStatus switch-<?php echo $blogs->id; ?>"
                                id="switch<?php echo $blogs->id; ?>" data-id="<?php echo $blogs->id; ?>"
                                data-status="<?php echo $blogs->status; ?>" <?php if ($blogs->status == '1') {
                                             echo 'checked="checked"';
                                }
                                ?>>
                            <label for="switch<?php echo $blogs->id; ?>"></label>
                        </div>
                    </td>
                    <td>
                        <a class="text-secondary" href="<?php echo base_url('admin/blog/show/'.$blogs->id.'')  ?>"><i
                                class="fa fa-eye" style="font-size:20px"></i></a>
                        <a class="test-danger" href="<?php echo base_url('admin/blog/edit/'.$blogs->id.'')  ?>"><i
                                class="fa fa-edit" style="font-size:20px"></i></a>
                        <a class="test-danger deleteBlog" href="javascript:void(0)" data-toggle="modal"
                            data-target="#deleteBlog" data-id="<?php echo $blogs->id ?>"><i class="fa fa-trash"
                                style="font-size:20px;color:red"></i></a>
                    </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <div class="modal style2 fade" id="deleteBlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pt-4 pb-0 text-center">
                <div
                    class="icon-container w_60 h_60 rounded-circle bg-danger d-flex justify-content-center align-items-center mx-auto mb-3">
                    <i class="fa fa-trash-alt text-white fs_25"></i>
                </div>
                <h5 class="mb-0">Delete the conversation</h5>
                <p>Are you sure want to delete this conversation?</p>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-danger px-4 px-md-5 deleteBlogData" id="del_blog">Yes</button>
                <button type="button" class="btn btn-light px-4 px-md-5" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div> -->

<script>
$("body").on("click", ".deleteBlog", function() {
    var id = $(this).attr('data-id');
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this blog post!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "/admin/blog/delete",
                type: "post",
                data: {
                    id: id
                },
                success: function(response) {
                    Swal.fire("Deleted!", "The blog post has been deleted.", "success").then(() => {
                        window.location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error!", "There was an issue deleting the blog post.", "error");
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Your blog post is safe!", "info");
        }
    });
});

</script>