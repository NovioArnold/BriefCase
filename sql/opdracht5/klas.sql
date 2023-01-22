

CREATE TABLE klas
(
    idKlas INT PRIMARY KEY AUTO_INCREMENT,
    Naam VARCHAR(45) NOT NULL
);

CREATE TABLE student
(
    idStudent INTEGER PRIMARY KEY AUTO_INCREMENT,
    klasID INT
    achternaam VARCHAR(255) NOT NULL,
    voorletters VARCHAR(15) NOT NULL,
    FOREIGN KEY (klasID) REFERENCES klas(idKLAS)
);
CREATE TABLE vak
(
    idVak INTEGER PRIMARY key NOT NULL AUTO_INCREMENT,
    vakNaam VARCHAR(45) NOT NULL
);
CREATE TABLE cijfers
(
    studentId INT,
    vakId INT,
    cijfer FLOAT NOT NULL,
    FOREIGN KEY (studentId) REFERENCES student(idStudent),
    FOREIGN KEY (vakId) REFERENCES vak(idVak)
);