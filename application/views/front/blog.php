<section class="titleArea">
    <div class="titleAreaInner">
        <div class="container">
            <div class="titleAreaContent">
                <h1>Blog Page</h1>
            </div>
        </div>
    </div>
</section>
<section class="blogSection section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0">
                    <div class="card-body p-3">
                        <h4 class="card-title">Search Blog By Categories</h4>
                        <?php if (!empty($categories)) { ?>
                        <ul class="list-unstyled category-list">
                            <?php foreach ($categories as $cat) { ?>
                            <li><a href="<?php echo base_url('front/blog/show?cat_id=' . $cat->id); ?>">
                                    <?php echo $cat->title; ?> <span class="badge badge-warning text-white">5</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } else { ?>
                        <p>No Categories Available</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="card border-0">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-3">Search Blog By Tag Name</h4>
                        <div class="tag-list">
                            <?php if (!empty($getTag)) { ?>
                            <?php 
                            $tags = [];
                            foreach ($getTag as $tag) {
                                $tagArray = explode(',', $tag->tag);
                                foreach ($tagArray as $t) {
                                    $t = trim($t);
                                    if (!in_array($t, $tags)) {
                                        $tags[] = $t;
                                    }
                                }
                            }
                            foreach ($tags as $tag) { ?>
                            <a href="<?php echo base_url('front/blog/show?tag=' . urlencode($tag)); ?>">
                                <?php echo $tag; ?>
                            </a>
                            <?php } ?>
                            <?php } else { ?>
                            <p>No Tags Available</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <?php if (!empty($blog)) { ?>
                    <?php foreach ($blog as $blogs) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0">
                            <?php if(!empty($blogs->image)){ ?>
                            <a href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>"><img
                                    class="img-fluid card-img-top"
                                    src="<?php echo base_url().'assets/uploads/blog_images/'.$blogs->image; ?>"></a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>"><img
                                    class="card-img-top"
                                    src="<?php echo base_url().'assets/uploads/blog_images/no-image-blog.png' ?>"></a>
                            <?php  } ?>
                            <div class="card-body p-3">
                                <ul class="list-unstyled list-inline meta-info mb-3">
                                    <li class="list-inline-item"><a href="javascript:;"> <i
                                                class="mr-2 fa fa-calendar-alt"></i><?php echo date('d M', strtotime($blogs->created_on)); ?>
                                        </a></li>
                                </ul>
                                <h5><a href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>">
                                        <?php echo $blogs->title; ?> </a></h5>
                                <a class="theme-btn yellow-bg"
                                    href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
