<?php

/*
 * Plugin Name:       Venjue Widget
 * Plugin URI:        https://venjue.com
 * Description:       Easily add the Venjue widget to your WordPress website with one-click installation. Customize and configure to your brand identity with ease. See more at Venjue.com
 * Version:           1.0.0
 * Author:            Venjue ApS
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        venjuewidget-plugin-for-wordpress
*/

//make sure no I/O can be exploited outside WordPress environment
if (!defined('ABSPATH')) exit;
//add administration menu
function venjuewidget_widget_actions_changedata() {
  //check user permissions
  if (!current_user_can('manage_options')) {
    //die with error message
    wp_die(__('Insufficient permissions for your WordPress user, you cannot manage options.'));
  }
  //handle data if submitted
  if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'update_venjuewidget_settings')) {
    //get submitted data and sanitize it
    $venjuewidget_business_vat = sanitize_text_field($_POST['venjuewidget_business_vat']);
    $venjuewidget_accent_color = sanitize_text_field($_POST['venjuewidget_accent_color']);
    $venjuewidget_language = sanitize_text_field($_POST['venjuewidget_language']);
    //update WordPress database with data (will create new ones if not already done when run the first time)
    update_option('venjuewidget_business_vat', $venjuewidget_business_vat);
    update_option('venjuewidget_accent_color', $venjuewidget_accent_color);
    update_option('venjuewidget_language', $venjuewidget_language);
  }
  //no data submitted and we're displaying current values
  else {
    //get current database data
    $venjuewidget_business_vat = esc_html(get_option('venjuewidget_business_vat'));
    $venjuewidget_accent_color = esc_html(get_option('venjuewidget_accent_color'));
    $venjuewidget_language = esc_html(get_option('venjuewidget_language'));
  }
  //load css and js for WordPress color picker
  wp_enqueue_style('wp-color-picker');
  wp_enqueue_script('venjuewidget-script-handle', plugins_url('script.js', __FILE__), array('wp-color-picker'));
  //show form for updating/viewing current data
  ?>
  <div class="wrap">
    <div class="logo">
      <svg width="121" height="40" viewBox="0 0 75559 25013" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
          <g transform="matrix(1.14638,0,0,1.14638,-6167.43,-28093.9)">
              <g transform="matrix(21264.4,94.8983,-94.8983,21264.4,6094.34,38966.9)">
                  <path d="M0.128,-0.476L0.251,-0.208L0.374,-0.476L0.498,-0.476L0.25,0.033L0.005,-0.476L0.128,-0.476Z" style="fill:rgb(60,60,60);fill-rule:nonzero;"/>
              </g>
              <g transform="matrix(21264.4,94.8983,-94.8983,21264.4,16415.1,39012.9)">
                  <path d="M0.502,-0.212L0.162,-0.212C0.165,-0.173 0.177,-0.142 0.2,-0.119C0.222,-0.096 0.251,-0.084 0.286,-0.084C0.313,-0.084 0.336,-0.091 0.354,-0.104C0.372,-0.117 0.392,-0.141 0.414,-0.176L0.507,-0.125C0.493,-0.1 0.477,-0.079 0.461,-0.062C0.445,-0.044 0.428,-0.03 0.41,-0.019C0.392,-0.008 0.372,0.001 0.351,0.006C0.33,0.011 0.307,0.014 0.282,0.014C0.211,0.014 0.154,-0.009 0.111,-0.055C0.068,-0.101 0.047,-0.161 0.047,-0.237C0.047,-0.313 0.068,-0.373 0.109,-0.42C0.151,-0.466 0.207,-0.489 0.276,-0.489C0.346,-0.489 0.402,-0.466 0.442,-0.422C0.483,-0.378 0.503,-0.316 0.503,-0.238L0.502,-0.212ZM0.39,-0.302C0.374,-0.36 0.337,-0.39 0.279,-0.39C0.265,-0.39 0.253,-0.388 0.241,-0.384C0.229,-0.379 0.219,-0.374 0.209,-0.366C0.2,-0.358 0.191,-0.349 0.185,-0.338C0.178,-0.328 0.173,-0.315 0.169,-0.302L0.39,-0.302Z" style="fill:rgb(60,60,60);fill-rule:nonzero;"/>
              </g>
              <g transform="matrix(21264.4,94.8983,-94.8983,21264.4,39885.5,39142.3)">
                  <rect x="0.069" y="-0.476" width="0.11" height="0.734" style="fill:rgb(60,60,60);"/>
              </g>
              <g transform="matrix(21264.4,94.8983,-94.8983,21264.4,45180.9,39165.9)">
                  <path d="M0.179,-0.476L0.179,-0.203C0.179,-0.124 0.21,-0.084 0.272,-0.084C0.335,-0.084 0.366,-0.124 0.366,-0.203L0.366,-0.476L0.476,-0.476L0.476,-0.2C0.476,-0.162 0.471,-0.129 0.461,-0.102C0.452,-0.077 0.437,-0.055 0.414,-0.035C0.377,-0.002 0.33,0.014 0.272,0.014C0.215,0.014 0.168,-0.002 0.131,-0.035C0.109,-0.055 0.092,-0.077 0.083,-0.102C0.074,-0.124 0.069,-0.157 0.069,-0.2L0.069,-0.476L0.179,-0.476Z" style="fill:rgb(60,60,60);fill-rule:nonzero;"/>
              </g>
              <g transform="matrix(-21264.4,-94.8983,94.8983,-21264.4,39882.9,29295)">
                  <path d="M0.179,-0.476L0.179,-0.203C0.179,-0.124 0.21,-0.084 0.272,-0.084C0.335,-0.084 0.366,-0.124 0.366,-0.203L0.366,-0.476L0.476,-0.476L0.476,-0.2C0.476,-0.162 0.471,-0.129 0.461,-0.102C0.452,-0.077 0.437,-0.055 0.414,-0.035C0.377,-0.002 0.33,0.014 0.272,0.014C0.215,0.014 0.168,-0.002 0.131,-0.035C0.109,-0.055 0.092,-0.077 0.083,-0.102C0.074,-0.124 0.069,-0.157 0.069,-0.2L0.069,-0.476L0.179,-0.476Z" style="fill:rgb(60,60,60);fill-rule:nonzero;"/>
              </g>
              <g transform="matrix(21264.4,94.8983,-94.8983,21264.4,56768.2,39217.7)">
                  <path d="M0.502,-0.212L0.162,-0.212C0.165,-0.173 0.177,-0.142 0.2,-0.119C0.222,-0.096 0.251,-0.084 0.286,-0.084C0.313,-0.084 0.336,-0.091 0.354,-0.104C0.372,-0.117 0.392,-0.141 0.414,-0.176L0.507,-0.125C0.493,-0.1 0.477,-0.079 0.461,-0.062C0.445,-0.044 0.428,-0.03 0.41,-0.019C0.392,-0.008 0.372,0.001 0.351,0.006C0.33,0.011 0.307,0.014 0.282,0.014C0.211,0.014 0.154,-0.009 0.111,-0.055C0.068,-0.101 0.047,-0.161 0.047,-0.237C0.047,-0.313 0.068,-0.373 0.109,-0.42C0.151,-0.466 0.207,-0.489 0.276,-0.489C0.346,-0.489 0.402,-0.466 0.442,-0.422C0.483,-0.378 0.503,-0.316 0.503,-0.238L0.502,-0.212ZM0.39,-0.302C0.374,-0.36 0.337,-0.39 0.279,-0.39C0.265,-0.39 0.253,-0.388 0.241,-0.384C0.229,-0.379 0.219,-0.374 0.209,-0.366C0.2,-0.358 0.191,-0.349 0.185,-0.338C0.178,-0.328 0.173,-0.315 0.169,-0.302L0.39,-0.302Z" style="fill:rgb(60,60,60);fill-rule:nonzero;"/>
              </g>
              <g transform="matrix(98.0556,0,0,98.0556,67555.5,29016.5)">
                  <text x="0px" y="0px" style="font-family:'ArialMT', 'Arial', sans-serif;font-size:39.64px;fill:rgb(60,60,60);">©</text>
              </g>
              <g transform="matrix(-0.96937,1.18714e-16,-1.35834e-16,-1.10917,23211.7,52691)">
                  <path d="M12131.9,20328L14114.1,23895.7L10149.7,23895.7L12131.9,20328Z" style="fill:rgb(123,122,190);"/>
              </g>
          </g>
      </svg>
    </div>
    <p></p>
    <form name="oscimp_form" method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
      <?php
      //create a nonce field for verifying above that the data came from here
      wp_nonce_field('update_venjuewidget_settings');
      ?>
      <fieldset>
        <legend><strong>VAT</strong> / CVR</legend>
        <input placeholder="12345678" type="text" class="regular-text" name="venjuewidget_business_vat" value="<?php echo esc_attr($venjuewidget_business_vat); ?>" size="20">
      </fieldset>
      <br/><br/>
      <fieldset>
        <legend><strong>Accent color</strong> / Accentfarve</legend>
        <input placeholder="#8A89D8" type="text" name="venjuewidget_accent_color" value="<?php echo esc_attr($venjuewidget_accent_color); ?>" size="20" data-default-color="#8A89D8" class="color-field">
      </fieldset>
      <br/><br/>
      <fieldset>
        <legend><strong>Language</strong> / Sprog</legend>
        <select name="venjuewidget_language">
          <option <?php if($venjuewidget_language == "da_DK") { echo "selected"; } ?> value="da_DK">Dansk</option>
          <option <?php if($venjuewidget_language == "en_GB") { echo "selected"; } ?> value="en_GB">English</option>
        </select>
      </fieldset>
      <br/><br/>
      <input type="submit" class="button button-primary" name="submit" value="Save / Gem">
    </form>
  </div>
  <?php
}
function venjuewidget_widget_actions() {
  //create option's page
  add_options_page('Venjue', 'Venjue', 'manage_options', 'Venjue', 'venjuewidget_widget_actions_changedata');
}
add_action('admin_menu', 'venjuewidget_widget_actions');
//hardcoded widget script with data attributes from current data in WordPress db
function venjuewidget_inject_script() {
  //echo hardcoded widget container with data attributes
  echo '<div id="venjue-widget-container" data-accentcolor="'.get_option('venjuewidget_accent_color').'" data-langcode="'.get_option('venjuewidget_language').'" data-businessid="'.get_option('venjuewidget_business_vat').'"></div>';
}
//add widget container to footer
add_action('wp_footer', 'venjuewidget_inject_script');
//script file to be enqueued before </body>
function venjuewidget_enqueue_script() {
  wp_enqueue_script('venjuewidget_scriptfile', 'https://venjue.com/widget/script.js', array(), '1.0.0', TRUE);
}
add_action('wp_enqueue_scripts', 'venjuewidget_enqueue_script');
?>
