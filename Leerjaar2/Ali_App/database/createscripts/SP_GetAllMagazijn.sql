USE laravel;

DROP PROCEDURE IF EXISTS SP_GetAllMagazijn;

DELIMITER $$

CREATE PROCEDURE SP_GetAllMagazijn()
BEGIN
    SELECT PROD.Barcode
          ,PROD.Naam
          ,MAGA.VerpakkingsEenheid
          ,MAGA.AantalAanwezig
          ,PROD.Id AS ProductId
    FROM Magazijn AS MAGA
    INNER JOIN Product AS PROD
        ON MAGA.ProductId = PROD.Id;
END$$

DELIMITER ;