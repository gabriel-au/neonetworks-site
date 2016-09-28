<?php
	// Loads child theme textdomain
	load_child_theme_textdomain( CURRENT_THEME, CHILD_DIR . '/languages' );

	// Loads custom scripts.
	require_once( 'custom-js.php' );
	require_once('theme-skills-meta.php');

	add_filter( 'cherry_plugin_owl_items_custom', 'cherry_child_set_owl_items_custom' );
	function cherry_child_set_owl_items_custom( $items_custom ) {
		$items_custom[1] = array( 1200, 1 );
		$items_custom[2] = array( 980, 1 );
		$items_custom[3] = array( 768, 1 );
		$items_custom[4] = array( 480, 1 );
		return $items_custom;
	}



/**
 * Carousel OWL
 */
if ( !function_exists('shortcode_carousel_owl') ) {
	function shortcode_carousel_owl( $atts, $content = null, $shortcodename = '' ) {
		wp_enqueue_script( 'owl-carousel', CHERRY_PLUGIN_URL . 'lib/js/owl-carousel/owl.carousel.min.js', array('jquery'), '1.31', true );

		extract( shortcode_atts( array(
			'title'              => '',
			'posts_count'        => 10,
			'post_type'          => 'blog',
			'post_status'        => 'publish',
			'visibility_items'   => 5,
			'thumb'              => 'yes',
			'thumb_width'        => 220,
			'thumb_height'       => 180,
			'more_text_single'   => '',
			'categories'         => '',
			'excerpt_count'      => 15,
			'date'               => 'yes',
			'author'             => 'yes',
			'comments'           => 'no',
			'auto_play'          => 0,
			'display_navs'       => 'yes',
			'display_pagination' => 'yes',
			'custom_class'       => ''
		), $atts ) );

		$random_ID          = uniqid();
		$posts_count        = intval( $posts_count );
		$thumb              = $thumb == 'yes' ? true : false;
		$thumb_width        = absint( $thumb_width );
		$thumb_height       = absint( $thumb_height );
		$excerpt_count      = absint( $excerpt_count );
		$visibility_items   = absint( $visibility_items );
		$auto_play          = absint( $auto_play );
		$date               = $date == 'yes' ? true : false;
		$author             = $author == 'yes' ? true : false;
		$comments           = $comments == 'yes' ? true : false;
		$display_navs       = $display_navs == 'yes' ? 'true' : 'false';
		$display_pagination = $display_pagination == 'yes' ? 'true' : 'false';
		$itemcounter = 0;

		switch ( strtolower( str_replace(' ', '-', $post_type) ) ) {
			case 'blog':
				$post_type = 'post';
				break;
			case 'portfolio':
				$post_type = 'portfolio';
				break;
			case 'testimonial':
				$post_type = 'testi';
				break;
			case 'services':
				$post_type = 'services';
				break;
			case 'our-team':
				$post_type = 'team';
			break;
		}

		$get_category_type = $post_type == 'post' ? 'category' : $post_type.'_category';
		$categories_ids = array();
		foreach ( explode(',', str_replace(', ', ',', $categories)) as $category ) {
			$get_cat_id = get_term_by( 'name', $category, $get_category_type );
			if ( $get_cat_id ) {
				$categories_ids[] = $get_cat_id->term_id;
			}
		}
		$get_query_tax = $categories_ids ? 'tax_query' : '';

		$suppress_filters = get_option('suppress_filters'); // WPML filter

		// WP_Query arguments
		$args = array(
			'post_status'         => $post_status,
			'posts_per_page'      => $posts_count,
			'ignore_sticky_posts' => 1,
			'post_type'           => $post_type,
			'suppress_filters'    => $suppress_filters,
			"$get_query_tax"      => array(
				array(
					'taxonomy' => $get_category_type,
					'field'    => 'id',
					'terms'    => $categories_ids
					)
				)
		);

		// The Query
		$carousel_query = new WP_Query( $args );
		$output = '';

		if ( $carousel_query->have_posts() ) :

			$output .= '<div class="carousel-wrap ' . $custom_class . '">';
				$output .= $title ? '<h2>' . $title . '</h2>' : '';
				$output .= '<div id="owl-carousel-' . $random_ID . '" class="owl-carousel-' . $post_type . ' owl-carousel" data-items="' . $visibility_items . '" data-auto-play="' . $auto_play . '" data-nav="' . $display_navs . '" data-pagination="' . $display_pagination . '">';

				while ( $carousel_query->have_posts() ) : $carousel_query->the_post();
					$post_id         = $carousel_query->post->ID;
					$post_title      = esc_html( get_the_title( $post_id ) );
					$post_title_attr = esc_attr( strip_tags( get_the_title( $post_id ) ) );
					$format          = get_post_format( $post_id );
					$format          = (empty( $format )) ? 'format-standart' : 'format-' . $format;
					if ( get_post_meta( $post_id, 'tz_link_url', true ) ) {
						$post_permalink = ( $format == 'format-link' ) ? esc_url( get_post_meta( $post_id, 'tz_link_url', true ) ) : get_permalink( $post_id );
					} else {
						$post_permalink = get_permalink( $post_id );
					}
					if ( has_excerpt( $post_id ) ) {
						$excerpt = wp_strip_all_tags( get_the_excerpt() );
					} else {
						$excerpt = wp_strip_all_tags( strip_shortcodes (get_the_content() ) );
					}

					$output .= '<div class="item ' . $format . ' item-list-'.$itemcounter.'">';

						// post thumbnail
						if ( $thumb ) :

							if ( has_post_thumbnail( $post_id ) ) {
								$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
								$url            = $attachment_url['0'];
								$image          = aq_resize($url, $thumb_width, $thumb_height, true);

								$output .= '<figure>';
									$output .= '<a href="' . $post_permalink . '" title="' . $post_title . '">';
										$output .= '<img src="' . $image . '" alt="' . $post_title . '" />';
									$output .= '</a>';
								$output .= '</figure>';

							} else {

								$attachments = get_children( array(
									'orderby'        => 'menu_order',
									'order'          => 'ASC',
									'post_type'      => 'attachment',
									'post_parent'    => $post_id,
									'post_mime_type' => 'image',
									'post_status'    => null,
									'numberposts'    => 1
								) );
								if ( $attachments ) {
									foreach ( $attachments as $attachment_id => $attachment ) {
										$image_attributes = wp_get_attachment_image_src( $attachment_id, 'full' );
										$img              = aq_resize( $image_attributes[0], $thumb_width, $thumb_height, true );
										$alt              = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );

										$output .= '<figure>';
												$output .= '<a href="' . $post_permalink.'" title="' . $post_title . '">';
													$output .= '<img src="' . $img . '" alt="' . $alt . '" />';
											$output .= '</a>';
										$output .= '</figure>';
									}
								}
							}

						endif;

						$output .= '<div class="desc">';

							// post date
							$output .= $date ? '<time datetime="' . get_the_time( 'Y-m-d\TH:i:s', $post_id ) . '">' . get_the_date() . '</time>' : '';

							// post author
							$output .= $author ? '<em class="author">&nbsp;<span>' . __('by ', CHERRY_PLUGIN_DOMAIN) . '</span>&nbsp;<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ).'">' . get_the_author_meta( 'display_name' ) . '</a> </em>' : '';

							// post comment count
							if ( $comments == 'yes' ) {
								$comment_count = $carousel_query->post->comment_count;
								if ( $comment_count >= 1 ) :
									$comment_count = $comment_count . ' <span>' . __( 'Comments', CHERRY_PLUGIN_DOMAIN ) . '</span>';
								else :
									$comment_count = $comment_count . ' <span>' . __( 'Comment', CHERRY_PLUGIN_DOMAIN ) . '</span>';
								endif;
								$output .= '<a href="'. $post_permalink . '#comments" class="comments_link">' . $comment_count . '</a>';
							}

							// post excerpt
							if ( !empty($excerpt{0}) ) {
								$output .= $excerpt_count > 0 ? '<h5 class="excerpt">' . wp_trim_words( $excerpt, $excerpt_count ) . '</h5>' : '';
							}

							// post title
							if ( !empty($post_title{0}) ) {
								$output .= '<a href="' . $post_permalink . '" title="' . $post_title_attr . '">';
									$output .= $post_title;
								$output .= '</a>';
							}

							// post more button
							$more_text_single = esc_html( wp_kses_data( $more_text_single ) );
							if ( $more_text_single != '' ) {
								$output .= '<a href="' . get_permalink( $post_id ) . '" class="btn btn-primary" title="' . $post_title_attr . '">';
									$output .= __( $more_text_single, CHERRY_PLUGIN_DOMAIN );
								$output .= '</a>';
							}
						$output .= '</div>';
					$output .= '</div>';
					$itemcounter++;
				endwhile;
			$output .= '</div></div>';
		endif;

		// Restore original Post Data
		wp_reset_postdata();

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode( 'carousel_owl', 'shortcode_carousel_owl' );
}


if ( !function_exists('shortcode_skills_info') ) {
	function shortcode_skills_info( $args ) {

		extract( shortcode_atts( array(
			'posts_count'        => 10,
			'post_type'          => 'skills',
			'post_status'        => 'publish',
			'categories'         => '',
			'more_text_single'   => '',
			'excerpt_count'      => 15,
			'chart_width'        => '284',
			'chart_height'       => '284',
			'chart_base_color'   => '#000000',
			'chart_skill_color'  => '#ff0000',
			'custom_class'       => ''
		), $args) );

		$random_ID          = uniqid();
		$posts_count        = intval( $posts_count );
		$excerpt_count      = absint( $excerpt_count );
		$chart_width        = absint( $chart_width );
		$chart_height       = absint( $chart_height );

		$counter = 0;

		$colorSetsPie = array(
			array(
				'skill_color' => '#008d96',
				'base_color'  => 'rgb(43, 43, 43)'
			),
			array(
				'skill_color' => '#13baa8',
				'base_color'  => 'rgb(43, 43, 43)'
			),
			array(
				'skill_color' => '#78be20',
				'base_color'  => 'rgb(43, 43, 43)'
			),
			array(
				'skill_color' => '#f4fcfe',
				'base_color'  => 'rgb(43, 43, 43)'
			),
		);


		switch ( strtolower( str_replace(' ', '-', $post_type) ) ) {
			case 'blog':
				$post_type = 'post';
				break;
			case 'portfolio':
				$post_type = 'portfolio';
				break;
			case 'testimonial':
				$post_type = 'testi';
				break;
			case 'services':
				$post_type = 'services';
				break;
			case 'our-team':
				$post_type = 'team';
			break;
			case 'skills':
				$post_type = 'skills';
			break;
		}

		$get_category_type = $post_type == 'post' ? 'category' : $post_type.'_category';
		$categories_ids = array();
			foreach ( explode(',', str_replace(', ', ',', $categories)) as $category ) {
				$get_cat_id = get_term_by( 'name', $category, $get_category_type );
				if ( $get_cat_id ) {
					$categories_ids[] = $get_cat_id->term_id;
				}
			}

			$get_query_tax = $categories_ids ? 'tax_query' : '';
			$suppress_filters = get_option('suppress_filters'); // WPML filter
			// WP_Query arguments
			$args = array(
				'post_status'         => $post_status,
				'posts_per_page'      => $posts_count,
				'ignore_sticky_posts' => 1,
				'post_type'           => $post_type,
				'suppress_filters'    => $suppress_filters,
				'order'               => 'DESC',
				"$get_query_tax"      => array(
					array(
						'taxonomy' => $get_category_type,
						'field'    => 'id',
						'terms'    => $categories_ids
						)
					)
			);
		// The Query
		$bio_info_query = new WP_Query( $args );
		$output = '';
		if ( $bio_info_query->have_posts() ) :
			$output .= '<script type="text/javascript">
						jQuery(document).ready(function() {
								jQuery(".skills_wrapper > .skills-item").each(function(){
									jQuery(".diagram > span", this).css({width:jQuery(this).data("level")+"%"});
								})
						});';
			$output .= '</script>';
			$output .= '<div class="row skills_wrapper ' . $custom_class . '">';
				while ( $bio_info_query->have_posts() ) : $bio_info_query->the_post();
					$post_id         = $bio_info_query->post->ID;
					$format          = get_post_format( $post_id );
					$format          = (empty( $format )) ? 'format-standart' : 'format-' . $format;
					$post_category   = '';

					$level = get_post_meta($post_id, 'skills_caption', false);
					/*----------------------------------------------------*/
					$output .= '<div class="skills-item span4" data-level="'.$level[0].'">';
						$output .= '<div class="inner_wrap">';

							
							$output .='<div class="diagram"><span></span></div>';
							$output .='<canvas class="chartCanvasPie" width="'.$chart_width.'" height="'.$chart_height.'" data-base-color="'.$colorSetsPie[$counter]['base_color'].'" data-skill-color="'.$colorSetsPie[$counter]['skill_color'].'"></canvas>';

							$output .= '<div class="desc">';
								$output .='<div class="level"><span>'.$level[0].'%</span></div>';
								$output .= postTitleBuilder($post_id);
								$excerpt = get_the_excerpt();

								if($excerpt_count >= 1){
										$output .= '<div class="excerpt">';
											$output .= wp_trim_words($excerpt,$excerpt_count);
										$output .= '</div>';
								}
							$output .= '</div>'; 
						$output .= '</div>'; // end inner_wrap
					$output .= '</div>'; // end bio-item
					$counter++;
					if($counter == count($colorSetsPie)){$counter=0;}
				endwhile;
				$output .= '</div>'; //skills_wrapper
		endif; // have_posts
		// Restore original Post Data
		wp_reset_postdata();
		//Main output
		return $output;
	}
	add_shortcode( 'skills_info', 'shortcode_skills_info' );
}

//-------------- builder-functions & get-functions ---------------------//
		// Title builder
		function postTitleBuilder($postIdValue){
			$resultDOM = '';
			$post_title      = esc_html( get_the_title( $postIdValue ) );
			$post_title_attr = esc_attr( strip_tags( get_the_title( $postIdValue ) ) );
			if ( !empty($post_title{0}) ) {
				$resultDOM .= '<h5><a href="' . getPostPermalink($postIdValue) . '" title="' . $post_title_attr . '">';
					$resultDOM .= $post_title;
				$resultDOM .= '</a></h5>';
			}
			return $resultDOM;
		}

		// get post's permalink
		if ( !function_exists('getPostPermalink') ) {
			function getPostPermalink($postIdValue){
				if ( get_post_meta( $postIdValue, 'tz_link_url', true ) ) {
					$post_permalink = ( $format == 'format-link' ) ? esc_url( get_post_meta( $postIdValue, 'tz_link_url', true ) ) : get_permalink( $postIdValue );
				} else {
					$post_permalink = get_permalink( $postIdValue );
				}
				return $post_permalink;
			}
		}


// Spacer
if (!function_exists('spacer_shortcode')) {
	function spacer_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(array(
			'custom_class'  => ''
		), $atts));
		$output = '<div class="spacer '.$custom_class.'"></div><!-- .spacer (end) -->'; 

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('spacer', 'spacer_shortcode');
}

// Extra Wrap
if (!function_exists('extra_wrap_shortcode')) {
	function extra_wrap_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(array(
			'custom_class'  => ''
		), $atts));
		$output = '<div class="extra-wrap '.$custom_class.'">';
			$output .= do_shortcode($content);
		$output .= '</div>';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('extra_wrap', 'extra_wrap_shortcode');
}
		

//Recent Posts
if (!function_exists('shortcode_recent_posts_custom')) {

	function shortcode_recent_posts_custom( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(array(
				'type'             => 'post',
				'category'         => '',
				'custom_category'  => '',
				'tag'              => '',
				'post_format'      => 'standard',
				'num'              => '5',
				'meta'             => 'true',
				'thumb'            => 'true',
				'thumb_width'      => '570',
				'thumb_height'     => '415',
				'more_text_single' => '',
				'excerpt_count'    => '0',
				'custom_class'     => ''
		), $atts));

		$output = '<ul class="recent-posts-custom'.$custom_class.' unstyled">';

		global $post;
		global $my_string_limit_words;
		$item_counter = 0;
		// WPML filter
		$suppress_filters = get_option('suppress_filters');

		if($post_format == 'standard') {

			$args = array(
						'post_type'         => $type,
						'category_name'     => $category,
						'tag'               => $tag,
						$type . '_category' => $custom_category,
						'numberposts'       => $num,
						'orderby'           => 'post_date',
						'order'             => 'DESC',
						'tax_query'         => array(
						'relation'          => 'AND',
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-audio', 'post-format-video'),
								'operator' => 'NOT IN'
							)
						),
						'suppress_filters' => $suppress_filters
					);

		} else {

			$args = array(
				'post_type'         => $type,
				'category_name'     => $category,
				'tag'               => $tag,
				$type . '_category' => $custom_category,
				'numberposts'       => $num,
				'orderby'           => 'post_date',
				'order'             => 'DESC',
				'tax_query'         => array(
				'relation'          => 'AND',
					array(
						'taxonomy' => 'post_format',
						'field'    => 'slug',
						'terms'    => array('post-format-' . $post_format)
					)
				),
				'suppress_filters' => $suppress_filters
			);
		}

		$latest = get_posts($args);

		foreach($latest as $k => $post) {

				//Check if WPML is activated
				if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
					global $sitepress;

					$post_lang = $sitepress->get_language_for_element($post->ID, 'post_' . $type);
					$curr_lang = $sitepress->get_current_language();
					// Unset not translated posts
					if ( $post_lang != $curr_lang ) {
						unset( $latest[$k] );
					}
					// Post ID is different in a second language Solution
					if ( function_exists( 'icl_object_id' ) ) {
						$post = get_post( icl_object_id( $post->ID, $type, true ) );
					}
				}
				setup_postdata($post);
				$excerpt        = get_the_excerpt();
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url            = $attachment_url['0'];
				$image          = aq_resize($url, $thumb_width, $thumb_height, true);

				$post_classes = get_post_class();
				foreach ($post_classes as $key => $value) {
					$pos = strripos($value, 'tag-');
					if ($pos !== false) {
						unset($post_classes[$key]);
					}
				}
				$post_classes = implode(' ', $post_classes);

				$post_size_class = ( $item_counter%5 ) ? 'normal' : 'large';

				$output .= '<li class="recent-posts-custom_li ' . $post_classes . '  list-item-' . $item_counter . ' '.$post_size_class.' clearfix">';
				//Standard
				$output .= '<div class="wrapper">';

					if ($meta == 'true') {
							$output .= '<div class="meta">';
								$output .= get_the_date('d');

								$output .= '<span class="month">';
									$output .= get_the_date('M');
								$output .= '</span>';
							$output .= '</div>';
					}

					if ($thumb == 'true') {
						if ( has_post_thumbnail($post->ID) ){
							$output .= '<figure class="thumbnail featured-thumbnail"><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
							$output .= '<img src="'.$image.'" alt="' . get_the_title($post->ID) .'"/>';
							$output .= '</a></figure>';
						}
					}
					$output .= '<div class="recent-posts-custom_content">';
					$output .= '<h5><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
							$output .= get_the_title($post->ID);
					$output .= '</a></h5>';					
					$output .= cherry_get_post_networks(array('post_id' => $post->ID, 'display_title' => false, 'output_type' => 'return'));
					if ($excerpt_count >= 1 && $post_size_class == 'large') {
						$output .= '<div class="excerpt">';
							$output .= wp_trim_words($excerpt,$excerpt_count);
						$output .= '</div>';
					}
					if ($more_text_single!="") {
						$output .= '<a href="'.get_permalink($post->ID).'" class="btn btn-primary" title="'.get_the_title($post->ID).'">';
						$output .= $more_text_single;
						$output .= '</a>';
					}

					$output .= '</div>';
				
			$output .= '<div class="clear"></div>';
			$item_counter ++;
			$output .= '</div>';
			$output .= '</li><!-- .entry (end) -->';
		}
		wp_reset_postdata(); // restore the global $post variable
		$output .= '</ul><!-- .recent-posts (end) -->';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('recent_posts_custom', 'shortcode_recent_posts_custom');
}

// google_api_map_custom
if ( !function_exists('google_map_api_shortcode_custom') ) {
	function google_map_api_shortcode_custom( $atts, $content = null ) {
		extract(shortcode_atts(array(
				'lat_value'      => '41.850033'
			,	'lng_value'      => '-87.6500523'
			,	'zoom_value'     => '8'
			,	'zoom_wheel'     => 'no'
			,	'custom_class'  => ''
		), $atts));

		$random_id        = rand();
		$lat_value        = floatval( $lat_value );
		$lng_value        = floatval( $lng_value );
		$zoom_value       = intval( $zoom_value );
		$zoom_wheel       = $zoom_wheel=='yes' ? 'true' : 'false';

		$output = '<div class="google-map-api '.$custom_class.'">';
		$output .= '<div id="map-canvas-'.$random_id.'" class="gmap"></div>';
		$output .= '</div>';
		$output .= '<script type="text/javascript">
				google_api_map_init_'.$random_id.'();
				function google_api_map_init_'.$random_id.'(){
					var map;
					var coordData = new google.maps.LatLng(parseFloat('.$lat_value.'), parseFloat('.$lng_value.'));
					var marker;

					var styleArray = [
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#d3d3d3"
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "color": "#808080"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#b3b3b3"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "weight": 1.8
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#d7d7d7"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ebebeb"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a7a7a7"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#efefef"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#696969"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#737373"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#d6d6d6"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {},
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#dadada"
            }
        ]
    }
]

					function initialize() {
						var mapOptions = {
							zoom: '.$zoom_value.',
							center: coordData,
							scrollwheel: '.$zoom_wheel.',
                			styles: styleArray 
						}
						var map = new google.maps.Map(document.getElementById("map-canvas-'.$random_id.'"), mapOptions);

						var markerIcon = { 
			                url: "'.CHILD_URL.'/images/gmap_marker.png", 
			                size: new google.maps.Size(41, 61), 
			                origin: new google.maps.Point(0,0), 
			                anchor: new google.maps.Point(21, 61) 
			            }; 

						marker = new google.maps.Marker({
							map:map,
							draggable:false,
							position: coordData,
							icon: markerIcon
						});
					}
					google.maps.event.addDomListener(window, "load", initialize);
				}
				
		</script>';
		return $output;
	}
	add_shortcode('google_map_api_custom', 'google_map_api_shortcode_custom');
}


/*   Page_Block_SHORTCODE    */
	function page_block_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
				'hash_id'  => ''
		), $atts));
		$output = '<div class="hashAncor" id="'.$hash_id.'"></div>';
	    return $output;
	}
	add_shortcode('page_block', 'page_block_shortcode');




/*-----------------------------------------------------------------------------------*/
/* Custom Comments Structure
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mytheme_comment' ) ) {
	function mytheme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
			<div class="wrapper">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment->comment_author_email, 95 ); ?>
					
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php echo theme_locals("your_comment") ?></em>
				<?php endif; ?>
				<div class="extra-wrap">
					<div class="links">
						<?php printf('<strong class="author">%1$s</strong>', get_comment_author_link()) ?>
						<div class="comment-data"><?php printf('%1$s', get_comment_date('d/m')) ?></div>
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
					<?php comment_text() ?>
					
				</div>
			</div>
			
		</div>
<?php }
}	


//------------------------------------------------------
//  Related Posts
//------------------------------------------------------
	if(!function_exists('cherry_related_posts')){
		function cherry_related_posts($args = array()){
			global $post;
			$default = array(
				'post_type' => get_post_type($post),
				'class' => 'related-posts',
				'class_list' => 'related-posts_list',
				'class_list_item' => 'related-posts_item',
				'display_title' => true,
				'display_link' => true,
				'display_thumbnail' => true,
				'width_thumbnail' => 270,
				'height_thumbnail' => 186,
				'before_title' => '<h2 class="related-posts_h">',
				'after_title' => '</h2>',
				'posts_count' => 4
			);
			extract(array_merge($default, $args));

			$post_tags = wp_get_post_terms($post->ID, $post_type.'_tag', array("fields" => "slugs"));
			$tags_type = $post_type=='post' ? 'tag' : $post_type.'_tag' ;
			$suppress_filters = get_option('suppress_filters');// WPML filter
			$blog_related = apply_filters( 'cherry_text_translate', of_get_option('blog_related'), 'blog_related' );
			if ($post_tags && !is_wp_error($post_tags)) {
				$args = array(
					"$tags_type" => implode(',', $post_tags),
					'post_status' => 'publish',
					'posts_per_page' => $posts_count,
					'ignore_sticky_posts' => 1,
					'post__not_in' => array($post->ID),
					'post_type' => $post_type,
					'suppress_filters' => $suppress_filters
					);
				query_posts($args);
				if ( have_posts() ) {
					$output = '<div class="'.$class.'">';
					$output .= $display_title ? $before_title.$blog_related.$after_title : '' ;
					$output .= '<ul class="'.$class_list.' clearfix">';
					while( have_posts() ) {
						the_post();
						$thumb   = has_post_thumbnail() ? get_post_thumbnail_id() : PARENT_URL.'/images/empty_thumb.gif';
						$blank_img = stripos($thumb, 'empty_thumb.gif');
						$img_url = $blank_img ? $thumb : wp_get_attachment_url( $thumb,'full');
						$image   = $blank_img ? $thumb : aq_resize($img_url, $width_thumbnail, $height_thumbnail, true) or $img_url;
						$excerpt        = get_the_excerpt();

						$output .= '<li class="'.$class_list_item.'">';
						$output .= $display_thumbnail ? '<figure class="thumbnail featured-thumbnail"><a href="'.get_permalink().'" title="'.get_the_title().'"><img data-src="'.$image.'" alt="'.get_the_title().'" /></a></figure>': '' ;
						$output .= '<div class="related-posts_content">';
						$output .= $display_link ? '<h5><a href="'.get_permalink().'" >'.my_string_limit_words(get_the_title(),2).'</a></h5>': '' ;
						$output .= my_string_limit_words($excerpt, 10);
						$output .= '</div>';
						$output .= '</li>';
					}
					$output .= '</ul></div>';
					echo $output;
				}
				wp_reset_query();
			}
		}
	}


?>