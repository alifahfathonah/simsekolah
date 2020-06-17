<?php
$CI =& get_instance();
if(!$CI->session->userdata('language')) {
    $CI->session->set_userdata(array('language' => 'en'));
}
$idiom = $CI->session->userdata('language');
$CI->lang->load('content', $idiom);
?>

<!--Banner Start-->
<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_verify_subscriber']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1><?php echo $CI->lang->line('SUBSCRIPTION_SUCCESS'); ?></h1>
        </div>
    </div>
</div>
<!--Banner End-->

<div class="contact-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-form" style="padding-top:50px;padding-bottom:50px;font-size:24px;color:green;text-align: center;">
                    <?php echo $CI->lang->line('SUBSCRIPTION_SUCCESS'); ?>
                </div>
            </div>            
        </div>
    </div>
</div>