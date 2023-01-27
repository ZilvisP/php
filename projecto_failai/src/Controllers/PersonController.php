<?php

namespace Mod\Controllers;

use Mod\Database;
use Mod\FS;
use Mod\Managers\PersonsManager;
use Mod\Response;
use Mod\Request;
use Mod\Validator;
use Mod\Configs;

use Exception;
use PDO;
use PDOException;

class PersonController extends BaseController
{
    public const TITLE = 'Asmenys';

    public function __construct(protected PersonsManager $personsManager)
    {
        parent::__construct();
    }

    public function list(Request $request): Response
    {
// TODO: Perkelti Filtravima
//
//        $kiekis = $request->get('amount', 10);
//        $orderBy = $request->get('orderby', 'id');
//
//        $searchQuery = '';
//        $params = [];
//        $search = $request->get('search');
//        if ($search) {
//            $searchQuery = "WHERE first_name LIKE :search OR last_name LIKE :search OR code LIKE :search";
//            $params['search'] = '%' . $search . '%';
//        }

        $asmenys = $this->personsManager->getAll();

        $rez = $this->generatePersonsTable($asmenys);

        return $this->response($rez);
    }

    public function new(): Response
    {
//      Nuskaitomas HTML failas ir siunciam jo teksta i Output klase
        $failoSistema = new FS('../src/html/person/new.html');
        $failoTurinys = $failoSistema->getFailoTurinys();

        return $this->response($failoTurinys);
    }

    public function store(Request $request): Response
    {

        Validator::required($request->get('first_name'));
        Validator::required($request->get('last_name'));
        Validator::required($request->get('code'));
        Validator::numeric($request->get('code'));
        Validator::asmensKodas($request->get('code'));

        $this->personsManager->store($request);

        return $this->redirect('/persons', ['message' => "Record created successfully"]);
    }

    public function delete(Request $request): Response
    {
        $kuris = $request->get('id');
        Validator::required($kuris);
        Validator::numeric($kuris);
        Validator::min($kuris, 1);

        $this->personsManager->deleteOne((int)$request->get('id'));

        return $this->redirect('/persons', ['message' => "Record deleted successfully"]);
    }

    public function edit(Request $request): Response
    {
        $failoSistema = new FS('../src/html/person/edit.html');
        $failoTurinys = $failoSistema->getFailoTurinys();
        $person = $this->personsManager->getOne((int)$request->get('id'));
        foreach ($person as $key => $item) {
            $failoTurinys = str_replace("{{" . $key . "}}", $item ?? '', $failoTurinys);
        }

        return $this->response($failoTurinys);
    }

    public function update(Request $request): Response
    {
        $id = $request->get('id');
        Validator::required($request->get('vardas'));
        Validator::required($request->get('pavarde'));
        Validator::required($request->get('kodas'));
        Validator::numeric($request->get('kodas'));
        Validator::asmensKodas($request->get('kodas'));

        $this->personsManager->updateOne($request);


//        $db->query(
//            "UPDATE `persons` SET `first_name` = :vardas, `last_name` = :pavarde, `code` = :kodas, `email` = :email,
//                     `phone` = :tel, `address_id` = :addr_id WHERE `id` = :id",

        return $this->redirect('/person/show?id=' . $request->get('id'), ['message' => "Record updated successfully"]);
    }

    public function show(Request $request): Response
    {
        $failoSistema = new FS('../src/html/person/show.html');
        $failoTurinys = $failoSistema->getFailoTurinys();

        $person = $this->personsManager->getOne((int)$request->get('id'));

        foreach ($person as $key => $item) {
            $failoTurinys = str_replace("{{" . $key . "}}", $item ?? '', $failoTurinys);
        }

        return $this->response($failoTurinys);
    }

    /**
     * @param mixed $asmuo
     * @return string
     */
    protected function generatePersonRow(array $asmuo): string
    {
        $failoSistema = new FS('../src/html/person/person_row.html');
        $failoTurinys = $failoSistema->getFailoTurinys();
        foreach ($asmuo as $key => $item) {
            $failoTurinys = str_replace("{{" . $key . "}}", $item ?? '', $failoTurinys);
        }

        return $failoTurinys;
    }

    /**
     * @param array $asmenys
     * @return string
     */
    protected function generatePersonsTable(array $asmenys): string
    {
        $rez = '<table class="highlight striped">
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>Emailas</th>
                <th>Asmens kodas</th>
                <th><a href="/persons?orderby=phone">TEl</a></th>
                <th>Addr.ID</th>
                <th>Veiksmai</th>
            </tr>';
        foreach ($asmenys as $asmuo) {
            $rez .= $this->generatePersonRow($asmuo);
        }
        $rez .= '</table>';
        return $rez;
    }
}