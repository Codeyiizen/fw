<section class="fav-profile-section">
    <?php $this->load->view('user/Common/banner',array('userInfo'=>$userInfo)) ?>
</section>
<section class="section-padding profile-content">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="profile-content-inner">
                    <div class="create-wish mb-4">
                        <h3>Have a wish in a mind?</h3>
                        <a href="#" class="theme-btn yellow-bg" data-toggle="modal" data-target="#createWish"><i
                                class="fas fa-plus-circle"></i> Let's Create</a>
                        <!-- The Modal -->
                        <div class="modal" id="createWish">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create your Wish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <span id="success_message"></span>
                                        <form class="wishlist-form" method="post" id="contact_form">
                                            <div class="form-group form-inline">
                                                <label for="email" class="mr-sm-2">Category</label>
                                                <select class="select-category form-control" id="category"
                                                    name="category">
                                                    <option value="">Select Category</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                    <option value="<?php echo $category->id; ?>">
                                                        <?php echo $category->name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <span id="category" class="text-danger text-center"></span>
                                            <div class="form-group form-inline">
                                                <label for="email" class="mr-sm-2">Type</label>
                                                <select class="select-type form-control" id="type" name="type">
                                                    <option value="">Select Type</option>
                                                </select>
                                            </div>
                                            <span id="types" class="text-danger text-center"></span>
                                            <div class="form-group form-inline">
                                                <label for="email" class="mr-sm-2">Brand</label>
                                                <input type="text" class="form-control" id="brand" value="" name="brand"
                                                    placeholder="Brand">
                                            </div>
                                            <span id="brands" class="text-danger text-center"></span>
                                            <div class="form-group form-inline">
                                                <label for="email" class="mr-sm-2">Color</label>
                                                <input type="text" class="form-control" id="color" value="" name="color"
                                                    placeholder="color">
                                            </div>
                                            <span id="colors" class="text-danger text-center"></span>
                                            <div class="form-group form-inline">
                                                <label for="email" class="mr-sm-2">Size</label>
                                                <input type="text" class="form-control" id="size" value="" name="size">
                                            </div>
                                            <span id="sizes" class="text-danger text-center"></span>
                                            <div class="form-group form-inline">
                                                <label for="email" class="mr-sm-2">Style</label>
                                                <input type="text" class="form-control" id="style" value=""
                                                    name="style">
                                            </div>
                                            <span id="styles" class="text-danger text-center"></span>
                                            <div class="form-group text-center">
                                                <input type="submit" name="contact" id="contact_form"
                                                    class="theme-btn yellow-bg" value="Submit">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer d-none">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="added-wishes">
                        <div class="row">
                            <?php 
                            $i=0;
                            foreach ($wishInfo as $wishInfos) { 
                                $i=$i+1;
                                $CI =& get_instance();
                                $CI->load->model('Favoritewish_Model');
                                $getObjssubCat = $CI->Favoritewish_Model->getCategoryById($wishInfos->type);
                                $subCatName = !empty($getObjssubCat->name) ? ' - '.$getObjssubCat->name : '';
                                ?>
                            <div class="col-lg-4">
                                <div class="card bg-gradient-<?php echo $i;?> text-center border-0 mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-2"><strong><?php print_r($wishInfos->cat_name); ?> </strong> 
                                        <?php echo $subCatName;?></h5>     
                                        <ul class="list-unstyled mb-0">
                                            <li>Brand - <?php print_r($wishInfos->brand); ?></li>
                                            <li>Color - <?php print_r($wishInfos->color); ?></li>
                                            <li>Size - <?php print_r($wishInfos->size); ?></li>
                                            <li>Style - <?php print_r($wishInfos->style); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="profile-sidebar right">
                    <div class="sidebar-about sidebar-widget sidebar-bg">
                        <h3>Friends</h3>
                        <div class="friends-list mb-4">
                            <?php
							if (!empty($frienddetails)) {
								foreach ($frienddetails as $friend) { ?>
                            <div class="media align-items-center">
                                <img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
                                <div class="media-body">
                                    <h5><a
                                            href="<?php echo base_url(); ?>user/friends"><?php echo $friend->first_name; ?></a>
                                    </h5>
                                    <p>NYC, USA</p>
                                </div>
                            </div>
                            <?php }
							}  ?>

                        </div>
                        <div class="text-center common-link">
                            <a href="<?php echo base_url(); ?>user/friends">See All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>