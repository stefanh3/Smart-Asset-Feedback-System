CREATE DATABASE AssetDB;

USE AssetDB;

CREATE TABLE Facility (
    facilityID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    facilityName VARCHAR(200)
);

CREATE TABLE Rating (
    ratingID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    facilityID INT(6) UNSIGNED,
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    availabilityRating INT(1),
    availabilityComment MEDIUMTEXT,
    fitForPurposeRating INT(1),
    fitForPurposeComment MEDIUMTEXT,
    aestheticsRating INT(1),
    aestheticsComment MEDIUMTEXT,
    qualityRating INT(1),
    qualityComment MEDIUMTEXT,
    FOREIGN KEY(facilityID) REFERENCES Facility(facilityID)
);

USE AssetDB;
INSERT INTO Facility (facilityName)
VALUES ("Brockman Park");

USE AssetDB;
INSERT INTO Rating (facilityID, qualityRating, qualityComment)
VALUES (1, 5, This is the first entry into the database!);

USE AssetDB;
SELECT * FROM Facility;
DELETE FROM Facility WHERE facilityID = 4;
