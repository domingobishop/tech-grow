<?php
/**
 * Template Name: Homepage
 *
 */
get_header(); ?>

    <main id="main" class="main" role="main">
    <div id="tech_carousel" class="banner carousel slide" data-ride="carousel" role="banner">
        <ol class="carousel-indicators">
            <li data-target="#tech_carousel" data-slide-to="0" class="active"></li>
            <li data-target="#tech_carousel" data-slide-to="1"></li>
            <li data-target="#tech_carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(<?php echo esc_attr(apply_https(get_option('slider_img_1'))); ?>);"></div>
            <div class="item" style="background-image: url(<?php echo esc_attr(apply_https(get_option('slider_img_2'))); ?>);"></div>
            <div class="item" style="background-image: url(<?php echo esc_attr(apply_https(get_option('slider_img_3'))); ?>);"></div>
        </div>
    </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-header">
                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                </div>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>