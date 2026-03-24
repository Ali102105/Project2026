<?php

class Zangeres
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeres()
    {
        $sql = 'SELECT  ZGS.Id
                        ,ZGS.Stagenaam
                        ,ZGS.Naam
                        ,ZGS.Tussenvoegsel
                        ,ZGS.Achternaam
                        ,ZGS.Land
                        ,ZGS.Networth
                FROM    Zangeres as ZGS
                ORDER BY ZGS.Stagenaam DESC
                        ,ZGS.Naam DESC
                        ,ZGS.Achternaam
                        ,ZGS.Naam
                        ,ZGS.Tussenvoegsel
                        ,ZGS.Achternaam
                        ,ZGS.Land
                        ,ZGS.Networth
                         DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE
                FROM Zangeres
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Zangeres     ( Stagenaam
                                          ,Naam
                                          ,Tussenvoegsel
                                          ,Achternaam
                                          ,Land
                                          ,Networth
                                        )
                VALUES (:stagenaam,
                        :naam,
                        :tussenvoegsel,
                        :achternaam,
                        :land,
                        :networth)";

        $this->db->query($sql);
        $this->db->bind(':stagenaam', $data['stagenaam'], PDO::PARAM_STR);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':tussenvoegsel', $data['tussenvoegsel'], PDO::PARAM_INT);
        $this->db->bind(':achternaam', $data['achternaam'], PDO::PARAM_STR);
        $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':networth', $data['networth'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = "SELECT ZGS.Id
                  ,ZGS.Stagenaam
                  ,ZGS.Naam
                  ,ZGS.Tussenvoegsel
                  ,ZGS.Achternaam
                  ,ZGS.Land
                  ,ZGS.Networth
            FROM Zangeres as ZGS
            WHERE ZGS.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

public function updateZangeres($request)
{
    $sql = "UPDATE Zangeres
            SET Stagenaam = :stagenaam,
                Naam = :naam,
                Tussenvoegsel = :tussenvoegsel,
                Achternaam = :achternaam,
                Land = :land,
                Networth = :networth,
            WHERE Id = :id";

    $this->db->query($sql);
    $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
    $this->db->bind(':stagenaam', $request['stagenaam'], PDO::PARAM_STR);
    $this->db->bind(':naam', $request['naam'], PDO::PARAM_STR);
    $this->db->bind(':tussenvoegsel', $request['tussenvoegsel'], PDO::PARAM_STR);
    $this->db->bind(':achternaam', $request['achternaam'], PDO::PARAM_STR);
    $this->db->bind(':land', $request['land'], PDO::PARAM_STR);
    $this->db->bind(':networth', $request['networth'], PDO::PARAM_STR);

    return $this->db->execute();
}
}