-- ---------------------------------
-- SCRIPT 2
USE assign2db;

-- ---------
-- Part 1 SQL Updates
SELECT * FROM hospital;

UPDATE hospital SET headdoc="GD56", headdocstartdate="2010-12-19" WHERE hoscode="BBC";
UPDATE hospital SET headdoc="SE66", headdocstartdate="2004-05-30" WHERE hoscode="ABC";
UPDATE hospital SET headdoc="YT67", headdocstartdate="2001-06-01" WHERE hoscode="DDE";

SELECT * FROM hospital;

-- ---------
-- Part 2 SQL Inserts
INSERT INTO doctor VALUES ('RT33', 'Cassandra', 'Smith', '2012-03-22', '1986-12-08', 'ABC', 'Endocrinologist');

INSERT INTO patient VALUES ('221309412', 'Tom', 'Holland', '1996-06-01');

INSERT INTO looksafter VALUES ('RT33', '221309412');

INSERT INTO hospital VALUES ('STM', 'St. Michael', 'Toronto', 'ON', 1200, 'RT33', '2022-10-04');

SELECT * FROM doctor;
SELECT * FROM patient;
SELECT * FROM looksafter;
SELECT * FROM hospital;

-- ---------
-- Part 3 SQL Queries
-- Query 1
SELECT lastname FROM patient;

-- Query 2
SELECT DISTINCT lastname FROM patient;

-- Query 3
SELECT * FROM doctor ORDER BY lastname;

-- Query 4
SELECT hosname, hoscode FROM hospital WHERE numofbed>1500;

-- Query 5
SELECT firstname, lastname FROM doctor, hospital WHERE doctor.hosworksat=hospital.hoscode AND hospital.hosname="St. Joseph";

-- Query 6
SELECT firstname, lastname FROM patient WHERE lastname LIKE "G%";

-- Query 7
SELECT patient.firstname, patient.lastname FROM patient, doctor, looksafter WHERE (patient.ohipnum=looksafter.ohipnum AND looksafter.licensenum=doctor.licensenum AND doctor.lastname="Webster");

-- Query 8
SELECT hosname, city, lastname FROM hospital, doctor WHERE hospital.headdoc=doctor.licensenum;

-- Query 9
SELECT SUM(numofbed) FROM hospital;

-- Query 10
SELECT patient.firstname AS patient_firstname, patient.lastname AS patient_lastname, doctor.firstname AS doctor_firstname, doctor.lastname AS doctor_lastname
    FROM patient, doctor, looksafter, hospital
    WHERE patient.ohipnum=looksafter.ohipnum 
        AND looksafter.licensenum=hospital.headdoc
        AND hospital.headdoc=doctor.licensenum;

-- Query 11
SELECT lastname, firstname, prov 
    FROM doctor, hospital 
    WHERE hospital.hoscode=doctor.hosworksat 
        AND hospital.hosname="Victoria" 
        AND doctor.speciality="surgeon";

-- Query 12
SELECT firstname FROM doctor WHERE doctor.licensenum NOT IN (SELECT licensenum FROM looksafter);

-- Query 13
SELECT lastname, firstname, COUNT(looksafter.ohipnum) AS "Number of Patients", hosname 
    FROM doctor, hospital, looksafter
    WHERE doctor.licensenum=looksafter.licensenum AND doctor.hosworksat=hospital.hoscode
    GROUP BY looksafter.licensenum 
    HAVING COUNT(looksafter.ohipnum) > 1;

-- Query 14
CREATE VIEW doctemp AS SELECT licensenum, hoscode, hosname FROM doctor, hospital WHERE doctor.hosworksat=hospital.hoscode;

SELECT firstname AS "Doctor First Name", lastname AS "Doctor Last Name", hospital.hosname AS "Head of Hospital Name", doctemp.hosname AS "Works at Hospital Name"
    FROM doctor, hospital, doctemp
    WHERE hospital.headdoc=doctor.licensenum AND doctor.hosworksat<>hospital.hoscode AND doctemp.licensenum=doctor.licensenum;

-- Query 15 - My Query: Display the OHIP number and first name of all patients being treated by Dr.Shabado. Also show the name of the hospital in which they are being treated.
SELECT patient.ohipnum, patient.firstname, hosname 
    FROM patient, doctor, looksafter, hospital
    WHERE patient.ohipnum=looksafter.ohipnum
          AND looksafter.licensenum=doctor.licensenum
          AND doctor.lastname="Shabado"
          AND doctor.hosworksat=hospital.hoscode;

-- ---------
-- Part 4 SQL View/Deletes
CREATE VIEW looksafter_namesandbirthdays AS
    SELECT doctor.firstname AS dfirst, doctor.lastname AS dlast, doctor.birthdate AS dbirth, patient.firstname AS pfirst, patient.lastname AS plast, patient.birthdate AS pbirth
        FROM doctor, patient, looksafter
        WHERE patient.ohipnum=looksafter.ohipnum AND doctor.licensenum=looksafter.licensenum;

SELECT * FROM looksafter_namesandbirthdays;

SELECT dlast, dbirth, plast, pbirth FROM looksafter_namesandbirthdays WHERE dbirth>pbirth;

SELECT * FROM patient;

SELECT * FROM looksafter;

DELETE FROM patient WHERE patient.firstname="Tom" AND patient.lastname="Holland";

SELECT * FROM patient;

SELECT * FROM looksafter;

SELECT * FROM doctor;

DELETE FROM doctor WHERE doctor.firstname="Bernie";

SELECT * FROM doctor;

DELETE FROM doctor WHERE doctor.firstname="Cassandra" AND doctor.lastname="Smith";
-- This doctor's license number is used as a foreign key in a different table (hospital), thus it cannot be deleted.
