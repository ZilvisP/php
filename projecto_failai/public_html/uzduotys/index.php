<?php
$ceu = [
"Italy" => "Rome",
"Luxembourg" => "Luxembourg",
"Belgium" => "Brussels",
"Denmark" => "Copenhagen",
"Finland" => "Helsinki",
"France" => "Paris",
"Slovakia" => "Bratislava",
"Slovenia" => "Ljubljana",
"Germany" => "Berlin",
"Greece" => "Athens",
"Ireland" => "Dublin",
"Netherlands" => "Amsterdam",
"Portugal" => "Lisbon",
"Spain" => "Madrid",
"Sweden" => "Stockholm",
"United Kingdom" => "London",
"Cyprus" => "Nicosia",
"Lithuania" => "Vilnius",
"Czech Republic" => "Prague",
"Estonia" => "Tallin",
"Hungary" => "Budapest",
"Latvia" => "Riga",
"Malta" => "Valetta",
"Austria" => "Vienna",
"Poland" => "Warsaw",
] ;
//1. nerikiuotus duomenis atspausdinti
//foreach ($ceu as $x => $value) {
//    echo "$x = $value <br>";
//}

//2.
//ksort($ceu);
//foreach ($ceu as $x => $value) {
//    echo "$x = $value <br>";
//}

//3

//$keys = array_keys($ceu);
//for  ($i = 0; $i <= count($keys); $i+=2) {
//    echo $keys[$i] . ' ' . $ceu[$keys[$i]]. '<br>';
//}

//4.d.) Visus variantus kurie turi raidę $char = “A”; (Case sensitive)
//
$keys = array_keys($ceu);
$char = 'A';
for  ($i = 0; $i < count($keys); $i++) {
if (strpos($keys[$i], $char) !==false  || strpos($ceu[$keys[$i]], $char) !==false) {
    echo $keys[$i] . ' ' . $ceu[$keys[$i]] . '<br>';
}}

//str_contains
//2] Parašyti skriptą kuris apskaičiuos ir atvaizduos vidutinę temperatūrą,

echo "Spausdinti vidurki<hr>";

$temperatura = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
function vidutineTemp ($array) {
    $vidurkis = array_sum($array)/count($array);
    return $vidurkis;
}
$vidutine = vidutineTemp($temperatura);
echo "Vidutine temperatura yra: $vidutine <br>";




//rikiuoti nuo min iki max, prie min i +5, prie max +5

function grazinti5($array, $skMin) {
    for($i = 0; $i < $skMin; $i++){
        echo  " " . $array[$i];

    }
}
sort($temperatura);
grazinti5($temperatura,5);
echo  "<br>";
rsort($temperatura);
grazinti5($temperatura, 5);


//2.1] Pavaizduoti rezultatus pagal celsijų

//
//$array = array("Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay");
//$new_array = array();
//foreach ($array as $key => $value) {
//    $new_array[$value] = $value;
//}
//print_r($new_array);
//


//Duotas masyvas:Rasti Trumpiausią ir ilgiausą masyvo elementą.
$raides = ["abcd", "abc", "de", "hjjj", "g", "wer"];
function suskaiciuotRaides($array){
    $newArray = [];
    for ($i = 0; $i < count($array); $i++) {
        $ilgis = strlen(($array[$i]));
        if (!isset($newArray[$ilgis])) {
            $newArray[$ilgis] = [];
        }
        $newArray[$ilgis][] = $array[$i];
    }
    return $newArray;
}
$newArray = suskaiciuotRaides($raides);

echo '<br>';

$first_value = reset($newArray);
$last_value = end($newArray);

echo 'Longest values: ' . implode(', ',$first_value);
echo '<br>';
echo 'Shortest values: ' . implode(', ',$last_value);