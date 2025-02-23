<?php
/**
 * Main Banner template three
 * 
 * @package Pubnews Pro
 * @since 1.0.0
 */
use Pubnews\CustomizerDefault as PND;
$slider_args = $args['slider_args'];
?>
<div class="main-banner-wrap">
    <div class="main-banner-slider pubnews-card" data-auto="<?php echo esc_attr( json_encode( false ) ); ?>" data-arrows="<?php echo esc_attr( json_encode( true ) ); ?>" data-dots="<?php echo esc_attr( json_encode( true ) ); ?>" data-speed="<?php echo esc_attr( 300 ); ?>">
        <?php
            $slider_query = new WP_Query( $slider_args );
            if( $slider_query -> have_posts() ) :
                while( $slider_query -> have_posts() ) : $slider_query -> the_post();
                ?>
                    <article class="slide-item<?php if(!has_post_thumbnail()){ echo esc_attr(' no-feat-img');} ?>">
                        <figure class="post-thumb">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php 
                                    if( has_post_thumbnail()) { 
                                        the_post_thumbnail('pubnews-featured', array(
                                            'title' => the_title_attribute(array(
                                                'echo'  => false
                                            ))
                                        ));
                                    }
                                ?>
                            </a>
                        </figure>
                        <div class="post-element">
                            <div class="post-meta">
                                <?php 
                                    pubnews_get_post_categories( get_the_ID(), 2 );
                                    pubnews_posted_on();
                                ?>
                            </div>
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            <?php
                                /**
                                 * hook - pubnews_main_banner_post_append_hook
                                 * 
                                 */
                                do_action('pubnews_main_banner_post_append_hook', get_the_ID());
                            ?>
                        </div>
                    </article>
                <?php
                endwhile;
            endif;
        ?>
    </div>
</div>

<div class="main-banner-block-posts banner-trailing-posts">
    <?php
        $main_banner_block_posts_to_include = PND\pubnews_get_customizer_option( 'main_banner_block_posts_to_include' );
        $main_banner_block_posts_categories = PND\pubnews_get_customizer_option( 'main_banner_block_posts_categories' );
        $main_banner_block_posts_order_by = PND\pubnews_get_customizer_option( 'main_banner_block_posts_order_by' );
        $blockPostsOrderArray = explode( '-', $main_banner_block_posts_order_by );
        $block_posts_args = array(
            'numberposts' => 3,
            'order' => esc_html( $blockPostsOrderArray[1] ),
            'orderby' => esc_html( $blockPostsOrderArray[0] ),
            'cat' => pubnews_get_categories_for_args($main_banner_block_posts_categories)
        );
        if( ! empty( $main_banner_block_posts_to_include ) ) $block_posts_args['post__in'] = pubnews_get_post_id_for_args( $main_banner_block_posts_to_include ); 
        $block_posts = get_posts( $block_posts_args );
        if( $block_posts ) :
            foreach( $block_posts as $popular_post ) :
                $popular_post_id  = $popular_post->ID;
            ?>
                    <article class="post-item pubnews-card<?php if(!has_post_thumbnail($popular_post_id)){ echo esc_attr(' no-feat-img');} ?>" <?php echo esc_attr(pubnews_get_block_animation_attr(50)); ?>>
                        <figure class="post-thumb">
                            <?php if( has_post_thumbnail($popular_post_id) ): ?>
                                <a href="<?php echo esc_url(get_the_permalink($popular_post_id)); ?>" title="<?php the_title_attribute(['post' => $popular_post_id]); ?>">
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url($popular_post_id, 'pubnews-featured') ); ?>" alt="<?php echo esc_attr( get_post_meta( get_post_thumbnail_id($popular_post_id), '_wp_attachment_image_alt', true ) ); ?>"/>
                                </a>
                            <?php endif; ?>
                        </figure>
                        <div class="post-element">
                            <div class="post-meta">
                                <?php pubnews_get_post_categories( $popular_post_id, 2 ); ?>
                            </div>
                            <h2 class="post-title"><a href="<?php the_permalink($popular_post_id); ?>"><?php echo wp_kses_post( get_the_title($popular_post_id) ); ?></a></h2>
                        </div>
                    </article>
            <?php
            endforeach;
        endif;
    ?>
</div>