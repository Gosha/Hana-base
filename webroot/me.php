<?php
/**
 * This is a Hana pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hana variable with its defaults.
include(__DIR__.'/config.php');

$hana['title'] = "Me";

$hana['main'] = <<<EOD
<div class="grid-50">
  <h1>Me</h1>
  <p class="head">Hejsan hejsan</p>
  <p>
    Jag heter Gosha, bor och studerar i Linköping.
  </p>
  <p>
    Läser denna kurs DV1485 H14 samtidigt som jag går
    Datateknik-programmet på Linköpings universitet. Försöker fylla ut
    luckor i både poäng och kunskap.
  </p>
  <p>
    Det blev den här kursen för att jag tycker det är rätt kul med
    webbutveckling, trots att jag inte är en stjärna på design. Brukar
    ibland hjälpa bekanta med hemsidor och tänkte att det vore bra att
    lära sig hur man kan strukturera dem bättre.
  </p>
  <p>
    På fritiden brukar jag hålla på med små kodprojekt i diverse språk
    och miljöer. När jag får lust och tid över kan det hända att jag
    sätter mig och pluggar lite japanska.
  </p>
</div>
<div class="grid-50">
  <p style="text-align: center">
    <img src="img/me.jpg"/>
  </p>
</div>
EOD;


// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
