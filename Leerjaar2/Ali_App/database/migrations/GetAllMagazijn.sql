-- **********************************************************************************
-- Naam opdracht : BE-opdracht 01 - Create script
-- Doel          : Aanmaken en vullen van de 6 specificatietabellen
-- **********************************************************************************

USE laravel;


-- ============================================================
-- STAMTABELLEN
-- ============================================================

-- Step 01: Product
-- DROP TABLE IF EXISTS Product;

CREATE TABLE IF NOT EXISTS Product
(
     Id                 TINYINT UNSIGNED NOT NULL AUTO_INCREMENT
    ,Naam               VARCHAR(50)      NOT NULL
    ,Barcode            VARCHAR(13)      NOT NULL
    ,IsActief           BIT              NOT NULL DEFAULT 1
    ,Opmerking          VARCHAR(250)         NULL DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)          NULL DEFAULT NULL
    ,DatumGewijzigd     DATETIME(6)          NULL DEFAULT NULL

    ,CONSTRAINT PK_Product_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

INSERT INTO Product
(
     Naam, Barcode, IsActief, Opmerking
)
VALUES
     ('Mintnopjes',     '8719587231278', 1, NULL)
    ,('Schoolkrijt',    '8719587326713', 1, NULL)
    ,('Honingdrop',     '8719587327836', 1, NULL)
    ,('Zure Beren',     '8719587321441', 1, NULL)
    ,('Cola Flesjes',   '8719587321237', 1, NULL)
    ,('Turtles',        '8719587322245', 1, NULL)
    ,('Witte Muizen',   '8719587328256', 1, NULL)
    ,('Reuzen Slangen', '8719587325641', 1, NULL)
    ,('Zoute Rijen',    '8719587322739', 1, NULL)
    ,('Winegums',       '8719587327527', 1, NULL)
    ,('Drop Munten',    '8719587322345', 1, NULL)
    ,('Kruis Drop',     '8719587322265', 1, NULL)
    ,('Zoute Ruitjes',  '8719587323256', 1, NULL);


-- Step 02: Allergeen
-- DROP TABLE IF EXISTS Allergeen;

CREATE TABLE IF NOT EXISTS Allergeen
(
     Id                 TINYINT UNSIGNED NOT NULL AUTO_INCREMENT
    ,Naam               VARCHAR(50)      NOT NULL
    ,Omschrijving       VARCHAR(150)     NOT NULL
    ,IsActief           BIT              NOT NULL DEFAULT 1
    ,Opmerking          VARCHAR(250)         NULL DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)          NULL DEFAULT NULL
    ,DatumGewijzigd     DATETIME(6)          NULL DEFAULT NULL

    ,CONSTRAINT PK_Allergeen_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

INSERT INTO Allergeen
(
     Naam, Omschrijving, IsActief, Opmerking
)
VALUES
     ('Gluten',        'Dit product bevat gluten',          1, NULL)
    ,('Gelatine',      'Dit product bevat gelatine',        1, NULL)
    ,('AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen',1, NULL)
    ,('Lactose',       'Dit product bevat lactose',         1, NULL)
    ,('Soja',          'Dit product bevat soja',            1, NULL);


-- Step 03: Leverancier
-- DROP TABLE IF EXISTS Leverancier;

CREATE TABLE IF NOT EXISTS Leverancier
(
     Id                 TINYINT UNSIGNED NOT NULL AUTO_INCREMENT
    ,Naam               VARCHAR(50)      NOT NULL
    ,ContactPersoon     VARCHAR(50)      NOT NULL
    ,LeverancierNummer  VARCHAR(11)      NOT NULL
    ,Mobiel             VARCHAR(11)      NOT NULL
    ,IsActief           BIT              NOT NULL DEFAULT 1
    ,Opmerking          VARCHAR(250)         NULL DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)          NULL DEFAULT NULL
    ,DatumGewijzigd     DATETIME(6)          NULL DEFAULT NULL

    ,CONSTRAINT PK_Leverancier_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

INSERT INTO Leverancier
(
     Naam, ContactPersoon, LeverancierNummer, Mobiel,
     IsActief, Opmerking
)
VALUES
     ('Venco',        'Bert van Linge',    'L1029384719', '06-28493827', 1, NULL)
    ,('Astra Sweets', 'Jasper del Monte',  'L1029284315', '06-39398734', 1, NULL)
    ,('Haribo',       'Sven Stalman',      'L1029324748', '06-24383291', 1, NULL)
    ,('Basset',       'Joyce Stelterberg', 'L1023845773', '06-48293823', 1, NULL)
    ,('De Bron',      'Remco Veenstra',    'L1023857736', '06-34291234', 1, NULL);


-- ============================================================
-- KOPPELTABELLEN / TABELLEN MET FOREIGN KEYS
-- ============================================================

-- Step 04: Magazijn
-- DROP TABLE IF EXISTS Magazijn;

CREATE TABLE IF NOT EXISTS Magazijn
(
     Id                         TINYINT UNSIGNED NOT NULL AUTO_INCREMENT
    ,ProductId                  TINYINT UNSIGNED NOT NULL
    ,VerpakkingsEenheid DECIMAL(5,2)    NOT NULL
    ,AantalAanwezig             SMALLINT UNSIGNED    NULL DEFAULT NULL
    ,IsActief           BIT              NOT NULL DEFAULT 1
    ,Opmerking          VARCHAR(250)         NULL DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)          NULL DEFAULT NULL
    ,DatumGewijzigd     DATETIME(6)          NULL DEFAULT NULL

    ,CONSTRAINT PK_Magazijn_Id PRIMARY KEY (Id)
    ,CONSTRAINT FK_Magazijn_ProductId_Product_Id
        FOREIGN KEY (ProductId) REFERENCES Product(Id)
) ENGINE=InnoDB;

INSERT INTO Magazijn
(
     ProductId, VerpakkingsEenheid, AantalAanwezig,
     IsActief, Opmerking
)
VALUES
     (1,  5.00, 453, 1, NULL)
    ,(2,  2.50, 400, 1, NULL)
    ,(3,  5.00,   1, 1, NULL)
    ,(4,  1.00, 800, 1, NULL)
    ,(5,  3.00, 234, 1, NULL)
    ,(6,  2.00, 345, 1, NULL)
    ,(7,  1.00, 795, 1, NULL)
    ,(8, 10.00, 233, 1, NULL)
    ,(9,  2.50, 123, 1, NULL)
    ,(10, 3.00, NULL,1, NULL)
    ,(11, 2.00, 367, 1, NULL)
    ,(12, 1.00, 467, 1, NULL)
    ,(13, 5.00,  20, 1, NULL);


-- Step 05: ProductPerAllergeen
-- DROP TABLE IF EXISTS ProductPerAllergeen;

CREATE TABLE IF NOT EXISTS ProductPerAllergeen
(
     Id                 TINYINT UNSIGNED NOT NULL AUTO_INCREMENT
    ,ProductId          TINYINT UNSIGNED NOT NULL
    ,AllergeenId        TINYINT UNSIGNED NOT NULL
    ,IsActief           BIT              NOT NULL DEFAULT 1
    ,Opmerking          VARCHAR(250)         NULL DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)          NULL DEFAULT NULL
    ,DatumGewijzigd     DATETIME(6)          NULL DEFAULT NULL

    ,CONSTRAINT PK_ProductPerAllergeen_Id PRIMARY KEY (Id)
    ,CONSTRAINT FK_ProductPerAllergeen_ProductId_Product_Id
        FOREIGN KEY (ProductId) REFERENCES Product(Id)
    ,CONSTRAINT FK_ProductPerAllergeen_AllergeenId_Allergeen_Id
        FOREIGN KEY (AllergeenId) REFERENCES Allergeen(Id)
) ENGINE=InnoDB;

INSERT INTO ProductPerAllergeen
(
     ProductId, AllergeenId, IsActief, Opmerking
)
VALUES
     (1,  2, 1, NULL)
    ,(1,  1, 1, NULL)
    ,(1,  3, 1, NULL)
    ,(3,  4, 1, NULL)
    ,(6,  5, 1, NULL)
    ,(9,  2, 1, NULL)
    ,(9,  5, 1, NULL)
    ,(10, 2, 1, NULL)
    ,(12, 4, 1, NULL)
    ,(13, 1, 1, NULL)
    ,(13, 4, 1, NULL)
    ,(13, 5, 1, NULL);


-- Step 06: ProductPerLeverancier
-- DROP TABLE IF EXISTS ProductPerLeverancier;

CREATE TABLE IF NOT EXISTS ProductPerLeverancier
(
     Id                         TINYINT UNSIGNED NOT NULL AUTO_INCREMENT
    ,LeverancierId              TINYINT UNSIGNED NOT NULL
    ,ProductId                  TINYINT UNSIGNED NOT NULL
    ,DatumLevering              DATE             NOT NULL
    ,Aantal                     SMALLINT UNSIGNED NOT NULL
    ,DatumEerstVolgendeLevering DATE                 NULL DEFAULT NULL
    ,IsActief           BIT              NOT NULL DEFAULT 1
    ,Opmerking          VARCHAR(250)         NULL DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)          NULL DEFAULT NULL
    ,DatumGewijzigd     DATETIME(6)          NULL DEFAULT NULL

    ,CONSTRAINT PK_ProductPerLeverancier_Id PRIMARY KEY (Id)
    ,CONSTRAINT FK_ProductPerLeverancier_LeverancierId_Leverancier_Id
        FOREIGN KEY (LeverancierId) REFERENCES Leverancier(Id)
    ,CONSTRAINT FK_ProductPerLeverancier_ProductId_Product_Id
        FOREIGN KEY (ProductId) REFERENCES Product(Id)
) ENGINE=InnoDB;

INSERT INTO ProductPerLeverancier
(
     LeverancierId, ProductId, DatumLevering, Aantal, DatumEerstVolgendeLevering,
     IsActief, Opmerking
)
VALUES
     (1, 1,  '2024-10-09', 23, '2024-10-16', 1, NULL)
    ,(1, 1,  '2024-10-18', 21, '2024-10-25', 1, NULL)
    ,(1, 2,  '2024-10-09', 12, '2024-10-16', 1, NULL)
    ,(1, 3,  '2024-10-10', 11, '2024-10-17', 1, NULL)
    ,(2, 4,  '2024-10-14', 16, '2024-10-21', 1, NULL)
    ,(2, 4,  '2024-10-21', 23, '2024-10-28', 1, NULL)
    ,(2, 5,  '2024-10-14', 45, '2024-10-21', 1, NULL)
    ,(2, 6,  '2024-10-14', 30, '2024-10-21', 1, NULL)
    ,(3, 7,  '2024-10-12', 12, '2024-10-19', 1, NULL)
    ,(3, 7,  '2024-10-19', 23, '2024-10-26', 1, NULL)
    ,(3, 8,  '2024-10-10', 12, '2024-10-17', 1, NULL)
    ,(3, 9,  '2024-10-11',  1, '2024-10-18', 1, NULL)
    ,(4, 10, '2024-10-16', 24, '2024-10-30', 1, NULL)
    ,(5, 11, '2024-10-10', 47, '2024-10-17', 1, NULL)
    ,(5, 11, '2024-10-19', 60, '2024-10-26', 1, NULL)
    ,(5, 12, '2024-10-11', 45, NULL,         1, NULL)
    ,(5, 13, '2024-10-12', 23, NULL,         1, NULL);

-- Controle
SELECT * FROM Product;
SELECT * FROM Allergeen;
SELECT * FROM Leverancier;
SELECT * FROM Magazijn;
SELECT * FROM ProductPerAllergeen;
SELECT * FROM ProductPerLeverancier;
