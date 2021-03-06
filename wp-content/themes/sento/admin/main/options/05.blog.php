<?php
/**
 * Blog functions.
 *
 * @package ThinkUpThemes
 */


 /* ----------------------------------------------------------------------------------
	BLOG STYLE
---------------------------------------------------------------------------------- */

function thinkup_input_blogclass($classes){

// Get theme options values.
$thinkup_blog_style        = thinkup_var ( 'thinkup_blog_style' );
$thinkup_blog_style1layout = thinkup_var ( 'thinkup_blog_style1layout' );

	if ( thinkup_check_isblog() ) {
		if ( empty( $thinkup_blog_style ) or $thinkup_blog_style == 'option1' ) {
			if ( $thinkup_blog_style1layout !== 'option2' ) {
				$classes[] = 'blog-style1 blog-style1-layout1';
			} else {
				$classes[] = 'blog-style1 blog-style1-layout2';
			}
		} else {
			$classes[] = 'blog-style2';
		}
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_blogclass');

// Add blog class to search results page
function thinkup_input_searchclass($classes){

	if ( is_search() ) {
		$classes[] = 'blog-style1';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_searchclass');	


/* ----------------------------------------------------------------------------------
	BLOG STYLE (INCLUDED TO ALLOW ADDITION OF NEW LAYOUTS IN FUTURE UPDATE)
---------------------------------------------------------------------------------- */

function thinkup_input_stylelayout() {

// Get theme options values.
$thinkup_blog_style        = thinkup_var ( 'thinkup_blog_style' );
$thinkup_blog_style2layout = thinkup_var ( 'thinkup_blog_style2layout' );

	if ( $thinkup_blog_style !== 'option2' ) {
		echo ' column-1';
	} else if ( $thinkup_blog_style == 'option2' ) {			
		if ( empty($thinkup_blog_style2layout) or $thinkup_blog_style2layout == 'option1' ) {
			echo ' column-1';
		} else if ( $thinkup_blog_style2layout == 'option2' ) {
			echo ' column-2';
		} else if ( $thinkup_blog_style2layout == 'option3' ) {
			echo ' column-3';
		} else if ( $thinkup_blog_style2layout == 'option4' ) {
			echo ' column-4';
		}
	}
}


/* ----------------------------------------------------------------------------------
	BLOG STYLE - CLASSES FOR STYLE 1
---------------------------------------------------------------------------------- */

function thinkup_input_stylelayout_class1() {
global $post;

// Get theme options values.
$thinkup_blog_postswitch   = thinkup_var ( 'thinkup_blog_postswitch' );
$thinkup_blog_style        = thinkup_var ( 'thinkup_blog_style' );
$thinkup_blog_style1layout = thinkup_var ( 'thinkup_blog_style1layout' );

	if ( has_post_thumbnail( $post->ID ) and $thinkup_blog_postswitch !== 'option2' ) {
		if ( $thinkup_blog_style !== 'option2' and $thinkup_blog_style1layout !== 'option2' ) {
			echo ' one_fifth';
		}
	}
}

function thinkup_input_stylelayout_class2() {
global $post;

// Get theme options values.
$thinkup_blog_postswitch   = thinkup_var ( 'thinkup_blog_postswitch' );
$thinkup_blog_style        = thinkup_var ( 'thinkup_blog_style' );
$thinkup_blog_style1layout = thinkup_var ( 'thinkup_blog_style1layout' );

	if ( has_post_thumbnail( $post->ID ) and $thinkup_blog_postswitch !== 'option2' ) {
		if ( $thinkup_blog_style !== 'option2' and $thinkup_blog_style1layout !== 'option2' ) {
			echo ' four_fifth last';
		}
	}
}


/* ----------------------------------------------------------------------------------
	HIDE POST TITLE
---------------------------------------------------------------------------------- */

function thinkup_input_blogtitle() {

		echo	'<h2 class="blog-title">',
				'<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'sento' ), the_title_attribute( 'echo=0' ) ) ) . '">' . get_the_title() . '</a>',
				'</h2>';
}


/* ----------------------------------------------------------------------------------
	BLOG CONTENT
---------------------------------------------------------------------------------- */

// Input post thumbnail / featured media
function thinkup_input_blogimage() {
global $post;

// Get theme options values.
$thinkup_blog_style        = thinkup_var ( 'thinkup_blog_style' );
$thinkup_blog_style1layout = thinkup_var ( 'thinkup_blog_style1layout' );
$thinkup_blog_style2layout = thinkup_var ( 'thinkup_blog_style2layout' );
$thinkup_blog_lightbox     = thinkup_var ( 'thinkup_blog_hovercheck', 'option1' );
$thinkup_blog_link         = thinkup_var ( 'thinkup_blog_hovercheck', 'option2' );

	$size    = NULL;
	$link    = NULL;
	$media   = NULL;
	$output  = NULL;

	$blog_lightbox = NULL;
	$blog_link     = NULL;
	$blog_class    = NULL;
	$blog_overlay  = NULL;

	// Set image size for blog thumbnail
	if ( $thinkup_blog_style !== 'option2' ) {
		if ( empty($thinkup_blog_style1layout) or $thinkup_blog_style1layout == 'option1' ) {
			$size = 'column4-1/1';
		} else {
			$size = 'column1-1/4';
		}
	} else if ( $thinkup_blog_style == 'option2' ) {			
		if ( empty($thinkup_blog_style2layout) or $thinkup_blog_style2layout == 'option1' ) {
			$size = 'column1-1/3';
		} else if ( $thinkup_blog_style2layout == 'option2' ) {
			$size = 'column2-1/2';
		} else if ( $thinkup_blog_style2layout == 'option3' ) {
			$size = 'column3-2/3';
		} else if ( $thinkup_blog_style2layout == 'option4' ) {
			$size = 'column4-2/3';
		}
	}

	$featured_id = get_post_thumbnail_id( $post->ID );
	$featured_img = wp_get_attachment_image_src($featured_id,'full', true);

	// Determine featured media to input
	$link  = $featured_img[0];
	$media = get_the_post_thumbnail( $post->ID, $size );

	// Determine which links to show on hover
	if ( $thinkup_blog_lightbox =='1' ) {
		$blog_lightbox = '<a class="hover-zoom prettyPhoto" href="' . esc_url( $link ) . '"><i class="dashicons dashicons-editor-distractionfree"></i></a>';
	}
	if ( $thinkup_blog_link =='1' ) {
		$blog_link = '<a class="hover-link" href="' . esc_url( get_permalink() ) . '"><i class="dashicons dashicons-arrow-right-alt2"></i></a>';
	}

	// Determine which if single link animation should be shown
	if ( ( $thinkup_blog_lightbox =='1' and $thinkup_blog_link !== '1' ) 
		or ( $thinkup_blog_lightbox !=='1' and $thinkup_blog_link == '1' ) ) {
		$blog_class = ' style2';
	}

	if ( $thinkup_blog_lightbox =='1' or $thinkup_blog_link =='1' ) {
		$blog_overlay .= '<div class="image-overlay' . $blog_class . '">';
		$blog_overlay .= '<div class="image-overlay-inner"><div class="prettyphoto-wrap">';
		$blog_overlay .= $blog_lightbox;
		$blog_overlay .= $blog_link;
		$blog_overlay .= '</div></div>';
		$blog_overlay .= '</div>';
	}

	// Output media on blog page
	if ( ! empty( $featured_id ) ) {
		$output .= '<div class="blog-thumb">';
		$output .= '<a href="'. esc_url( get_permalink( $post->ID ) ) . '">' . $media . '</a>';
		$output .= $blog_overlay;
		$output .= '</div>';
	}

	return $output;
}

// Input post excerpt / content to blog page
function thinkup_input_blogtext() {
global $post;

// Get theme options values.
$thinkup_blog_postswitch = thinkup_var ( 'thinkup_blog_postswitch' );

	// Output full content - EDD plugin compatibility
	if( function_exists( 'EDD' ) and is_post_type_archive( 'download' ) ) {
		the_content();
		return;
	}

	// Output post content
	if ( is_search() ) {
		the_excerpt();
	} else if ( ! is_search() ) {
		if ( ( empty( $thinkup_blog_postswitch ) or $thinkup_blog_postswitch == 'option1' ) ) {
			if( ! is_numeric( strpos( $post->post_content, '<!--more-->' ) ) ) {
				the_excerpt();
			} else {
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sento' ), 'after'  => '</div>', ) );
			}
		} else if ( $thinkup_blog_postswitch == 'option2' ) {
			the_content();
			wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sento' ), 'after'  => '</div>', ) );
		}
	}
}


/* ----------------------------------------------------------------------------------
	BLOG POST EXCERPT
---------------------------------------------------------------------------------- */

function thinkup_input_blogpostexcerpt() {

// Get theme options values.
$thinkup_blog_postswitch  = thinkup_var ( 'thinkup_blog_postswitch' );
$thinkup_blog_postexcerpt = thinkup_var ( 'thinkup_blog_postexcerpt' );

	if ( $thinkup_blog_postswitch == 'option1' or empty( $thinkup_blog_postswitch ) ) {
		if ( thinkup_check_isblog() ) {
			if ( is_numeric( $thinkup_blog_postexcerpt ) ) {
				return $thinkup_blog_postexcerpt;
			}
		}
	}

	// return default value if not triggered above
	return 55;
}
add_filter( 'excerpt_length', 'thinkup_input_blogpostexcerpt', 999 );


/* ----------------------------------------------------------------------------------
	BLOG META CONTENT & POST META CONTENT
---------------------------------------------------------------------------------- */

// Input sticky post
function thinkup_input_sticky() {
	printf( '<span class="sticky"><a href="%1$s" title="%2$s">' . __( 'Sticky', 'sento' ) . '</a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() )
	);
}

// Input blog date
function thinkup_input_blogdate() {
	printf( __( '<span class="date"><a href="%1$s" title="%2$s"><time datetime="%3$s"><span class="date-day">%4$s</span><span class="date-month">%5$s</span></time></a></span>', 'sento' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'j' ) ),
		esc_html( get_the_date( 'F' ) )
	);
}

// Input blog comments
function thinkup_input_blogcomment() {

	if ( '0' != get_comments_number() ) {
		echo	'<span class="comment">';
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {;
				comments_popup_link( __( '<span class="comment-count">0</span> <span class="comment-text">Comments</span>', 'sento' ), __( '<span class="comment-count">1</span> <span class="comment-text">Comment</span>', 'sento' ), __( '<span class="comment-count">%</span> <span class="comment-text">Comments</span>', 'sento' ) );
			};
		echo	'</span>';
	}
}

// Input blog categories
function thinkup_input_blogcategory() {
$categories_list = get_the_category_list( __( ', ', 'sento' ) );

	if ( $categories_list && thinkup_input_categorizedblog() ) {
		echo	'<span class="category">';
		printf( '%1$s', $categories_list );
		echo	'</span>';
	};
}

// Input blog tags
function thinkup_input_blogtag() {
$tags_list = get_the_tag_list( '', __( ', ', 'sento' ) );

	if ( $tags_list ) {
		echo	'<span class="tags">';
		printf( '%1$s', $tags_list );
		echo	'</span>';
	};
}

// Input blog author
function thinkup_input_blogauthor() {
	printf( __( '<span class="author"><a href="%1$s" title="%2$s" rel="author">%3$s</a></span>', 'sento' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'sento' ), get_the_author() ) ),
		get_the_author()
	);
}


//----------------------------------------------------------------------------------
//	CUSTOM READ MORE BUTTON.
//----------------------------------------------------------------------------------

function thinkup_input_readmore( $link ) {
global $post;

	// Set variables to avoid php non-object notice error
	$class_button = NULL;

	// Make no changes if in admin area
	if ( is_admin() ) {
		return $link;
	}

	// Specify button class for blog style
	$class_button = 'themebutton2';		

	$link = '<p class="more-link"><a href="'. esc_url( get_permalink( $post->ID ) ) . '" class="' . $class_button . '">' . esc_html__( 'READ MORE', 'sento' ) . '</a></p>';

	return $link;
}
add_filter( 'excerpt_more', 'thinkup_input_readmore' );
add_filter( 'the_content_more_link', 'thinkup_input_readmore' );


/* ----------------------------------------------------------------------------------
	INPUT BLOG META COMMENT CLASS
---------------------------------------------------------------------------------- */

// Input blog comments
function thinkup_input_blogcommentclass() {

// Get theme options values.
$thinkup_blog_date = thinkup_var ( 'thinkup_blog_date' );

	// Ensure entry-ontent displays correctly if post has no featured media
	$check_blogimage = thinkup_input_blogimage();

	if ( empty( $check_blogimage ) ) {
		$class_aligndate = '1';
	} else {
		$class_aligndate = NULL;
	}

	// Only output for blog layout 1
	if ( $thinkup_blog_date !== '1' and $class_aligndate == '1' ) {
		echo ' date-icon';
	}
}


/* ----------------------------------------------------------------------------------
	INPUT BLOG META CONTENT
---------------------------------------------------------------------------------- */

// Blog meta content - Blog style 1
function thinkup_input_blogmeta() {

// Get theme options values.
$thinkup_blog_date     = thinkup_var ( 'thinkup_blog_date' );
$thinkup_blog_author   = thinkup_var ( 'thinkup_blog_author' );
$thinkup_blog_comment  = thinkup_var ( 'thinkup_blog_comment' );
$thinkup_blog_category = thinkup_var ( 'thinkup_blog_category' );
$thinkup_blog_tag      = thinkup_var ( 'thinkup_blog_tag' );

	if ( $thinkup_blog_date !== '1' or 
		$thinkup_blog_author !== '1' or 
		$thinkup_blog_comment !== '1' or 
		$thinkup_blog_category !== '1' or 
		$thinkup_blog_tag !== '1') {

		echo '<div class="entry-meta">';
			if ( is_sticky() && is_home() && ! is_paged() ) { thinkup_input_sticky(); }
			if ($thinkup_blog_date !== '1')     { thinkup_input_blogdate();     }
			if ($thinkup_blog_author !== '1')   { thinkup_input_blogauthor();   }
			if ($thinkup_blog_comment !== '1')  { thinkup_input_blogcomment();  }	
			if ($thinkup_blog_category !== '1') { thinkup_input_blogcategory(); }
			if ($thinkup_blog_tag !== '1')      { thinkup_input_blogtag();      }
		echo '</div>';
	}
}


/* ----------------------------------------------------------------------------------
	INPUT POST META CONTENT
---------------------------------------------------------------------------------- */

function thinkup_input_postmedia() {
global $post;

	// Set output variable to avoid php errors
	$output = NULL;

	if ( get_post_format() == 'image' ) {

		$output .= '<div class="post-thumb">' . get_the_post_thumbnail( $post->ID, 'column1-1/4' ) . '</div>';

	}

	// Output featured items if set
	if ( ! empty( $output ) ) {
		echo $output;
	}
}

// Add format-media class to post article for featured image, gallery and video
function thinkup_input_postmediaclass($classes) {

	if ( is_singular( 'post' ) ) {
		if ( get_post_format() == 'image' ) {
			$classes[] = 'format-media';
		} else {
			$classes[] = 'format-nomedia';			
		}
	}
	return $classes;
}
add_action( 'post_class', 'thinkup_input_postmediaclass');

// Input meta data for single post
function thinkup_input_postmeta() {

// Get theme options values.
$thinkup_post_date     = thinkup_var ( 'thinkup_post_date' );
$thinkup_post_author   = thinkup_var ( 'thinkup_post_author' );
$thinkup_post_comment  = thinkup_var ( 'thinkup_post_comment' );
$thinkup_post_category = thinkup_var ( 'thinkup_post_category' );
$thinkup_post_tag      = thinkup_var ( 'thinkup_post_tag' );
$thinkup_post_title    = thinkup_var ( 'thinkup_post_title' );

	// Reset variable values to avoid php error
	$class_comment = NULL;

	if ( $thinkup_post_date !== '1' or 
		$thinkup_post_author !== '1' or 
		$thinkup_post_comment !== '1' or 
		$thinkup_post_category !== '1' or 
		$thinkup_post_tag !== '1' or 
		$thinkup_post_title !== '1') {

			// Only output for blog layout 1
			if ( '0' != get_comments_number() and $thinkup_post_comment !== '1' ) {
				$class_comment = ' comment-icon';
			}

			echo '<header class="entry-header' . $class_comment . '">';

			if ($thinkup_post_title !== '1') { echo '<h3 class="post-title">' . get_the_title() . '</h3>'; }

			echo '<div class="entry-meta">';
				if ($thinkup_post_date !== '1')     { thinkup_input_blogdate();     }
				if ($thinkup_post_author !== '1')   { thinkup_input_blogauthor();   }
				if ($thinkup_post_comment !== '1')  { thinkup_input_blogcomment();  }	
				if ($thinkup_post_category !== '1') { thinkup_input_blogcategory(); }
				if ($thinkup_post_tag !== '1')      { thinkup_input_blogtag();      }
			echo '</div>';

			echo '<div class="clearboth"></div></header><!-- .entry-header -->';
	}
}


/* ----------------------------------------------------------------------------------
	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
---------------------------------------------------------------------------------- */

/* Display comments  - Style 1 */
function thinkup_input_allowcomments() {

	if ( comments_open() || '0' != get_comments_number() ) {
		comments_template( '/comments.php', true );
	}
}


/* ----------------------------------------------------------------------------------
	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
---------------------------------------------------------------------------------- */

function thinkup_input_commenttemplate( $comment, $args, $depth ) {

	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'sento'); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'sento' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
					<?php echo get_avatar( $comment, 100 ); ?>
			<header>

				<div class="comment-author">
					<h4><?php printf( '%s', sprintf( '%s', get_comment_author_link() ) ); ?></h4>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'sento'); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php esc_attr( comment_time( 'c' ) ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( '%1$s', get_comment_date( "j / M / Y" ) ); ?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', 'sento' ), ' ' );
					?>
				</div>

				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span>

			</header><div class="clearboth"></div>

			<footer>

				<div class="comment-content"><?php comment_text(); ?></div>

			</footer>

		</article><!-- #comment-## -->

	<?php
	break;
	endswitch;
}

// List comments in single page
function thinkup_input_comments() {
	$args = array( 
		'callback' => 'thinkup_input_commenttemplate', 
	);
	wp_list_comments( $args );
}


?>