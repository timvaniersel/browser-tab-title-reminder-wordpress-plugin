<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Provide a admin area view for the plugin
*
* This file is used to markup the admin-facing aspects of the plugin.
*
* @link       https://plugin.nl
* @since      1.0.0
*
* @package    Browser_Tab_Title_Reminder
* @subpackage Browser_Tab_Title_Reminder/admin/partials
*/
?>

<div class="wrap">
  <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
  <p><?php esc_html_e( 'On this page you can edit the delay before a new title shows on a page and edit what the title tag displays when a user is active in another tab or outside the browser. When the user is active again the old title tag will be displayed again.', 'browser-tab-title-reminder' ); ?></p>
  <?php
  $options = get_option('browser-tab-title-reminder');

  if (!isset($options['bttr_delay'])){
    $delay = 3000;
  }else{
    $delay = $options['bttr_delay'];
  }

  if (!isset($options['bttr_title'])){
    $title = "";
  } else{
    $title = $options['bttr_title'];
  }

?>

  <form method="post" name="browser_tab_title_reminder_options" action="options.php">
    <?php
      settings_fields('browser-tab-title-reminder');
      do_settings_sections('browser-tab-title-reminder');
    ?>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="<?php echo esc_attr( 'browser-tab-title-reminder' ); ?>-title-tag"><?php esc_html_e( 'Title on inactive tab', 'browser-tab-title-reminder' ); ?></label>
          </th>
          <td>
            <input class="regular-text input" type="text" id="<?php echo esc_attr( 'browser-tab-title-reminder' ); ?>-title-tag" name="<?php echo esc_attr( 'browser-tab-title-reminder' ); ?>[bttr_title]" value="<?php echo esc_attr( $title ); ?>" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="<?php echo esc_attr( 'browser-tab-title-reminder' ); ?>-delay"><?php esc_html_e( 'Delay before showing new title', 'browser-tab-title-reminder' ); ?></label>
          </th>
          <td>
            <input class="regular-text input" type="number" id="<?php echo esc_attr( 'browser-tab-title-reminder' ); ?>-delay" name="<?php echo esc_attr( 'browser-tab-title-reminder' ); ?>[bttr_delay]" value="<?php echo esc_attr( $delay ); ?>" />
          </td>
        </tr>
      </tbody>
    </table>

    <?php submit_button( esc_html__( 'Save all changes', 'browser-tab-title-reminder' ), 'primary','submit', TRUE); ?>

  </form>
</div>
