<?php


function ess_tabel_view_shortcode()
{
    ob_start();
    ess_tabel_currenty_view();
    $output = ob_get_clean();
    return $output;
}

add_shortcode('ess_tabel_view_shortcode', 'ess_tabel_view_shortcode');
