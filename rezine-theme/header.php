<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<!-- rezine-WP v1.0.0 - github.com/frambertech/rezineWP - License MIT -->

<head>

<!--  Title --> 
<title><?php title(); ?></title>
<meta name="twitter:title" content="<?php title(); ?>" />
<meta property="og:title" content="<?php title(); ?>"/>

<!-- App name -->
<meta property="og:site_name" content="<?php title(); ?>" />
<meta name='application-name' content='<?php title(); ?>' />

<!-- Description  -->
<meta name="description" content="<?php description(); ?>" />
<meta name="twitter:description" content="<?php description(); ?>" />
<meta property="og:description" content="<?php description(); ?>" />

<!-- Responsive desing --> 
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Favicon --> 
<link rel="icon" href="<?= get_stylesheet_directory_uri().'/assets/favicon.png'?>" sizes="32x32" />
<link rel="icon" href="<?= get_stylesheet_directory_uri().'/assets/favicon.png'?>" sizes="192x192" />
<link rel="apple-touch-icon" href="<?= get_stylesheet_directory_uri().'/assets/favicon.png'?>" />
<meta name="msapplication-TileImage" content="<?= get_stylesheet_directory_uri().'/assets/favicon.png'?>" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<?php if ( is_single() ) : ?>
<meta name="twitter:label1" content="Escrito por" />
<meta name="twitter:data1" content="<?php echo get_the_author(); ?>" />
<?php endif; ?>

<!-- facebook open graph -->
<meta property="og:type" content="<?php webtype(); ?>" />
<meta property="og:url" content="<?php url_single(); ?>" />
<?php if ( is_single() ) : ?>
<meta property="og:image" content="<?php echo firstImage(); ?>" />
<meta property='og:image:width' content="1200"/>
<meta property='og:image:height' content="630"/>
<meta property="article:published_time" content="<?php echo get_the_date(); ?>" />
<meta property="article:modified_time" content="<?php echo get_the_modified_date(); ?>" />
<?php endif; ?>
	
<!-- Other --> 
<link rel="canonical" href="<?php url_single(); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />	

<!-- Robots --> 
<meta content='index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1' name='robots'/>
<?php wp_head(); ?>
	
</head>
<body itemscope="itemscope" itemtype="https://schema.org/WebPage">