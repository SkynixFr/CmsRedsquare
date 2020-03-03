<?php
/**
 * Template Name: Archives
 * It is used to list archives of various types, like posts, pages, categories, tags
 */

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

get_header(); ?>
<?php if (have_posts()) :
    the_post(); ?>

    <?php apollo13framework_title_bar(); ?>

    <article id="content" class="clearfix">
        <div class="content-limiter">
            <div id="col-mask">

                <div id="post-<?php the_ID(); ?>" <?php post_class('content-box'); ?>>
                    <div class="formatter">
                        <?php apollo13framework_title_bar('inside'); ?>
                        <div class="real-content">

                            <?php
                            //page content
                            the_content();

                            ?>
                            <div class="clear"></div>

                            <?php
                            wp_link_pages(array(
                                    'before' => '<div id="page-links">' . esc_html__('Pages: ', 'rife-free'),
                                    'after' => '</div>')
                            );
                            ?>

                            <!--                        <div class="left50">-->
                            <!--                            <h3>-->
                            <?php //echo esc_html__( 'Latest 50 posts', 'rife-free' );
                            ?><!--</h3>-->
                            <!--                            <ul class="styled">-->
                            <!--                            --><?php
                            //                                wp_get_archives(array(
                            //                                'type'            => 'postbypost',
                            //                                'limit'           => 50,
                            //                                ));
                            //
                            ?>
                            <!--                            </ul>-->


                            <?php

                            $query = new WP_Query(array('post_type' => 'compte_rendu'));
                            if ($query->have_posts()) :
                                $id = get_the_ID();
                                ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="entry">
                                    <h3 class="title"><a href="<?php echo get_post_permalink($id); ?>"><?php the_title(); ?></a>
                                    </h3>
                                </div>
                            <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>

                            <div class="clear"></div>

                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </article>

<?php endif; ?>

<?php get_footer(); ?>
