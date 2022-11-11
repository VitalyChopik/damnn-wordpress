<?php
/*
Template Name: case 1
Template Post Type: post
*/

?>
<?php get_header();?>
	<div class="wrapper">
		<div class="container">
			<div class="wrapper__block d-flex">
				<?php get_sidebar();?>
				<main class="main single case-isoverse wow fadeInLeft" data-wow-duration="3s" data-wow-delay="0s">
                    <div class="single-header wow fadeInUp " data-wow-duration="2s">
                        <div class="img-bg">
                            <img src="<?php the_field('header-img')?>" alt="">
							
                        </div>
                        <div class="box-tags">
							<?php
								$categories = get_the_category();
								if( $categories ){
									foreach( $categories as $category ) {
										echo '<a href="' . get_category_link($category->term_id) . '" class="tag">' . $category->cat_name . '</a>';
									}
								}
							?>
                        </div>
                        <h1 class="single-title"><?php the_field('post_title')?></h1>
                    </div>
					<?php if( have_rows('single-content') ): ?>
							<?php while( have_rows('single-content') ): the_row(); ?>
								<!--  Если будут строчные элементы -->
								<?php if( have_rows('row') ): ?>
									<?php while( have_rows('row') ): the_row(); ?>
									 	<!-- Блок Info -->
										<?php if(get_sub_field('block-info')){
											if( have_rows('block-info') ): ?>
												 <div class="block-info d-flex">
												<?php while( have_rows('block-info') ): the_row(); ?>
													<div class="box">
														<h2 class="info__title"><?php the_sub_field('info_title')?></h2>
														<?php the_sub_field('info_text')?>
													</div>
												<?php endwhile; ?>
												</div>
											<?php endif; 
										}?>
										<!-- Блок Solution -->
										<?php
                                            if (get_sub_field('solution')){
                                                if( have_rows('solution') ): ?>
                                                    <div class="solution">
                                                    <?php while( have_rows('solution') ): the_row(); ?>
                                                    <h2 class="section__title"><?php the_sub_field('solution_title')?></h2>
                                                        <?php if( have_rows('solution_block') ): ?>
  
                                                                <?php while( have_rows('solution_block') ): the_row(); ?>
                                                                <div class="solution__block">
                                                                    <h3 class="block__title"><?php the_sub_field('block__title')?></h3>
                                                                    <!-- Блок левый/правый -->
                                                                    <?php if( have_rows('solution_select') ): ?>
                                                                        <?php while( have_rows('solution_select') ): the_row(); ?>
                                                                            <?php if( have_rows('box_leftright') ): ?>
                                                                                <div class="box-text d-flex">
                                                                                    <?php $cnt=0; while( have_rows('box_leftright') ): the_row(); ?>
                                                                                    <?php
                                                                                    $cnt++; // если пост есть, увеличиваем на 1 
                                                                                        switch($cnt) {
                                                                                            case '1':
                                                                                        ?>
                                                                                            <div class="left-box">
                                                                                                <?php the_sub_field('box_leftright-text')?>
                                                                                            </div>
                                                                                        <?php 
                                                                                        break;
                                                                                        default: ?>
                                                                                            <div class="right-box">
                                                                                                <?php the_sub_field('box_leftright-text')?>
                                                                                            </div>
                                                                                        <?php
                                                                                            break;
                                                                                    }?>
                                                                                    <?php endwhile; ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if( have_rows('tabs') ): ?>
                                                                                <div class="box-content tabs">
                                                                                    <div class="content">
                                                                                        <?php while( have_rows('tabs') ): the_row(); ?>
                                                                                            <!-- Кнопки -->
                                                                                            <?php if( have_rows('tabs_btn') ): ?>
                                                                                                <div class="box-btn box-sourse-1">
                                                                                                    <?php 
                                                                                                    $i=0;
                                                                                                    while( have_rows('tabs_btn') ): the_row(); ?>
                                                                                                        <?php
                                                                                                        $i++; // если пост есть, увеличиваем на 1 
                                                                                                            switch($i) {
                                                                                                                case '1':
                                                                                                            ?>
                                                                                                            <button class="active btn source source-<?php echo $i?>"><?php the_sub_field('tabs_btn_name') ?></button>
                                                                                                            <?php 
                                                                                                            break;
                                                                                                            default: ?>
                                                                                                            <button class="btn source source-<?php echo $i?>"><?php the_sub_field('tabs_btn_name') ?></button>
                                                                                                            <?php
                                                                                                                break;
                                                                                                        }?>
                                                                                                    <?php endwhile; ?>
                                                                                                    <?php $i=0; while( have_rows('tabs_btn') ): the_row(); ?>
                                                                                                        <?php
                                                                                                        $i++; // если пост есть, увеличиваем на 1 
                                                                                                      ?>
                                                                                                            <style>
                                                                                                                .single .solution .solution__block .box-content.tabs .content .box-sourse-<?php echo $i?> .btn {
                                                                                                                    color: <?php the_sub_field('color_text')?>;
                                                                                                                }
                                                                                                                .single .solution .solution__block .box-content.tabs .content .box-btn .source-<?php echo $i?>.active {
                                                                                                                    background: <?php the_sub_field('background_text')?>;
                                                                                                                    color: <?php the_sub_field('color_text')?>;
                                                                                                                    text-shadow: <?php the_sub_field('shadow_text')?>;
                                                                                                                }
                                                                                                                .single .solution .solution__block .box-content.tabs .content .box-sourse-<?php echo $i?>::before {
                                                                                                                    background: <?php the_sub_field('background_left_border')?>
                                                                                                                }
                                                                                                                .single .solution .solution__block .box-content.tabs .content .box-btn .source-<?php echo $i?>.active::after, .single .solution .solution__block .box-content.tabs .content .box-btn .source-<?php echo $i?>.active::before {
                                                                                                                    background:  <?php the_sub_field('background_text_border')?>
                                                                                                                }
                                                                                                            </style>
                                                                                                    <?php endwhile; ?>
                                                                                                    <script>
                                                                                                        (function ($) {
                                                                                                            $('.box-btn').on('click', '.btn', function() {
                                                                                                                $btn_count = $( this ).index();
                                                                                                                $btn_count_result = parseInt($btn_count) + parseInt(1);
                                                                                                                $('.single .solution .solution__block .box-content.tabs .content .box-btn').removeClass().addClass("box-btn").addClass("box-sourse-" + $btn_count_result);
                                                                                                            });
                                                                                                        })(jQuery);
                                                                                                    </script>
                                                                                                </div>



                                                                                            <?php endif; ?>     
                                                                                            <?php if( have_rows('tabs_content') ): ?>
                                                                                                    <?php 
                                                                                                    $i=0;
                                                                                                    while( have_rows('tabs_content') ): the_row(); $i++?>
                                                                                                        <div class="box-tab target target-<?php echo $i?>">
                                                                                                            <div class="img-bg"><img src="<?php the_sub_field('tabs_content_img-bg') ?>" alt=""></div>
                                                                                                            <div class="img-main"><img src="<?php the_sub_field('tabs_content_img-main') ?>" alt=""></div>
                                                                                                            <div class="text">
                                                                                                                <?php the_sub_field('tabs_content_text')?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php endwhile; ?>
                                                                                            <?php endif; ?>  
                                                                                        <?php endwhile; ?>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?> 
                                                                            <?php if( have_rows('slider') ): ?>
                                                                                <div class="box-content slider">
                                                                                    <?php while( have_rows('slider') ): the_row(); ?>
                                                                                        <div class="box-slide">
                                                                                            <img src="<?php the_sub_field('slider_img-desk')?>" alt="" class="img-desk">
                                                                                            <img src="<?php the_sub_field('slider_img-mob')?>" alt="" class="img-mob">
                                                                                        </div>
                                                                                    <?php endwhile; ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if( have_rows('slider_custom') ): ?>
                                                                                <div class="box-content slider slider-custom">
                                                                                    <?php while( have_rows('slider_custom') ): the_row(); ?>
                                                                                        <div class="box-slide">
                                                                                            <img src="<?php the_sub_field('slider_custom_img-desk')?>" alt="" class="img-desk">
                                                                                            <img src="<?php the_sub_field('slider_custom_img-mob')?>" alt="" class="img-mob">
                                                                                        </div>
                                                                                    <?php endwhile; ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endwhile; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php endwhile; ?>
                                                            
                                                        <?php endif; ?>
                                                        <?php if( have_rows('solution_block_composition') ): ?>
                                                            <div class="solution__block composition">
                                                                <?php while( have_rows('solution_block_composition') ): the_row(); ?>
                                                                    <div class="box-text">
                                                                        <h3 class="block__title"><?php the_sub_field('solution_block_composition_title');?></h3>
                                                                        <?php the_sub_field('solution_block_composition_text');?>
                                                                    </div>
                                                                    <div class="box-img"><img src="<?php the_sub_field('solution_block_composition_img');?>" alt=""></div>

                                                                <?php endwhile; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endwhile; ?>
                                                    </div>
                                                <?php endif; 
                                            }
										?>
                                        <!-- Блок TEAM -->
                                        <?php
                                            if(get_sub_field('single_team')){
                                                ?>
                                                   <?php if( have_rows('single_team') ): ?>
                                                        <div class="team">
                                                            <?php while( have_rows('single_team') ): the_row(); ?>
                                                                <h2 class="section__title"><?php the_sub_field('single_team_title');?></h2>
                                                                <?php if( have_rows('single_team_block') ): ?>
                                                                    <div class="team__block d-flex">
                                                                        <?php while( have_rows('single_team_block') ): the_row(); ?>
                                                                            <div class="team__box">
                                                                                <h3 class="name"><?php the_sub_field('single_team_name')?></h3>
                                                                                <p class="position"><?php the_sub_field('single_team_position')?></p>
                                                                            </div>
                                                                        <?php endwhile; ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endwhile; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php
                                            }
                                        ?>
                                        <!-- Блок других проектов -->
                                        <?php if( have_rows('more_project') ): ?>
									        <?php while( have_rows('more_project') ): the_row(); ?>
                                                <div class="more-project">
                                                    <h2 class="section__title"><?php the_sub_field('more_project_title');?></h2>
                                                    <?php if( have_rows('more_project_box') ): ?>
                                                        <div class="more-project__block">
                                                            <?php while( have_rows('more_project_box') ): the_row(); ?>
                                                                <div class="more-project__box">
                                                                    <div class="img-bg"><img src="<?php the_sub_field('more_project_img');?>" alt=""></div>
                                                                    <div class="img-hover"></div>
                                                                </div>
                                                            <?php endwhile; ?>
                                                        </div>
								                    <?php endif; ?>
                                                </div>
                                            <?php endwhile; ?>
								        <?php endif; ?>
          
									<?php endwhile; ?>
								<?php endif; ?>
							<?php endwhile; ?>
					<?php endif; ?>
				</main>
			</div>
		</div>
	</div>
<?php get_footer();?>