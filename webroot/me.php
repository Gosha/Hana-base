<?php
/**
 * This is a Hana pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hana variable with its defaults.
include(__DIR__.'/config.php');

$hana['title'] = "Me";

$hana['main'] = <<<EOD
<h1>Me</h1>
<p>Detta är en exempelsida som visar hur Hana ser ut och fungerar.</p>
EOD;


// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
