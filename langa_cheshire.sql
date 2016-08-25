CREATE DATABASE langa_cheshire;

USE langa_cheshire;

CREATE TABLE register (
firstname VARCHAR(30) NOT NULL,
lastname  VARCHAR(30) NOT NULL,
phonenumber VARCHAR(10) NOT NULL,
email VARCHAR(50) NOT NULL,
username VARCHAR(30) PRIMARY KEY NOT NULL,
password VARCHAR(40) NOT NULL   
);

CREATE TABLE contact (
name VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
message VARCHAR(255) NOT NULL  
);
