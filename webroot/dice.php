<?php
/**
 * This is a Hana pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hana variable with its defaults.
include(__DIR__.'/config.php');


$diceSession = new CDiceSession();

if (isset($_GET['roll'])) {
  $diceSession->addDice(new CDice());
}

if (isset($_GET['clear'])) {
  $diceSession->clearDice();
}

$dice = "";

foreach($diceSession->getDice() as $die) {
  $dice .= $die->getValue() ." ";
}

$hana['title'] = "Dice game";

$hana['main'] = <<<EOD
<h1>Dice game</h1>
<div class="grid-50">
  <p>
    {$dice}
  </p>
</div>
<div class="grid-50">
  <p>
    Kasta tärningen och få 100 poäng för att vinna.
  <p>
  </p>
    I varje omgång kastas en tärning tills man antingen väljer att
    spara eller får en etta. Får man en etta försvinner alla poäng man
    samlat in under omgången.
  </p>
</div>
EOD;

// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
