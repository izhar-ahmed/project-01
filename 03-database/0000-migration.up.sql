CREATE TABLE users(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(256) NOT NULL,
    password VARCHAR(256) NOT NULL,
    resetPasswordCode VARCHAR(100),
    createdDate TIMESTAMP,
    updatedDate TIMESTAMP
);


CREATE TABLE peoples(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(256) NOT NULL,
    dateOfBirth TIMESTAMP,
    vehicle VARCHAR(100),
    favouriteSport VARCHAR(100),
    address VARCHAR(500),
    createdBy INT,
    createdDate TIMESTAMP,
    updatedDate TIMESTAMP
);