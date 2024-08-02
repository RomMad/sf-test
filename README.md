# Test PHP/Symfony

*Durée : 1h30-2h*

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

## Instructions

L'application Symfony permet d'enregistrer et de modifier une liste de personnes.

Il vous est demandé de créer une **nouvelle fonctionnalité** permettant d'ajouter des **interventions** (une ou plusieurs) réalisées auprès des personnes.

Une intervention doit avoir les informations suivantes :

- Date d'intervention (au format "JJ/MM/AAAA")
- Nom de l'intervenant
- Type d'intervention
- Commentaire descriptif
- Date de création (générée automatiquement)

### Tâches à réaliser

1. **Créer une entité Intervention**

  * La « Date d'intervention » est obligatoire.
  * Le « Nom de l'intervenant » ne peut pas être vide (champ texte).
  * Le « Type d'intervention » doit être une liste déroulante (Aide alimentaire, Couverture, Lien social, Autre) et stocké en base de données en tant que valeur numérique (int).
  * Le « Commentaire » est de type texte.
  * La « Date de création » est générée automatiquement.

2. **Créer le CRUD pour les interventions**

  * Créer une intervention.
  * Voir une intervention.
  * Modifier une intervention.
  * Supprimer une intervention.
  * Ne pas utiliser de bundle tiers (type EasyAdmin) pour créer le contrôleur et les vues.

3. **Créer un repository personnalisé**
  
* Ajouter une méthode pour récupérer les 5 dernières interventions d'une personne triées de la plus récente à la plus ancienne (sans utiliser les méthodes génériques findAll, findBy, etc.).

4. **Créer un formulaire avec le composant Form**

* Utiliser une classe Enum pour la liste déroulante.
* Vérifier la validité des données avant l'enregistrement via le composant Form.

5. **Créer des vues Twig**

* Étendre le template de base.
* Ajouter des interventions via la page d'une personne.
* Afficher les interventions sur la page de la personne (*app_person_show*).
* Afficher toutes les interventions sur une nouvelle page sous forme de tableau :
  * Date d'intervention,
  * Nom et prénom de la personne,
  * Nom de l'intervenant,
  * Type d'intervention,
  * Commentaire,
  * Date de création.
* Ajouter un lien "Interventions" dans la bare de navigation.
* Afficher toutes les dates au format "dd/mm/yyyy".
* Utiliser les clés de traduction.
* Utiliser Bootstrap.
* L'affichage doit être responsive.

1. **Supprimer une intervention via AJAX**

   * La suppression d'une intervention via la page d'une personne doit se faire sans rafraîchir la page en utilisant Javascript.

### Consignes générales à respecter

- Enregistrer les informations en base de données.
- Respecter les bonnes pratiques PHP et Symfony.
- Écrire le code en anglais (variables, méthodes, classes…).
- Respecter la POO.
