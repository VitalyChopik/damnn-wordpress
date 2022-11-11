<?php get_header('index');?>
	
   
    
	<div class="front-page hide">
		<div class="front-page__block d-flex">
			<div class="front-page__text">
				<div class="brand">
                <lottie-player
                    autoplay
                    loop
                    mode="normal"
                    src="<?php echo get_template_directory_uri()?>/logo.json"
                    class="lottie-logo"
                    >
                    </lottie-player>

					<h1 class="front-page__title">Creative production</h1>
				</div>
				<h2 class="front-page__subtitle">
                    <?php the_content();?>
                </h2>
				<a class="modal-btn" href="start-the-project/">start the project</a>
				<h4 class="front-page__footer">damnn!ⓒ <span class="copy-year"></span> <a href="mailto:<?php the_field('page-email', 'option')?>"><?php the_field('page-email', 'option')?></a></h4>
			</div>
			<div class="front-page__nav">
                    <?php wp_nav_menu( [
                        'theme_location'  => 'header_menu',
                        'container'       => 'ul', 
                        'menu_class'      => 'nav-list', 
                        'menu_id'         => false,
                        'echo'            => true,
                        'items_wrap'      => '<ul class="nav-list" id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                    ] ); ?>
                    <p class="nav-list"><span class="menu-item"><a class="modal-btn" href="start-the-project/">start the project</a></span></p>
				
			</div>
		</div>
	</div>
	<!-- <div class="modal-block">
    <div class="modal-wrapper"></div>
    <div class="modal-content">
        <div class="modal-form">
            <p class="temp">Calendly quiz form. it shouldn’t lead to caledly website, but should be opened right in the popup</p>
        </div>
        <div class="modal-close">
            <img src="img/close.svg" alt="">
            <span>close</span>
        </div>
    </div> -->
</div>
<?php get_footer();?>