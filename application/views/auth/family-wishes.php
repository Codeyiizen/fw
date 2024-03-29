<section class="fav-profile-section">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="profile-sidebar right">
                    <div class="sidebar-about sidebar-widget sidebar-bg">
                        <h3>Family Members</h3>
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
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="profile-content-inner">
                    <div class="create-wish mb-4">
                        <h3>Have a wish in mind ?</h3>
                        <a href="#" class="theme-btn yellow-bg" data-toggle="modal" data-target="#createFamilyWish"><i
                                class="fas fa-plus-circle"></i> Let's Create</a>
                        <!-- The Modal -->
                        <div class="modal" id="createFamilyWish">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create your Family Wish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <span id="success_message"></span>
                                        <form class="wishlist-form" method="post" id="familyMember_form">
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Family member</label>
                                                        <select class="form-control" id="familyMamber"
                                                            name="family-mamber">
                                                            <option value="">Select Family member</option>
                                                            <option value="1st born">1st born</option>
                                                            <option value="2nd born">2nd born</option>
                                                            <option value="3rd born">3rd born</option>
                                                            <option value="4th born">4th born</option>
                                                            <option value="5th born">5th born</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Family member"></i>
                                                </div>
                                           </div> 
                                           <span id="family_member" class="text-danger text-center"></span> 
                                           <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Child’s Name</label>
                                                        <input type="text" class="form-control" id="childName" value=""
                                                            name="occasion" placeholder="(name, nicknames or initials)">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Child’s Name"></i>
                                                </div>
                                            </div>
                                            <span id="child_name" class="text-danger text-center"></span> 
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Child’s Birthday</label>
                                                        <input type="date" class="form-control" id="childBirthday" value=""
                                                            name="child-birthday" placeholder="Child’s Birthday:">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Child’s Birthday:"></i>
                                                </div>
                                            </div>
                                            <span id="child_birthday" class="text-danger text-center"></span> 
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Sex</label>
                                                        <select class="select-category form-control" id="sex"
                                                            name="sex">
                                                            <option value="">Select Sex</option>
                                                            <option value="male">male</option>
                                                            <option value="female">female</option>
                                                            <option value="not applicable">not applicable</option>
                                                            <option value="prefer not to say">prefer not to say</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Sex"></i>
                                                </div>
                                           </div> 
                                           <span id="sexsss" class="text-danger text-center"></span> 
                                             <div  class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Category</label>
                                                        <select class="select-category form-control" id="familyCategory"
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
                                            <span id="cat_id" class="text-danger text-center"></span>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Type</label>
                                                        <select class="select-type form-control" id="familyType" name="family-type">
                                                            <option value="">Select Type</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="select a type that fits your appearance"></i>
                                                </div>
                                            </div>
                                            <span id="type_id" class="text-danger text-center"></span>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Brand</label>
                                                        <input type="text" class="form-control" id="familyBrand" value=""
                                                            name="brand" placeholder="Brand">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="list a brand that appeals to you"></i>
                                                </div>
                                            </div>
                                            <span id="brand" class="text-danger text-center"></span>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Color</label>
                                                        <input type="text" class="form-control" id="familyColor" value=""
                                                            name="familyColor" placeholder="color">
                                                    </div>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="pick a color that reflects your individuality"></i>
                                                </div>
                                            </div>
                                            <span id="color" class="text-danger text-center"></span>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Size</label>
                                                        <input type="text" class="form-control" id="familySize" value=""
                                                            name="familySize" placeholder="Size">
                                                    </div>
                                                    <span id="size" class="text-danger text-center"></span>
                                                    
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="provide an exact size that fits you just right"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Style</label>
                                                        <input type="text" class="form-control" id="familyStyle" value=""
                                                            name="familyStyle" placeholder="Style">
                                                    </div>
                                                    <span id="style" class="text-danger text-center"></span>
                                                </div>
                                                <div class="col-1 pl-0 pt-2">
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top" title="list a style that suits your taste"></i>
                                                </div>
                                            </div>
                                          
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
                        <div class="col-6">
                            <select class="form-control form-select form-select-lg mb-3 filter_by_familymember_wish"
                                aria-label="Default select example">
                                <option value="">Filter by family member</option>
                                <?php if (!empty($allWishMember)) {
									foreach ($allWishMember as $wishMember) {
								?>
                                <option <?php echo (!empty($get['family']) && $get['family']==$wishMember->family_member)?"selected":'' ?>
                                    value="<?php echo $wishMember->family_member ?>"><?php echo $wishMember->family_member ?></option>
                                <?php }
								} ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control form-select form-select-lg mb-3 filter_by_cat_family_wish"
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
								$getObjssubCat = $CI->Favoritewish_Model->getCategoryById($wishInfos->type_id);
								$subCatName = !empty($getObjssubCat->name) ? $getObjssubCat->name : '';
							?>
                            <div class="col-lg-6">
                                <div class="card bg-gradient-1 border-0 mb-4">
                                    <div class="card-body">
                                        <!-- <h5 class="mb-1"><strong><?php print_r($wishInfos->occasion); ?> - </strong>
                                            <?php print_r($wishInfos->cat_name); ?></h5> -->
                                        <p class="mb-1 font-weight-semibold font-italic">Wish -<?php print_r($wishInfos->cat_name); ?> </p>
                                        <ul class="list-unstyled font-italic text-capitalize mb-0">
                                            <li>For - <?php print_r($subCatName); ?></li>
                                            <li>Family Member - <?php print_r($wishInfos->family_member); ?></li>
                                            <li>Water mark - <?php print_r($wishInfos->child_name); ?></li>
                                            <li>Child’s Birthday - <?php print_r($wishInfos->child_birthday); ?></li>
                                        </ul>
                                        <!-- <div class="d-flex justify-content-between">
                                            <a href="#" class="showRegistryCategory"
                                                data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal"
                                                data-target="#editRegistry">Edit</a>
                                            <a href="#" class="wishDeleteModel" id="Registry_delete"
                                                data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal"
                                                data-target="#removeRegistryAccount">Delete</a>
                                        </div> -->
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
                                            <select class="select-type form-control type-registry-edit" id="type"
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
                                <img src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt=""
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>