<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <div class="col-lg-3">
                <!-- <div class="profile-sidebar right">
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
                </div> -->
            </div>
            <div class="col-lg-6">
                <div class="profile-content-inner">
                <div class="create-wish d-block d-md-flex mb-4">
                    <h3 class="mb-3 mb-md-0 d-inline-block">Have a wish in mind?</h3>
                        <a href="#" class="theme-btn yellow-bg" data-toggle="modal" data-target="#createFamilyWish"><i
                                class="fas fa-plus-circle"></i> Let's Create</a>
                        <!-- The Modal -->
                        <div class="modal" id="createFamilyWish">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Your Family Wish</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <span id="success_message"></span>
                                        <form class="wishlist-form" method="post" id="familyMember_form">
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Family Member</label>
                                                        <select class="form-control" id="familyMamber"
                                                            name="family-mamber">
                                                            <option value="">Select Family Member</option>
                                                            <option value="First Born">First Born</option>
                                                            <option value="Second Born">Second Born</option>
                                                            <option value="Third Born">Third Born</option>
                                                            <option value="Fourth Born">Fourth Born</option>
                                                            <option value="Fifth Born">Fifth Born</option>
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
                                                            name="occasion" placeholder="(Or nickname/initials)">
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
                                                        <input type="date" class="form-control" min='1899-01-01' max='2000-13-13' id="childBirthday" value=""
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
                                                        <select class="select-type form-control otherAccessories" id="familyType" name="family-type">
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
                                            <div class="row otherAccessories_inputbox d-none">
                                                <div class="col-11">
                                                    <div class="form-group form-inline">
                                                        <label for="email" class="mr-sm-2">Accessories</label>
                                                        <input type="text" class="form-control" id="accessories" value=""
                                                            name="accessories" placeholder="Accessories">
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
                                                            name="familyColor" placeholder="Color">
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
                                <option value="">Filter By Family Member</option>
                                <option value="First Born" <?php echo (!empty($get['family']) && $get['family']=='First Born')?"selected":'' ?>>First Born</option>
                                <option value="Second Born" <?php echo (!empty($get['family']) && $get['family']=='Second Born')?"selected":'' ?>>Second Born</option>
                                <option value="Third Born" <?php echo (!empty($get['family']) && $get['family']=='Third Born')?"selected":'' ?>>Third Born</option>
                                <option value="Forth Born" <?php echo (!empty($get['family']) && $get['family']=='Forth Born')?"selected":'' ?>>Forth Born</option>
                                <option value="Fifth Born" <?php echo (!empty($get['family']) && $get['family']=='Fifth Born')?"selected":'' ?>>Fifth Born</option>
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
                                        <p class="mb-1 font-weight-semibold font-italic">For -<?php print_r($wishInfos->child_name); ?> </p>
                                        <!-- <p class="mb-1 font-weight-semibold font-italic">Wish -<?php print_r($wishInfos->cat_name); ?> </p> -->
                                        <ul class="list-unstyled font-italic text-capitalize mb-0">
                                            <li>Family Member - <?php print_r($wishInfos->family_member); ?></li>
                                            <li>Child’s birthday - <?php print_r($wishInfos->child_birthday); ?></li> 
                                            <li>Sex - <?php print_r($wishInfos->sex); ?></li>
                                            <li>Wish - <?php print_r($wishInfos->cat_name); ?></li>
                                            <li>Type - <?php print_r($subCatName); ?></li>
                                            <?php  if(!empty($wishInfos->other_accessories)){   ?> 
                                            <li>Other Accessories - <?php print_r($wishInfos->other_accessories); ?></li>
                                            <?php  }  ?>
                                            <li>Brand - <?php print_r($wishInfos->brand); ?></li>
                                            <li>Color  - <?php print_r($wishInfos->color); ?></li>
                                            <li>Size  - <?php print_r($wishInfos->size); ?></li>
                                            <li>Style  - <?php print_r($wishInfos->style); ?></li>  
                                            <!-- <li>Created On  - <?php print_r(date("Y-m-d",strtotime($wishInfos->created_on))); ?></li> -->
                                            <li>Created On  - <?php print_r(date("m/d/Y",strtotime($wishInfos->created_on))); ?></li>
                                        </ul>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="showFamilyWishesCategory"
                                                data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal"
                                                data-target="#editFimalyWishes">Edit</a>
                                            <a href="#" class="wishDeleteModel" id="familyWish_delete"
                                                data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal"
                                                data-target="#removeFamilyWish">Delete</a>
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
            <div class="modal" id="removeFamilyWish">
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
                            <button type="button" class="btn btn-success familyWishDeleteId" data-user-id="account"
                                data-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete conformation model end -->
            <!-- Edit Model Start -->
            <div class="modal" id="editFimalyWishes">
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
                                        <label for="email" class="mr-sm-2">Family Member</label>
                                        <select class="form-control family-member-edit" id="familyMamber"
                                            name="family-mamber">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1 pl-0 pt-2">
                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                        data-placement="top" title="Family Member"></i>
                                </div>
                            </div> 
                            <span id="familyMember" class="text-danger text-center"></span> 
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group form-inline">
                                        <label for="email" class="mr-sm-2">Child’s Name</label>
                                        <input type="text" class="form-control family-childname-edit" id="childName" value=""
                                            name="occasion" placeholder="(Or nickname/initials)">
                                    </div>
                                </div>
                                <div class="col-1 pl-0 pt-2">
                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                        data-placement="top" title="Child’s Name"></i>
                                </div>
                            </div>
                            <span id="childname" class="text-danger text-center"></span> 
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group form-inline">
                                        <label for="email" class="mr-sm-2">Child’s Birthday</label>
                                        <input type="date" class="form-control family-child-birthday-edit" min='1899-01-01' max='2000-13-13' id="childBirthdayEdit" value=""
                                            name="child-birthday" placeholder="Child’s Birthday:">
                                    </div>
                                </div>
                                <div class="col-1 pl-0 pt-2">
                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                        data-placement="top" title="Child’s Birthday:"></i>
                                </div>
                            </div>
                            <span id="birthday" class="text-danger text-center"></span> 
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group form-inline">
                                        <label for="email" class="mr-sm-2">Sex</label>
                                        <select class="select-category form-control family-wish-sex" id="sex"
                                            name="sex">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1 pl-0 pt-2">
                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                        data-placement="top" title="Sex"></i>
                                </div>
                            </div> 
                            <span id="editSex" class="text-danger text-center"></span> 
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Category</label>
                                            <select class="select-category form-control category-familywish-edit"
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
                                <span id="categoryFamily" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Type</label>
                                            <select class="select-type form-control type-familywish-edit accessoriesEdit" id="type"
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
                                <span id="typeeee" class="text-danger text-center"></span>
                                <div class="row otherAccessories_edit d-none">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Accessories</label>
                                            <input type="text" class="form-control accessories_edit accessoriesPlaceHolderEdit" id="accessoriesEdit" value=""
                                                name="accessories" placeholder="Accessories">
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
                                            <label for="email" class="mr-sm-2">Brand</label>
                                            <input type="text" class="form-control brand-familywish-edit" value=""
                                                name="brand_registry" placeholder="Brand">
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Brand"></i>
                                    </div>
                                </div>
                                <span id="familyBranddd" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Color</label>
                                            <input type="text" class="form-control color-familywish-edit" value=""
                                                name="color_registry" placeholder="color">
                                        </div>
                                        
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Color"></i>
                                    </div>
                                </div>
                                <span id="familyColorrr" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Size</label>
                                            <input type="text" class="form-control size-familywish-edit" value=""
                                                name="size_registry" placeholder="Size">
                                        </div>
                                        
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Size"></i>
                                    </div>
                                </div>
                                <span id="familySizeee" class="text-danger text-center"></span>
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group form-inline">
                                            <label for="email" class="mr-sm-2">Style</label>
                                            <input type="text" class="form-control style-familywish-edit" value=""
                                                name="style_registry" placeholder="Style">
                                        </div>
                                    </div>
                                    <div class="col-1 pl-0 pt-2">
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Style"></i>
                                    </div>
                                </div>
                                <span id="familyStyleee" class="text-danger text-center"></span>
                                <input type="hidden" class="familywish_id">
                                <div class="form-group text-center">
                                    <input type="button" name="contact" id="familyWishUpdate"
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