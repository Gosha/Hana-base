<?php
/**
 * This is a Hana pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hana variable with its defaults.
include(__DIR__.'/config.php');

$hana['title'] = "Källkod";

// Add style for csource
$hana['stylesheets'][] = 'css/source.css';

// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));

$hana['main'] = <<<EOD
<h1>Källkod</h1>
{$source->View()}
EOD;

// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
