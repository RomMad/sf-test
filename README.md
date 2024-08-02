# Test PHP/Symfony

*Durée : 1h-2h*

L'application Symfony permet d'enregistrer et de modifier une liste de personnes.

Il vous est demandé de créer une nouvelle fonctionnalité permettant d'ajouter des interventions (1 ou plusieurs) réalisées auprès des personnes.

Ces interventions doivent contenir les informations suivantes :

- Date d'intervention
- Nom de l'intervenant
- Type d'intervention
- Commentaire descriptif
- Date de création (générée automatiquement)

* On doit pouvoir créer/voir/modifier/supprimer des interventions.
* L'ajout d'une interventions doit se faire à partir en allannt sur la page d'une personne.
* Plusieurs interventions peuvent être réalisées auprès d'une même personne.
* Toutes les interventions doivent être visibles sur une page sous la forme d'un tableau :
  - Date d'intervention
  - Nom et prénom de la personne
  - Type d'intervention
  - Nom de l'intervenant

## Git

Créer un dépôt git (sur Github ou Gitlab).

## Back-end (PHP - Symfony)

**A faire :**

- Créer une *Entity* représentant une intervention et utiliser les contraintes :
  - Le champ « Date d'intervention » est un champ date formaté (JJ/MM/AAAA)
  - Le champs « Nom de l'intervenant » ne peut pas être vide (champ texte)
  - Le champ « Type d'intervention » doit être une liste déroulante (Aide alimentaire, Couverture, Lien social, Autre), mais doit être stocké en base de données en tant que valeur numérique (int)
- Créer un *Repository* avec une méthode personnalisée pour récupérer les 5 dernières interventions triées de la plus récente à plus ancienne (**sans** utiliser aux méthodes génériques *findAll*, *findBy*, etc.)
- Créer un *Controller* avec, à minima, les routes pour :
  - Créer une intervention
  - Voir toutes les interventions réalisées auprès d'une personne
  - Supprimer une intervention
- Créer un formulaire avec le composant *Form* de Symfony
- Créer des vues *Twig* qui étendent le template

**Consignes à respecter :**

- Enregistrer les informations en base de données
- Vérifier la validité des données avant l'enregistrement en base de données via le composant *Form*
- Ne PAS utiliser de bundle tiers (type EasyAdmin) pour créer le controller et les vues
- Respecter, autant que faire se peut, les bonnes pratiques PHP et Symfony
- Ecrire le code en anglais (variables, méthodes, classes…)
- Utiliser les clés de traduction
- Utiliser une classe Enum pour la liste déroulante
- Vous pouvez utiliser

## Front-end (Twig - Javacript)

- La page doit être responsive
- Ajouter un lien dans la navbar
- Toutes les dates doivent s'afficher au format "dd/mm/yyyy"

**En JavaScript :**

- Pouvoir supprimer une interventions en base de données via une requête Ajax
- Respecter la POO

Vous devez utiliser Twig et Bootstrap.


## Requirements

- PHP >=8.2
- MySQL/MariaDB
- Symfony CLI (<https://symfony.com/download/>)

## Installation

```bash
git clone https://github.com/RomMad/sf-test.git sf-test
cd sf-test/
composer install
symfony console doctrine:database:create
symfony console doctrine:fixtures:load
symfony serve -d
```
