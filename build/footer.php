<?php
if (is_front_page()){
} else {
    ?>
    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <div class="footer__row">
                    <div class="text">
                        <h3>wanna collaborate?</h3>
                        <a href="mailto:<?php the_field('page-email', 'option')?>" class="footer-mail"><?php the_field('page-email', 'option')?></a>
                    </div>
                
                </div>
                <h4>All Rights Reserved Damnn Inc,<br> Suite # 55 1611 E 2nd St Casper, WY 82601</h4>
                <div class="footer-nav">
                    <div class="nav-box">
                        <a href="<?php the_field('vimeo_link', 'option');?>">vimeo</a>
                        <a href="<?php the_field('instagram_link', 'option')?>">instagram</a>
                        <a href="<?php the_field('artstation_link', 'option')?>">artstation</a>
                    </div>
                    <div class="nav-box">
                        <a href="/policy">privacy policy</a>
                        <a href="/terms">terms of service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="topup">
        <img src="<?php echo get_template_directory_uri()?>/img/top-up.svg" alt="">
    </a>


    <?php
}
?>
    <div class="modal-block wow fadeInUp " data-wow-duration="2s" data-wow-delay="0.5s">
        <div class="modal-wrapper"></div>
        <div class="modal-content">
            <div class="modal-form">
                <p class="temp">
                    <?php echo do_shortcode('[calendly url="https://calendly.com/yankovich-ihar/meet-gary-y" type="1"]')?>
                </p>
            </div>
            <div class="modal-close">
                <img src="<?php echo get_template_directory_uri();?>/img/close.svg" alt="">
                <span>close</span>
            </div>
        </div>
    </div>

   
    <script>
        new WOW().init();
      </script>

<?php wp_footer();?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <div class="t123">

    <script>
        let elements = document.querySelectorAll('.nav-list .menu-item a');
        elements.forEach(element => {
        let innerText = element.innerText;
        element.innerHTML = '';
        let textContainer = document.createElement('div');
        textContainer.classList.add('block');

        for (let letter of innerText) {
            let span = document.createElement('span');
            span.innerText = letter.trim() === '' ? '\xa0': letter;
            span.classList.add('letter');
            textContainer.appendChild(span);
        }
        element.appendChild(textContainer);
        element.appendChild(textContainer.cloneNode(true));
        });
    </script>
    </div>
    </body>
</html>

