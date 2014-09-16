<?php
/**
 * Config-file for Hana. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Hana paths.
 *
 */
define('HANA_INSTALL_PATH', __DIR__ . '/..');
define('HANA_THEME_PATH', HANA_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(HANA_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Hana variable.
 *
 */
$hana = array();


/**
 * Site wide settings.
 *
 */
$hana['lang']         = 'sv';
$hana['title_append'] = ' | Hana en webbtemplate';

/**
 * Theme related settings.
 *
 */
$hana['stylesheet'] = 'css/style.css';
$hana['favicon']    = 'favicon.ico';

/**
 * Settings for JavaScript.
 *
 */
$hana['modernizr'] = 'js/modernizr.js';
$hana['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$hana['javascript_include'] = array();