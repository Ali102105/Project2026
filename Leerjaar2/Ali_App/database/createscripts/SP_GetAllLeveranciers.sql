USE laravel;

DROP PROCEDURE IF EXISTS SP_GetAllLeveranciers;

DELIMITER $$

CREATE PROCEDURE SP_GetAllLeveranciers()
BEGIN
    SELECT
        LEV.Id,
        LEV.Naam,
        LEV.ContactPersoon,
        LEV.LeverancierNummer,
        LEV.Mobiel,
        COUNT(DISTINCT PPL.ProductId)
            AS AantalVerschillendeProducten

    FROM Leverancier AS LEV

    LEFT JOIN ProductPerLeverancier AS PPL
        ON LEV.Id = PPL.LeverancierId
        AND PPL.IsActief = 1

    WHERE LEV.IsActief = 1

    GROUP BY
        LEV.Id,
        LEV.Naam,
        LEV.ContactPersoon,
        LEV.LeverancierNummer,
        LEV.Mobiel

    ORDER BY
        AantalVerschillendeProducten DESC,
        LEV.Id ASC;

END$$

DELIMITER ;
