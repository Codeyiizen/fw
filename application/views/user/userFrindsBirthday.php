<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <?php $this->load->view('user/Common/userSider'); ?>
            <div class="col-lg-9">
                <div class="profile-content-inner">
                    <div class="added-wishes friends-birthday">
                        <h4>Today's Birthday</h4>
                        <div class="row mb-4">
                            <div class="col-md-9">
                                <div class="card rounded-lg">
                                    <div class="card-body">
                                        <div class="row align-items-center text-center text-md-left">
                                            <div class="col-md-6 pr-md-0 mb-4 mb-md-0">
                                                <h5 class="h5">Moo Boo's Birthday</h5>
                                                <p>Let's surprise her with a birthday gift.</p>
                                                <a href="#" class="theme-btn yellow-bg px-3 px-md-4 mr-3">Chek her Wish
                                                    Lisht</a>
                                            </div>
                                            <div class="col-md-6 pl-md-4 text-md-right">
                                                <img src="<?php echo base_url(); ?>assets/images/site-image/avatar4.png"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Month of July, 2024 </h4>
                        <div class="row mb-4">
                            <div class="col-md-4 pr-md-4">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <h5 class="h5">Vikrant Neb</h5>
                                        <p>July 16, Tue</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="h5">Phillip Aminoff</h5>
                                        <p>July 31, Wed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Month of August, 2024 </h4>
                        <div class="row mb-4">
                            <div class="col-md-4 pr-md-4">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <h5 class="h5">Mike Smith</h5>
                                        <p>August 1, Thur</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-4">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <h5 class="h5">Maria Carder</h5>
                                        <p>August 7, Wed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="h5">Angel Luben</h5>
                                        <p>August 1, Wednesday</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>