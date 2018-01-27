<?php
/**
 * Admin
 *
 */

add_action('admin_menu', 'tech_settings');
add_action('admin_init', 'tech_settings_data');

function tech_settings() {
    add_menu_page('Tech Grow theme settings', 'Tech Grow', 'administrator', 'tech-homepage', 'tech_settings_page', 'dashicons-admin-generic', 21);
}

function tech_settings_data() {

    register_setting('tech_settings_group', 'header_btn_text');
    register_setting('tech_settings_group', 'header_btn_link');

    register_setting('tech_settings_group', 'slider_img_1');
    register_setting('tech_settings_group', 'slider_img_2');
    register_setting('tech_settings_group', 'slider_img_3');

    register_setting('tech_settings_group', 'facebook_widget');
    register_setting('tech_settings_group', 'facebook_js_widget');

    for ( $i=1 ; $i<=4 ; $i++ ) {
        register_setting('tech_settings_group', 'promo_img_'.$i);
        register_setting('tech_settings_group', 'promo_logo_'.$i);
        register_setting('tech_settings_group', 'promo_txt_'.$i);
        register_setting('tech_settings_group', 'promo_url_'.$i);
    }

    register_setting('tech_settings_group', 'footer_address');
    register_setting('tech_settings_group', 'footer_dealer_label');
    register_setting('tech_settings_group', 'footer_dealer_link');
}

function tech_settings_page()
{
    // admin
    ?>
    <style>
        .tech-admin input[type=text] {
            width: 100%;
            max-width: 480px;
        }
        .tech-admin textarea {
            width: 100%;
            max-width: 480px;
            height: 12em;
        }
        .tech-admin td.help-text {
            width: 30%;
        }
    </style>
    <div class="tech-admin wrap">
        <h2>Tech Grow theme settings</h2>

        <form method="post" action="options.php" novalidate="novalidate">
            <?php settings_fields( 'tech_settings_group' ); ?>
            <?php do_settings_sections( 'tech_settings_group' ); ?>
            <table class="form-table">
                <h3>Header</h3>
                <tr valign="top">
                    <th scope="row"><label for="header_btn_text">Button text</label></th>
                    <td><input type="text" name="header_btn_text" value="<?php echo esc_attr( get_option('header_btn_text') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="header_btn_link">Button link</label></th>
                    <td><input type="text" name="header_btn_link" value="<?php echo esc_attr( get_option('header_btn_link') ); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
            <table class="form-table">
                <h3>Homapage image slider</h3>
                <p>Copy/paste the image URL from the Media Library. Please crop images with the focus is in the centre.</p>
                <tr valign="top">
                    <th scope="row"><label for="slider_img_1">Image 1</label></th>
                    <td><input type="text" name="slider_img_1" value="<?php echo esc_attr( get_option('slider_img_1') ); ?>" /></td>
                    <td class="help-text">Image size 1600px x 750px, image format JPEG quality 7</td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="slider_img_2">Image 2</label></th>
                    <td><input type="text" name="slider_img_2" value="<?php echo esc_attr( get_option('slider_img_2') ); ?>" /></td>
                    <td class="help-text">Image size 1600px x 750px, image format JPEG quality 7</td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="slider_img_3">Image 3</label></th>
                    <td><input type="text" name="slider_img_3" value="<?php echo esc_attr( get_option('slider_img_3') ); ?>" /></td>
                    <td class="help-text">Image size 1600px x 750px, image format JPEG quality 7</td>
                </tr>
            </table>
            <?php submit_button(); ?>
            <table class="form-table">
                <h3>Homepage promotional area</h3>
                <p>Copy/paste the image and logo URL from the Media Library.</p>
                <?php for ( $i=1 ; $i<=4 ; $i++ ) { ?>
                <tr valign="top">
                    <th scope="row">Section <?php echo $i; ?></th>
                    <td></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="promo_img_<?php echo $i; ?>">Image</label></th>
                    <td><input type="text" name="promo_img_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('promo_img_'.$i) ); ?>" /></td>
                    <td class="help-text">Image size 480px x 270px, image format JPEG quality 7</td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="promo_logo_<?php echo $i; ?>">Logo</label></th>
                    <td><input type="text" name="promo_logo_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('promo_logo_'.$i) ); ?>" /></td>
                    <td class="help-text">Image size max 140px x 140px, image format PNG-24 with transparent background</td>
                    </tr>
                <tr valign="top">
                    <th scope="row"><label for="promo_txt_<?php echo $i; ?>">Label</label></th>
                    <td><input type="text" name="promo_txt_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('promo_txt_'.$i) ); ?>" /></td>
                    <td></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="promo_url_<?php echo $i; ?>">Link</label></th>
                    <td><input type="text" name="promo_url_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('promo_url_'.$i) ); ?>" /></td>
                    <td></td>
                </tr>
                <?php } ?>
            </table>
            <?php submit_button(); ?>
            <table class="form-table">
                <h3>Footer</h3>
                <tr valign="top">
                    <th scope="row"><label for="footer_address">Address</label></th>
                    <td><textarea name="footer_address"><?php echo esc_attr( get_option('footer_address') ); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="footer_dealer_label">Dealer link label</label></th>
                    <td><input type="text" name="footer_dealer_label" value="<?php echo esc_attr( get_option('footer_dealer_label') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="footer_dealer_link">Dealer link</label></th>
                    <td><input type="text" name="footer_dealer_link" value="<?php echo esc_attr( get_option('footer_dealer_link') ); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
            <table class="form-table">
                <h3>Facebook widget</h3>
                <tr valign="top">
                    <th scope="row"><label for="facebook_js_widget">Widget JS code</label></th>
                    <td><textarea name="facebook_js_widget"><?php echo esc_attr( get_option('facebook_js_widget') ); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="facebook_widget">Widget HTML code</label></th>
                    <td><textarea name="facebook_widget"><?php echo esc_attr( get_option('facebook_widget') ); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>

    </div>
    <?php
}