
<?php

include '../src/Car.php';

$bmw = new Car();
$bmw->spalva = 'Raudonas';
$bmw->greitis = '100 km/h';
$bmw->kuroBakas = 80;
//$bmw->kuroSanaudos = 6.5;
$bmw->kuroLikutis = 15;
$bmw->nuvaziuota = 86;
$bmw->vaziuoti(1.5);
echo '<br>Rida: ' . $bmw->gautiRida() ;

//echo '<br>Kuro bako likutis: ' . $bmw->kuroLikutis() . ' l';
echo '<br>Kuro sąnaudos yra: ' . $bmw->kuroSanaudos();
echo '<br> Kuro likutis nuvažiavus' . $bmw->nuvaziuota . ' ' . $bmw->kuroLikutis();

echo '<hr>';
$audi = new Car();
$audi->spalva = 'Juoda';
$audi->greitis = '120 km/h';
$audi->vaziuoti(2);
echo '<br>Rida: ' . $audi->gautiRida();