<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

<?php 


$defaults = array(
    'theme_location'  => 'footer-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-right">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
);

wp_nav_menu( $defaults );

?>


            <!-- 
                <ul class="list-inline">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul> -->
                <p class="copyright text-muted small">Copyright &copy; Ethic Athletics 2015. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer();?>

</body>

</html>
