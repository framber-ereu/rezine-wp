<?php get_header(); ?>

<!-- {{ Page }} -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
	
<!-- {{ Page content }} --> 
<?php the_content(); ?>

<!-- {{ Comment }} --> 
<?php comments_template();?>

<?php endwhile; else : ?>
<p>Lo siento, no hemos encontrado ningún post.</p>
<?php endif; ?>

<?php get_footer(); ?>