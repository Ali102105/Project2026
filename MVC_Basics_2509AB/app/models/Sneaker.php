<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT  SNKRS.Id
                        ,SNKRS.Merk
                        ,SNKRS.Model
                        ,SNKRS.Type
                        ,SNKRS.Prijs
                        ,SNKRS.Materiaal
                        ,SNKRS.Gewicht
                        ,DATE_FORMAT(SNKRS.Releasedatum, "%d/%m/%Y") as Releasedatum
                FROM    Sneakers as SNKRS
                ORDER BY SNKRS.Merk DESC
                        ,SNKRS.Model DESC
                        ,SNKRS.Type DESC
                        ,SNKRS.Prijs DESC
                        ,SNKRS.Materiaal DESC
                        ,SNKRS.Gewicht DESC
                        ,SNKRS.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE
                FROM Sneakers
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers    ( Merk
                                          ,Model
                                          ,Type
                                          ,Prijs
                                          ,Materiaal
                                          ,Gewicht
                                          ,Releasedatum
                                        )
                VALUES (:merk,
                        :model,
                        :type,
                        :prijs,
                        :materiaal,
                        :gewicht,
                        :releasedatum)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getSneakerById($id)
    {
        $sql = 'SELECT SNKRS.Id
                      ,SNKRS.Merk
                      ,SNKRS.Model
                      ,SNKRS.Type
                      ,SNKRS.Prijs
                      ,SNKRS.Materiaal
                      ,SNKRS.Gewicht
                      ,SNKRS.Releasedatum
            FROM Sneakers as SNKRS
            WHERE SNKRS.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateSneaker($request)
    {
        //var_dump($_REQUEST);
        $sql = "UPDATE Sneakers as SNKRS
            SET     SNKRS.Merk = :merk
                   ,SNKRS.Model = :model
                   ,SNKRS.Type = :type
                   ,SNKRS.Prijs = :prijs
                   ,SNKRS.Materiaal = :materiaal
                   ,SNKRS.Gewicht = :gewicht
                   ,SNKRS.Releasedatum = :releasedatum
            WHERE   SNKRS.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_STR);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $request['type'], PDO::PARAM_INT);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);


        return $this->db->execute();
    }
}