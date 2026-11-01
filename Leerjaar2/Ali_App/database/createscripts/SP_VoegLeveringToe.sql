USE laravel;

DROP PROCEDURE IF EXISTS SP_VoegLeveringToe;

DELIMITER $$

CREATE PROCEDURE SP_VoegLeveringToe(
    IN p_LeverancierId INT,
    IN p_ProductId INT,
    IN p_Aantal INT,
    IN p_DatumEerstVolgendeLevering DATE
)
BEGIN
    DECLARE v_IsActief TINYINT DEFAULT NULL;

    SELECT PROD.IsActief + 0
    INTO v_IsActief

    FROM Product AS PROD

    WHERE PROD.Id = p_ProductId
      AND EXISTS (
          SELECT 1
          FROM ProductPerLeverancier AS PPL

          INNER JOIN Leverancier AS LEV
              ON LEV.Id = PPL.LeverancierId

          WHERE PPL.ProductId = PROD.Id
            AND PPL.LeverancierId = p_LeverancierId
            AND PPL.IsActief = 1
            AND LEV.IsActief = 1
      )

    LIMIT 1
    FOR UPDATE;

    IF v_IsActief IS NULL
       OR p_Aantal < 1
       OR p_Aantal > 65535 THEN

        SELECT 'ongeldig' AS Resultaat;

    ELSEIF v_IsActief = 0 THEN

        SELECT 'inactief' AS Resultaat;

    ELSE

        UPDATE Magazijn
        SET AantalAanwezig =
            COALESCE(AantalAanwezig, 0) + p_Aantal
        WHERE ProductId = p_ProductId;

        INSERT INTO ProductPerLeverancier
        (
            LeverancierId,
            ProductId,
            DatumLevering,
            Aantal,
            DatumEerstVolgendeLevering
        )
        VALUES
        (
            p_LeverancierId,
            p_ProductId,
            CURRENT_DATE(),
            p_Aantal,
            p_DatumEerstVolgendeLevering
        );

        SELECT 'gelukt' AS Resultaat;

    END IF;
END$$

DELIMITER ;
