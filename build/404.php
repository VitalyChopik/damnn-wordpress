<?php get_header();?>
	<div class="wrapper">
		<div class="container">
			<div class="wrapper__block">
                <?php get_sidebar();?>
				<main class="main">
					<div class="error content__block wow fadeInLeft" data-wow-duration="3s" data-wow-delay="0.5s">
                           <div class="block__text">
                                <h1 class="error__title">404</h1>
                                <h2 class="error__subtitle"><span>no worries,</span>Gary’s looking for the page</h2>
                           </div>
                           <div class="block__img">
                                <img src="<?php echo get_template_directory_uri()?>/img/gary.png" alt="">
                           </div>
					</div>
				</main>
			</div>
		</div>
	</div>

<?php get_footer();?>