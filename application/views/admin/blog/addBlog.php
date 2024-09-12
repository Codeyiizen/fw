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
            <i class="mdi mdi-blogger menu-icon"></i>
        </span>Blog Add
    </h3>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-header bg-white border-0 p-3">
                <h4 class="card-title mb-0">Blog Add</h4>
            </div>
            <div class="card-body pt-0 p-3">
                <?php echo form_open_multipart('admin/blog/add/post'); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                            value="<?php echo set_value('title'); ?>">
                        <?php echo form_error('title', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Categories</label>
                        <select class="form-select" name="cat_id" aria-label="Default select example">
                            <option value="">Select Categories</option>
                            <?php if(!empty($categories)){ ?>
                            <?php foreach($categories as $cat){ ?>
                            <option value="<?php echo $cat->id; ?>" <?php echo set_select('cat_id', $cat->id); ?>>
                                <?php echo $cat->title; ?></option>
                            <?php  }  }?>
                        </select>
                        <?php echo form_error('cat_id', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Blog Content</label>
                        <textarea class="form-control" name="blog_content" id="div_editor1"
                            placeholder="Enter the description"><?php echo set_value('blog_content'); ?></textarea>
                        <?php echo form_error('blog_content', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Tag</label>
                        <input type="text" name="tag" data-role="tagsinput" placeholder="Enter Tag"
                            value="<?php echo set_value('tag'); ?>">
                        <?php echo form_error('tag', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title"
                            value="<?php echo set_value('meta_title'); ?>">
                        <?php echo form_error('meta_title', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control"
                            placeholder="Enter Meta Description" value="<?php echo set_value('meta_description'); ?>">
                        <?php echo form_error('meta_description', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Meta Keywords</label>
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Enter Meta Keywords"
                            value="<?php echo set_value('meta_keyword'); ?>">
                        <?php echo form_error('meta_keyword', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                    </div>
                    <div class="col-md-12 fv-row">
                        <div class="form-group">
                            <h4 class="card-title">Uploading Feature Images</h4>
                            <input type="file" name="blog_image" id="input-file-now" class="dropify" />
                            <?php echo form_error('blog_image', '<div class="alert alert-danger mt-2">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
});
</script>
Copy code
<script>
$(document).ready(function() {
    $('input[data-role="tagsinput"]').tagsinput();
});
</script>