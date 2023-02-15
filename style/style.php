<?php

function ess_currency_table_add_styles()
{

  $color_text = get_option('currency_tab_color_text_ess');
  $color_tab = get_option('currency_tab_color_ess');



?>
  <style>
    table,
    th,
    tr,
    td {
      border: 1px solid <?php echo $color_tab; ?>;
      color: <?php echo $color_text; ?>;
      padding: 6px 12px;
    }
  </style>

<?php
}

$set_style = get_option('ess_style_set');

if ($set_style) {
  add_action('wp_head', 'ess_currency_table_add_styles');
}
