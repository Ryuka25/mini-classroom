# Model View Controller

## C'est quoi MVC ?

C'est un Design Pattern

## Avantages du MVC

- Modularité
- Facilité de maintenance

## Overview

***Il n'y a que des class dans le controlleur et modèle***

### Controlleur

**Tous ce qui est traitements**
**Agis comme étant le chef d'orchestre**

1. Obtient la demande de l'utilisateur
2. Envoie la demande vers le Modèles

### Modèle (Contient les différentes requêtes)

**Tous ce qui est en relation avec le BDD**

1. Réçois la demande venant du Controlleur
2. Se connècte avec la base de données pour le traitements de l'opérations
3. Renvoie les résultas vers le controlleur

## Controlleurs

1. Réçois les résultas venant du Modèle
2. Envoie les résultas vers la vue et demande à célui ci de l'afficher

## Vues

**Tous ce qui est en relation avec l'affichage**

1. Réçois les résultas venant du Controlleurs
2. Affiche le résultats

## Controlleur (index.php)

## Modèles

## Vues
