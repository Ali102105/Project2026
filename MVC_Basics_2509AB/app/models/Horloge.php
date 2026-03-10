<?php

class Horloge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT  HRL.Id
                        ,HRL.Merk
                        ,HRL.Model
                        ,HRL.Prijs
                FROM    Horloges as HRL
                ORDER BY HRL.Merk DESC
                        ,HRL.Model DESC
                        ,HRL.Prijs DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
{
            $sql = "DELETE
                FROM Horloges
                WHERE Id = :Id";

                $this->db->query($sql);

                $this->db->bind(':Id', $Id, PDO::PARAM_INT);

                return $this->db->execute();
}

            public function create($data)
    {
        $sql = "INSERT INTO Horloges     ( Merk
                                          ,Model
                                          ,Prijs
                                        )
                VALUES (:merk,
                        :model,
                        :prijs)";
                        
        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);

        return $this->db->execute();
    }
}