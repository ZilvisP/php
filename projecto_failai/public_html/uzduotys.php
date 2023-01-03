<?php
//5] Duotas dvimatris masyvas. Apskaičiuoti matricos elementų
//* Sumą
//* Eilutės vidurkį
//* Stulpelių vidurkį
//* Visų elementų vidurkį
$matrica = [
    [9, 6, 8, 4, 7],
    [4, 8, 9, 3, 1],
    [3, 4, 8, 4, 6],
    [2, 6, 1, 4, 4],
    [7, 7, 5, 8, 2],
];
//$ilgis = count($matrica);

$suma = 0;
for($i=0; $i < count($matrica); $i++) {
   $suma +=  array_sum($matrica[$i]);
}
echo $suma;

//   $suma = array_sum($matrica)

