USE laravel;

DROP PROCEDURE IF EXISTS SP_GetLeverantieByProductId;

DELIMITER $$

CREATE PROCEDURE SP_GetLeverantieByProductId(
    IN p_ProductId TINYINT UNSIGNED
)
BEGIN

    SELECT
         PROD.Id AS ProductId
        ,PROD.Naam AS ProductNaam
        ,LEV.Naam AS LeverancierNaam
        ,LEV.ContactPersoon
        ,LEV.LeverancierNummer
        ,LEV.Mobiel
        ,PPL.DatumLevering
        ,PPL.Aantal
        ,PPL.DatumEerstVolgendeLevering

    FROM ProductPerLeverancier AS PPL

    INNER JOIN Product AS PROD
        ON PPL.ProductId = PROD.Id

    INNER JOIN Leverancier AS LEV
        ON PPL.LeverancierId = LEV.Id

    WHERE PROD.Id = p_ProductId
      AND PROD.IsActief = 1
      AND PPL.IsActief = 1
      AND LEV.IsActief = 1

    ORDER BY PPL.DatumLevering DESC;

END$$

DELIMITER ;