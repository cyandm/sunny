<?php

/****************************** Required Files */
require_once(__DIR__ . '/inc/classes/cyn-theme-init.php');
require_once(__DIR__ . '/inc/classes/cyn-acf.php');
require_once(__DIR__ . '/inc/classes/cyn-register.php');
require_once(__DIR__ . '/inc/classes/cyn-ajax.php');
require_once(__DIR__ . '/inc/classes/cyn-general.php');
//require_once(__DIR__ . '/inc/classes/cyn-admin-form.php');
require_once(__DIR__ . '/inc/classes/cyn-woocommerce.php');




/***************************** Instance Classes */
$cyn_theme_init = new cyn_theme_init(false, '2.4.0');
$cyn_acf = new cyn_acf();
$cyn_register = new cyn_register();
$cyn_general = new cyn_general();
$cyn_ajax = new cyn_ajax();
//$cyn_form = new cyn_form();
$cyn_woocommerce = new cyn_woocommerce();
