<?php
/**
 * Home
 */

function home_meta_boxes() {

    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } else {
        if (isset($_POST['post_ID'])) {
            $post_id = $_POST['post_ID'];
        } else {
            $post_id = '';
        }
    }
    if( !isset( $post_id ) ) return;

    $home_meta_boxes = array(
        array(
            'id' => 'section_3',
            'title' => 'Section 3',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Title',
                    'desc' => '',
                    'id' => 'sub_title',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Content',
                    'desc' => '',
                    'id' => 'sub_content',
                    'type' => 'textarea',
                    'std' => ''
                ),
                array(
                    'name' => 'Image URL',
                    'desc' => 'Image size 800px x 450px',
                    'id' => 'sub_image',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Image caption',
                    'desc' => '',
                    'id' => 'sub_image_caption',
                    'type' => 'text',
                    'std' => ''
                )
            )
        ),
        array(
            'id' => 'section_4',
            'title' => 'Section 4',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Video code',
                    'desc' => '',
                    'id' => 'video_code',
                    'type' => 'textarea',
                    'std' => ''
                )
            )
        )
    );

    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if( $template_file == 'page-home.php' ) {
        foreach ( $home_meta_boxes as $meta_box ) {
            $box = new CreateMetaBox( $meta_box );
        }
    }
}

function page_meta_boxes() {

    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } else {
        if (isset($_POST['post_ID'])) {
            $post_id = $_POST['post_ID'];
        } else {
            $post_id = '';
        }
    }
    if( !isset( $post_id ) ) return;

    $meta_boxes = array(
        array(
            'id' => 'page_options',
            'title' => 'Header page options',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Logo',
                    'desc' => '',
                    'id' => 'header_logo',
                    'type' => 'text',
                    'std' => 'Logo max size 240px x 135px'
                ),
                array(
                    'name' => 'Content',
                    'desc' => '',
                    'id' => 'header_content',
                    'type' => 'textarea',
                    'std' => ''
                )
            )
        )
    );

    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if( $template_file == 'default' ) {
        foreach ( $meta_boxes as $meta_box ) {
            $box = new CreateMetaBox( $meta_box );
        }
    }
}