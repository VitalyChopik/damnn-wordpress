<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <style>

    .wow {
  visibility: hidden;
}
</style>

</head>
<body <?php body_class(); ?> >


<?php 

if( is_front_page() ){
} else {
    ?>
    <header class="header">
        <div class="container">
            <div class="navbar">
                <div class="brand">
                    <lottie-player
                        autoplay
                        loop
                        mode="normal"
                        src="<?php echo get_template_directory_uri()?>/logo.json"
                        class="lottie-logo"
                    >
                    </lottie-player>
                </div>
                <a href="<?php echo esc_js('javascript:history.go(-1)'); ?>" class="back"><img src="<?php echo get_template_directory_uri()?>/img/arrow-back.svg" alt=""><span>Back</span></a>
                <div class="hamburger">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                </div> 
            </div>
        </div>
    </header>
    <?php
}
