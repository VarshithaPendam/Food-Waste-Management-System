CREATE DATABASE IF NOT EXISTS reg; // creation of the database

USE reg;  // using the database

CREATE TABLE registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mobile VARCHAR(10) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    rolee ENUM('Donor', 'User') NOT NULL
); //creation of the reagistration table

INSERT INTO registration (firstname, lastname, email, mobile, gender, rolee)
VALUES ('John', 'Doe', 'john.doe@example.com', '1234567890', 'male', 'User');// inserting the values into registration table

CREATE TABLE login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    rolee ENUM('Donor', 'User') NOT NULL,
    UNIQUE(email)
);                // creation of login table

INSERT INTO login (email, passwd, rolee) VALUES ('testuser@example.com', 'password123', 'User');
//inserting the values into the login table


CREATE TABLE IF NOT EXISTS donor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    tof VARCHAR(100) NOT NULL,
    qof VARCHAR(50) NOT NULL,
    addr TEXT NOT NULL
);

INSERT INTO donor (name, contact, tof, qof, addr)
VALUES ('John Doe', '1234567890', 'Rice', '10kg', '123 Main St, City, Country');
