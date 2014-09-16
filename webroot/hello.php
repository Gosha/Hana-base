<?php
/**
 * This is a Hana pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hana variable with its defaults.
include(__DIR__.'/config.php');

$hana['title'] = "Hello world!";

$hana['header'] = <<<EOD
<img class='sitelogo' src='img/hana.png' alt='Hana Logo'/>
<span class='sitetitle'>Hana webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$hana['main'] = <<<EOD
<h1>Hej Världen</h1>
<p>Detta är en exempelsida som visar hur Hana ser ut och fungerar.</p>
EOD;

$hana['footer'] = <<<EOD
<footer><span class='sitefooter'><a href='https://github.com/GoshaZa/Hana-base'>Hana på GitHub</a></span></footer>
EOD;


// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
