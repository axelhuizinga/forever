<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.2
 */

?>
<nav class="navbar is-fixed-top" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item" href="<?php echo esc_url( home_url( '/' ) );?>">
			 <img alt="My Logo" src="/img/econet.png">
			</a>

		 <button class="button navbar-burger <?php wp_is_mobile()?'':'is-active'?>" data-target="primary-menu" aria-controls="primary-menu" aria-haspopup="true" aria-label="Menu Button" aria-pressed="false">
			 <span aria-hidden="true"></span>
			 <span aria-hidden="true"></span>
			 <span aria-hidden="true"></span>
		 </button>
 </div>

 <div id="primary-menu" class="navbar-menu <?php wp_is_mobile()?'':'is-active'?>">
	<!--here we go -->
	 <div class="navbar-end">
		 <?php wp_nav_menu(array(
			 'theme-location' => 'header-menu', //change it according to your register_nav_menus() function
			 'depth'		=>	3,
			 'menu'			=>	'NewNav',
			 'container'		=>	'',
			 'menu_class'		=>	'is-transparent',
			 'items_wrap'		=>	'%3$s',
			 'walker'		=>	 is_admin() ? new Bogo_Walker_Nav_Menu_Edit() : new Bulma_MultiLevelNavwalker(),
			 'fallback_cb'		=>	'Bulma_MultiLevelNavwalker::fallback'
		 ));
		 ?>
		 <?php echo do_shortcode( '[eco]' ); ?>
	 </div>
</div>
</nav>
<script type="text/javascript">
      (function() {
        var burger = document.querySelector('.navbar-burger');
        var nav = document.querySelector('#'+burger.dataset.target);

        burger.addEventListener('click', function(){
          burger.classList.toggle('is-active');
		  nav.classList.toggle('is-active');
		 //console.log(nav);
		//console.log(burger.dataset.target);
        });
      })();
    </script>
<!-- #site-navigation -->
