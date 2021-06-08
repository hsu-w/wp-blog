<?php get_header(); ?>

this is home.php
-------------
<?php if( is_front_page() ): ?>
is_front_page()
<?php endif; ?>
//is_front_page()がtrueだった場合はis_front_page()を表示

<?php if( is_home() ): ?>
is_home()
<?php endif; ?>
//is_home()がtrueだった場合はis_home()を表示
<?php if ( have_posts() ) :
while( have_posts() ) : the_post();?>
<?php echo '<div>'.the_title().'</div>'; ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>