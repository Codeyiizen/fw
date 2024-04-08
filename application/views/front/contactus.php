<?php
    $data = html_entity_decode(!empty($contacttext->contact_content) ? $contacttext->contact_content :'');
    echo $data;
?>
        
        <div class="row">
            <div class="col-md-8 col-sm-12 offset-md-2">
                <div id="search-form">
							
                    <?php
                        if($this->session->flashdata('message'))
                        {
                        ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $this->session->flashdata('message');
                                ?>
                            </div>
                        <?php
                        }

                        if($this->session->flashdata('success_message'))
                        {
                        ?>
                            <div class="alert alert-success">
                                <?php
                                echo $this->session->flashdata('success_message');
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        $errors = $this->session->flashdata('errors');
                        if (!empty($errors)) {
                            echo '<div class="alert alert-danger">'.$errors.'</div>';
                        }
                        ?>
                        
                        <?php echo form_open('favoritewish/contactFormSubmission'); ?>
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="Fullname">Full Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="Mobile">Mobile</label>
                                        <input type="tel" name="phone" id="mobile"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="Subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-btn">
                                        <button type="submit" name="submit" class="theme-btn yellow-bg">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
            <div class="offset-md-1 col-md-4 col-sm-12">
                <div class="contactDetails">
                    <!-- <div class="contact-item">
                        <h5>Address</h5>
                        <p>1461 Irving Place, Arlington, Texas, 76011, United States</p>
                    </div> -->
                    <!-- <div class="contact-item">
                        <h5>Email Us</h5>
                        <p>operations@favoritewish.com</p>
                    </div> -->
                    <!-- <div class="contact-item">
                        <h5>Phone Number</h5>
                        <p>214-288-1335</p>
                    </div> -->
                </div>
                <div class="social-media mb-5">
                    <!-- <ul class="d-flex">
                        <li><a href="#" class=""><img src="<?php echo base_url(); ?>assets/images/x-social-media-round-icon.png" alt=""></a></li>
                        <li><a href="#" class=""><img src="<?php echo base_url(); ?>assets/images/ig-instagram-icon.png" alt=""></a></li>
                        <li><a href="#" class=""><img src="<?php echo base_url(); ?>assets/images/clubhouse-icon-1.png" alt=""></a></li>
                        <li><a href="#" class=""><img src="<?php echo base_url(); ?>assets/images/threads-app-icon.png" alt=""></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>