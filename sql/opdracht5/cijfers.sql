CREATE TABLE cijfers
(
    studentId INT,
    vakId INT,
    cijfer FLOAT NOT NULL,
    FOREIGN KEY (studentId) REFERENCES student(idStudent),
    FOREIGN KEY (vakId) REFERENCES vak(idVak)
);