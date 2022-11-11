<?php get_header();?>
	<div class="wrapper">
		<div class="container">
			<div class="wrapper__block">
                <?php get_sidebar();?>
				<main class="main">
					<div class="service content__block wow fadeInLeft" data-wow-duration="3s" data-wow-delay="0.5s">
                            <div class="text__title">
                                <h1 class="service__title page__title  wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s"><?php the_field('page_title')?></h1>
                                <p class="service__subtitle page__subtitle  wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.5s"> <?php the_field('page_subtitle')?></p>
                            </div>
                            <?php if( have_rows('service_block') ): ?>
                                <div class="service__block">
                                    <?php 
                                      $i=0;
                                    while( have_rows('service_block') ): the_row(); $i++?>
                                    <div class="service__box d-flex  wow fadeInUp "data-wow-duration="2s" data-wow-delay="1.7s" >
                                        <span class="number ">
                                        <?php 
                                        if ($i < 10){
                                            echo '0'.$i.'/';
                                        } else {
                                            echo $i.'"/"';
                                        }
                                        ?>
                                        </span>
                                        <h2 class=""> <span class=""><?php the_sub_field('service_title')?></span></h2>
                                        <?php 
                                        if(get_sub_field('service_image')){
                                           ?>
                                                <img src="<?php the_sub_field('service_image')?>" alt="" class="img-hover" style=" transform: rotate(<?php the_sub_field('image_rotade')?>deg);">
                                           <?php
                                        }
                                        ?>
                                        <?php if( have_rows('service_items') ): ?>
                                            <div class="box-text">
                                                <?php while( have_rows('service_items') ): the_row();?>                             
                                                    <span class=""><?php the_sub_field('service_item')?></span>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
					</div>
				</main>
			</div>
		</div>
	</div>

<?php get_footer();?>