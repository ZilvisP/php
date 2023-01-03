
<?php
include_once '../src/Student.php';

//sukurtas studentu masyvas:
$studentai = [['ID' => 1, 'vardas' => 'Tadas', 'pavarde' => 'Das', 'asmensKodas' => 39506122222],
    ['ID' => 2, 'vardas' => 'Jonas', 'pavarde' => 'Onas', 'asmensKodas' => 39406122222],
    ['ID' => 3, 'vardas' => 'Gabija', 'pavarde' => 'Bija', 'asmensKodas' => 49306122222],
    ['ID' => 4, 'vardas' => 'Tomas', 'pavarde' => 'Omas', 'asmensKodas' => 39006122222],
    ['ID' => 5, 'vardas' => 'Petras', 'pavarde' => 'Etras', 'asmensKodas' => 39006122222],
    ['ID' => 6, 'vardas' => 'Ieva', 'pavarde' => 'Eva', 'asmensKodas' => 489806122222],
    ['ID' => 7, 'vardas' => 'Kestutis', 'pavarde' => 'Tutis', 'asmensKodas' => 38806122222],
    ['ID' => 8, 'vardas' => 'Kristina', 'pavarde' => 'Ristina', 'asmensKodas' => 48706122222],
    ['ID' => 9, 'vardas' => 'Viktorija', 'pavarde' => 'Torija', 'asmensKodas' => 49006122222],
    ['ID' => 10, 'vardas' => 'Egle', 'pavarde' => 'Lege', 'asmensKodas' => 49106122222],
    ['ID' => 11, 'vardas' => 'Indre', 'pavarde' => 'Drene', 'asmensKodas' => 49206122222],
    ['ID' => 12, 'vardas' => 'Vytenis', 'pavarde' => 'Tenis', 'asmensKodas' => 39306122222],
    ['ID' => 13, 'vardas' => 'Laura', 'pavarde' => 'Raula', 'asmensKodas' => 49406122222],
    ['ID' => 14, 'vardas' => 'Ovidija', 'pavarde' => 'Vidija', 'asmensKodas' => 48406122222],
    ['ID' => 15, 'vardas' => 'Lukas', 'pavarde' => 'Kalukas', 'asmensKodas' => 38006122222],
    ['ID' => 16, 'vardas' => 'Uosis', 'pavarde' => 'Siuosis', 'asmensKodas' => 37906122222],
    ['ID' => 17, 'vardas' => 'Gabrielius', 'pavarde' => 'Liubrius', 'asmensKodas' => 37806122222],
    ['ID' => 18, 'vardas' => 'Danielius', 'pavarde' => 'Nielius', 'asmensKodas' => 35206122222],
    ['ID' => 19, 'vardas' => 'Reda', 'pavarde' => 'Gera', 'asmensKodas' => 48006122222],
    ['ID' => 20, 'vardas' => 'Audrius', 'pavarde' => 'Driunas', 'asmensKodas' => 36006122222]];



$newStudent = [];
foreach ($studentai as $student) {
    $newStudent[] = new Student($student['ID'], $student['vardas'], $student['pavarde'], $student['asmensKodas']);
}
//sukurtas grupes masyvas:

$grupes = [['ID' => 1, 'pavadinimas' => 'Dieninis', 'adresas'=>'Rutu g. 7'],
    ['ID' => 2, 'pavadinimas' => 'Vakarinis', 'adresas' =>'Vilties g. 27'],
    ['ID' => 3, 'pavadinimas' => 'Neakyvaizdinis', 'adresas' => 'Žiegždriai']];

$newGrupes = [];

foreach ($grupes as $grupe) {
    $newGrupes[] = new Grupe($grupe['ID'], $grupe['pavadinimas'], $grupe['adresas']);
}

//priskiriu studentams grupes:

function addGroupToStudent($student, $grupe): void {
    $student->nustatytiGrupe($grupe);
}
foreach ($newStudent as $student) {
    $random = rand(0, count($newGrupes) - 1);
    $randomGrupe = $newGrupes[$random];

    addGroupToStudent($student,$randomGrupe);
}


//spausdinimas pagal lyti:

function isvestiPagalLyti($newStudent): void
{
    echo '<h3>Moterys</h3>';
    echo '<ul>';
    foreach ($newStudent as $student) {
        if (substr($student->getAK(), 0, 1) === '4') {
            echo '<li>' . $student->getID() . ' ' . $student->getVardas() . ' ' . $student->getPavarde() . '. Studentas studijuojantis: ' . $student->getGrupe() . '.</li>';

        }
    }
    echo '</ul>';

    echo '<h3>Vyrai</h3>';
    echo '<ul>';
    foreach ($newStudent as $student) {
        if (substr($student->getAK(), 0, 1) === '3') {
            echo '<li>' . $student->getID() . ' ' . $student->getVardas() . ' ' . $student->getPavarde() . '. Studentas studijuojantis: ' . $student->getGrupe() . '.</li>';

        }
        echo '</ul>';
    }
    foreach ($newStudent as $student) {
        if (substr($student->getAK(), 0, 1) !== '3' && substr($student->getAK(), 0, 1) !== '4') {
            echo '<h3>Pateiktas blogas AK:</h3>';
            echo '<ul>';
            echo '<li>' . $student->getVardas() . ' ' . $student->getPavarde() . 'Studentas pateikė netinkamą asmens kodą' . '</li>';
        }
        echo '</ul>';
    }
}

isvestiPagalLyti($newStudent);


//spausdint jauniausia ir vyriausia:


function rastvyriausias($newStudent): array {
    $vyriausias = '';
    foreach ($newStudent as $student) {
        $gimimoMetstr = substr($student->getAK(), 1, 2);
        $gimimoMenstr = substr($student->getAK(), 3, 2);
        $gimimoDiestr = substr($student->getAK(), 5, 2);
        $gimimoData = "$gimimoMetstr - $gimimoMenstr - $gimimoDiestr";
    if($vyriausias['date'] == 0 || strtotime($gimimoData) > strtotime($vyriausias['date'])){
        $student['date'] = $gimimoData;
    $vyriausias = $student;
    }
    }
    return $vyriausias;
}


//echo vyriausiasIrJauniausias($newStudent);

$senolis = rastvyriausias($newStudent);
echo '<p style="color:red;">' . $senolis['vardas'] . ' ' . $senolis['pavarde'] . '. Studentas studijuojantis: ' . $senolis['grupe'] . '</p><br>';
//
//studentai = [
//    ['vardas' => 'Jonas', 'pavarde' => 'Jonaitis', 'asmensKodas' => 38304056789],
//    ['vardas' => 'Petras', 'pavarde' => 'Petraitis', 'asmensKodas' => 38706054321],
//    ['vardas' => 'Antanas', 'pavarde' => 'Antanaitis', 'asmensKodas' => 3911111111],
//    ['vardas' => 'Tomas', 'pavarde' => 'Tomaitis', 'asmensKodas' => 50002222222],
//    ['vardas' => 'Juozas', 'pavarde' => 'Juozaitis', 'asmensKodas' => 51503033333],
//    ['vardas' => 'Kazys', 'pavarde' => 'Kazlauskas', 'asmensKodas' => 37504044444],
//    ['vardas' => 'Mantas', 'pavarde' => 'Mantaitis', 'asmensKodas' => 395555555],
//    ['vardas' => 'Rita', 'pavarde' => 'Ritaitė', 'asmensKodas' => 60206066606],
//    ['vardas' => 'Viktorija', 'pavarde' => 'Viktorytė', 'asmensKodas' => 60505057705],
//    ['vardas' => 'Ona', 'pavarde' => 'Onienė', 'asmensKodas' => 48812128888],
//    ['vardas' => 'Vardenis', 'pavarde' => 'Pavardenis', 'asmensKodas' => 999999999],
//];
//
//foreach ($studentai as $key => $studentas) {
//    $studentaiObjektai[] = new Student($key, $studentas['vardas'], $studentas['pavarde'], $studentas['asmensKodas']);
//}
//
//$grupes = [
//    ['pavadinimas' => 'CS1V', 'adresas' => 'Kaunas'],
//    ['pavadinimas' => 'CS2D', 'adresas' => 'Vilnius'],
//    ['pavadinimas' => 'CS3V', 'adresas' => 'Klaipeda'],
//    ['pavadinimas' => 'CS4V', 'adresas' => 'Siauliai'],
//    ['pavadinimas' => 'CS5D', 'adresas' => 'Panevezys'],
//];
//
//foreach ($grupes as $key => $grupe) {
//    $grupesObjektai[] = new Grupe($key, $grupe['pavadinimas'], $grupe['adresas']);
//}
//
///** @var Student $studentas */
//foreach ($studentaiObjektai as $studentas) {
//    $grupe = $grupesObjektai[rand(0, 4)];
//    $studentas->priskirtiGrupe($grupe);
//}
//
//spausdintiPagalLyti($studentaiObjektai);
//spausdintiVyriausia($studentaiObjektai);
//spausdintiJauniausia($studentaiObjektai);
////generuotiForma();
////$filtrStud = filtruotiPagalGrupe($studentaiObjektai, $_POST['grupes_tipas']);
//spausdintiStudentus($studentaiObjektai);
//
//function spausdintiJauniausia(array $studentaiObjektai): void
//{
//    $vyriausias = $studentaiObjektai[0];
//    foreach ($studentaiObjektai as $studentas) {
//        if ($studentas->getGimimoData() > $vyriausias->getGimimoData()) {
//            $vyriausias = $studentas;
//        }
//    }
//    echo 'Jauniausias studentas: <ul>';
//    spausdintiStudentus([$vyriausias], 'li');
//    echo '</ul>';
//}
//function spausdintiVyriausia(array $studentaiObjektai): void
//{
//    $vyriausias = $studentaiObjektai[0];
//    foreach ($studentaiObjektai as $studentas) {
//        if ($studentas->getGimimoData() < $vyriausias->getGimimoData()) {
//            $vyriausias = $studentas;
//        }
//    }
//    echo 'Vyriausias studentas: <ul>';
//    spausdintiStudentus([$vyriausias], 'li');
//    echo '</ul>';
//}
//function spausdintiStudentus(array $studentaiObjektai, string $elementas = 'div'): void
//{
//    foreach ($studentaiObjektai as $studentas) {
//        echo "<$elementas>"
//            . $studentas->getVardas()
//            . ' ' . $studentas->getPavarde()
//            . ' ' . $studentas->getAsmensKodas()
//            . ' ' . $studentas->getGrupe()?->getPavadinimas()
//            . ' ' . $studentas->getGrupe()?->getAdresas()
//            . "</$elementas>";
//    }
//}
//function spausdintiPagalLyti(array $studentaiObjektai): void
//{
//    $vyras = [];
//    $moteris = [];
//    foreach ($studentaiObjektai as $studentas) {
//        if ($studentas->getLytis() === 'Vyras') {
//            $vyras[] = $studentas;
//        }elseif ($studentas->getLytis() === 'Moteris') {
//            $moteris[] = $studentas;
//        }
//    }
//    echo 'Vyrų studentų sąrašas: <ul>';
//    spausdintiStudentus($vyras, 'li');
//    echo '</ul><br>';
//    echo 'Moterų studentų sąrašas: <ul>';
//    spausdintiStudentus($moteris, 'li');
//    echo '</ul>';
//}