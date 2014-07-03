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
}

/* Price custom field */
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
  );
  register_taxonomy( 'menu_category', 'menu_item', $args );
}
add_action( 'init', 'my_taxonomies_menu', 0 );