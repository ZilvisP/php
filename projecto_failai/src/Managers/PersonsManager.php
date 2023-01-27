<?php

namespace Mod\Managers;

use Mod\Database;
use Mod\Request;

class PersonsManager
{
    public function __construct(protected Database $db)
    {
    }

    public function getAll(): array
    {
        return $this->db->query('SELECT p.*, concat(c.title, \' - \', a.city, \' - \', a.street, \' - \', a.postcode) address
                    FROM persons p
                        LEFT JOIN addresses a on p.address_id = a.id 
                        LEFT JOIN countries c on a.country_iso = c.iso');

// TODO: Velesniam Filtravimui
//
//                        ' . $searchQuery . '
//                        ORDER BY ' . $orderBy . ' DESC LIMIT ' . $kiekis,
//            $params);
    }

    public function getOne(int $id): array
    {
        return $this->db->query('SELECT p.*, concat(c.title, \' - \', a.city, \' - \', a.street, \' - \', a.postcode) address
                    FROM persons p
                        LEFT JOIN addresses a on p.address_id = a.id 
                        LEFT JOIN countries c on a.country_iso = c.iso
                    WHERE p.id = :id',
            ['id' => $id])[0];
    }
    public function updateOne(Request $request): array
    {
        return $this->db->query("UPDATE `persons` SET `first_name` = :vardas, `last_name` = :pavarde, `code` = :kodas, `email` = :email,
                     `phone` = :tel, `address_id` = :addr_id WHERE `id` = :id",
        $request->all());
    }
    public function deleteOne(int $id): array{
        return $this->db->query("DELETE FROM `persons` WHERE `id` = :id", ['id' => $id])[0];
    }
    public function store(Request $request) {
       return $this -> db->query(
            "INSERT INTO `persons` (`first_name`, `last_name`, `code`)
                    VALUES (:vardas, :pavarde, :kodas)",
           $request->all());
    }


    public function search() {

    }

}
//return $this->db->query("CREATE TRIGGER person_SLETTES
//after delete on `persons` for each row begin delete from `users` where person_id = :id;
// delete from `person2group` where person_id = :id; END; DELETE FROM `persons` WHERE `id` = :id", ['id' => $id])[0];
//}
//}
////("DELETE FROM `persons` WHERE `id` = :id", ['id' => $id])[0];
/// ////////////////
//public function deleteOne(int $id): bool
//{
//    try {
//        $this->db->beginTransaction();
//        $this->db->prepare("DELETE FROM `users` WHERE `person_id` = :id")->execute(['id' => $id]);
//        $this->db->prepare("DELETE FROM `person2group` WHERE `person_id` = :id")->execute(['id' => $id]);
//        $this->db->prepare("DELETE FROM `persons` WHERE `id` = :id")->execute(['id' => $id]);
//        $this->db->commit();
//        return true;
//    } catch (PDOException $e) {
//        $this->db->rollBack();
//        return false;
//    }
//}