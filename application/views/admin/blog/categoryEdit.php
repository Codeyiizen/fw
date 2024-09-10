<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>Categories Edit
    </h3>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Categories Edit</h4>
                <?php echo form_open_multipart('admin/blog/category/edit/post/' . $getCat->id); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputTitle">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo set_value('title', $getCat->title); ?>">
                        <?php echo form_error('title', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCategories">Description</label>
                        <input type="text" name="categories" class="form-control" placeholder="Description" value="<?php echo set_value('categories', $getCat->categories); ?>">
                        <?php echo form_error('categories', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>