<?php
/*** @package basetheme **/

function theme_setup(){

		add_theme_support( 'menus' );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header_menu' => 'Меню в шапке',
			'footer_menu' => 'Меню в подвале'
		) );

		add_theme_support( 'post-thumbnails' );		
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'audio',
			'video',
			'quote',
			'link',
		) );	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'basetheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'basetheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Widgets In Front', 'basetheme' ),
		'id'            => 'front-widgets',
		'description'   => esc_html__( 'Add widgets here.', 'basetheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Services', 'basetheme' ),
		'id'            => 'sidebar-services',
		'description'   => esc_html__( 'Add widgets here.', 'basetheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

}

add_action("after_setup_theme", 'theme_setup');


function theme_basetheme_scripts() {	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'lightbox', get_template_directory_uri().'/css/lightbox.min.css' );
	wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css' );
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js' );
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js' );
}

// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'theme_basetheme_scripts' );

add_filter('excerpt_more', function($more) {
	return '...';
});

require get_template_directory() . '/inc/nav_menu_walker.php';


/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
/*
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}*/


//require get_template_directory() . '/inc/options-panel.php';


function services_post_type() {

	register_taxonomy('scat', array('services'), array(
		'label'                 => 'Раздел услуги', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Разделы услуги',
			'singular_name'     => 'Раздел услуги',
			'search_items'      => 'Искать Раздел услуги',
			'all_items'         => 'Все Разделы услуги',
			'parent_item'       => 'Родит. раздел услуги',
			'parent_item_colon' => 'Родит. раздел услуги:',
			'edit_item'         => 'Ред. Раздел услуги',
			'update_item'       => 'Обновить Раздел услуги',
			'add_new_item'      => 'Добавить Раздел услуги',
			'new_item_name'     => 'Новый Раздел услуги',
			'menu_name'         => 'Раздел услуги',
		),
		'description'           => 'Рубрики для раздела услуги', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'services', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	) );

	// тип записи - Услуги services
	register_post_type('services', array(
		'label'               => 'Услуги',
		'labels'              => array(
			'name'          => 'Услуги',
			'singular_name' => 'Услуга',
			'menu_name'     => 'Услуги',
			'add_new'       => 'Добавить услугу',
			'add_new_item'  => 'Добавить новую услугу',
			'edit'          => 'Редактировать',
			'edit_item'     => 'Редактировать услугу',
			'new_item'      => 'Новая услуга',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'show_in_nav_menus'	  =>true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array( 'slug'=>'services/%scat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
		'has_archive'         => 'services',
		'query_var'           => true,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'post-formats' ),
		'taxonomies'          => array( 'scat' ),
	) );

}
add_action( 'init', 'services_post_type' );



## Отфильтруем ЧПУ произвольного типа
// фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );

function services_permalink( $permalink, $post ){
	// выходим если это не наш тип записи: без холдера %services%
	if( strpos($permalink, '%scat%') === false )
		return $permalink;

	// Получаем элементы таксы
	$terms = get_the_terms($post, 'scat');
	// если есть элемент заменим холдер
	if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
		$term_slug = array_pop($terms)->slug;
	// элемента нет, а должен быть...
	else
		$term_slug = 'no-scat';

	return str_replace('%scat%', $term_slug, $permalink );
}
add_filter('post_type_link', 'services_permalink', 1, 2);





function portfolios_post_type() {

	// тип записи - portfolios
	register_post_type('portfolios', array(
		'labels'              => array(
			'name'          => 'Портфолио',
			'singular_name' => 'Портфолио',
			'edit_item'     => 'Редактировать Портфолио',
		),
		'public'              => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'supports'            => array( 'title', 'thumbnail', 'excerpt')
	) );

}

add_action( 'init', 'portfolios_post_type' );




function certificates_post_type() {

	// тип записи - certificates
	register_post_type('certificates', array(
		'labels'              => array(
			'name'          => 'Сертификаты',
			'singular_name' => 'Сертификат',
			'edit_item'     => 'Редактировать Сертификат',
		),
		'public'              => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'show_in_menu'        => false,
		'show_in_nav_menus'	  =>false,		
		'supports'            => array( 'title', 'thumbnail', 'excerpt')
	) );

}

add_action( 'init', 'certificates_post_type' );






function reviews_post_type() {

	// тип записи - reviews
	register_post_type('reviews', array(
		'labels'              => array(
			'name'          => 'Отзывы',
			'singular_name' => 'Отзыв',
			'edit_item'     => 'Редактировать Отзыв',
		),
		'public'              => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'show_in_menu'        => false,
		'show_in_nav_menus'	  =>false,		
		'supports'            => array( 'title', 'thumbnail', 'excerpt')
	) );

}

add_action( 'init', 'reviews_post_type' );













class ServicesWidget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'services_home', 
			'Виджет Услуги', // заголовок виджета
			array( 'description' => 'Позволяет вывести список услуг' ) // описание
		);
	}
 
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
		$posts_per_page = $instance['posts_per_page'];
 
		echo $args['before_widget'];
 
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
 
		$q = new WP_Query(array( 'post_type' => 'services' ));
		if( $q->have_posts() ):
			?>
			<div class="row services-list">
			<?php
			while( $q->have_posts() ): $q->the_post();
				?>
				<div class="service-item col-md-4">
				<a href="<?php the_permalink() ?>">
				<h3><?php the_title() ?></h3>
				</a>
				<div class="post-image">
				<?php the_post_thumbnail('medium_large'); ?>
				</div>
				<div class="post-content">
				<?php the_excerpt(); ?>
				</div>
				</div>
				<?php	endwhile;	?>
			</div>
			<?php
		endif;
		wp_reset_postdata();
 
		echo $args['after_widget'];
	}
 

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		if ( isset( $instance[ 'posts_per_page' ] ) ) {
			$posts_per_page = $instance[ 'posts_per_page' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Количество постов:</label> 
			<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '5'; ?>" size="3" />
		</p>
		<?php 
	}
 

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '5'; // по умолчанию выводятся 5 постов
		return $instance;
	}
}
 
/*
 * регистрация виджета ServicesWidget
 */
function services_widget_load() {
	register_widget( 'ServicesWidget' );
}
add_action( 'widgets_init', 'services_widget_load' );











class CertificatesWidget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'certificates_widget', 
			'Виджет Сертификаты',
			array( 'description' => 'Позволяет вывести список сертификатов' ) // описание
		);
	}
 

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
		$posts_per_page = $instance['posts_per_page'];
 
		echo $args['before_widget'];
 
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
 
		$q = new WP_Query(array( 'post_type' => 'certificates' ));
		if( $q->have_posts() ):
			?>
			<div class="row certificates-list">
			<?php
			while( $q->have_posts() ): $q->the_post();
				?>
				<div class="certificate-item col-md-4">
				<a class="post-image" data-lightbox="roadtrip" href="<?php echo get_the_post_thumbnail_url(); ?>" title="<?php the_title_attribute(); ?>">
				<h3><?php the_title() ?></h3>
				<div class="post-image">
				<?php the_post_thumbnail('medium_large'); ?>
				</div>
				</a>
				</div>
				<?php	endwhile;	?>
			</div>
			<?php
		endif;
		wp_reset_postdata();
 
		echo $args['after_widget'];
	}
 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		if ( isset( $instance[ 'posts_per_page' ] ) ) {
			$posts_per_page = $instance[ 'posts_per_page' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Количество постов:</label> 
			<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '5'; ?>" size="3" />
		</p>
		<?php 
	}
 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '5'; // по умолчанию выводятся 5 постов
		return $instance;
	}
}
 
/*
 * регистрация виджета CertificatesWidget
 */
function certificates_widget_load() {
	register_widget( 'CertificatesWidget' );
}
add_action( 'widgets_init', 'certificates_widget_load' );
