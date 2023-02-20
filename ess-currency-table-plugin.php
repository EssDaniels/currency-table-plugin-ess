<?php
/*
Plugin Name: Currency Table Plugin - Ess
Description: A table that displays exchange rates.
Version: 1.0
Author: Dawid Skibiński
*/

header('Content-Type: text/html; charset=utf-8');


define('ESS12_PLUGIN', __FILE__);

define('ESS12_PLUGIN_DIR', untrailingslashit(dirname(ESS12_PLUGIN)));

define('ESS12_PLUGIN_FUNCTIONS_DIR', ESS12_PLUGIN_DIR . '/function');

define('ESS12_PLUGIN_CRON_DIR', ESS12_PLUGIN_DIR . '/cron');

define('ESS12_PLUGIN_TEMPLATE_DIR', ESS12_PLUGIN_DIR . '/template');

define('ESS12_PLUGIN_SHORTCODE_DIR', ESS12_PLUGIN_DIR . '/shortcode');

define('ESS12_PLUGIN_DASHBOARD_DIR', ESS12_PLUGIN_DIR . '/dashboard');

define('ESS12_PLUGIN_STYLE_DIR', ESS12_PLUGIN_DIR . '/style');



require_once ESS12_PLUGIN_DIR . '/load.php';
