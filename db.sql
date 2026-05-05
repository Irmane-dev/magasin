CREATE DATABASE magasin;
USE magasin;

CREATE TABLE client (
    idclient INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    age INT,
    adresse VARCHAR(100),
    ville VARCHAR(50),
    mail VARCHAR(100)
);

CREATE TABLE article (
    id_article VARCHAR(20) NOT NULL PRIMARY KEY,
    design VARCHAR(100),
    prix DECIMAL(10,2),
    categorie VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE commande (
    id_comm INT PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    id_client INT,
    montant DECIMAL(10,2),
    FOREIGN KEY (id_client) REFERENCES client(idclient)
);

CREATE TABLE contenir (
    id_comm INT,
    id_article VARCHAR(20),
    qte_comm INT,
    PRIMARY KEY (id_comm, id_article),
    FOREIGN KEY (id_comm) REFERENCES commande(id_comm),
    FOREIGN KEY (id_article) REFERENCES article(id_article)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    contact VARCHAR(20),
    login VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);