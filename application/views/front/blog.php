<style>
body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.titleArea {
    background-color: #333;
    color: white;
    padding: 80px 0;
    text-align: center;
}

.titleArea h1 {
    margin: 0;
    font-size: 3em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.blog-section {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 30px;
}

.blog-card {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    display: flex;
    flex-direction: column;
    height: 100%;
    /* Ensure the card takes the full height */
}

.blog-card:hover {
    transform: translateY(-10px);
}

.blog-image {
    width: 100%;
    height: 200px;
    background-size: cover;
    background-position: center;
}

.blog-content {
    padding: 30px;
    flex-grow: 1;
}

.blog-content h2 {
    margin: 0;
    font-size: 1.5em;
    color: #333;
}

.blog-content p {
    color: #666;
    margin: 15px 0;
    line-height: 1.6em;
    font-size: 18px;
}

.blog-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.9em;
    color: #999;
}

.blog-meta a {
    color: #26A65B;
    text-decoration: none;
}

.blog-meta a:hover {
    text-decoration: underline;
}

.side-blog-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.side-blog-card {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    display: flex;
    flex-direction: column;
    height: 100%;
    /* Ensure it takes the same height */
}

.side-blog-card:hover {
    transform: translateY(-10px);
}

.side-blog-image {
    width: 100%;
    height: 150px;
    background-size: cover;
    background-position: center;
}

.side-blog-content {
    padding: 20px;
    flex-grow: 1;
    /* Ensure the content area grows */
}

.side-blog-content h2 {
    margin: 0;
    font-size: 1.2em;
    color: #333;
}

.side-blog-content p {
    color: #666;
    margin: 15px 0;
    line-height: 1.4em;
}

/* Adjust the row to stretch items */
.row {
    display: flex;
    align-items: stretch;
    /* Ensures the columns match height */
}

/* Adjust padding for alignment */
.col-sm-3 {
    padding-left: 15px;
    /* Add left padding */
    padding-right: 15px;
    /* Add right padding */
}

@media (min-width: 768px) {
    .col-sm-3 {
        padding-left: 30px;
        /* Add a bit more padding on larger screens */
        padding-top: 50px;
    }
}

@media (max-width: 768px) {
    .titleArea h1 {
        font-size: 2em;
    }

    .blog-content h2 {
        font-size: 1.2em;
    }

    .blog-meta {
        flex-direction: column;
        align-items: flex-start;
    }
}

.side-blog-card {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    padding: 20px;
}

.side-blog-card:hover {
    transform: translateY(-10px);
}

.side-blog-content h2 {
    font-size: 1.5em;
    margin-bottom: 15px;
    color: #333;
}

.form-select {
    width: 100%;
    padding: 12px 20px;
    border-radius: 8px;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    font-size: 1rem;
    color: #333;
    outline: none;
    transition: all 0.3s ease;
    appearance: none;
    background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"%3E%3Cpath fill="%23000" d="M2 0L0 2h4z" /%3E%3C/svg%3E');
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 12px;
}

.form-select:hover {
    border-color: #26A65B;
}

.form-select:focus {
    border-color: #26A65B;
    box-shadow: 0 0 5px rgba(38, 166, 91, 0.5);
}

.form-select option {
    padding: 10px;
}
</style>


<section class="titleArea">
    <div class="container">
        <h1>Blog Page</h1>
    </div>
</section>

<div class="row">
    <div class="col-sm-3">
        <section class="side-blog-section">
            <div class="side-blog-card">
                <div class="side-blog-content">
                    <h5>Search Blog By Categories</h5>
                    <div class="category-list">
                        <?php if (!empty($categories)) { ?>
                            <?php foreach ($categories as $cat) { ?>
                                <ul>
                                    <li>
                                   <b><a href="<?php echo base_url('front/blog/show?cat_id=' . $cat->id); ?>"  style="margin: 5px;"> <?php echo $cat->title; ?>
                                    </a></b>
                                    </li>
                                </ul>
                                
                            <?php } ?>
                        <?php } else { ?>
                            <p>No Categories Available</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="side-blog-card">
                <div class="side-blog-content">
                    <h5>Search Blog By Tag Name</h5>
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
                                <a href="<?php echo base_url('front/blog/show?tag=' . urlencode($tag)); ?>" class="badge badge-success" style="margin: 5px;">
                                    <?php echo $tag; ?>
                                </a>
                            <?php } ?>
                        <?php } else { ?>
                            <p>No Tags Available</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-sm-9">
        <section class="blog-section container">
            <?php if (!empty($blog)) { ?>
                <?php foreach ($blog as $blogs) { ?>
                    <div class="blog-card">
                        <div class="blog-image">
                            <?php if(!empty($blogs->image)){ ?>
                             <a href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>"><img class="img-fluid" style="width: 350px; height:240px;" src="<?php echo base_url().'assets/uploads/blog_images/'.$blogs->image; ?>"></a>
                            <?php }else{ ?>
                             <a href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>"><img style="width: 350px; height:240px;" class="img-fluid" src="<?php echo base_url().'assets/uploads/blog_images/no-image-blog.png' ?>"></a>   
                          <?php  } ?>
                        </div>
                        <div class="blog-content">
                            <p><a href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>"> <?php echo $blogs->title; ?> </a></p>
                            <div class="row">
                                <div class="blog-meta">
                                    <span class="date fa fa-calendar text-success">
                                        <span class="text-dark"><?php echo date('d M', strtotime($blogs->created_on)); ?></span>
                                    </span>
                                </div>
                                <div class="blog-meta ml-auto">
                                    <span class="date">
                                        <a class="btn btn-warning" href="<?php echo base_url('front/blog/show/details/'.$blogs->slug); ?>">Read More</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </section>
    </div>
</div>
