<?php
/**
 * News List template two
 * 
 * @package Newsmatic
 * @since 1.0.0
 */
extract( $args );
$uniqueId = isset( $options->uniqueId ) ? $options->uniqueId: false;
$image_size = isset( $options->imageSize ) ? $options->imageSize: 'newsmatic-list';
?>
<div <?php if( $uniqueId) echo 'id="block--' .esc_attr( $uniqueId ). '"'; ?> <?php if( isset( $options->blockId ) && !empty($options->blockId) ) echo 'id="' .esc_attr( $options->blockId ). '"'; ?> class="news-list<?php if( isset($options->thumbOption) && ! $options->thumbOption ) echo ' section-no-thumbnail'; ?> <?php echo esc_attr( 'layout--' . $options->layout );?>">
    <?php
        do_action( 'newsmatic_section_block_view_all_hook', array(
            'option'=> isset( $options->viewallOption ) ? $options->viewallOption : false,
            'classes' => 'view-all-button',
            'link'  => isset( $options->viewallUrl ) ? $options->viewallUrl : '',
            'text'  => false
        ));
        
        if( $options->title ) :
    ?>
            <h2 class="newsmatic-block-title">
                <span><?php echo newsmatic_wrap_last_word( $options->title ); ?></span>
            </h2>
    <?php
        endif;
    ?>
    <div class="news-list-post-wrap<?php echo esc_attr( ' column--' .$options->column ); ?>">
        <?php
        $post_args = apply_filters( 'newsmatic_query_args_filter', $post_args );
        $post_query = new WP_Query( $post_args );
        if( $post_query -> have_posts() ) :
            while( $post_query -> have_posts() ) : $post_query -> the_post();
            ?>
                <article class="list-item <?php if( ! has_post_thumbnail() )echo esc_attr('no-feat-img'); ?>">
                    <figure class="post-thumb-wrap">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php if( has_post_thumbnail() ) : 
                                the_post_thumbnail( $image_size, array(
                                    'title' => the_title_attribute(array(
                                        'echo'  => false
                                    ))
                                ));
                                endif;
                            ?>
                        </a>
                        <div class="category_list_wrap">
                            <?php if( $options->categoryOption ) newsmatic_get_post_categories( get_the_ID(), 2 ); ?>
                        </div>
                    </figure>
                    <div class="post-element">
                        <div class="post-element-inner">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <?php if( $options->authorOption ) newsmatic_posted_by(); ?>
                                <?php if( $options->dateOption ) newsmatic_posted_on(); ?>
                                <?php if( $options->commentOption ) echo '<a href="'.esc_url( get_the_permalink()).'#comments"><span class="post-comment">' .absint( get_comments_number() ). '</span></a>'; ?>
                            </div>
                            <?php
                                do_action( 'newsmatic_section_block_view_all_hook', array(
                                    'option'    => isset( $options->buttonOption ) ? $options->buttonOption : false
                                ));
                            ?>
                        </div>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>