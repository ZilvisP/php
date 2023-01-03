<?php

interface Calculator
{
    public function calculate(): void;
    private function validate(): bool;
}