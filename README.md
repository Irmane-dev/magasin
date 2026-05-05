# Plateforme ENEAM - Magasin

**Auteur :** WABI Irmane  
**Filière :** Informatique de Gestion - IG2A 
**École :** ENEAM

---

## Aperçu
![Connexion](./img/10.png)
![Inscription](./img/11.png)
![Accueil](./img/1.png)

Plateforme web de gestion d'un magasin développée en PHP et MySQL.

---

## Fonctionnalités

- Connexion et inscription des utilisateurs
- Gestion des articles, clients et ventes
- Affichage des listes avec tableaux
- Effectuer une vente (commande + contenir)

---

## Structure du projet

```
magasin/
├── img/
├── index.php
├── register.php
├── accueil.php
├── listearticle.php
├── listeclient.php
├── listeusers.php
├── listevente.php
├── formulaire.php
├── ajoutclient.php
├── vente.php
├── logout.php
├── exemple15.2.php
├── exemple15.4.php
├── myparam.inc.php
└── style.css
```

---

## Base de données

**Nom :** `magasin`  
**Tables :** `client`, `article`, `commande`, `contenir`, `users`

![Liste des Utilisateurs](./img/2.png)
![Liste des articles](./img/3.png)
![Liste des clients](./img/4.png)
![Listze des ventes](./img/5.png)
![effectuer une vente](./img/6.png)
![Enregistrement d'un article](./img/7.png)
![Ajouter un client](./img/8.png)
![Effectuer une vente](./img/9.png)
---

## Installation

1. Copier le dossier dans `C:\xampp\htdocs\`
2. Créer la base `magasin` dans phpMyAdmin
3. Importer le fichier SQL
4. Lancer : `http://localhost/magasin/`

---

## Technologies

- PHP 8
- MySQL / phpMyAdmin
- HTML / CSS
- XAMPP
