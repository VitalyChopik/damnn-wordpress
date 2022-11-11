<aside class="sidebar">
    <div class="sidebar-box">
        <?php wp_nav_menu( [
                'theme_location'  => 'header_menu',
                'container'       => 'ul', 
                'menu_class'      => 'nav-list rolling-text', 
                'menu_id'         => false,
                'echo'            => true,
                'items_wrap'      => '<ul class="nav-list rolling-text" id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
            ] ); ?>
        <p class="nav-list"><span class="menu-item"><a class="modal-btn" href="../start-the-project/">start the project</a></span></p>
    </div>
</aside>