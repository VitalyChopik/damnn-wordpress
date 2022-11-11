
<?php get_header();?>
	<div class="wrapper">
		<div class="container">
			<div class="wrapper__block d-flex">
				<?php get_sidebar();?>
				<main class="main work-nooverflow">
					<div class="work content__block wow fadeInLeft" data-wow-duration="3s" >
						<h1 class="work__title page__title wow fadeInUp " data-wow-duration="2s" data-wow-delay="0.5s"><?php the_field('page_title')?></h1>
						<p class="work__subtitle page__subtitle wow fadeInUp " data-wow-duration="2s" data-wow-delay="1s">
						<?php the_field('page_subtitle')?>
						</p>
						<div class="work__block ">
						<?php		
							global $post;

							$query = new WP_Query( [
								'posts_per_page' => -1,
								'orderby'        => 'date',
							] );

							if ( $query->have_posts() ) {
								$cnt = 0;
								while ( $query->have_posts() ) {
									$query->the_post();
									
									$cnt++; // если пост есть, увеличиваем на 1 
									switch($cnt) {
										case '3': case '6': case '9': case '12': case '15': case '18': case '21':
									?>
										<div class="work__box w-100 wow fadeInUp " data-wow-duration="2s">
											<div class="cases__box work-style-<?php echo $cnt?>">
												<a href="<?php the_permalink()?>" class="work__box-bg">
														<?php $video = get_field('video_background');?>
														<?php $video_mobile = get_field('video_background-mobile');?>
														<?php $video__image = get_field('post_background');?>
														<?php if(get_field('video_background')){
														?>
															<video src="<?php echo $video['url']; ?>" poster="<?php echo $video__image['url']; ?>" autoplay loop muted class="desktop-js"></video>
															<video src="<?php echo $video_mobile['url']; ?>" poster="<?php echo $video__image['url']; ?>" autoplay loop muted class="mobile-js"></video>
															<?php
														}?>
														
												</a>
												<a href="<?php the_permalink()?>" class="work__box-hover">
												<?php if(get_field('post_image-hover')){
														?>
															<img src="<?php the_field('post_image-hover')?>" alt="" class="desktop-js work-desktop-style-<?php echo $cnt?>">
															
															<?php
														}?>
														<?php if(get_field('post_image-hover-mobile')){
															?>
															<img src="<?php the_field('post_image-hover-mobile')?>" alt="" class="mobile-js work-mobile-style-<?php echo $cnt?>">
															<?php
														}?>
												</a>
												<style>
													<?php if( have_rows('style') ): ?>
														<?php while( have_rows('style') ): the_row(); 
															?>
															.work-style-<?php echo $cnt ?> <?php the_sub_field('style_input')?>
														<?php endwhile; ?>
													<?php endif; ?>
													@media (max-width: 768px) {
														<?php if( have_rows('style-mobile') ): ?>
														<?php while( have_rows('style-mobile') ): the_row(); 
															?>
															.work-style-<?php echo $cnt ?> <?php the_sub_field('style_input')?>
														<?php endwhile; ?>
													<?php endif; ?>
													}
												</style>
												<div class="box-tags">
													<?php
													$categories = get_the_category();
													if( $categories ){
														foreach( $categories as $category ) {
															echo '<a  class="tag">' . $category->cat_name . '</a>';
														}
													}
													?>
												</div>
												<a href="#" class="case__title"><?php the_field('post_title')?></a>
											</div>
										</div>
									<?php 
									break;
									default: ?>
										<div class="work__box wow fadeInUp " data-wow-duration="2s">
											<div class="cases__box work-style-<?php echo $cnt?>">
												<a href="<?php the_permalink()?>" class="work__box-bg">
														<?php $video = get_field('video_background');?>
														<?php $video_mobile = get_field('video_background-mobile');?>
														<?php $video__image = get_field('post_background');?>
														<?php if(get_field('video_background')){
														?>
															<video src="<?php echo $video['url']; ?>" poster="<?php echo $video__image['url']; ?>" autoplay loop muted class="desktop-js"></video>
															<video src="<?php echo $video_mobile['url']; ?>" poster="<?php echo $video__image['url']; ?>" autoplay loop muted class="mobile-js"></video>
															<?php
														}?>
														
												</a>
												<a href="<?php the_permalink()?>" class="work__box-hover">
														<?php if(get_field('post_image-hover')){
														?>
															<img src="<?php the_field('post_image-hover')?>" alt="" class="desktop-js">
															
															<?php
														}?>
														<?php if(get_field('post_image-hover-mobile')){
															?>
															<img src="<?php the_field('post_image-hover-mobile')?>" alt="" class="mobile-js ">
															<?php
														}?>	
		
												</a>
												<style>
													<?php if( have_rows('style') ): ?>
														<?php while( have_rows('style') ): the_row(); 
															?>
															.work-style-<?php echo $cnt ?> <?php the_sub_field('style_input')?>
														<?php endwhile; ?>
													<?php endif; ?>
													@media (max-width: 768px) {
														<?php if( have_rows('style-mobile') ): ?>
														<?php while( have_rows('style-mobile') ): the_row(); 
															?>
															.work-style-<?php echo $cnt ?> <?php the_sub_field('style_input')?>
														<?php endwhile; ?>
													<?php endif; ?>
													}
												</style>
												<div class="box-tags">
													<?php
													$categories = get_the_category();
													if( $categories ){
														foreach( $categories as $category ) {
															echo '<a class="tag">' . $category->cat_name . '</a>';
														}
													}
													?>
												</div>
												<a href="#" class="case__title"><?php the_field('post_title')?></a>
											</div>
										</div>
									<?php
										break;
									}
								}
							} else {
								// Постов не найдено
							}
							wp_reset_postdata(); // Сбрасываем $post
						?>
						</div>
					</div>
				</main>
			</div>
		</div>
	</div>

<?php get_footer();?>