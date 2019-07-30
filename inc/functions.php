<?php 
function starwar_script_enqueue(){
    //we can also register the scripts with wordpress before enqueuing or embeding them into wordpress.
    // and if we can using mutilingual support like urdo bootstrap rtl version then we can use it.
    // after register our scripts we can check if(is_rtl()):else: wp_enqueue or dequeue the scripts which we want....and if we are embeding scripts specific to admin panel then register or embed them with admin_enqueue_scripts ......
    // basically we are not registering but enqueing the scripts directly below..it is upon you...
    // put global available script out side the condition blocks as if else...
    // deregiter or dequeue the unnecessary or unused scripts.
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/styles.css', array(), '1.0.0', 'all'); 
   
    wp_enqueue_style('bootstrapstyle', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.3', 'all');    
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);    // by default false in footer

    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.1.3', true);    // by default false in footer
    
}
add_action('wp_enqueue_scripts', 'starwar_script_enqueue' );

function starwar_theme_menu(){
    //this hook comes with 10 premade features....
    add_theme_support('menus');
//    add_theme_support( 'post-formats' ); //supporst 9 type of predefined posts structure
    
    
    register_nav_menu('primary', 'Primary Header Navigation');//location-description
    register_nav_menu('secondry', 'Footer Navigation');
    register_sidebar(array('name'=>__('Right Sidebar','starwartheme'),
                          'id' => 'starwar-right-sidebar',
                          'description' => 'This is Right sidebar of starwar theme.',
                          'class' => '',
                          'before-widget' => '<div id="%1$s" class="widget %2$s p-5"> ',
                          'after-widget' => '</div>',
                          'before-title' => '<h4 class="widget_title">',
                          'after-title' => '</h4>' ) );
      register_sidebar(array('name'=>__('Left Sidebar','starwartheme'),
                          'id' => 'starwar-left-sidebar',
                          'description' => 'This is Right sidebar of starwar theme.',
                          'class' => '',
                          'before-widget' => '<div id="%1$s" class="widget %2$s p-5"> ',
                          'after-widget' => '</div>',
                          'before-title' => '<h4 class="widget_title">',
                          'after-title' => '</h4>' ) );
     register_sidebar(array('name'=>__('Footer First Sidebar','starwartheme'),
                          'id' => 'footer-first-sidebar',
                          'description' => 'This is Footer sidebar of starwar theme.',
                          'class' => '',
                          'before-widget' => '<div id="%1$s" class="widget %2$s p-3"> ',
                          'after-widget' => '</div>',
                          'before-title' => '<h4 class="widget_title">',
                          'after-title' => '</h4>' ) );
    register_sidebar(array('name'=>__('Footer Second Sidebar','starwartheme'),
                          'id' => 'footer-second-sidebar',
                          'description' => 'This is Footer 2nd sidebar of starwar theme.',
                          'class' => '',
                          'before-widget' => '<div id="%1$s" class="widget %2$s p-3"> ',
                          'after-widget' => '</div>',
                          'before-title' => '<h4 class="widget_title">',
                          'after-title' => '</h4>' ) );
}
add_action('after_setup_theme', 'starwar_theme_menu'); //after_setup_theme

add_theme_support('custom-background');
add_theme_support('custom-header',array('default_text_color'=>'blue'));
//add_theme_support('post_thumbnails',array('post','movie'));
add_theme_support('post-thumbnails'); // keeping outside from init..// we can make it specific to pages or post
add_theme_support( 'post-formats', array('aside','image','video','gallery','quote','status','link','audio','chat') ); // prebuild 9 type of post-formats// use array of formats 

add_theme_support('title-tag');  //to add the title to our theme header

function starwar_add_meta_tag_in_head(){
    echo ' <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit= no "> ';
}
//by using wp head hook we can add meta tag in our header section.
add_action('wp_head', 'starwar_add_meta_tag_in_head',2);

/*add_theme_support( 'starter-content', array(
    // Place widgets in the desired locations (such as sidebar or footer).
    // Example widgets: archives, calendar, categories, meta, recent-comments, recent-posts, 
    //                  search, text_business_info, text_about
    'widgets'     => array( 'sidebar-1' => array( 'search', 'categories', 'meta'), ),
    // Specify pages to create, and optionally add custom thumbnails to them.
    // Note: For thumbnails, use attachment symbolic references in {{double-curly-braces}}.
    // Post options: post_type, post_title, post_excerpt, post_name (slug), post_content, 
    //               menu_order, comment_status, thumbnail (featured image ID), and template
    'posts'       => array( 'home', 'about', 'blog' => array( 'thumbnail' => '{{image-cafe}}' ), ),
    // Create custom image attachments used as post thumbnails for pages.
    // Note: You can reference these attachment IDs in the posts section above. Example: {{image-cafe}}
    'attachments' => array( 'image-cafe' => array( 'post_title' => 'Cafe', 'file' => 'assets/images/cafe.jpg' ), ),
    // Assign options defaults, such as front page settings.
    // The 'show_on_front' value can be 'page' to show a specified page, or 'posts' to show your latest posts.
    // Note: Use page ID symbolic references from the posts section above wrapped in {{double-curly-braces}}.
    'options'     => array( 'show_on_front'  => 'page', 'page_on_front' => '{{home}}', 'page_for_posts' => '{{blog}}', ),
    // Set the theme mods.
    'theme_mods'  => array( 'panel_1' => '{{about}}' ),
    // Set up nav menus.
    'nav_menus'   => array( 'top' => array( 'name' => 'Top Menu', 'items' => array( 'link_home', 'page_about', 'page_blog' )), ),
) );*/


/*
    Enabling theme support for align full and align wide option for the block editor, use
        add_theme_support( 'align-wide' );
*/
require get_template_directory() . '/widget.php';