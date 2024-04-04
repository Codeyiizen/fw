<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>User List
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User List</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Favorite Country</th>
                                <th>Favorite Charity</th>
                                <th>Favoripublic Outfitwear</th>
                                <th>Favorite Sports Teams</th>
                                <th>Favorite Music</th>
                                <th>Dob</th>
                                <th>Gender</th>
                                <th>Profile Photo</th>
                                <th>User Status</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                      if (!empty($allUserList)){
                        foreach ($allUserList as $userList) { ?>
                            <tr>
                                <td><?php echo $userList->first_name; ?></td>
                                <td><?php echo $userList->last_name; ?></td>
                                <td><?php echo $userList->email; ?></td>
                                <td><?php echo $userList->contact_no; ?></td>
                                <td><?php echo $userList->address; ?></td>
                                <td><?php echo $userList->city; ?></td>
                                <td><?php echo $userList->state; ?></td>
                                <td><?php echo $userList->zip; ?></td>
                                <td><?php echo $userList->favorite_country; ?></td>
                                <td><?php echo $userList->favorite_charity; ?></td>
                                <td><?php echo $userList->favoripublic_outfit_wear; ?></td>
                                <td><?php echo $userList->favorite_sports_teams; ?></td>
                                <td><?php echo $userList->favorite_music; ?></td>
                                <td><?php echo $userList->dob; ?></td>
                                <td><?php echo $userList->gender; ?></td>
                               <?php $profilePhoto = $userList->profile_photo;
                                if(!empty($profilePhoto)){  ?>
                                    <td><img src="<?php echo base_url() . 'assets/uploads/profile_photo/' .$profilePhoto ?>" alt="" class="user-thumb img-thumbnail img-fluid"></td>
                              <?php  }else{  ?>
                               <td> <img src="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg" alt="" class="user-thumb img-thumbnail img-fluid"></td>
                                <?php  } ?>
                                <td><div class="toggle-switch">
                                    <input type="checkbox" class="switch_status userStatusChange switch-<?php echo $userList->id;   ?>" id="switch<?php echo $userList->id;  ?>" data-id="<?php echo $userList->id;  ?>" data-status="<?php echo $userList->user_active_status;  ?>" <?php if($userList->user_active_status == '1') echo 'checked="checked"'; ?>>
                                    <label for="switch<?php echo $userList->id;  ?>"></label></div>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                     <!-- <p><?php echo $links; ?></p> -->
                </div>
            </div>
        </div>
    </div>
</div>

