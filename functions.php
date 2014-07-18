<?php
if ( ! function_exists( 'my_pagination' ) ) :
	function my_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'prev_next'    => False,
			'prev_text'    => __('« Préc.'),
			'next_text'    => __('Suiv. »')
		) );
	}
endif;
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'menu_item',
		array(
			'labels' => array(
				'name' => __( 'Menu' ),
				'singular_name' => __( 'Menu' )
			),
		'public' => true,
		'supports' => array(
		  'title'
		  )
		)
	);
	register_post_type( 'pizzas',
		array(
			'labels' => array(
				'name' => __( 'Pizzas' ),
				'singular_name' => __( 'Pizza' )
			),
		'public' => true,
		'supports' => array(
		  'title'
		  )
		)
	);
}
/* Price custom field (pizza)*/
add_action( 'add_meta_boxes', 'pizza_normal_price_box' );
function pizza_normal_price_box() {
    add_meta_box( 
        'pizza_normal_price_box',
        __( 'Pizza Normal Price' ),
        'pizza_normal_price_box_content',
        'pizzas',
        'side',
        'low'
    );
}
function pizza_normal_price_box_content( $post ) {
   wp_nonce_field( plugin_basename( __FILE__ ), 'pizza_normal_price_box_content_nonce' );
  echo '<label for="pizza_normal_price"></label>';
  echo '<input type="text" id="pizza_normal_price" name="pizza_normal_price" value="'.(get_post_meta(get_the_ID(), 'pizza_normal_price', true )).'" placeholder="enter a price" />';
}
add_action( 'save_post', 'pizza_normal_price_box_save' );
function pizza_normal_price_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['pizza_normal_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $short_desc = $_POST['pizza_normal_price'];
  update_post_meta( $post_id, 'pizza_normal_price', $short_desc );
}

/* Small Price custom field (pizza)*/
add_action( 'add_meta_boxes', 'pizza_small_price_box' );
function pizza_small_price_box() {
    add_meta_box( 
        'pizza_small_price_box',
        __( 'Pizza Small Price' ),
        'pizza_small_price_box_content',
        'pizzas',
        'side',
        'low'
    );
}
function pizza_small_price_box_content( $post ) {
   wp_nonce_field( plugin_basename( __FILE__ ), 'pizza_small_price_box_content_nonce' );
  echo '<label for="pizza_small_price"></label>';
  echo '<input type="text" id="pizza_small_price" name="pizza_small_price" value="'.(get_post_meta(get_the_ID(), 'pizza_small_price', true )).'" placeholder="enter a price" />';
}
add_action( 'save_post', 'pizza_small_price_box_save' );
function pizza_small_price_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['pizza_small_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $short_desc = $_POST['pizza_small_price'];
  update_post_meta( $post_id, 'pizza_small_price', $short_desc );
}

/* Description custom field (pizza)*/
add_action( 'add_meta_boxes', 'pizza_description_box' );
function pizza_description_box() {
    add_meta_box( 
        'pizza_description_box',
        __( 'Pizza Description Price' ),
        'pizza_description_box_content',
        'pizzas',
        'normal',
        'low'
    );
}
function pizza_description_box_content( $post ) {
   wp_nonce_field( plugin_basename( __FILE__ ), 'pizza_description_box_content_nonce' );
  echo '<label for="pizza_description"></label>';
  echo '<input type="text" id="pizza_description" name="pizza_description" value="'.(get_post_meta(get_the_ID(), 'pizza_description', true )).'" placeholder="enter a description" />';
}
add_action( 'save_post', 'pizza_description_box_save' );
function pizza_description_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['pizza_description_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $short_desc = $_POST['pizza_description'];
  update_post_meta( $post_id, 'pizza_description', $short_desc );
}

/* Price custom field (menu-item)*/
add_action( 'add_meta_boxes', 'menu_item_price_box' );
function menu_item_price_box() {
    add_meta_box( 
        'menu_item_price_box',
        __( 'Menu Price' ),
        'menu_item_price_box_content',
        'menu_item',
        'side',
        'low'
    );
}
function menu_item_price_box_content( $post ) {
   wp_nonce_field( plugin_basename( __FILE__ ), 'menu_item_price_box_content_nonce' );
  echo '<label for="menu_item_price"></label>';
  echo '<input type="text" id="menu_item_price" name="menu_item_price" value="'.(get_post_meta(get_the_ID(), 'menu_item_price', true )).'" placeholder="enter a price" />';
}
add_action( 'save_post', 'menu_item_price_box_save' );
function menu_item_price_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['menu_item_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $short_desc = $_POST['menu_item_price'];
  update_post_meta( $post_id, 'menu_item_price', $short_desc );
}
/* Small Price custom field (menu-item)*/
add_action( 'add_meta_boxes', 'menu_small_price_box' );
function menu_small_price_box() {
    add_meta_box( 
        'menu_small_price_box',
        __( 'Menu Small Price' ),
        'menu_small_price_box_content',
        'menu_item',
        'side',
        'low'
    );
}
function menu_small_price_box_content( $post ) {
   wp_nonce_field( plugin_basename( __FILE__ ), 'menu_small_price_box_content_nonce' );
  echo '<label for="menu_small_price"></label>';
  echo '<input type="text" id="menu_small_price" name="menu_small_price" value="'.(get_post_meta(get_the_ID(), 'menu_small_price', true )).'" placeholder="enter a price" />';
}
add_action( 'save_post', 'menu_small_price_box_save' );
function menu_small_price_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['menu_small_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $short_desc = $_POST['menu_small_price'];
  update_post_meta( $post_id, 'menu_small_price', $short_desc );
}


function my_taxonomies_menu() {
   $labels = array(
    'name'              => _x( 'Menu Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Menu Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Menu Categories' ),
    'all_items'         => __( 'All Menu Categories' ),
    'parent_item'       => __( 'Parent Menu Category' ),
    'parent_item_colon' => __( 'Parent Menu Category:' ),
    'edit_item'         => __( 'Edit Menu Category' ), 
    'update_item'       => __( 'Update Menu Category' ),
    'add_new_item'      => __( 'Add New Menu Category' ),
    'new_item_name'     => __( 'New Menu Category' ),
    'menu_name'         => __( 'Menu Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_admin_column' => true,
  );
  register_taxonomy( 'menu_category', 'menu_item', $args );
}
add_action( 'init', 'my_taxonomies_menu', 0 );