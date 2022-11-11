<?php get_header();?>
	<div class="wrapper single">
		<div class="container">
			<div class="wrapper__block d-flex">
				<?php get_sidebar();?>
				<main class="main  case-isoverse wow fadeInLeft" data-wow-duration="3s" data-wow-delay="0s">
                    <a href="<?php echo esc_js('javascript:history.go(-1)'); ?>" class="back"><img src="<?php echo get_template_directory_uri()?>/img/arrow-back.svg" alt=""><span>Back</span></a>
                    <?php if( have_rows('page_header') ): ?>
                        <div class="single-header wow fadeInUp " data-wow-duration="2s">
                        <?php while( have_rows('page_header') ): the_row(); ?>
                        
                            <h1 class="single-title"><?php the_sub_field( 'page_title' ); ?></h1>
                            
                            <?php 
                            $image = get_sub_field('image');
                            $video = get_sub_field('video');
                            $video__image = get_sub_field('poster_video');
                            if ( $image ) { ?>
                                <div class="media__block">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </div>
                            <?php } ?>
                            <?php if ( $video ) { ?>
                                <div class="media__block">
                                    <video src="<?php echo $video['url']; ?>" poster="<?php echo $video__image['url']; ?>" autoplay loop muted></video>
                                </div>
                            <?php } ?>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( have_rows('block-info') ): ?>
                        <div class="block-info d-flex">
                        <?php while( have_rows('block-info') ): the_row(); ?>
                        <?php
                            $cnt++;
                            switch($cnt) {
                                case 1: 
                                    ?>
                                <div class="box-description">
                                    <div class="info__title"><span><?php the_sub_field('info_title')?></span></div>
                                    <div class="text">
                                        <?php the_sub_field('info_text')?>
                                    </div>
                                </div>
                                    <?php
                                break;
                                default: 
                                ?>
                                <div class="box">
                                    <h2 class="info__title"><?php the_sub_field('info_title')?></h2>
                                    <?php the_sub_field('info_text')?>
                                </div>
                                <?php
                                break;
                            }
                        ?>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( have_rows('page-content') ): ?>
                        <div class="solution">
                            <?php while( have_rows('page-content') ): the_row(); ?>
                            <h2 class="section__title"><?php the_sub_field('section_title');?></h2>
                                <?php if( have_rows('solution__block') ): ?>
                                    <div class="solution__block">
                                    <?php while( have_rows('solution__block') ): the_row(); ?>
                                    <div class="solution__box">
                                        <div class="media">
                                            <?php 
                                            $image = get_sub_field('image');
                                            $video = get_sub_field('video');
                                            $video__image = get_sub_field('poster_video_mobile');
                                            $image_mobile = get_sub_field('image_mobile');
                                            $video_mobile = get_sub_field('video_mobile');
                                            $video__image_mobile = get_sub_field('poster_video_mobile');
                                            if ( $image ) { ?>
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="desktop-js"/>
                                            <?php }
                                            if ( $image_mobile ) { ?>
                                                <img src="<?php echo $image_mobile['url']; ?>" alt="<?php echo $image_mobile['alt']; ?>"class="mobile-js" />
                                            <?php } ?>
                                            <?php if ( $video ) { ?>
                                                <video src="<?php echo $video['url']; ?>" poster="<?php echo $video__image['url']; ?>" autoplay loop muted class="desktop-js"></video>
                                            <?php } ?>
                                            <?php if ( $video_mobile ) { ?>
                                                <video src="<?php echo $video_mobile['url']; ?>" poster="<?php echo $video__image_mobile['url']; ?>" autoplay loop muted class="mobile-js"></video>
                                            <?php } ?>
                                        </div>
                                        <div class="text">
                                            <?php the_sub_field('text');?>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>



                       
                    

                    <div class="team d-flex"> 
                        <div class="img">
                            <h3>And the only thing you can say is:</h3>
                            <lottie-player
                                autoplay
                                loop
                                mode="normal"
                                src="<?php echo get_template_directory_uri()?>/logo.json"
                                class="lottie-logo"
                            >
                            </lottie-player>
                        </div>
                        <?php if( have_rows('single_team_block') ): ?>
                            <div class="team__block d-flex">
                                <h2 class="section__title">our team</h2>
                                <?php while( have_rows('single_team_block') ): the_row(); ?>
                                <div class="team__box">
                                    <h3 class="name"><?php the_sub_field('single_team_name')?></h3>
                                    <p class="position"><?php the_sub_field('single_team_position')?></p>
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