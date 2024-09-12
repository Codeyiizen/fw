<style>
.bootstrap-tagsinput .tag {
    background: black;
    padding: 4px;
    font-size: 14px;
}

.bootstrap-tagsinput {
    width: 100%;
    background: #fff;
    border: 1px solid #ced4da;
    padding: 4px 6px;
    color: #495057;
    display: inline-block;
    border-radius: 4px;
    height: 47px;
}

.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #fff;
    background-color: black;
    padding: 4px;
    font-size: 14px;
    border-radius: 3px;
}
</style>
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>Blog Edit
    </h3>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-header bg-white border-0 p-3">
                <h4 class="card-title mb-0">Blog Edit</h4>
            </div>
            <div class="card-body pt-0 p-3">
                <?php if (isset($error_msg)) { ?>
                <div class="alert alert-danger">
                    <?php echo $error_msg; ?>
                </div>
                <?php } ?>
                <?php echo form_open_multipart('admin/blog/edit/post/' . $editBlog->id); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                            value="<?php echo set_value('title', $editBlog->title); ?>">
                        <?php echo form_error('title', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <input type="hidden" name="hid_title"
                        value="<?php echo set_value('title', !empty($editBlog->title) ? $editBlog->title:'' ); ?>">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Categories</label>
                        <select class="form-select" name="cat_id" aria-label="Default select example">
                            <option value="">Select Categories</option>
                            <?php if (!empty($categories)) { ?>
                            <?php foreach ($categories as $cat) { ?>
                            <option value="<?php echo $cat->id; ?>"
                                <?php echo ($cat->id == $editBlog->cat_id) ? 'selected="selected"' : ''; ?>>
                                <?php echo $cat->title; ?>
                            </option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                        <?php echo form_error('cat_id', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Blog Content</label>
                        <textarea class="form-control" name="blog_content" id="div_editor1"
                            placeholder="Enter the description"><?php echo set_value('blog_content', $editBlog->blog_content); ?></textarea>
                        <?php echo form_error('blog_content', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Tag</label>
                        <input type="text" name="tag" data-role="tagsinput" class="form-control" placeholder="Enter Tag"
                            value="<?php echo set_value('tag', $editBlog->tag); ?>">
                        <?php echo form_error('tag', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title"
                            value="<?php echo set_value('meta_title', $editBlog->meta_title); ?>">
                        <?php echo form_error('meta_title', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control"
                            placeholder="Enter Meta Description"
                            value="<?php echo set_value('meta_description', $editBlog->meta_description); ?>">
                        <?php echo form_error('meta_description', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Meta Keywords</label>
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Enter Meta Keywords"
                            value="<?php echo set_value('meta_keyword', $editBlog->meta_keywords); ?>">
                        <?php echo form_error('meta_keyword', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="col-md-12 fv-row">
                        <div class="form-group">
                            <h4 class="card-title">Uploading Feature Images</h4>
                            <input type="file" name="blog_image" id="input-file-now" class="dropify"
                                data-default-file="<?php echo base_url('/assets/uploads/blog_images/' . $editBlog->image); ?>" />
                            <input type="hidden" name="remove_image" id="remove_image" value="0" />
                            <?php echo form_error('blog_image', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                        </div>
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

<script type="text/javascript">
$(document).ready(function() {
    $('.dropify').dropify();

    $('#input-file-now').dropify();

    // Detect when the user removes the image
    $('#input-file-now').on('dropify.afterClear', function(event, element) {
        $('#remove_image').val('1'); // Set hidden field to '1' when image is removed
    });

    // Reset the hidden input if the image is re-selected
    $('#input-file-now').on('dropify.beforeClear', function(event, element) {
        $('#remove_image').val('0'); // Reset to '0' if not removing the image
    });
});
</script>