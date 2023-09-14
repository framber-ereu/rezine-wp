# rezine-wp
Base en blanco para desarrollar temas para wordpress responsive
## Caracteristica

> SEO Moderno
> Sin codigo css ni javascript innecesario

## Primero pasos.

Para empezar, añade tu logo a la carpeta assets con el nombre "favicon" y listo.

Muy bien abajo dejare una lista de las etiquetas y codigo utiles para usar. Todos
los datos los puedes usar para crear tu temas.

### Etiqueta de estructura
```html
<?php get_header(); ?> Con esta etiqueta sirve para mostrar el header en otra secciones
<?php get_sidebar(); ?> Mostrar barra literal
<?php get_footer(); ?> Mostrar pie de pagina
```

### Agregar recursos
```html
<?php get_stylesheet_directory_uri().'/url'; ?  añadir CSS
<?php get_template_directory_uri().'/src'; ?> Añadir Javascript
<?php get_template_part(''); ?> Añadir template
```

### Etiquetas globales
```html
<?php echo esc_url(home_url('/'));?><!-- Url home -->
<?php echo get_option('home'); ?> <!-- url -->
<?php bloginfo( 'name' ); ?><!-- Name blog -->
```

### Etiquetas para las categorias
```html
<?php single_cat_title(); ?> <!-- titulo de categorias -->
<?php echo category_description(); ?> <!-- descripcion -->
```

### Agregar sidebar y secciones para añadir widgets

```html
add_action( 'widgets_init' , 'new_section');
function new_section (){
	register_sidebar( array(
    'name' => 'Nombre',
    'id' => 'new-nombre',
    'class' => 'new-nombre',
  ) );
}

<!-- Salida -->
<?php dynamic_sidebar('new-nombre'); ?>
```

### Etiquetas para usar en la entradas y paginas
```html
<?php echo firs_image(); ?> Primera imagen del posts 
<?php the_post_thumbnail(); ?> Miniatura
<?php the_excerpt(); ?> descripcion
<?php echo get_the_excerpt(); ?> mostrar
<?php the_permalink(); ?> url al posts
<?php the_title(); ?> Titulo del posts
<?php echo get_the_date(); ?> Fecha del posts
<?php echo get_the_modified_date(); ?> update
<?php the_date()?> año del posts
<?php the_ID(); ?> ID del posts
<?php the_content(); ?> Cuerpo del posts
<?php the_tags(); ?>  Las etiquetas linkables del post 
<?php the_category() ?> Las categorías, linakbles del post
<?php the_author(); ?> Author del posts 
<?php the_author_posts(); ?>  Todos los artículos de un autor
<?php the_author_posts_link();?> Links de los artículos de un autor
```

### Condicionales if , else
```html
<?php if() : ?> Si
<?php else : ?> Caso contrario
<?php endif; ?> fin de condicion

<?php if(is_user_logged_in()); ?> Usuario logueado
<?php if (is_single()); ?> Entrada
<?php if (is_page()); ?> Pagina estatica
<?php if (is_singular()); ?> Entradas y paginas
<?php if (is_category()); ?> Categorias
<?php if (is_tag()) ;?> Etiquetas
<?php if (is_admin()); ?> Admin
<?php if (is_home()); ?> Pagina principal 
<?php if (is_front_page()); ?> pagina frontal
<?php if(is_attachment()); ?> archivo adjunto
<?php if(is_dynamic_sidebar()): ?> Sidebar dinamico
```

### Etiquetas head y footer
```html
<!-- Metatags wordpress -->
<?php wp_head(); ?> Funciona para agregar metadatos.

<!-- plugins-wp -->
<?php wp_footer(); ?> Funciona para mejorar la compatibilidad con plugins ademas de agregar la barra de wordpress
```

### Añadir logo

<!-- logo -->
<?php the_custom_logo(); ?>

### Añadir menu
```html
<!-- menu -->
<?php wp_nav_menu() ?>
```

### Añadir Paginacion
```html
<?php echo paginate_links(); ?> Añadir paginacion numerica
<?php previous_post_link(); ?> Boton anterior
<?php next_post_link(); ?> Boton de siguiente
```

### Agrega un formulario de contacto
```html
<form class="search" method="get" action="<?php echo esc_url(home_url()); ?>">
<div role="search">
<input class="search-input" type="search" name="s" aria-label="Search site for:" placeholder="<?php esc_html_e('BUSQUEDA RAPIDA'); ?>">
<button class="search-submit" type="submit"><?php esc_html_e('Search'); ?></button>
  </div>
</form>
```

## Conclucion

> Muchas gracias por leer, si te ha servido no olvides compartir. Si tienes
dudas puedes escribirme a mi facebook **www.m.me/framber.ereu**

## Donar

Si desea apoyar puede dejar su contribucion aqui www.ko-fi.com/frambertech
