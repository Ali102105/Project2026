# Database Specificatie Tabel
## BE-opdracht 02 - Jamin

Klas: IO-SD-2509AB

### 1. Product

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | TINYINT UNSIGNED | Nee | PK |
| Naam | VARCHAR(50) | Nee | |
| Barcode | VARCHAR(13) | Nee | |

### 2. Allergeen

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | TINYINT UNSIGNED | Nee | PK |
| Naam | VARCHAR(50) | Nee | |
| Omschrijving | VARCHAR(150) | Nee | |

### 3. Leverancier

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | TINYINT UNSIGNED | Nee | PK |
| Naam | VARCHAR(50) | Nee | |
| ContactPersoon | VARCHAR(50) | Nee | |
| LeverancierNummer | VARCHAR(11) | Nee | |
| Mobiel | VARCHAR(11) | Nee | |

### 4. Magazijn

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | TINYINT UNSIGNED | Nee | PK |
| ProductId | TINYINT UNSIGNED | Nee | FK |
| VerpakkingsEenheid | DECIMAL(5,2) | Nee | |
| AantalAanwezig | SMALLINT UNSIGNED | Ja | |

### 5. ProductPerAllergeen

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | TINYINT UNSIGNED | Nee | PK |
| ProductId | TINYINT UNSIGNED | Nee | FK |
| AllergeenId | TINYINT UNSIGNED | Nee | FK |

### 6. ProductPerLeverancier

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | TINYINT UNSIGNED | Nee | PK |
| LeverancierId | TINYINT UNSIGNED | Nee | FK |
| ProductId | TINYINT UNSIGNED | Nee | FK |
| DatumLevering | DATE | Nee | |
| Aantal | SMALLINT UNSIGNED | Nee | |
| DatumEerstVolgendeLevering | DATE | Ja | |

## Verplichte systeemvelden

Alle zes tabellen bevatten deze vier velden:

| Veld | Datatype | NULL | Standaard |
|---|---|---|---|
| IsActief | BIT(1) | Nee | 1 |
| Opmerking | VARCHAR(255) | Ja | NULL |
| DatumAangemaakt | DATETIME(6) | Nee | CURRENT_TIMESTAMP(6) |
| DatumGewijzigd | DATETIME(6) | Nee | CURRENT_TIMESTAMP(6), ON UPDATE CURRENT_TIMESTAMP(6) |

## Relaties

| Tabel | Foreign Key | Verwijst naar |
|---|---|---|
| Magazijn | ProductId | Product(Id) |
| ProductPerAllergeen | ProductId | Product(Id) |
| ProductPerAllergeen | AllergeenId | Allergeen(Id) |
| ProductPerLeverancier | ProductId | Product(Id) |
| ProductPerLeverancier | LeverancierId | Leverancier(Id) |

## Belangrijke gegevens

- Er zijn 13 producten.
- Er zijn 5 allergenen.
- Er zijn 6 leveranciers.
- Quality Street (Id 6) heeft nog geen producten geleverd.
- Winegums (Id 10) heeft IsActief = 0.
- ProductPerLeverancier bevat oorspronkelijk 17 leveringsrecords.
- Nieuwe leveringen verhogen AantalAanwezig in Magazijn.

## Stored Procedures

### Userstory 1
- SP_GetAllLeveranciers
- SP_GetLeverancierById
- SP_GetProductenByLeverancierId

### Userstory 2
- SP_GetProductVoorLevering
- SP_VoegLeveringToe

De Stored Procedures worden vanuit Laravel aangeroepen
met PDO en gebonden parameters.
