<?php

class Car
{
    public string $spalva;
    public string $greitis;

    public float $kuroBakas;
    public float $kuroSanaudos;
    private float $rida;
    public float $kuroLiko;
    public float $kuroLikutis;
    public float $nuvaziuota;
    public function __construct()
    {
        $this->rida = 0;
        $this->kuroSanaudos = 0;
//        $this->kuroLiko = 0;
    }

    public function vaziuoti(float $valandos): void
    {
        echo $this->gautiSpalva() ." automobilis važiuoja " . $this->greitis . " greičiu";
        $this->rida += (int) $this->greitis * $valandos;
    }
    public function gautiSpalva(): string
    {
        return $this->spalva;
    }

    public function gautiRida(): float
    {
        return $this->rida;
    }

//2] Taip pat sukurti metodą kuris gražina kuro likutį.
//        public function kuroLikutis()
//        {
//            $kuroLikutis = (int) $this->kuroBakas - (($this->rida/100) * $this->kuroSanaudos);
//           return $kuroLikutis;
//        }
//3] Sukurti vidutini kuro sąnaudų rodiklio pakeitimo f-ją. (Klasės kintamasis private)
        public function kuroSanaudos(): float {
         return  $this->kuroSanaudos = round((($this->kuroBakas - $this->kuroLikutis)/$this->rida)*100, 2);
        }
//4] Nuvažiuoti 86 km ir atspausdinti kiek liko kuro .
public function kuroLikutis(): float {
        $this->kuroLiko = $this->kuroBakas - round($this->nuvaziuota * $this->kuroSanaudos /100, 2);
        return $this->kuroLiko;
}
}
