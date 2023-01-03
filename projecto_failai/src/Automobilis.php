<?php

class Automobilis {
    protected $marke;
    protected $modelis;
public function __construct($marke, $modelis) {
    $this->marke = $marke;
    $this->modelis = $modelis;
}
public function informacija() {
    return "Automobilio marke: " . $this->marke . ', o modelis yra: ' . $this->modelis;
}
}
