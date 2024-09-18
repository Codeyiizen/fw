<section class="titleArea">
    <div class="titleAreaInner">
        <div class="container">
            <div class="titleAreaContent">
                <h1>Blog Details Page</h1>
            </div>
        </div>
    </div>
</section>
<section class="blogSection section-padding">
    <div class="container">
        <div class="cs-blog-detail">
            <div class="row">
                <div class="col-md-8">
                    <h3><?php echo $blogDetails->title ?></h3>
                    <ul class="list-unstyled list-inline meta-info mb-3">
                        <li class="list-inline-item"><a href="javascript:;"> <i
                                    class="mr-2 fa fa-calendar-alt"></i><?php echo date('d M Y', strtotime($blogDetails->created_on)); ?>
                            </a></li>
                    </ul>
                    <?php if(!empty($blogDetails->image)){  ?>
                    <img class="img-fluid mb-4" alt="Post image"
                        src="<?php echo base_url().'assets/uploads/blog_images/'.$blogDetails->image;?>">
                    <?php }else{  ?>
                    <img class="img-fluid mb-4"
                        src="<?php echo base_url().'assets/uploads/blog_images/no-image-blog.png' ?>">
                    <?php  } ?>
                    <p><?php echo $blogDetails->blog_content ?></p>
                    <div class="tag-list">
                        <strong>Tags</strong>
                        <?php  
                        $explodeBlogtag = explode(',',$blogDetails->tag);
                        ?>
                        <?php if(!empty($explodeBlogtag[0])){ ?>
                        <?php foreach($explodeBlogtag as $tag){  ?>
                        <a href="#"><?php echo $tag ?></a>
                        <?php } } ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="side-bar-area">
                        <div class="side-bar-widget">
                            <h4 class="title">Recent Post</h4>
                            <div class="widget-popular-post">
                                <?php if(!empty($recentBlog)){  ?>
                                <?php foreach($recentBlog as $blog){ ?>
                                <article class="post">
                                    <a class="thumb"
                                        href="<?php echo base_url('front/blog/show/details/'.$blog->slug); ?>"><span
                                            class="full-image cover"
                                            style="background-image:url('<?php echo base_url().'assets/uploads/blog_images/'.$blog->image;?>')"
                                            role="img"></span>
                                    </a>
                                    <div class="post-content">
                                        <h5><a
                                                href="<?php echo base_url('front/blog/show/details/'.$blog->slug); ?>"><?php echo $blog->title ?></a>
                                        </h5>
                                        <p><small><?php echo date('d M Y', strtotime($blog->created_on)); ?></small>
                                        </p>
                                    </div>
                                </article>
                                <?php } }  ?>
                            </div>
                        </div>
                        <div class="side-bar-area">
                            <div class="side-bar-widget">
                                <h4 class="title">Tags</h4>
                                <div class="tag-list">
                                    <?php  
                        $explodeBlogtag = explode(',',$blogDetails->tag);
                        ?>
                                    <?php if(!empty($explodeBlogtag[0])){ ?>
                                    <?php foreach($explodeBlogtag as $tag){  ?>
                                    <a href="#"><?php echo $tag ?></a>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>