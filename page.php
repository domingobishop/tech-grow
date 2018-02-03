<?php get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>

    <?php if ( has_post_thumbnail() ) {
        global $post;
        $img = '<img src="'.wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0].'" class="img-responsive">';
    } else {
        $img = '';
    } ?>

    <main id="main" class="main default-page" role="main">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="entry-header clearfix">
                            <?php
                            $logo = '<img src="'.get_post_meta( $post->ID, 'header_logo', true ).'" class="img-responsive">';
                            ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="page-logo">
                                            <?php echo $logo; ?>
                                        </div>
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $img; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php endwhile; ?>

<?php get_footer(); ?>