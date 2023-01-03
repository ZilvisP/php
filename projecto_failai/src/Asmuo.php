<?php

class Asmuo
{
    private DateTime $gimimoData;

    /**
     * @throws Exception
     */
    public function __construct(private string $vardas, int $gmmd)
    {
        $this->gimimoData = new DateTime($gmmd);
    }

    public function getAmzius(): int
    {
        $now = new DateTime();
        $diff = $now->diff($this->gimimoData);
        return $diff->y;
    }

    public function getVardas(): string
    {
        return $this->vardas;
    }

    public function getGimimoData(): DateTime
    {
        return $this->gimimoData;
    }
}
//============================================Klase asmeniui==========================
//class Asmuo
//{
//    protected $vardas;
//    private $gimimoMetai;
//
//    public function __construct($vardas, $gimimoMetai)
//    {
//        $this->vardas = $vardas;
//        $this->gimimoMetai = $gimimoMetai;
//    }
//        public function getVardas(): string
//        {
//            return $this->vardas;
//        }
//        public function getAmzius():float {
//            $date = date("Y");
//            $amzius = $date - $this->gimimoMetai;
//            return $amzius;
//        }
