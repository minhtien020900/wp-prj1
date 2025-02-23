<?php
/**
 * Pubnews Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pubnews
 * @subpackage Pubnews Plus
 */
use Pubnews\CustomizerDefault as PND;

if ( ! defined( 'PUBNEWS_PLUS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$theme_info = wp_get_theme();
	define( 'PUBNEWS_PLUS_VERSION', $theme_info->get( 'Version' ) );
}

if ( ! defined( 'PUBNEWS_PLUS_PREFIX' ) ) {
	// Replace the prefix of theme if changed.
	define( 'PUBNEWS_PLUS_PREFIX', 'pubnews_plus_' );
}

if( ! function_exists( 'pubnews_plus_remove_parent_theme_actions' ) ) :
	/**
	 * Removes required actions in parent theme
	 * 
	 */
	function pubnews_plus_remove_parent_theme_actions() {
		remove_action( 'customize_register', 'pubnews_customizer_main_banner_panel', 10 );
        remove_action( 'pubnews_main_banner_hook', 'pubnews_main_banner_part', 10 );
	}
	add_action( 'after_setup_theme', 'pubnews_plus_remove_parent_theme_actions', 15 );
endif;

add_filter( 'pubnews_get_customizer_defaults', function($defaults) {
    $defaults['header_newsletter_option'] = false;
    $defaults['header_off_canvas_option'] = false;
    $defaults['header_search_option'] = false;
    $defaults['main_banner_layout'] = 'three';
    $defaults['main_banner_block_posts_to_include'] = [];
    $defaults['main_banner_block_posts_categories'] = [];
    $defaults['main_banner_block_posts_order_by'] = 'rand-desc';
    $defaults['theme_color'] = '#cf2e2e';
    $defaults['site_description_color'] = '#494949';
    $defaults['site_title_hover_textcolor'] = '#000000';
    $defaults['header_background_color_group'] = json_encode(array(
                'type'  => 'solid',
                'solid' => '#ffffff',
                'gradient'  => null,
                'image'     => array( 'media_id' => 0, 'media_url' => '' )
            ));
    $defaults['header_menu_background_color_group'] = json_encode(array(
                'type'  => 'solid',
                'solid' => '#ffffff',
                'gradient'  => null
            ));
    $defaults['header_sub_menu_background_color_group'] = json_encode(array(
                'type'  => 'solid',
                'solid' => '#ffffff',
                'gradient'  => null
            ));

    $defaults['header_menu_typo']    = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '600', 'label' => 'Medium 600' ),
                'font_size'   => array(
                    'desktop' => 15,
                    'tablet' => 15,
                    'smartphone' => 15
                ),
                'line_height'   => array(
                    'desktop' => 36,
                    'tablet' => 36,
                    'smartphone' => 36,
                ),
                'letter_spacing'   => array(
                    'desktop' => 0.3,
                    'tablet' => 0.3,
                    'smartphone' => 0.3
                ),
                'text_transform'    => 'capitalize'
            );

        $defaults['header_sub_menu_typo']    = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '500', 'label' => 'Regular 500' ),
                'font_size'   => array(
                    'desktop' => 14,
                    'tablet' => 14,
                    'smartphone' => 14
                ),
                'letter_spacing'   => array(
                    'desktop' => 0.3,
                    'tablet' => 0.3,
                    'smartphone' => 0.3
                ),
                'text_transform'    => 'capitalize'
            );

        $defaults['single_post_title_typo'] = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '600', 'label' => 'Bold 600' )
            );

        $defaults['site_archive_post_title_typo']    = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '500', 'label' => 'Bold 500' ),
                'font_size'   => array(
                    'desktop' => 22,
                    'tablet' => 18,
                    'smartphone' => 15
                ),
                'line_height'   => array(
                    'desktop' => 22,
                    'tablet' => 28,
                    'smartphone' => 24
                ),
                'letter_spacing'   => array(
                    'desktop' => 0.1,
                    'tablet' => 0.1,
                    'smartphone' => 0.1
                ),
                'text_transform'    => 'unset',
                'text_decoration'    => 'none',
            );

        $defaults['site_section_block_title_typo']    = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '600', 'label' => 'Bold 600' ),
                'font_size'   => array(
                    'desktop' => 16,
                    'tablet' => 16,
                    'smartphone' => 16
                ),
                'line_height'   => array(
                    'desktop' => 23,
                    'tablet' => 23,
                    'smartphone' => 23
                ),
                'letter_spacing'   => array(
                    'desktop' => 0.2,
                    'tablet' => 0.2,
                    'smartphone' => 0.2
                ),
                'text_transform'    => 'uppercase',
                'text_decoration'    => 'none',
            );

        $defaults['site_archive_post_title_typo']    = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '500', 'label' => 'Bold 500' ),
                'font_size'   => array(
                    'desktop' => 22,
                    'tablet' => 18,
                    'smartphone' => 15
                ),
                'line_height'   => array(
                    'desktop' => 24,
                    'tablet' => 30,
                    'smartphone' => 26
                ),
                'letter_spacing'   => array(
                    'desktop' => 0,
                    'tablet' => 0,
                    'smartphone' => 0
                ),
                'text_transform'    => 'unset',
                'text_decoration'    => 'none',
            );

        $defaults['site_title_typo']    = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '700', 'label' => 'Bold 700' ),
                'font_size'   => array(
                    'desktop' => 40,
                    'tablet' => 40,
                    'smartphone' => 40
                ),
                'line_height'   => array(
                    'desktop' => 45,
                    'tablet' => 42,
                    'smartphone' => 40,
                ),
                'letter_spacing'   => array(
                    'desktop' => 0,
                    'tablet' => 0,
                    'smartphone' => 0
                ),
                'text_transform'    => 'unset',
                'text_decoration'    => 'none',
            );

            $defaults['site_tagline_typo']    = array(
                'font_family'   => array( 'value' => 'Outfit', 'label' => 'Outfit' ),
                'font_weight'   => array( 'value' => '500', 'label' => 'Medium 500' ),
                'font_size'   => array(
                    'desktop' => 14,
                    'tablet' => 14,
                    'smartphone' => 14
                ),
                'line_height'   => array(
                    'desktop' => 15,
                    'tablet' => 15,
                    'smartphone' => 15
                ),
                'letter_spacing'   => array(
                    'desktop' => 0,
                    'tablet' => 0,
                    'smartphone' => 0
                ),
                'text_transform'    => 'capitalize',
                'text_decoration'    => 'none',
            );




    return $defaults;
});

if( ! function_exists( 'pubnews_plus_scripts' ) ) :
	/**
	 * Enqueue theme scripts and styles.
	 */
	function pubnews_plus_scripts() {
		// enqueue inline style
		wp_dequeue_style( 'pubnews-style' );
		wp_enqueue_style( 'pubnews-plus-parent-style', get_template_directory_uri(). '/style.css', [], PUBNEWS_PLUS_VERSION );
		wp_enqueue_style( 'pubnews-plus-style', get_stylesheet_uri(), [], PUBNEWS_PLUS_VERSION );
		wp_add_inline_style( 'pubnews-plus-parent-style', pubnews_current_styles() );
	}
	add_action( 'wp_enqueue_scripts', 'pubnews_plus_scripts', 999 );
endif;

if( !function_exists( 'pubnews_plus_customizer_main_banner_panel' ) ) :
    /**
     * Register main banner section settings
     * 
     */
    function pubnews_plus_customizer_main_banner_panel( $wp_customize ) {
        /**
         * Main Banner section
         * 
         */
        $wp_customize->add_section( 'pubnews_main_banner_section', array(
            'title' => esc_html__( 'Main Banner', 'pubnews-plus' ),
            'priority'  => 70
        ));

        // main banner section tab
        $wp_customize->add_setting( 'main_banner_section_tab', array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'   => 'general'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Section_Tab_Control( $wp_customize, 'main_banner_section_tab', array(
                'section'     => 'pubnews_main_banner_section',
                'priority'  => 1,
                'choices'  => array(
                    array(
                        'name'  => 'general',
                        'title'  => esc_html__( 'General', 'pubnews-plus' )
                    ),
                    array(
                        'name'  => 'design',
                        'title'  => esc_html__( 'Design', 'pubnews-plus' )
                    )
                )
            ))
        );

        // main banner option
        $wp_customize->add_setting( 'main_banner_option', array(
            'default'   => PND\pubnews_get_customizer_default( 'main_banner_option' ),
            'sanitize_callback' => 'pubnews_sanitize_toggle_control'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Toggle_Control( $wp_customize, 'main_banner_option', array(
                'label'	      => esc_html__( 'Show main banner', 'pubnews-plus' ),
                'section'     => 'pubnews_main_banner_section',
                'settings'    => 'main_banner_option'
            ))
        );

		// main banner Layouts
        $wp_customize->add_setting( 'main_banner_layout', array(
            'default'           => PND\pubnews_get_customizer_default( 'main_banner_layout' ),
            'sanitize_callback' => 'pubnews_sanitize_select_control',
        ));
        $wp_customize->add_control( new Pubnews_WP_Radio_Image_Control(
            $wp_customize,
            'main_banner_layout',
            array(
                'section'  => 'pubnews_main_banner_section',
                'priority' => 10,
                'choices'  => array(
                    'three' => array(
                        'label' => esc_html__( 'Layout Three', 'pubnews-plus' ),
                        'url'   => esc_url( get_stylesheet_directory_uri() . '/assets/images/customizer/main_banner_three.jpg' )
                    ),
                    'six' => array(
                        'label' => esc_html__( 'Layout Six', 'pubnews-plus' ),
                        'url'   => esc_url( get_stylesheet_directory_uri() . '/assets/images/customizer/main_banner_six.jpg' )
                    )
                )
            )
        ));

        // main banner slider setting heading
        $wp_customize->add_setting( 'main_banner_slider_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Section_Heading_Control( $wp_customize, 'main_banner_slider_settings_header', array(
                'label'	      => esc_html__( 'Slider Setting', 'pubnews-plus' ),
                'section'     => 'pubnews_main_banner_section',
                'settings'    => 'main_banner_slider_settings_header',
                'type'        => 'section-heading',
            ))
        );

        // Main Banner slider orderby
        $wp_customize->add_setting( 'main_banner_slider_order_by', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_slider_order_by' ),
            'sanitize_callback' => 'pubnews_sanitize_select_control'
        ));
        $wp_customize->add_control( 'main_banner_slider_order_by', array(
            'type'      => 'select',
            'section'   => 'pubnews_main_banner_section',
            'label'     => esc_html__( 'Orderby', 'pubnews-plus' ),
            'choices'   => pubnews_customizer_orderby_options_array(),
        ));
        
        // Main Banner slider categories
        $wp_customize->add_setting( 'main_banner_slider_categories', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_slider_categories' ),
            'sanitize_callback' => 'pubnews_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Async_Multiselect_Control( $wp_customize, 'main_banner_slider_categories', array(
                'label'     => esc_html__( 'Posts Categories', 'pubnews-plus' ),
                'section'   => 'pubnews_main_banner_section',
                'settings'  => 'main_banner_slider_categories',
                'endpoint' =>  'extend/get_taxonomy',
                'purpose'   =>  'category'
            ))
        );

        // main banner posts
        $wp_customize->add_setting( 'main_banner_posts', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_posts' ),
            'sanitize_callback' => 'pubnews_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Async_Multiselect_Control( $wp_customize, 'main_banner_posts', array(
                'label'     => esc_html__( 'Posts To Include', 'pubnews-plus' ),
                'section'   => 'pubnews_main_banner_section',
                'settings'  => 'main_banner_posts'
            ))
        );

        // main banner post query date range
        $wp_customize->add_setting( 'main_banner_date_filter', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_date_filter' ),
            'sanitize_callback' => 'pubnews_sanitize_select_control'
        ));
        $wp_customize->add_control( 'main_banner_date_filter', array(
            'label'     => __( 'Date Range', 'pubnews-plus' ),
            'type'      => 'select',
            'section'   => 'pubnews_main_banner_section',
            'choices'   => pubnews_get_date_filter_choices_array()
        ));

        // Main banner six trailing posts setting heading
        $wp_customize->add_setting( 'main_banner_six_trailing_posts_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Section_Heading_Control( $wp_customize, 'main_banner_six_trailing_posts_settings_header', array(
                'label'	      => esc_html__( 'Trailing Posts Setting', 'pubnews-plus' ),
                'section'     => 'pubnews_main_banner_section',
                'settings'    => 'main_banner_six_trailing_posts_settings_header',
				'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'six' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        // Main banner trailing posts layouts
        $wp_customize->add_setting( 'main_banner_six_trailing_posts_layout', array(
            'default'           => PND\pubnews_get_customizer_default( 'main_banner_six_trailing_posts_layout' ),
            'sanitize_callback' => 'pubnews_sanitize_select_control',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control( new Pubnews_WP_Radio_Image_Control(
            $wp_customize,
            'main_banner_six_trailing_posts_layout',
            array(
                'section'  => 'pubnews_main_banner_section',
                'priority' => 10,
                'choices'  => array(
                    'row' => array(
                        'label' => esc_html__( 'Row Layout', 'pubnews-plus' ),
                        'url'   => '%s/assets/images/customizer/main_banner_six_trailing_posts_layout_row.jpg'
                    ),
                    'column' => array(
                        'label' => esc_html__( 'Column Layout', 'pubnews-plus' ),
                        'url'   => '%s/assets/images/customizer/main_banner_six_trailing_posts_layout_column.jpg'
                    )
                ),
				'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'six' ) {
                        return true;
                    }
                    return false;
                }
            )
        ));
        
        // Main banner six trailing posts slider orderby
        $wp_customize->add_setting( 'main_banner_six_trailing_posts_order_by', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_six_trailing_posts_order_by' ),
            'sanitize_callback' => 'pubnews_sanitize_select_control'
        ));
        $wp_customize->add_control( 'main_banner_six_trailing_posts_order_by', array(
            'type'      => 'select',
            'section'   => 'pubnews_main_banner_section',
            'label'     => esc_html__( 'Orderby', 'pubnews-plus' ),
            'choices'   => pubnews_customizer_orderby_options_array(),
			'active_callback'   => function( $setting ) {
				if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'six' ) {
					return true;
				}
				return false;
			}
        ));

        // Main banner six trailing posts categories
        $wp_customize->add_setting( 'main_banner_six_trailing_posts_categories', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_six_trailing_posts_categories' ),
            'sanitize_callback' => 'pubnews_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Async_Multiselect_Control( $wp_customize, 'main_banner_six_trailing_posts_categories', array(
                'label'     => esc_html__( 'Posts categories', 'pubnews-plus' ),
                'section'   => 'pubnews_main_banner_section',
                'settings'  => 'main_banner_six_trailing_posts_categories',
                'endpoint' =>  'extend/get_taxonomy',
                'purpose'   =>  'category',
				'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'six' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        // main banner posts
        $wp_customize->add_setting( 'main_banner_six_trailing_posts', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_six_trailing_posts' ),
            'sanitize_callback' => 'pubnews_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Async_Multiselect_Control( $wp_customize, 'main_banner_six_trailing_posts', array(
                'label'     => esc_html__( 'Posts to Include', 'pubnews-plus' ),
                'section'   => 'pubnews_main_banner_section',
                'settings'  => 'main_banner_six_trailing_posts',
				'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'six' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

		// Main banner block posts setting heading
        $wp_customize->add_setting( 'main_banner_block_posts_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Section_Heading_Control( $wp_customize, 'main_banner_block_posts_settings_header', array(
                'label'	      => esc_html__( 'Block Posts Setting', 'pubnews-plus' ),
                'section'     => 'pubnews_main_banner_section',
                'settings'    => 'main_banner_block_posts_settings_header',
                'type'        => 'section-heading',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'three' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        // Main Banner block posts slider orderby
        $wp_customize->add_setting( 'main_banner_block_posts_order_by', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_block_posts_order_by' ),
            'sanitize_callback' => 'pubnews_sanitize_select_control'
        ));
        $wp_customize->add_control( 'main_banner_block_posts_order_by', array(
            'type'      => 'select',
            'section'   => 'pubnews_main_banner_section',
            'label'     => esc_html__( 'Orderby', 'pubnews-plus' ),
            'choices'   => pubnews_customizer_orderby_options_array(),
            'active_callback'   => function( $setting ) {
                if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'three' ) {
                    return true;
                }
                return false;
            }
        ));

		// Main Banner block posts categories
        $wp_customize->add_setting( 'main_banner_block_posts_categories', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_block_posts_categories' ),
            'sanitize_callback' => 'pubnews_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Async_Multiselect_Control( $wp_customize, 'main_banner_block_posts_categories', array(
                'label'     => esc_html__( 'Block posts categories', 'pubnews-plus' ),
                'section'   => 'pubnews_main_banner_section',
                'settings'  => 'main_banner_block_posts_categories',
                'endpoint' =>  'extend/get_taxonomy',
                'purpose'   =>  'category',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'three' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );
		
        // Main Banner block posts categories
        $wp_customize->add_setting( 'main_banner_block_posts_to_include', array(
            'default' => PND\pubnews_get_customizer_default( 'main_banner_block_posts_to_include' ),
            'sanitize_callback' => 'pubnews_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Pubnews_WP_Async_Multiselect_Control( $wp_customize, 'main_banner_block_posts_to_include', array(
                'label'     => esc_html__( 'Block posts to include', 'pubnews-plus' ),
                'section'   => 'pubnews_main_banner_section',
                'settings'  => 'main_banner_block_posts_to_include',
                'endpoint' =>  'extend/get_posts',
                'active_callback'   => function( $setting ) {
                    if ( in_array( $setting->manager->get_setting( 'main_banner_layout' )->value(), [ 'three' ] ) ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        // banner layout
        $wp_customize->add_setting( 'main_banner_width_layout',array(
                'default'           => PND\pubnews_get_customizer_default( 'main_banner_width_layout' ),
                'sanitize_callback' => 'pubnews_sanitize_select_control',
            )
        );
        $wp_customize->add_control( 
            new Pubnews_WP_Radio_Image_Control( $wp_customize, 'main_banner_width_layout',
            array(
                'section'  => 'pubnews_main_banner_section',
                'tab'   => 'design',
                'choices'  => array(
                    'global' => array(
                        'label' => esc_html__( 'Global', 'pubnews-plus' ),
                        'url'   => '%s/assets/images/customizer/global.jpg'
                    ),
                    'boxed--layout' => array(
                        'label' => esc_html__( 'Boxed', 'pubnews-plus' ),
                        'url'   => '%s/assets/images/customizer/boxed_content.jpg'
                    ),
                    'full-width--layout' => array(
                        'label' => esc_html__( 'Full Width', 'pubnews-plus' ),
                        'url'   => '%s/assets/images/customizer/full_content.jpg'
                    )
                )
            )
        ));
        
        // banner section order
        $wp_customize->add_setting( 'banner_section_order', array(
            'default'   => PND\pubnews_get_customizer_default( 'banner_section_order' ),
            'sanitize_callback' => 'pubnews_sanitize_sortable_control'
        ));
        $wp_customize->add_control(
            new Pubnews_WP_Item_Sortable_Control( $wp_customize, 'banner_section_order', array(
                'label'         => esc_html__( 'Column Re-order', 'pubnews-plus' ),
                'section'       => 'pubnews_main_banner_section',
                'settings'      => 'banner_section_order',
                'tab'   => 'design',
                'fields'    => array(
                    'banner_slider'  => array(
                        'label' => esc_html__( 'Banner Slider Column', 'pubnews-plus' )
                    ),
                    'tab_slider'  => array(
                        'label' => esc_html__( 'Tabbed / Slider Column / Posts', 'pubnews-plus' )
                    )
                )
            ))
        );
    }
    add_action( 'customize_register', 'pubnews_plus_customizer_main_banner_panel', 999 );
endif;

if( ! function_exists( 'pubnews_plus_main_banner_part' ) ) :
    /**
     * Main Banner element
     * 
     * @since 1.0.0
     */
     function pubnews_plus_main_banner_part() {
        $main_banner_option = PND\pubnews_get_customizer_option( 'main_banner_option' );
        if( ! $main_banner_option || is_paged() || pubnews_is_paged_filtered() ) return;
        $main_banner_layout = PND\pubnews_get_customizer_option( 'main_banner_layout' );
        $main_banner_slider_order_by = PND\pubnews_get_customizer_option( 'main_banner_slider_order_by' );
        $orderArray = explode( '-', $main_banner_slider_order_by );
        $main_banner_slider_categories = PND\pubnews_get_customizer_option( 'main_banner_slider_categories' );
        $main_banner_args = array(
            'slider_args'  => array(
                'order' => esc_html( $orderArray[1] ),
                'orderby' => esc_html( $orderArray[0] ),
                'ignore_sticky_posts'   => true
            )
        );
        $main_banner_args['slider_args']['posts_per_page'] = 4;
        if( PND\pubnews_get_customizer_option( 'main_banner_date_filter' ) != 'all' ) $main_banner_args['slider_args']['date_query'] = pubnews_get_date_format_array_args(PND\pubnews_get_customizer_option( 'main_banner_date_filter' ));
        if( $main_banner_slider_categories ) $main_banner_args['slider_args']['cat'] = pubnews_get_categories_for_args($main_banner_slider_categories);
        $main_banner_posts = PND\pubnews_get_customizer_option( 'main_banner_posts' );
        if( $main_banner_posts ) $main_banner_args['slider_args']['post__in'] = pubnews_get_post_id_for_args($main_banner_posts);
        $banner_section_order = PND\pubnews_get_customizer_option( 'banner_section_order' );
        $section_column_sort_class = implode( '--', array( $banner_section_order[0]['value'], $banner_section_order[1]['value'] ) );
        
        $main_banner_width_layout = pubnews_get_section_width_layout_val('main_banner_width_layout');
        $sectionClass = 'pubnews-section';
        $sectionClass .= ' banner-layout--'. $main_banner_layout;
        $sectionClass .= ' ' . $section_column_sort_class;
        $sectionClass .= ' width-' . $main_banner_width_layout;
        if( $main_banner_layout == 'six' ) $sectionClass .= ' layout--' . PND\pubnews_get_customizer_option( 'main_banner_six_trailing_posts_layout' );
        ?>
            <section id="main-banner-section" class="<?php echo esc_attr( $sectionClass ); ?>">
                <div class="pubnews-container">
                    <div class="row">
                        <?php get_template_part( 'template-parts/main-banner/template', esc_html( $main_banner_layout ), $main_banner_args ); ?>
                    </div>
                </div>
            </section>
        <?php
     }
endif;
add_action( 'pubnews_main_banner_hook', 'pubnews_plus_main_banner_part', 10 );

if( ! function_exists( 'pubnews_plus_add_demos' ) ) : 
    /**
     * 
     * 
     */
    function pubnews_plus_add_demos($demos) {
        $demos = array_merge([
            'pubnews-plus'  => [
            'name' => 'Pubnews Plus',
            'type' => 'free',
            'buy_url'=> 'https://blazethemes.com/theme/pubnews-pro/',
            'external_url' => 'https://preview.blazethemes.com/import-files/pubnews/pubnews-plus.zip',
            'image' => 'https://blazethemes.com/wp-content/uploads/2024/11/pubnews-Plus.jpg',
            'preview_url' => 'https://preview.blazethemes.com/pubnews-plus/',
            'menu_array' => [
                'menu-1' => 'Header Menu',
                'menu-2' => 'Bottom Menu'
            ],
            'home_slug' => '',
            'blog_slug' => '',
            'plugins' => [],
            'tags' => [
                'free'  =>  esc_html__( 'Free', 'pubnews-plus' ),
                'child'  =>  esc_html__( 'Child Theme', 'pubnews-plus' )
            ]
        ]],
        $demos
    );
        return $demos;
    }
    add_filter( 'pubnews__demos_array_filter', 'pubnews_plus_add_demos' );
endif;

if( ! function_exists( 'pubnews_plus_custom_header_args' ) ) : 
    /**
     * Modify header image arguments
     * 
     */
    function pubnews_plus_custom_header_args($args) {
        $args ['default-text-color'] = '000';
        return $args;
    }
    add_filter( 'pubnews_custom_header_args', 'pubnews_plus_custom_header_args' );
endif;