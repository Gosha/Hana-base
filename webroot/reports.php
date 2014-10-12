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
<div class="grid-50">
  <h2>Kmom02</h2>
  <h3>Tidigare erfarenheter</h3>

  <p>
    Började med objektorienterad programmering för så länge sedan att
    jag inte riktigt minns när det var. Hade under lång tid ingen koll
    på när och hur det skulle användas. Men efter några skolprojekt på
    universitetet såg hur det kan vara användbart. På universitetet
    var det Java som gällde men har även lite grundläggande kunskap om
    bland annat PHP, Ruby och C++.
  </p>
  <p>
    Sedan Java-kursen har jag blivit ganska irriterad över hur t.ex.
    Wordpress blandar proceduell och objektorienterad programmering.
    Det gör koden man själv skriver väldigt rörig.
  </p>
  <p>
    När jag tidigare skrivit PHP har jag använt mig av
    objektorienterade bibliotek, men har inte skrivit någon egen
    objektorienterad kod.
  </p>
  <h3>Guiden</h3>
  <p>
    Måste vara ärlig och säga att jag skumläste mig genom
    oophp20-guiden. Skumläste även kurslitteraturen. Det mesta är
    väldigt likt andra objektorienterade språk.
  </p>
  <p>
    Saknade Rubys mixins, men såg i guiden att PHP erbjuder traits
    vilket verkar vara precis det jag letade efter. I slutändan använde
    jag mig dock inte av dem i uppgiften.
  </p>
  <h3>Uppgiften</h3>
  <p>
    Valde att implementera tärningsspelet 100.
  </p>
  <p>
    Valde att skippa rekommendationerna om vilka klasser som skulle
    implementeras. En klass för tärningen, <code>CDice</code>, och för
    spelet, <code>CDiceGame</code> hängde dock med.
  </p>
  <p>
    För att abstrahera sparandet av variabler i <code>\$_SESSION</code>
    införde jag <code>CSessionVar</code> som vid instantiering läser
    från <code>\$_SESSION</code> ifall variabeln redan existerar och
    annars skapar en ny. Vid destruktion sparar den variabeln i
    <code>\$_SESSION</code>.
  </p>
  <p>
    För att få till lite klass-arv implementerade
    jag <code>CDiceSession</code> som subklass
    till <code>CSessionVar</code>. <code>CSessionVar</code>
    abstraherar en runda av tärnkastningar.
  </p>
</div>
EOD;


// Finally, leave it all to the rendering phase of Hana.
include(HANA_THEME_PATH);
