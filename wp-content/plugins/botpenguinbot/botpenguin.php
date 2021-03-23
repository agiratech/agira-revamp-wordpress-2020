<?php

/**
 * Plugin Name: Botpenguin
 * Plugin URI: https://botpenguin.com
 * Description: BotPenguin is an AI powered chatbot platform that enables you to quickly and easily build incredible chatbots to communicate and engage your customers on website, Facebook messenger and other platforms.
 * Version: 1.1.1
 * Author: BotPenguin
 * Author URI: https://botpenguin.com
 * License: GPL2
 */


add_action('wp_head', 'BOTPENGUIN_function');

function BOTPENGUIN_function()
{
  $textvar = get_option('test_plugin_variable', 'botpenguin bot script');
//  echo "<script id='Ym90cGVuZ3VpbkFwaQ' src='https://cdn.botpenguin.com/bot.js?apiKey=${textvar}' defer></script>";
  echo "<script id='BotPenguin-messenger-widget' src='https://cdn.botpenguin.com/botpenguin.js' defer>${textvar}</script>";
}

add_action('admin_menu', 'BOTPENGUIN_admin_menu');

function BOTPENGUIN_admin_menu()
{
  add_management_page('BotPenguin', 'BotPenguin', 'manage_options', __FILE__, 'BOTPENGUIN_footer_text_admin_page');
}

function BOTPENGUIN_footer_text_admin_page()
{

  $textvar = get_option('test_plugin_variable', 'botpenguin bot script');
  if (isset($_POST['change-clicked'])) {
 
if (!isset($_POST['my_botpenguin_update_setting'])) die("<br><br>Hmm .. looks like you didn't send any credentials.. No CSRF for you! ");
if (!wp_verify_nonce($_POST['my_botpenguin_update_setting'],'botpenguin-update-setting')) die("<br><br>Hmm .. looks like you didn't send any credentials.. No CSRF for you! ");

    $footertext = esc_url_raw($_POST['footertext']);
    $footerval = explode('//',$footertext);
    update_option('test_plugin_variable', end($footerval));
    $textvar = get_option('test_plugin_variable', 'botpenguin bot script');
  }

  ?>
<div class="wrap">
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
        <div class="postbox">
          <div class="inside">
          <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/logo.png'; ?>" alt="BotPenguin">
            <h1>
              BotPenguin - Settings
              <a class="add-new-h2" target="_blank" href="<?php echo esc_url("https://botpenguin.com"); ?>">
                <?php _e('Read Tutorial', 'BotPenguin'); ?>
              </a> <a class="add-new-h2" target="_blank" href="<?php echo esc_url("https://BotPenguin"); ?>">
                <?php _e('Watch Tutorial', 'BotPenguin'); ?></a></h1>
            <h3 class="cc-labels"><?php _e('Instructions: ', 'BotPenguin'); ?></h3>

            <p>1.
              <?php _e('If you are not an existing BotPenguin user, <a href="https://app.botpenguin.com/signup" target="_blank">Click here to register</a>', 'BotPenguin'); ?>
            </p>
            <p>2.
              <?php _e('Copy the unique key from <a href="https://app.botpenguin.com/" target="_blank">Dashboard</a> > Select Bot > install > CMS > Wordpress and paste it here', 'BotPenguin'); ?>
            </p>
            <h3 class="cc-labels" for="script"><?php _e('BotPenguin snippet:', 'BotPenguin'); ?></h3>
            <form action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
              <input style="width:100%" type="text" class="regular-text" value="<?php echo esc_html($textvar); ?>" name="footertext">
              <input name="change-clicked" type="hidden" value="1" />
              <input name="my_botpenguin_update_setting" type="hidden" value="<?php echo wp_create_nonce('botpenguin-update-setting'); ?>" />
              <br />
              <br />
              <input class="button button-primary" type="submit" value="<?php _e('Save settings', 'BotPenguin'); ?>" />
            </form>
          </div>
        </div>
      </div>
      <?php require_once('sidebar.php'); ?>
    </div>
  </div>
</div>

<?php
}
?>