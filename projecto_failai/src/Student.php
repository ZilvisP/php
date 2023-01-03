<?php
include_once '../src/Grupe.php';
class Student
{
    private int $ID;
    private string $vardas;
    private string $pavarde;
    private int $asmensKodas;
    private Grupe $grupe;

    public function __construct(int $ID, string $vardas, string $pavarde, int $asmensKodas)
    {
        $this->ID = $ID;
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->asmensKodas = $asmensKodas;
    }

    public function getID(): int
    {
        return $this->ID;
    }

    public function getVardas(): string
    {
        return $this->vardas;
    }

    public function getPavarde(): string
    {
        return $this->pavarde;
    }

    public function getAK(): int
    {
        return $this->asmensKodas;
    }

    public function getGrupe(): Grupe
    {
        return $this->grupe;
    }

    public function nustatytiGrupe(Grupe $grupe)
    {
        $this->grupe = $grupe;
    }
}
//
//
//include_once 'Grupe.php';
//
//class Student
//{
//    /**
//     * @param int $id
//     * @param string $vardas
//     * @param string $pavarde
//     * @param int $asmensKodas
//     * @param Grupe|null $grupe
//     */
//    public function __construct(
//        private int $id,
//        private string $vardas,
//        private string $pavarde,
//        private int $asmensKodas,
//        private Grupe|null $grupe = null
//    ) {
//    }
//
//    public function getGrupe(): Grupe|null
//    {
//        return $this->grupe;
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
//    public function getVardas(): string
//    {
//        return $this->vardas;
//    }
//
//    /**
//     * @return string
//     */
//    public function getPavarde(): string
//    {
//        return $this->pavarde;
//    }
//
//    /**
//     * @return int
//     */
//    public function getAsmensKodas(): int
//    {
//        return $this->asmensKodas;
//    }
//
//    public function priskirtiGrupe(Grupe $grupe): void
//    {
//        $this->grupe = $grupe;
//        $grupe->pridetiStudenta();
//    }
//
//    public function getGimimoData(): DateTime
//    {
//        $milenium = $this->gautiTukstantmeti();
//        $gimimoMetai = $milenium + substr($this->asmensKodas, 1, 2);
//        $gimimoMenuo = substr($this->asmensKodas, 3, 2);
//        $gimimoDiena = substr($this->asmensKodas, 5, 2);
//        $gimimoData = new DateTime();
//        $gimimoData->setDate($gimimoMetai, $gimimoMenuo, $gimimoDiena);
//        return $gimimoData;
//    }
//
//    /**
//     * @return int
//     */
//    public function gautiTukstantmeti(): int
//    {
//        if (in_array(substr($this->asmensKodas, 0, 1), [5,6])) {
//            $milenium = 2000;
//        } else {
//            $milenium = 1900;
//        }
//
//        return $milenium;
//    }
//
//    public function getLytis(): string|null
//    {
//        if(in_array(substr($this->getAsmensKodas(), 0, 1), [3,5])) {
//            return 'Vyras';
//        } elseif (in_array(substr($this->getAsmensKodas(), 0, 1), [4,6])) {
//            return 'Moteris';
//        } else {
//            return null;
//        }
//    }
//}