USE laravel;

DROP PROCEDURE IF EXISTS SP_GetProductVoorLevering;

DELIMITER $$

CREATE PROCEDURE SP_GetProductVoorLevering(
    IN p_LeverancierId INT,
    IN p_ProductId INT
)
BEGIN
    SELECT
        PROD.Id AS ProductId,
        PROD.Naam AS ProductNaam,
        LEV.Id AS LeverancierId,
        LEV.Naam AS LeverancierNaam,
        LEV.ContactPersoon,
        LEV.Mobiel,
        PROD.IsActief + 0 AS ProductIsActief

    FROM Product AS PROD

    INNER JOIN Leverancier AS LEV
        ON LEV.Id = p_LeverancierId
        AND LEV.IsActief = 1

    WHERE PROD.Id = p_ProductId
      AND EXISTS (
          SELECT 1
          FROM ProductPerLeverancier AS PPL
          WHERE PPL.LeverancierId = LEV.Id
            AND PPL.ProductId = PROD.Id
            AND PPL.IsActief = 1
      )

    LIMIT 1;
END$$

DELIMITER ;
