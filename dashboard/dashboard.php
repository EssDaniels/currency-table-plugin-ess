<?php


// Settings Page: KursyWalut
// Retrieving values: get_option( 'your_field_id' )
class KursyWalut_Settings_Page
{

  public function __construct()
  {
    add_action('admin_menu', array($this, 'wph_create_settings'));
    add_action('admin_init', array($this, 'wph_setup_sections'));
    add_action('admin_init', array($this, 'wph_setup_fields'));
  }

  public function wph_create_settings()
  {
    $page_title = 'Kursy Walut - Tablica';
    $menu_title = 'Kursy Walut';
    $capability = 'manage_options';
    $slug = 'KursyWalut';
    $callback = array($this, 'wph_settings_content');
    $icon = 'dashicons-grid-view';
    $position = 2;
    add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
  }

  public function wph_settings_content()
  { ?>
    <div class="wrap">
      <h1>Kursy Walut</h1>
      <?php settings_errors(); ?>
      <form method="POST" action="options.php">
        <?php
        settings_fields('KursyWalut');
        do_settings_sections('KursyWalut');
        submit_button();
        ?>
      </form>
    </div> <?php
          }

          public function wph_setup_sections()
          {
            add_settings_section('KursyWalut_section', 'Wtyczka, która umożliwia wyświetlanie tablicy z kursami walut. Aby wyświetlić tablicę należy użyć shortcodu [ess_tabel_view_shortcode].', array(), 'KursyWalut');
          }

          public function wph_setup_fields()
          {
            $fields = array(
              array(
                'section' => 'KursyWalut_section',
                'label' => 'Wybór wyświetlanych walut',
                'placeholder' => 'USD,EUR,GBP,NOK,CHF,CZK,SEK',
                'id' => 'currency_tab_ess',
                'desc' => 'Wybór wyświetlanych walut. Waluty podawać oddzielone przecinkiem ( Domyślnie zostaną wyświetlone USD,EUR,GBP,NOK,CHF,CZK,SEK)',
                'type' => 'text',
              ),

              array(
                'section' => 'KursyWalut_section',
                'label' => 'Kolor tablicy',
                'id' => 'currency_tab_color_ess',
                'type' => 'color',
              ),

              array(
                'section' => 'KursyWalut_section',
                'label' => 'Kolor tekstu',
                'id' => 'currency_tab_color_text_ess',
                'type' => 'color',
              ),

              array(
                'section' => 'KursyWalut_section',
                'label' => 'Włącz style',
                'id' => 'ess_style_set',
                'type' => 'checkbox',
              )
            );
            foreach ($fields as $field) {
              add_settings_field($field['id'], $field['label'], array($this, 'wph_field_callback'), 'KursyWalut', $field['section'], $field);
              register_setting('KursyWalut', $field['id']);
            }
          }
          public function wph_field_callback($field)
          {
            $value = get_option($field['id']);
            $placeholder = '';
            if (isset($field['placeholder'])) {
              $placeholder = $field['placeholder'];
            }
            switch ($field['type']) {


              case 'checkbox':
                printf(
                  '<input %s id="%s" name="%s" type="checkbox" value="1">',
                  $value === '1' ? 'checked' : '',
                  $field['id'],
                  $field['id']
                );
                break;

              default:
                printf(
                  '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
                  $field['id'],
                  $field['type'],
                  $placeholder,
                  $value
                );
            }
            if (isset($field['desc'])) {
              if ($desc = $field['desc']) {
                printf('<p class="description">%s </p>', $desc);
              }
            }
          }
        }
        new KursyWalut_Settings_Page();
