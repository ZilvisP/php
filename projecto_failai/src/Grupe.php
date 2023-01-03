<?php

class Grupe
{
    private int $ID;
    private string $pavadinimas;
    private string $adresas;
public function __construct(int $ID, string $pavadinimas, string $adresas ) {
    $this->ID = $ID;
    $this->pavadinimas = $pavadinimas;
    $this->adresas = $adresas;
}
    public function getID(): string
    {
        return $this->ID;
    }
    public function getPavadinimas(): string
    {
        return $this->pavadinimas;
    }
    public function getAdresas(): int
    {
        return $this->adresas;
    }
    public function __toString() {
        return "Grupes ID: " . $this->ID . ", Grupes pavadinimas: " . $this->pavadinimas . ", adresas: " . $this->adresas;
    }
}
//
//
//include_once '../src/Student.php';
//
//class Grup0e
//{
//    /**
//     * @param int $id
//     * @param string $pavadinimas
//     * @param string $adresas
//     * @param int $studentuKiekis
//     */
//    public function __construct(
//        private int    $id,
//        private string $pavadinimas,
//        private string $adresas,
//        private int    $studentuKiekis = 0
//    )
//    {
//    }
//
//    /**
//     * @return int
//     */
//    public function getId(): int
//    {
//        return $this->id;
//    }
//
//    /**
//     * @return string
//     */
//    public function getPavadinimas(): string
//    {
//        return $this->pavadinimas;
//    }
//
//    /**
//     * @return string
//     */
//    public function getAdresas(): string
//    {
//        return $this->adresas;
//    }
//
//    /**
//     * @return int
//     */
//    public function getStudentuKiekis(): int
//    {
//        return $this->studentuKiekis;
//    }
//
//    public function pridetiStudenta(): void
//    {
//        $this->studentuKiekis++;
//    }
//}