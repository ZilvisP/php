<?php

namespace Mod;

use Mod\Exceptions\ValidatorException;

class Validator
{
    public static function required($value): void
    {
        if (empty($value)) {
            throw new ValidatorException('Neuzpildyti visi laukai');
        }
    }

    public static function numeric($value): void
    {
        if (!is_numeric($value)) {
            throw new ValidatorException('Laukas turi buti skaicius');
        }
    }

    public static function asmensKodas(int $kodas)
    {
        if(strlen($kodas) != 11
            || $kodas == 0
            || !in_array(substr($kodas, 0, 1), [3,4,5,6])
        ) {
            throw new ValidatorException('Netinkamas asmens kodas');
        }
    }

    public static function min(int $kuris, int $min)
    {
        if($kuris < $min) {
            throw new ValidatorException('Per mazas skaitmuo. Reikalaujamas dydis min. ' . $min);
        }
    }

    #veikiantis
    public static function phone(string $value) {
        if (str_starts_with($value, "+")) {
            if (strlen($value) > 12 || strlen($value) < 12 ) {
            throw new ValidatorException('Phone number does not start with "+" or is too long');
        }
            elseif (str_starts_with($value, "00")) {
                if (strlen($value) > 10 || strlen($value) < 10)
                {
                    throw new ValidatorException('does not start with 00 or is too long');
                }  else {
                    throw new ValidatorException('bad phone number');
                }
            }

}
    }
}
