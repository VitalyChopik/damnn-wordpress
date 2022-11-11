<?php get_header();?>
	<div class="wrapper">
		<div class="container">
			<div class="wrapper__block">
				<?php get_sidebar();?>
				<main class="main">
					<div class="about content__block wow fadeInLeft" data-wow-duration="3s" data-wow-delay="0.5s">

						<div class="about__block team__block">
							<div class="tabs">
								<div class="text">
									<h1 class="about__title page__title wow fadeInUp " data-wow-duration="2s" data-wow-delay="1s"><?php the_field('page_title')?></h1>
									<p class="about__subtitle page__subtitle wow fadeInUp " data-wow-duration="2s" data-wow-delay="1.2s">
									<?php the_field('page_subtitle')?>
									</p>
								</div>
								<?php
							$terms = get_terms( 
								array(
									'hide_empty'  => 1,
									'orderby'     => 'ID',
									'order'       => 'ASC',
									'taxonomy'    => 'position',
									'pad_counts'  => 1
								) );

							if( $terms && ! is_wp_error( $terms ) ){
								echo '<ul class="tab-header">';
								$i=0;
								foreach( $terms as $term ){
									$i++;
									$cnt++; // если пост есть, увеличиваем на 1 
									switch($cnt) {
										case '1': 
									?>
										<?php if($term->count > 1){
											?>
											<li class="tab-header__item  js-tab-trigger active <?php if(get_field('blue', 'term_'.$term->term_id.'')){echo "blue";}  ?> first" data-tab="<?php echo $i?>">
											<span class="title"><?php echo esc_html( $term->name ) ?></span>
											<span class="count"><?php echo $term->count?></span>
											</li>
											<?php
										} else {
											?>
											<li class="tab-header__item js-tab-trigger active <?php if(get_field('blue', 'term_'.$term->term_id.'')){echo "blue";}  ?> first" data-tab="<?php echo $i?>">
												<span class="title"><?php echo esc_html( $term->name ) ?></span>
											</li>
											<?php
										}?>
					
									
									<?php 
									break;
									default: ?>
										<?php if($term->count > 1){
											?>
											<li class="tab-header__item js-tab-trigger <?php if(get_field('blue', 'term_'.$term->term_id.'')){echo "blue";}  ?>" data-tab="<?php echo $i?>">
											<span class="title"><?php echo esc_html( $term->name ) ?></span>
											<span class="count"><?php echo $term->count?></span>
											</li>
											<?php
										} else {
											?>
											<li class="tab-header__item js-tab-trigger <?php if(get_field('blue', 'term_'.$term->term_id.'')){echo "blue";}  ?>" data-tab="<?php echo $i?>">
												<span class="title"><?php echo esc_html( $term->name ) ?></span>
											</li>
											<?php
										}?>
									<?php
										break;
									}



									?>

									<?php

								}
								echo '</ul>';
							}
							?>
							</div>

							
							 <?php
								$terms = get_terms( 
									array(
										'hide_empty'  => 1,
										'orderby'     => 'ID',
										'order'       => 'ASC',
										'taxonomy'    => 'position',
										'pad_counts'  => 1
									) );

								if( $terms && ! is_wp_error( $terms ) ){
									echo '<ul class="tab-content">';
									$i=0;
									foreach( $terms as $term ){
										$i++;
										$cnt2++; // если пост есть, увеличиваем на 1 
										switch($cnt2) {
											case 1:
										?>
										<?php if($term->count > 1){
											?>
											<li class="tab-content__item js-tab-content team__slider  active first" data-tab="<?php echo $i?>">
											<?php
												// задаем нужные нам критерии выборки данных из БД
												$args = array(
													'posts_per_page' => -1,
													'post_type' => 'team',
													'order' => 'ASC',
													'orderby' => 'date',
													'tax_query' => [
														'relation' => 'OR',
														[
															'taxonomy' => 'position',
															'field' => 'slug',
															'terms' => $term->slug
														]
													]

												);

												$query = new WP_Query( $args );
												// Цикл
												if ( $query->have_posts() ) {
													?><?php
													while ( $query->have_posts() ) {
														$query->the_post();
														?>
														<div class="box">
															<?php
															$image = get_field('image');
															?>
															<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
															<div class="text">
																<span class="name"><?php the_title();?></span>
																<span class="position"><?php the_field('position')?></span>
															</div>
														</div>
														<?php
													}
													?>
												<?php
												}
											
												else {
													// Постов не найдено
												}

												// Возвращаем оригинальные данные поста. Сбрасываем $post.
												wp_reset_postdata();
											?>
											</li>
											<?php
										} else {
											?>
											<li class="tab-content__item js-tab-content  active first" data-tab="<?php echo $i?>">
												<?php
													// задаем нужные нам критерии выборки данных из БД
													$args = array(
														'posts_per_page' => -1,
														'post_type' => 'team',
														'order' => 'ASC',
														'orderby' => 'date',
														'tax_query' => [
															'relation' => 'OR',
															[
																'taxonomy' => 'position',
																'field' => 'slug',
																'terms' => $term->slug
															]
														]

													);

													$query = new WP_Query( $args );
													// Цикл
													if ( $query->have_posts() ) {
														?><?php
														while ( $query->have_posts() ) {
															$query->the_post();
															?>
															<div class="box">
																<?php
																$image = get_field('image');
																?>
																<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
																<div class="text">
																	<span class="name"><?php the_title();?></span>
																	<span class="position"><?php the_field('position')?></span>
																</div>
															</div>
															<?php
														}
														?>
													<?php
													}
												
													else {
														// Постов не найдено
													}

													// Возвращаем оригинальные данные поста. Сбрасываем $post.
													wp_reset_postdata();
												?>
											</li>
											<?php
										}?>
										<?php 
										break;
										default: ?>
											<?php if($term->count > 1){
											?>
											<li class="tab-content__item js-tab-content  team__slider " data-tab="<?php echo $i?>">
											<?php
												// задаем нужные нам критерии выборки данных из БД
												$args = array(
													'posts_per_page' => -1,
													'post_type' => 'team',
													'order' => 'ASC',
													'orderby' => 'date',
													'tax_query' => [
														'relation' => 'OR',
														[
															'taxonomy' => 'position',
															'field' => 'slug',
															'terms' => $term->slug
														]
													]

												);

												$query = new WP_Query( $args );
												// Цикл
												if ( $query->have_posts() ) {
													?><?php
													while ( $query->have_posts() ) {
														$query->the_post();
														?>
														<?php if(get_field('careers_q')){
																?>
																<div class="box">
																		<?php
																		$image = get_field('image');
																		?>
																		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
																		<div class="text">
																			<span class="name"><?php the_title();?></span>
																			<span class="position"><?php the_field('position')?></span>
																		</div>
																	</div>
																<?php
																} else {
																	?>
																	<div class="box">
																		<?php
																		$image = get_field('image');
																		?>
																		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
																		<div class="text">
																			<span class="name"><?php the_title();?></span>
																			<span class="position"><?php the_field('position')?></span>
																		</div>
																	</div>
																	<?php
																}
															?>
														<?php
													}
													?>
												<?php
												}
											
												else {
													// Постов не найдено
												}

												// Возвращаем оригинальные данные поста. Сбрасываем $post.
												wp_reset_postdata();
											?>
											</li>
											<?php
										} else {
											?>
											<li class="tab-content__item js-tab-content" data-tab="<?php echo $i?>">
												<?php
													// задаем нужные нам критерии выборки данных из БД
													$args = array(
														'posts_per_page' => -1,
														'post_type' => 'team',
														'order' => 'ASC',
														'orderby' => 'date',
														'tax_query' => [
															'relation' => 'OR',
															[
																'taxonomy' => 'position',
																'field' => 'slug',
																'terms' => $term->slug
															]
														]

													);

													$query = new WP_Query( $args );
													// Цикл
													if ( $query->have_posts() ) {
														?><?php
														while ( $query->have_posts() ) {
															$query->the_post();
															?>
															<?php if(get_field('careers_q')){
																?>
																<div class="box ">
																<?php
																		$image = get_field('image');
																		?>
																		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

																	<div class="careers__box">
																																			<?php
																			if( have_rows('careers') ):
																				while( have_rows('careers') ) : the_row();?>
																					<div class="careers__header">
																						<span class="open">Open position</span>
																						<span class="location"><?php the_sub_field('city');?></span>
																					</div>
																					<span class="vacancy">
																						<?php the_field('position');?>
																					</span>
																					<a href="<?php the_sub_field('job_link')?>" class="job_link">Read more</a>
																					<?php
																				endwhile;
																			endif;
																		?>
																	</div>
																
																</div>
																<?php
																} else {
																	?>
																	<div class="box">
																		<?php
																		$image = get_field('image');
																		?>
																		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
																		<div class="text">
																			<span class="name"><?php the_title();?></span>
																			<span class="position"><?php the_field('position')?></span>
																		</div>
																	</div>
																	<?php
																}
															?>
												
															<?php
														}
														?>
													<?php
													}
												
													else {
														// Постов не найдено
													}

													// Возвращаем оригинальные данные поста. Сбрасываем $post.
													wp_reset_postdata();
												?>
											</li>
											<?php
										}?>
										<?php
											break;
										}
										?>

										<?php

									}
									echo '</ul>';
								}
								?>

						</div>
						<div class="partners">
							<h2 class="partners__title">our <span>meta partners</span></h2>
							<div class="partners__wrapper">
							<div class="partners__blocks">
								<div class="partners__block">
									<?php
									if( have_rows('partners') ):
										while( have_rows('partners') ) : the_row();
										?>
											<a href="<?php the_sub_field('link')?>" class="partners__box">
												<?php $image = get_sub_field('image')?>
												<img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
											</a>
										<?php
										endwhile;
									endif;
									?>
							
								</div>
								<div class="partners__block" aria-hidden="true">
								<?php
									if( have_rows('partners') ):
										while( have_rows('partners') ) : the_row();
										?>
											<a href="<?php the_sub_field('link')?>" class="partners__box">
												<?php $image = get_sub_field('image')?>
												<img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
											</a>
										<?php
										endwhile;
									endif;
								?>
								</div>
							</div>
							<div class="partners__blocks mobile-js">
								<div class="partners__block reverce">
									<?php
									if( have_rows('partners') ):
										while( have_rows('partners') ) : the_row();
										?>
											<a href="<?php the_sub_field('link')?>" class="partners__box">
												<?php $image = get_sub_field('image')?>
												<img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
											</a>
										<?php
										endwhile;
									endif;
									?>
							
								</div>
								<div class="partners__block reverce" aria-hidden="true">
								<?php
									if( have_rows('partners') ):
										while( have_rows('partners') ) : the_row();
										?>
											<a href="<?php the_sub_field('link')?>" class="partners__box">
												<?php $image = get_sub_field('image')?>
												<img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
											</a>
										<?php
										endwhile;
									endif;
								?>
								</div>
							</div>
							</div>

						</div>
					</div>
				</main>
			</div>
		</div>
	</div>

<?php get_footer();?>
