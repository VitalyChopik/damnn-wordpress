<?php
/*
Template Name: Info (privacy policy, Term)
Template Post Type: page
*/
?>
<?php get_header();?>
	<div class="wrapper">
		<div class="container">
			<div class="wrapper__block">
                <?php get_sidebar();?>
				<main class="main">
					<div class="page-info content__block wow fadeInLeft" data-wow-duration="3s" data-wow-delay="0.5s">
                        <h1 class="page-info__title page__title  wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s"><?php the_title();?></h1>
                        <div class="content">
                            <?php the_content();?>
                        </div>
					</div>
				</main>
			</div>
		</div>
	</div>

<?php get_footer();?>