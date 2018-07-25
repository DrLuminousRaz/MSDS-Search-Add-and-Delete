create database msdstest;

use msdstest;

CREATE TABLE datasheets (
	ID INTEGER NOT NULL AUTO_INCREMENT,
	Description VARCHAR(100),Location VARCHAR(100),
	PRIMARY KEY(ID)
);

LOAD DATA LOCAL INFILE 'D:/TestMSDS/msds.csv' 
INTO TABLE datasheets 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
;