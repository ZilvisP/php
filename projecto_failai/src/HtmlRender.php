<?php

namespace Mod;
use Mod\Exceptions\ElementNotFound;

//use Mod\FS; //Nebutina nes tam paciam foldery randasi;

class HtmlRender extends AbstractRender
{
    protected function getContent(): string
    {
        $failoSistema = new FS('../src/html/Dashboard.html');
        $failoTurinys = $failoSistema->getFailoTurinys();

        $duomMas = [
            'username' => $_SESSION['username'],
            'userType' => 'Admin',
            'loggedInDate' => date('Y-m-d H:i:s'),
            'klaida' => 'Turi ismesti klaida'
        ];

        foreach ($duomMas as $key => $value) {
            if (!str_contains($failoTurinys, '{{' . $key . '}}')) {
                throw new ElementNotFound('Nerastas raktazodis: ' . $key);
            }

            $failoTurinys = str_replace('{{' . $key . '}}', $value, $failoTurinys);
        }

        return $failoTurinys;
    }
}
