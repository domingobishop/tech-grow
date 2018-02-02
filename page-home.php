<?php
/**
 * Template Name: Homepage
 *
 */
get_header(); ?>

    <main id="main" class="main homepage" role="main">
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
            <div class="intro">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <?php while (have_posts()) : the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="entry-header sr-only">
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
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row promo-area section-2">
                            <?php for ( $i=1 ; $i<=4 ; $i++ ) { ?>
                                <?php if ( get_option('promo_url_'.$i) ) { ?>
                                <div class="col-md-6">
                                    <div class="promo-item">
                                        <a href="<?php echo esc_attr(get_option('promo_url_'.$i)); ?>">
                                            <div class="promo-img">
                                                <img src="<?php echo esc_attr(apply_https(get_option('promo_img_'.$i))); ?>" class="img-responsive">
                                            </div>
                                            <div class="promo-logo">
                                                <img src="<?php echo esc_attr(apply_https(get_option('promo_logo_'.$i))); ?>" class="img-responsive">
                                            </div>
                                            <div class="promo-text text-center">
                                                <p><?php echo esc_attr(get_option('promo_txt_'.$i)); ?></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php
                            global $post;
                            $title      = get_post_meta( $post->ID, 'sub_title', true );
                            $content    = get_post_meta( $post->ID, 'sub_content', true );
                        ?>
                        <article class="section-3 text-center">
                            <div class="entry-header">
                                <h2>
                                    <?php echo $title; ?>
                                </h2>
                            </div>
                            <div class="entry-content">
                                <?php echo $content; ?>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php
                        $sub_image      = get_post_meta( $post->ID, 'sub_image', true );
                        $caption     = get_post_meta( $post->ID, 'sub_image_caption', true );
                        if ( $sub_image ) {
                            ?>
                            <article class="section-4 clearfix">
                                <div class="entry-content">
                                    <img src="<?php echo $sub_image; ?>" class="img-responsive">
                                    <p>
                                        <?php echo $caption; ?>
                                    </p>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php
                        $video      = get_post_meta( $post->ID, 'video_code', true );
                        if ( $video ) {
                        ?>
                        <article class="section-5 clearfix">
                            <div class="entry-content">
                                <div class="videoWrapper">
                                    <?php echo $video; ?>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>