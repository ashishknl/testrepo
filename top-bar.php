<?php
/**
 * Partial: Top bar template - displayed above logo
 */

if (Bunyad::options()->header_layout == 'full-top') {
	$navigation = true;
	$social_icons = true;
}

if (Bunyad::options()->header_layout == 'alt') {
	$social_icons = true;
}

$navigation   = isset($navigation) ? $navigation : true;
$social_icons = isset($social_icons) ? $social_icons : false;


$is_dark = '';
if (Bunyad::options()->topbar_style == 'dark') {
	$is_dark = ' dark';
}

?>

	<div class="top-bar<?php echo esc_attr($is_dark); ?> cf">
	
		<div class="top-bar-content" data-sticky-bar="<?php echo esc_attr(Bunyad::options()->topbar_sticky); ?>">
			<div class="wrap cf">
			
			<span class="mobile-nav"><i class="fa fa-bars"></i></span>
			
			<?php if ($social_icons): ?>

				<ul class="social-icons cf">
				
					<?php
					
					/**
					 * Use theme settings to show enabled icons
					 */
					$services = Bunyad::get('social')->get_services();
					$links    = Bunyad::options()->social_profiles;
					
					foreach ( (array) Bunyad::options()->topbar_social as $icon):
					
						$service = $services[$icon];
						$url = !empty($links[$icon]) ? $links[$icon] : '#';
					?>
				
					<li><a href="<?php echo esc_url($url); ?>" class="fa fa-<?php echo esc_attr($service['icon']); 
						?>" target="_blank"><span class="visuallyhidden"><?php echo esc_html($service['label']); ?></span></a></li>
                	<?php endforeach; ?>
					<li><a href="/contact-us/ " class="fa fa-envelope-o"><span class="visuallyhidden">Email</span></a></li>
				</ul>
			
			<?php endif; ?>
			

			<?php if ($navigation): ?>
				
				<?php if (has_nav_menu('cheerup-main')): ?>
						
				<nav class="navigation<?php echo esc_attr($is_dark); ?>">					
					<?php wp_nav_menu(array('theme_location' => 'cheerup-main', 'fallback_cb' => '', 'walker' =>  'Bunyad_Menu_Walker')); ?>
				</nav>
				
				<?php endif; ?>
				
			<?php endif; ?>
				
			
				<div class="actions">
					
					<?php do_action('bunyad_top_bar_right'); ?>
					
					<?php if (Bunyad::options()->topbar_cart && class_exists('Bunyad_Theme_WooCommerce')): ?>
					
					<div class="cart-action cf">
						
						<?php echo Bunyad::get('woocommerce')->cart_link(); ?>
						
					</div>
					
					<?php endif; ?>
					
					
					<?php if (Bunyad::options()->topbar_search): ?>
					
					<div class="search-action cf">
					
						<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
						
							<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
							<input type="search" class="search-field" name="s" placeholder="<?php esc_attr_e('Search', 'cheerup')?>" value="<?php 
									echo esc_attr(get_search_query()); ?>" required />
							
						</form>
								
					</div>
					
					<?php endif; ?>
				
				</div>
				
			</div>			
		</div>
		
	</div>
