
use payments_app;

CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE userscontacts(
    iduser int,
    idcontacto int,
    Foreign Key (iduser) REFERENCES users(id)
);
