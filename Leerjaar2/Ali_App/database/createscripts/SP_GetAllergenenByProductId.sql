USE laravel;

DROP PROCEDURE IF EXISTS SP_GetAllergenenByProductId;

DELIMITER $$

CREATE PROCEDURE SP_GetAllergenenByProductId(
    IN p_ProductId TINYINT UNSIGNED
)
BEGIN

    SELECT
         PROD.Id AS ProductId
        ,PROD.Naam AS ProductNaam
        ,PROD.Barcode
        ,ALLER.Naam AS AllergeenNaam
        ,ALLER.Omschrijving

    FROM Product AS PROD

    INNER JOIN ProductPerAllergeen AS PPA
        ON PROD.Id = PPA.ProductId

    INNER JOIN Allergeen AS ALLER
        ON PPA.AllergeenId = ALLER.Id

    WHERE PROD.Id = p_ProductId
      AND PROD.IsActief = 1
      AND PPA.IsActief = 1
      AND ALLER.IsActief = 1;

END$$

DELIMITER ;