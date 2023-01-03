<?php

/**
 * Norint isvesti kaip pavyzdyje, kad id liktu prirakintas su darbuotoju, filtruojant, galiu nebent ideti i pati masyva
 * ID=>, kitu minciu nera
 * reikia pasimokint array_filter
 * @param $array
 * @param $nustatytasAmzius
 * @return array
 */
$darbuotojai = [1 =>['Vardas' => 'Tadas', 'Amžius' => 23, 'Profesija' => 'Studentas'],
    2 =>['Vardas' => 'Jonas', 'Amžius' => 33, 'Profesija' => 'Mechanikas'],
    3 =>['Vardas' => 'Gabija', 'Amžius' => 27, 'Profesija' => 'Buhaltere'],
    4 =>['Vardas' => 'Tomas', 'Amžius' => 48, 'Profesija' => 'Santechnikas'],
    5 =>['Vardas' => 'Petras', 'Amžius' => 37, 'Profesija' => 'Vadybininkas'],
    6 =>['Vardas' => 'Ieva', 'Amžius' => 21, 'Profesija' => 'Studente'],
    7 =>['Vardas' => 'Kestutis', 'Amžius' => 30, 'Profesija' => 'Programuotojas']];



$nustatytasAmzius = 0;
function filtruotiPagaMetus($array, $nustatytasAmzius) {
    $filtruotiDarbuotojai = [];
    foreach ($array as $darbuotojas) {
        if ($darbuotojas['Amžius'] >= $nustatytasAmzius)/*> 30*/ {
            $filtruotiDarbuotojai[] = $darbuotojas;
        }
    }
    return $filtruotiDarbuotojai;
};

if(isset($_GET['Amžius'])) {
    $nustatytasAmzius = (int)$_GET['Amžius'];
    $filtruotiDarbuotojai = filtruotiPagaMetus($darbuotojai, $nustatytasAmzius);
}
//
//if(isset($_GET['Amžius'])) {
//    $nustatytasAmzius = (int) $_GET['Amžius'];
////    $filtruotiDarbuotojai = [];
//    foreach ($darbuotojai as $darbuotojas) {
//        if ($darbuotojas['Amžius'] >= $nustatytasAmzius)/*> 30*/ {
//            $filtruotiDarbuotojai[] = $darbuotojas;
//        }
//    }
//};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assigment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<form action="assigment.php" method ="GET">
    <label for="age">Amžius nuo:</label>
    <input type="number" id="age" name="Amžius" value="">
    <input type="submit">
</form>
<table class="table table-dark table-striped">
    <tr>
        <th> ID </th>
        <th> Vardas </th>
        <th> Amžius </th>
        <th> Profesija </th>
    </tr>
    <?php foreach($filtruotiDarbuotojai as $key => $darbuotojas) {?>
    <tr>
    <th scope="row"> <?php echo" $key . "?></th>
    <td> <?php echo $darbuotojas['Vardas']; ?> </td>
    <td> <?php echo $darbuotojas['Amžius']; ?> </td>
    <td> <?php echo $darbuotojas['Profesija']; ?> </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
<!--/**-->
<!-- * pradeda table-->
<!--*/-->
<!-- echo '<table>';-->
<!-- echo '<th> ID </th>';-->
<!--  echo '<th> Vardas </th>';-->
<!--   echo '<th> Amžius </th>';-->
<!--    echo '<th> Profesija </th>';-->
<!---->
<!-- foreach ($darbuotojai as $darbuotojas) {-->
<!--    echo '<tr>';-->
<!--    echo '<th>'-->
<!--    echo'</th>'-->
<!-- }-->
<!--echo '</table>';-->