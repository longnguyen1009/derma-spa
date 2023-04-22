<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Spa
 */

get_header(); ?>

<div id="primary" class="content-area">
	<?php
	/**
	 * blossom_spa_posts_per_page_count - 10
	 */
	do_action('blossom_spa_before_posts_content');
	?>
	<main id="main" class="products-main">
			<div class="woocommerce-products-header-top noApp">
				<div class="woocommerce-products-header-category">
					<ul>
						<li class="term-active"><a href="https://seoulspa.vn/san-pham" data-wpel-link="internal">Tất cả</a></li>
							<li class=""><a href="https://seoulspa.vn/danh-muc/duong-da" data-wpel-link="internal">Dưỡng Da</a></li>
							<li class=""><a href="https://seoulspa.vn/danh-muc/tri-mun" data-wpel-link="internal">Trị Mụn</a></li>
							<li class=""><a href="https://seoulspa.vn/danh-muc/thiet-bi-spa" data-wpel-link="internal">Thiết bị spa</a></li>
							<li class=""><a href="https://seoulspa.vn/danh-muc/tri-tham" data-wpel-link="internal">Trị Thâm</a></li>
							<li class=""><a href="https://seoulspa.vn/danh-muc/duong-trang" data-wpel-link="internal">Dưỡng Trắng</a></li>
							<li class=""><a href="https://seoulspa.vn/danh-muc/tri-nam-tan-nhang" data-wpel-link="internal">Trị Nám / Tàn Nhang</a></li>
						</ul>
				</div>
			</div>
			<ul class="products columns-4 load-products product__iall">
				<?php
				if (have_posts()) :
					/* Start the Loop */
					while (have_posts()) : the_post();
						get_template_part('template-parts/content', 'san-pham');
					endwhile;
				else :
					get_template_part('template-parts/content', 'none');
				endif; ?>
			</ul>
	</main><!-- #main -->

</div><!-- #primary -->
<?php
get_footer();
