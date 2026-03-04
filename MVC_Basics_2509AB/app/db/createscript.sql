DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;
CREATE DATABASE `MVC_Basics_2509AB`;
USE `MVC_Basics_2509AB`;


CREATE TABLE Smartphones
(
    Id                  SMALLINT        UNSIGNED        NOT NULL        AUTO_INCREMENT
   ,Merk                VARCHAR(50)                     NOT NULL
   ,Model               VARCHAR(50)                     NOT NULL
   ,Prijs               DECIMAL(6,2)                    NOT NULL
   ,Geheugen            DECIMAL(4,0)                    NOT NULL
   ,Besturingssysteem   VARCHAR(25)                     NOT NULL
   ,Schermgrootte        DECIMAL(3,2)                    NOT NULL
   ,Releasedatum        DATE                            NOT NULL
   ,Megapixels          DECIMAL(3,0)                    NOT NULL        
   ,IsActief            BIT                             NOT NULL        DEFAULT 1
   ,Opmerking           VARCHAR(255)                        NULL        DEFAULT NULL
   ,DatumAangemaakt     DATETIME(6)                     NOT NULL        DEFAULT NOW(6)
   ,DatumGewijzigd     DATETIME(6)                     NOT NULL         DEFAULT NOW(6)
   ,CONSTRAINT         PK_Smartphones_Id    PRIMARY KEY                 (Id)
) ENGINE=InnoDB;

INSERT INTO Smartphones
(
     Merk
    ,Model
    ,Prijs
    ,Geheugen
    ,Besturingssysteem
    ,Schermgrootte
    ,Releasedatum
    ,MegaPixels
)
VALUES
('Apple', 'iPhone 16 Pro', 1256.56, 64, 'iOS 18', 6.7, '2025-01-19', 50)
,('Samsung', 'Galaxy S25 Ultra', 1539, 128, 'Android 15', 6.1, '2025-02-01', 200)
,('Google', 'Pixel 9 Pro', 890, 1024, 'Android 15', 6.3, '2024-12-20', 100)
,('Apple', 'iPhone 17 Pro', 1399, 256, 'iOS 19', 6.7, '2026-09-18', 72)
,('Samsung', 'Galaxy S26 Ultra', 1599, 512, 'Android 16', 6.8, '2026-02-10', 250)
,('Google', 'Pixel 10 Pro', 999, 256, 'Android 16', 6.5, '2026-10-05', 108)
,('OnePlus', 'OnePlus 14 Pro', 899, 256, 'Android 16', 6.7, '2026-03-22', 64)
,('Xiaomi', 'Xiaomi 16 Pro', 849, 512, 'Android 16', 6.6, '2026-04-15', 200);



CREATE TABLE Sneakers
(
     Id                 SMALLINT        UNSIGNED        NOT NULL        AUTO_INCREMENT
    ,Merk               VARCHAR(50)                     NOT NULL
    ,Model              VARCHAR(50)                     NOT NULL
    ,Type               VARCHAR(25)                     NOT NULL
    ,Prijs              DECIMAL(5,2)                    NOT NULL
    ,Materiaal          VARCHAR(50)                     NOT NULL
    ,Gewicht            DECIMAL(3,0)                    NOT NULL
    ,Releasedatum       DATE                            NOT NULL
    ,IsActief           BIT                             NOT NULL        DEFAULT 1
    ,Opmerking          VARCHAR(255)                        NULL        DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                     NOT NULL        DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                     NOT NULL        DEFAULT NOW(6)
    ,CONSTRAINT         PK_Sneakers_Id    PRIMARY KEY                 (Id)
) ENGINE=InnoDB;

INSERT INTO Sneakers
(
     Merk
    ,Model
    ,Type
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
)
VALUES
('Nike', 'Air Jordan 1', 'Basketbal', 65.00, 'Leer', 590.00, '1985-09-16')
,('Adidas', 'Yeezy Boost 350', 'Basketbal', 200.00, 'Mesh', 520.00, '2015-08-22')
,('New Balance', 'Pixel 9 Pro', 'Casual', 99.00, 'Synthetisch', 410.00, '2026-01-10')
,('Trico', 'New Age', 'Casual', 79.00, 'Mesh', 390.00, '2026-02-01')
,('Overlord', 'Tristar 6', 'Hardloop', 89.00, 'Synthetisch', 360.00, '2026-03-01')
,('Nike', 'Air Force 1', 'Casual', 120, 'Leer', 420, '2024-03-15')
,('Nike', 'Air Jordan 4', 'Basketbal', 210, 'Leer', 460, '2025-02-10')
,('Adidas', 'Superstar', 'Casual', 95, 'Leer', 410, '2023-09-01');

CREATE TABLE Horloges
(
     Id                 SMALLINT        UNSIGNED        NOT NULL        AUTO_INCREMENT
    ,Merk               VARCHAR(50)                     NOT NULL
    ,Model              VARCHAR(50)                     NOT NULL
    ,Prijs              DECIMAL(6,0)                    NOT NULL
    ,IsActief           BIT                             NOT NULL        DEFAULT 1
    ,Opmerking          VARCHAR(255)                        NULL        DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                     NOT NULL        DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                     NOT NULL        DEFAULT NOW(6)
    ,CONSTRAINT         PK_Horloges_Id    PRIMARY KEY                 (Id)
) ENGINE=InnoDB;

INSERT INTO Horloges
(
     Merk
    ,Model
    ,Prijs
)

VALUES
('Rolex', 'Daytona 126500LN', 19800),
('Omega', 'Speedmaster Moonwatch Professional', 8500),
('Vacheron Constantin', 'Overseas Perpetual Calender Ultra-thin', 98000),
('Jeager-LeCoultre', 'Reverso Tribute Duoface', 17000);
('Test','Test', 1000);