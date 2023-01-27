CREATE TABLE student
(
    idStudent INTEGER PRIMARY KEY AUTO_INCREMENT,
    klasID INT,
    achternaam VARCHAR(255) NOT NULL,
    voorletters VARCHAR(15) NOT NULL,
    FOREIGN KEY (klasID) REFERENCES klas(idKLAS)
);