<?php
/**
 * This is a Hana pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hana variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Hana container.
$hana['title'] = "404";
$hana['main'] = "<h1>404</h1>This is a Hana 404. Document is not here.";
$hana['footer'] = "";

// Send the 404 header
header("HTTP/1.0 404 Not Found");


// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
