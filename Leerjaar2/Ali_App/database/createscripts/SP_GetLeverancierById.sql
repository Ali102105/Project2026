USE laravel;

DROP PROCEDURE IF EXISTS SP_GetProductenByLeverancierId;

DELIMITER $$

CREATE PROCEDURE SP_GetProductenByLeverancierId(
    IN p_LeverancierId INT
)
BEGIN
    SELECT
        PROD.Id AS ProductId,
        PROD.Naam AS ProductNaam,
        COALESCE(MAGA.AantalAanwezig, 0)
            AS AantalInMagazijn,
        MAGA.VerpakkingsEenheid,
        LEVERING.LaatsteLevering

    FROM (
        SELECT
            ProductId,
            MAX(DatumLevering) AS LaatsteLevering

        FROM ProductPerLeverancier

        WHERE LeverancierId = p_LeverancierId
          AND IsActief = 1

        GROUP BY ProductId
    ) AS LEVERING

    INNER JOIN Product AS PROD
        ON PROD.Id = LEVERING.ProductId

    LEFT JOIN Magazijn AS MAGA
        ON MAGA.ProductId = PROD.Id

    ORDER BY
        AantalInMagazijn DESC,
        PROD.Id ASC;
END$$

DELIMITER ;
