<?php

namespace Mod\Controllers;
use Mod\FS;
use Mod\Output;
use Monolog\Logger;
use Mod\Response;


class KontaktaiController extends BaseController
{
    private Logger $log;

    public function __construct(Logger $log)
    {
        $this->log = $log;
        parent::__construct();
    }

    public function index(): Response
    {
        {
            // Nuskaitomas HTML failas ir siunciam jo teksta i Output klase
            $failoSistema = new FS('../src/html/kontaktai.html');
            $failoTurinys = $failoSistema->getFailoTurinys();
            $this->log->info('Kontaktai atidaryti');

            return $this->response($failoTurinys);
        }
    }
}