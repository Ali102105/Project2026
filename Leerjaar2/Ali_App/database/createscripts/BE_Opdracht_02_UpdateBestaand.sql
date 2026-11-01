USE laravel;

-- Nieuwe leverancier toevoegen
INSERT INTO Leverancier
(
    Id,
    Naam,
    ContactPersoon,
    LeverancierNummer,
    Mobiel,
    IsActief
)
SELECT
    6,
    'Quality Street',
    'Johan Nooij',
    'L1029234586',
    '06-23458456',
    1
WHERE NOT EXISTS (
    SELECT 1 FROM Leverancier WHERE Id = 6
);

-- Winegums wordt niet meer geproduceerd
UPDATE Product
SET IsActief = 0
WHERE Id = 10;

-- Bestaande voorbeelddata corrigeren naar november 2024
UPDATE ProductPerLeverancier
SET
    DatumLevering = DATE_ADD(DatumLevering, INTERVAL 1 MONTH),
    DatumEerstVolgendeLevering =
        DATE_ADD(DatumEerstVolgendeLevering, INTERVAL 1 MONTH)
WHERE Id BETWEEN 1 AND 17
AND DatumLevering >= '2024-10-01'
AND DatumLevering < '2024-11-01';

-- Bestaande NULL-datums vullen
UPDATE Product
SET DatumAangemaakt = COALESCE(DatumAangemaakt, NOW(6)),
    DatumGewijzigd = COALESCE(DatumGewijzigd, NOW(6));

UPDATE Allergeen
SET DatumAangemaakt = COALESCE(DatumAangemaakt, NOW(6)),
    DatumGewijzigd = COALESCE(DatumGewijzigd, NOW(6));

UPDATE Leverancier
SET DatumAangemaakt = COALESCE(DatumAangemaakt, NOW(6)),
    DatumGewijzigd = COALESCE(DatumGewijzigd, NOW(6));

UPDATE Magazijn
SET DatumAangemaakt = COALESCE(DatumAangemaakt, NOW(6)),
    DatumGewijzigd = COALESCE(DatumGewijzigd, NOW(6));

UPDATE ProductPerAllergeen
SET DatumAangemaakt = COALESCE(DatumAangemaakt, NOW(6)),
    DatumGewijzigd = COALESCE(DatumGewijzigd, NOW(6));

UPDATE ProductPerLeverancier
SET DatumAangemaakt = COALESCE(DatumAangemaakt, NOW(6)),
    DatumGewijzigd = COALESCE(DatumGewijzigd, NOW(6));

-- Verplichte systeemvelden correct instellen
ALTER TABLE Product
    MODIFY Opmerking VARCHAR(255) NULL,
    MODIFY DatumAangemaakt DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    MODIFY DatumGewijzigd DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
        ON UPDATE CURRENT_TIMESTAMP(6);

ALTER TABLE Allergeen
    MODIFY Opmerking VARCHAR(255) NULL,
    MODIFY DatumAangemaakt DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    MODIFY DatumGewijzigd DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
        ON UPDATE CURRENT_TIMESTAMP(6);

ALTER TABLE Leverancier
    MODIFY Opmerking VARCHAR(255) NULL,
    MODIFY DatumAangemaakt DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    MODIFY DatumGewijzigd DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
        ON UPDATE CURRENT_TIMESTAMP(6);

ALTER TABLE Magazijn
    MODIFY Opmerking VARCHAR(255) NULL,
    MODIFY DatumAangemaakt DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    MODIFY DatumGewijzigd DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
        ON UPDATE CURRENT_TIMESTAMP(6);

ALTER TABLE ProductPerAllergeen
    MODIFY Opmerking VARCHAR(255) NULL,
    MODIFY DatumAangemaakt DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    MODIFY DatumGewijzigd DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
        ON UPDATE CURRENT_TIMESTAMP(6);

ALTER TABLE ProductPerLeverancier
    MODIFY Opmerking VARCHAR(255) NULL,
    MODIFY DatumAangemaakt DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    MODIFY DatumGewijzigd DATETIME(6)
        NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
        ON UPDATE CURRENT_TIMESTAMP(6);
