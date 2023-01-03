<?php

include '../src/Asmuo.php';
include '../src/DuomanuIsvedimas.php';

$asmenuDuomanys = [
    ['vardas' => 'Jonas', 'gimimo_metai' => 1965],
    ['vardas' => 'Petras', 'gimimo_metai' => 1970],
    ['vardas' => 'Antanas', 'gimimo_metai' => 1980],
    ['vardas' => 'Ona', 'gimimo_metai' => 1990],
    ['vardas' => 'Maryte', 'gimimo_metai' => 2000],
    ['vardas' => 'Petras', 'gimimo_metai' => 1986],
    ['vardas' => 'Antanas', 'gimimo_metai' => 2005],
];

// Sukam cikla su kiekvienu įrašu iš $asnemuDuomanys masyvo
// ir kiekvieną kartą sukuriam naują new Asmuo() objektą
// naujai sukurtą objektą įdedam į $asmenys masyvą
foreach ($asmenuDuomanys as $asmuo) {
    $asmenys[] = new Asmuo($asmuo['vardas'], $asmuo['gimimo_metai']);
}

// Sukuriate Klasę DuomanuIsvedimas
// Klasėje DuomanuIsvedimas sukuriame metodą isvestiAsmenis($asmenys)
// Metodas isvestiAsmenis($asmenys) turi atspausdinti visus asmenis
$duomenuIsvedimas = new DuomenuIsvedimas();
$duomenuIsvedimas->isvestiAsmenis($asmenys);

// BONUS: Metodas isvestiAsmenisPagalData($asmenys, $gmmd) turi atspausdinti asmenis pagal gimimo metus
// BONUS: Metodas isvestiAsmenisLentele($asmenys) turi atspausdinti asmenis <table> HTML elemente
echo '<hr>';
$duomenuIsvedimas->isvestiAsmenisPagalData($asmenys, 1980);
$duomenuIsvedimas->isvestiAsmenisLentele($asmenys);




//
//include '../src/DuomenuIsvedimas.php';
//
//$asmenuDuomenys = [
//    ['vardas' => 'Jonas', 'gimimo_metai' => 1965],
//    ['vardas' => 'Petras', 'gimimo_metai' => 1970],
//    ['vardas' => 'Antanas', 'gimimo_metai' => 1980],
//    ['vardas' => 'Ona', 'gimimo_metai' => 1990],
//    ['vardas' => 'Maryte', 'gimimo_metai' => 2000],
//    ['vardas' => 'Petras', 'gimimo_metai' => 1986],
//    ['vardas' => 'Antanas', 'gimimo_metai' => 2005],
//];
//
//// Sukam cikla su kiekvienu įrašu iš $asnemuDuomanys masyvo
//// ir kiekvieną kartą sukuriam naują new Asmuo() objektą
//// naujai sukurtą objektą įdedam į $asmenys masyvą
//// Sukuriate Klasę DuomanuIsvedimas
//// Klasėje DuomanuIsvedimas sukuriame metodą isvestiAsmenis($asmenys)
//// Metodas isvestiAsmenis($asmenys) turi atspausdinti visus asmenis
//// BONUS: Metodas isvestiAsmenisPagalData($asmenys, $gmmd) turi atspausdinti asmenis pagal gimimo metus
//// BONUS: Metodas isvestiAsmenisLentele($asmenys) turi atspausdinti asmenis <table> HTML elemente;
//


//
//foreach($asmenuDuomenys as $asmenuDuomeny) {
//    $asmenys[] = new Asmuo ($asmenuDuomeny['vardas'], $asmenuDuomeny['gimimo_metai']);
//    return $asmenys;
//}

//foreach (/** Čia kažkas bus */) {
//    $asmuo = new Asmuo('Jonas', 1990);
//    /** Čia kažkas bus */
//}
//
///** Čia kažkas bus */



//======================Asmuo su klasem====================
//include '../src/Asmuo.php';
//
//$asmuo = new Asmuo('Jonas', 1990);
//echo $asmuo->getVardas(); //"Jonas"
//echo '<br>';
//echo $asmuo->getAmzius(); //32
//====================Automobilis su klasem=======================
//include '../src/Kupe.php';
//$kupe = new Kupe('Auto1', 'auto3', false);
//echo $kupe->informacija();
////Automobilio modelis: Auto1, marke: auto 3, ar durys atidarytos: ne;