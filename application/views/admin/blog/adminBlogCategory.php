<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-format-list-bulleted-square menu-icon"></i>
        </span>Blog Categories List Page
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <div class="d-flex align-items-center py-2">
                <a href="<?php echo base_url(); ?>admin/blog/category/add" class="btn btn-gradient-success px-3">
                    <i class="fa fa-plus me-2"></i>Add Categories
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
            <div class="card-header bg-white border-0 p-3">
                <h4 class="card-title mb-0">Blog Categories List Page</h4>
            </div>
            <div class="card-body p-0">
            <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('success')?>
            </div>
            <?php } ?>
            <div class="col-sm-12">
                <?php if($this->session->flashdata('update')){?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('update')?>
                </div>
                <?php } ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 1;
                    foreach($categoreis as $cat){  ?>
                    <tr></tr>
                    <th scope="row"><?php  echo $index++;  ?></th>
                    <td><?php  echo  $cat->title ?></td>
                    <td><?php  echo  $cat->categories ?></td>
                    <td>
                        <div class="toggle-switch">
                            <input type="checkbox" class="switch_status updateCatStatus switch-<?php echo $cat->id; ?>"
                                id="switch<?php echo $cat->id; ?>" data-id="<?php echo $cat->id; ?>"
                                data-status="<?php echo $cat->status; ?>" <?php if ($cat->status == '1') {
                                             echo 'checked="checked"';
                                }
                                ?>>
                            <label for="switch<?php echo $cat->id; ?>"></label>
                        </div>
                    </td>
                    <td>
                        <a class="text-success mx-1 fs-6"
                            href="<?php echo base_url('admin/blog/category/edit/'.$cat->id.'')  ?>"><i
                                class="fa fa-edit"></i></a>
                        <a class="text-danger mx-1 fs-6 deleteCat" href="javascript:void(0)" data-toggle="modal"
                            data-target="#delete" data-id="<?php echo $cat->id ?>"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<script>
$("body").on("click", ".deleteCat", function() {
    var id = $(this).attr('data-id');
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this category!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "/admin/blog/category/delete",
                type: "post",
                data: {
                    id: id
                },
                success: function(response) {
                    Swal.fire(
                        "Deleted!",
                        "The category has been deleted.",
                        "success"
                    ).then(() => {
                        window.location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error!", "There was an issue deleting the category.",
                        "error");
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "The category is safe!", "info");
        }
    });
});
</script>