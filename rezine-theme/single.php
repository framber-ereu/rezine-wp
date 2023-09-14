<?php get_header(); ?>

<!-- {{ Single }} -->
<article itemprop="blogPosts" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

<!-- {{ Posts content }} --> 
<?php the_content(); ?>

<!-- Datos estructurados para los posts / JSON -->
<script type='application/ld+json'>
{
	"@context":"https://schema.org",
	"@type":"NewsArticle",
	"mainEntityOfPage":{
	    "@type":"WebPage",
	    "@id":"<?php the_permalink(); ?>"
	},
	"headline":"<?php the_title(); ?>",
	"description":"<?php echo get_the_excerpt(); ?>",
	"image":["<?php echo firstImage(); ?>"],
	"datePublished":"<?php echo get_the_date(); ?>",
	"dateModified":<?php echo get_the_modified_date(); ?>",
	"author":{
	   "@type":"Person",
	      "name":"<?php the_author(); ?>"
	  },
	"publisher":{
	    "@type":"Organization",
	    "name":"<?php bloginfo( 'name' ); ?>",
	"logo":{
        "@type":"ImageObject",
         "url":"img-logo.png",
         "width":206,
         "height":60
     }
    }
}
</script>

<!-- {{ Comment }} --> 
<?php comments_template(); ?>

<?php endwhile; else : ?>
<p>Lo siento, no hemos encontrado ningún post.</p>
<?php endif; ?>
</article>

<?php get_footer(); ?>