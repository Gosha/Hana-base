<?php
/**
 * This is a Hana pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hana variable with its defaults.
include(__DIR__.'/config.php');

$hana['title'] = "Redovisningar";

$hana['main'] = <<<EOD
<h1>Redovisningar</h1>
<div class="grid-50">
  <h2>Kmom01</h2>
  <h3>Uppgiften</h3>
  <p>
    Eftersom jag har hållt på med PHP en hel del gick läsanvisningarna
    snabbt att skumma igenom. Vissa småsaker hade jag dock givetvis
    glömt eller missat. Till exempel att man kan använda dubbla
    dollar-tecken för att göra använda en variabels innehåll som en ny
    variabel, alltså att när <code>\$a = "b";</code> så kan man åt en
    variabel <code>\$b</code> med <code>\$\$a</code>.
  </p>
  <p>
    En klurighet jag fortfarande inte riktigt kommit underfund är hur
    man ska använda apaches <code>ErrorDocument</code> på flera olika
    hosts. Det fungerar fint att ge en fullständig sökväg på en host,
    men så fort man laddar upp det på t.ex. skolans server måste man
    ändra i <code>.htaccess</code>. Det finner jag lite jobbigt och
    vill helst att allt ska fungera "automagiskt."
  </p>
  <h3>Anax</h3>
  <p>
    Jag har tidigare provat på CodeIgniter och därför kändes Anax
    väldigt bekant. Förstod mig snabbt på filstrukturen och gjordes
    endast minimala ändringar på min version. Tyckte att det var
    jobbigt att behöva ändra på headern i varje fil så fort jag gjorde
    en ändring så jag flyttade ut den
    till <code>config.php</code>. Gjorde samma sak med footern.
  </p>
  <p>
    Mitt webb-ramverk fick namnet はな (hana) mest för att det var det
    första korta ordet jag kom på. Tänkte även att det inte är ett
    vanligt engelskt eller svenskt ord och därför krockar den globala
    variabeln <code>\$hana</code> inte med någonting.
  </p>
  <h3>Utvecklingsmiljö</h3>
  <p>
    Koden skriver jag i emacs på min laptop med linux-distributionen
    Sabayon. Jag har den vanliga LAMP-stacken på laptopen och jobbar i
    första hand lokalt mot koden. Jag pushar även koden till
    mitt <a href="https://github.com/Gosha/Hana-base">repository</a>
    på github.
  </p>
  <p>
    Jag har även en egen Gentoo-server stående i min lägenhet med
    LAMP-stacken. Den kör en nyare version av PHP, så för att testa
    koden med den versionen behöver jag bara göra en git pull.
  </p>
  <h3>source.php</h3>
  <p>
    Efter att ha kikat på exempel på hur <code>source.php</code>
    används klonade jag det från Mikael Roos github och kopierade in
    modulen CSource till mitt はな och använde den modulen i min
    egna <code>webroot/source.php</code>. Inga konstigheter.
  </p>
</div>

EOD;


// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
