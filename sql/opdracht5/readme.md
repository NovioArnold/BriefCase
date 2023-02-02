# SQL opdracht 5

## opdracht 5.1 Database

Maak een database aan met de naam CijferAdministratie

```sql
    CREATE DATABASE CijferAdministratie;
```

## opdracht 5.2 Tabellen en primary keys maken

tabel voor "klas"

```sql
CREATE TABLE klas
(
    idKlas INT PRIMARY KEY AUTO_INCREMENT,
    Naam VARCHAR(45) NOT NULL
);
```

tabel voor "vak"

```sql
CREATE TABLE vak
(
    idVak INTEGER PRIMARY key NOT NULL AUTO_INCREMENT,
    vakNaam VARCHAR(45) NOT NULL
);
```

## opdracht 5.3 Foreign keys toevoegen

tabel voor "student"

```sql
CREATE TABLE student
(
    idStudent INTEGER PRIMARY KEY AUTO_INCREMENT,
    klasID INT,
    achternaam VARCHAR(255) NOT NULL,
    voorletters VARCHAR(15) NOT NULL,
    FOREIGN KEY (klasID) REFERENCES klas(idKLAS)
);
```

tabel voor "cijfers"

```sql
CREATE TABLE cijfers
(
    studentId INT,
    vakId INT,
    cijfer FLOAT NOT NULL,
    FOREIGN KEY (studentId) REFERENCES student(idStudent),
    FOREIGN KEY (vakId) REFERENCES vak(idVak)
);
```

## opdracht 5.4 Aanpassingen doen

veld "woonplaats" toevoegen

```sql
ALTER TABLE student
ADD Woonplaats VARCHAR(30);
```
Datatype voorletters aanpassen naar een varchar(5)

```sql
ALTER TABLE student
MODIFY voorletters VARCHAR(5);
```

verwijder het veld "woonplaats"

```sql
ALTER TABLE student
DROP column Woonplaats;
```

## opdracht 5.5 verwijderen

verwijder de table van 'vak'

```sql
DROP TABLE IF EXISTS vak;
```

verijder de database

```sql
DROP DATABASE IF EXISTS CijferAdministratie;
```


