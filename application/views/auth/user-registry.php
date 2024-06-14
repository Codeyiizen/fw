<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">   
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="profile-sidebar right">
                    <!-- <div class="sidebar-about sidebar-widget sidebar-bg">
                        <h3>Family</h3>
                        <div class="friends-list mb-4">
                            <?php
							if (!empty($frienddetails)) {
								foreach ($frienddetails as $friend) { ?>
                            <div class="media align-items-center">
                                <img class="img-fluid"
                                    src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt=""
                                    class="img-fluid">
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
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="profile-content-inner">
                    <div class="create-wish mb-4 d-block d-md-flex">
                    <h3 class="mb-3 mb-md-0 d-inline-block">Have a wish in mind?</h3>
                        <a href="#" class="theme-btn yellow-bg" data-toggle="modal" data-target="#createWish"><i
                                class="fas fa-plus-circle"></i> Let's Create</a>
                        <!-- The Modal -->
                        <div class="modal" id="createWish">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Your Wish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <span id="success_message"></span>
                                        <form class="wishlist-form" method="post" id="registry_form">
                                            <div class="row">
                                                <div class="col-11">
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
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="select a clothing category that interest you—this will subsequently refine the options in the following dropdown menu"></i>
                                                </div>
                                            </div>
                                            <span id="categorys" class="text-danger text-center"></span>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Type</label>
                                                        <select class="select-type form-control otherAccessories" id="type" name="type">
                                                            <option value="">Select Type</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="select a type that fits your appearance"></i>
                                                </div>
                                            </div>
                                            <span id="types" class="text-danger text-center"></span>
                                            <div class="row otherAccessories_inputbox d-none">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Other</label>
                                                        <input type="text" class="form-control" id="accessories" value=""
                                                            name="personalize" placeholder="Accessories">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                                        title="Accessories"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Occasion</label>
                                                        <input type="text" class="form-control" id="occasion" value=""
                                                            name="occasion" placeholder="Occasion">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Occasion"></i>
                                                </div>
                                            </div>
                                            <span id="occasions" class="text-danger text-center"></span>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Brand</label>
                                                        <input type="text" class="form-control" id="brand" value=""
                                                            name="brand" placeholder="Brand">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="list a brand that appeals to you"></i>
                                                </div>
                                            </div>
                                            <span id="brands" class="text-danger text-center"></span>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Style</label>
                                                        <input type="text" class="form-control" id="style" value=""
                                                            name="style" placeholder="Style">
                                                    </div>
                                                    <span id="styles" class="text-danger text-center"></span>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="list a style that suits your taste"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Size</label>
                                                        <input type="text" class="form-control" id="size" value=""
                                                            name="size" placeholder="Size">
                                                    </div>
                                                    <span id="sizes" class="text-danger text-center"></span>
                                                    
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="provide an exact size that fits you just right"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Color</label>
                                                        <input type="text" class="form-control" id="color" value=""
                                                            name="color" placeholder="Color">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="pick a color that reflects your individuality"></i>
                                                </div>
                                            </div>
                                            <span id="colors" class="text-danger text-center"></span>
                                          
                                            <div class="form-group text-center">
                                                <input type="submit" name="contact" id="registry_contact"
                                                    class="theme-btn-submit yellow-bg" value="Create List">
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
                    <div class="row">
                    <div class="col-md-7"></div>
                        <div class="col-md-5">
                            <select class="form-control form-select form-select-lg mb-3 filter_by_cat_registry"
                                aria-label="Default select example">
                                <option value="">Filter By Category</option>
                                <?php if (!empty($categories)) {
									foreach ($categories as $cat) {
								?>
                                <option <?php echo (!empty($get['cat']) && $get['cat']==$cat->id)?"selected":'' ?>
                                    value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                <?php }
								} ?>
                            </select>
                        </div>
                    </div>
                    <div class="added-wishes">
                        <span id="success_message_delete"></span>
                        <div class="row">
                            <?php
							$i = 0;
							foreach ($wishInfo as $wishInfos) {
								$i = $i + 1;
								$CI = &get_instance();
								$CI->load->model('Favoritewish_Model');
								$getObjssubCat = $CI->Favoritewish_Model->getCategoryById($wishInfos->type);
								$subCatName = !empty($getObjssubCat->name) ? $getObjssubCat->name : '';
							?>
                            <div class="col-lg-6">
                                <div class="card bg-gradient-1 border-0 mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-1"><strong><?php print_r($wishInfos->occasion); ?> - </strong>
                                            <?php print_r($wishInfos->cat_name); ?></h5>
                                        <p class="mb-1 font-weight-semibold font-italic">Details - </p>
                                        <ul class="list-unstyled font-italic text-capitalize mb-0">
                                            <?php if (!empty($subCatName)) { ?>
                                            <li>Type - <?php echo $subCatName; ?></li>
                                            <?php } ?>
                                            <?php  if(!empty($wishInfos->other_accessories)){  ?>
                                            <li>Other - <?php print_r($wishInfos->other_accessories); ?></li>
                                            <?php  } ?>
                                            <li>Brand - <?php print_r($wishInfos->brand); ?></li>
                                            <li>Occasion - <?php print_r($wishInfos->occasion); ?></li>
                                            <li>Color - <?php print_r($wishInfos->color); ?></li>
                                            <li>Size - <?php print_r($wishInfos->size); ?></li>
                                            <li>Style - <?php print_r($wishInfos->style); ?></li>
                                            <li>Created on -
                                                <!-- <?php print_r(date("D d M Y",strtotime($wishInfos->created_on))); ?> -->
                                                <?php print_r(date("m/d/Y",strtotime($wishInfos->created_on))); ?>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="showRegistryCategory"
                                                data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal"
                                                data-target="#editRegistry">Edit</a>
                                            <a href="#" class="wishDeleteModel" id="Registry_delete"
                                                data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal"
                                                data-target="#removeRegistryAccount">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete conformation model start -->
            <div class="modal" id="removeRegistryAccount">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Remove your Wish</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <p>
                                Are you sure you want to delete your Wish ?
                            </p>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success registryDeleteId" data-user-id="account"
                                data-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete conformation model end -->
            <!-- Edit Model Start -->
            <div class="modal" id="editRegistry">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit your Wish</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <span id="success_message_registry_massage"></span>
                            <form class="wishlist-form" method="post" id="">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Category</label>
                                            <select class="select-category form-control category-registry-edit"
                                                id="category_registry" name="category">
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Category"></i>
                                    </div>
                                </div>
                                <span id="categorys_registry" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Type</label>
                                            <select class="select-type form-control type-registry-edit accessoriesEdit" id="type"
                                                name="type_registry">
                                                <option value="">Select Type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Type"></i>
                                    </div>
                                </div>
                                <span id="type_registry" class="text-danger text-center"></span>
                                <div class="row otherAccessories_edit d-none">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Other</label>
                                            <input type="text" class="form-control accessories_edit accessoriesPlaceHolderEdit" id="accessoriesEdit" value=""
                                                name="personalize" placeholder="Accessories">
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Accessories"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Occasion</label>
                                            <input type="text" class="form-control occasion-registry-edit" value=""
                                                name="occasion_registry" placeholder="Occasion">
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Occasion"></i>
                                    </div>
                                </div>
                                <span id="brand_registry" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Brand</label>
                                            <input type="text" class="form-control brand-registry-edit" value=""
                                                name="brand_registry" placeholder="Brand">
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Brand"></i>
                                    </div>
                                </div>
                                <span id="occasions_registry" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Color</label>
                                            <input type="text" class="form-control color-registry-edit" value=""
                                                name="color_registry" placeholder="color">
                                        </div>
                                        
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Color"></i>
                                    </div>
                                </div>
                                <span id="colors_registry" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Size</label>
                                            <input type="text" class="form-control size-registry-edit" value=""
                                                name="size_registry" placeholder="Size">
                                        </div>
                                        
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Size"></i>
                                    </div>
                                </div>
                                <span id="sizes_registry" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Style</label>
                                            <input type="text" class="form-control style-registry-edit" value=""
                                                name="style_registry" placeholder="Style">
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Style"></i>
                                    </div>
                                </div>
                                <span id="styles_registry" class="text-danger text-center"></span>
                                <input type="hidden" class="registry_id">
                                <div class="form-group text-center">
                                    <input type="button" name="contact" id="registry_contact_update"
                                        class="theme-btn-submit yellow-bg" value="Update List">
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
            <!-- Edit Model End -->
            <div class="col-lg-3">
                <div class="profile-sidebar right">
                    <div class="sidebar-about sidebar-widget sidebar-bg">
                        <h3>Friends</h3>
                        <div class="friends-list mb-4">
                            <?php
							if (!empty($frienddetails)) {
								foreach ($frienddetails as $friend) { ?>
                            <div class="media align-items-center">
                            <?php
                                $profileImage = $friend->profile_photo;
                                if (file_exists(FCPATH . 'assets/uploads/profile_photo/' . $friend->profile_photo) && !empty($friend->profile_photo)) {  ?>
                                <img src="<?php echo base_url() . 'assets/uploads/profile_photo/' . $profileImage; ?>" alt="" class="user-thumb img-thumbnail img-fluid">
                                <?php } else {  ?>
                                    <img src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt="" class="user-thumb img-thumbnail img-fluid">
                                <?php  } ?>
                                <!-- <img src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt="" class="img-fluid"> -->
                                <div class="media-body">
                                    <h5><a
                                            href="<?php echo base_url(); ?>user/friends/details/<?php echo $friend->id; ?>"><?php echo $friend->first_name; ?></a>
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