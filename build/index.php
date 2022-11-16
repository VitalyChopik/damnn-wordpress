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
			</div>
			<div class="front-page__nav">
                    <?php if( have_rows('doge') ): ?>
                        <div class="front-page__doge">
                            <?php while( have_rows('doge') ): the_row(); ?>
                            <?php $image = get_sub_field('image');?>
                                <?php if(get_sub_field('image')){
                                            ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php } ?>
                        <p class="text"><?php the_sub_field('text')?></p>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                     <?php if( have_rows('background') ): ?>
                        <div class="front-page__bg">
                            <?php while( have_rows('background') ): the_row(); ?>
                                    <?php $video = get_sub_field('video_background');?>
                                    <?php $video__image = get_sub_field('post_background');?>
                                    <?php $image = get_sub_field('image_background');?>
                                    <?php if(get_sub_field('video_background')){
                                    ?>
                                        <video src="<?php echo $video['url']; ?>" poster="<?php echo $video__image['url']; ?>" autoplay loop muted></video>
                                        <?php
                                    }?>
                                        <?php if(get_sub_field('image_background')){
                                    ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        <?php
                                    }?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    
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
</div>
<?php get_footer();?>