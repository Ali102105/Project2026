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
        $sql = 'SELECT  SNKRS.Merk
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
}