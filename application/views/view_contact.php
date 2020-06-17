<?php
$CI =& get_instance();
if(!$CI->session->userdata('language')) {
    $CI->session->set_userdata(array('language' => 'en'));
}
$idiom = $CI->session->userdata('language');
$CI->lang->load('content', $idiom);
?>

<!--Banner Start-->
<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_contact']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1><?php echo $page_contact['contact_heading']; ?></h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Contact Start-->
<div class="contact-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4><?php echo $CI->lang->line('ADDRESS'); ?></h4>
                        <p>
                            <?php echo nl2br($page_contact['contact_address']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4><?php echo $CI->lang->line('PHONE_NUMBER'); ?></h4>
                        <p>
                            <?php echo nl2br($page_contact['contact_phone']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4><?php echo $CI->lang->line('EMAIL_ADDRESS'); ?></h4>
                        <p>
                            <?php echo nl2br($page_contact['contact_email']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="contact-form headstyle pt_90">
                    <h4><?php echo $CI->lang->line('CONTACT_FORM'); ?></h4>
                    <?php echo form_open(base_url().'contact/send_email',array('class' => '')); ?>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="<?php echo $CI->lang->line('NAME'); ?>" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="<?php echo $CI->lang->line('PHONE_NUMBER'); ?>" name="phone" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="<?php echo $CI->lang->line('EMAIL_ADDRESS'); ?>" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="<?php echo $CI->lang->line('SUBJECT'); ?>" name="subject" required>
                            </div>
                            <div class="form-group col-12">
                                <textarea class="form-control" placeholder="<?php echo $CI->lang->line('MESSAGE'); ?>" name="message" required></textarea>
                            </div>
                            <div class="form-group col-12">
                                <button type="submit" class="btn" name="form_contact"><?php echo $CI->lang->line('SEND_MESSAGE'); ?></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Contact End-->

<!--Map Start-->
<div class="map-area">
    <?php echo $page_contact['contact_map']; ?>
</div>
<!--Map End-->