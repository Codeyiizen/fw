<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>Show Blog View
    </h3>
</div>
<?php if (validation_errors()) { ?>
<div class="alert alert-danger">
    <?php echo validation_errors(); ?>
</div>
<?php } ?>
<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Blog Page View</h4>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <td scope="col"><?php echo $blogShow->title  ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Blog Categories</th>
                        <td scope="col"><?php echo !empty($cat_name->title) ?  $cat_name->title :''  ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Blog Tag</th>
                        <?php  
                           $explodeBlogtag = explode(',',$blogShow->tag);
                        ?>
                        <td scope="col">
                           <?php if(!empty($explodeBlogtag[0])){ ?> 
                             <?php foreach($explodeBlogtag as $tag){  ?>
                                <span  class="bg-secondary text-white"><?php echo $tag  ?></span>
                           <?php } } ?> 
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Blog Meta Title</th>
                        <td scope="col"><?php echo $blogShow->meta_title  ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Blog Meta Description</th>
                        <td scope="col"><?php echo $blogShow->meta_description  ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Blog Meta Keywords</th>
                        <td scope="col"><?php echo $blogShow->meta_keywords  ?></td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>  
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5><strong>Blog Content </strong></h5>
                <p><?php echo $blogShow->blog_content  ?></p>
            </div>
            <div class="card-body">
                <p><img class="img-fluid" src="<?php echo base_url().'assets/uploads/blog_images/'.$blogShow->image;?>"></p>
                
            </div>
        </div>
    </div>
</div>