TodoList - Application de gestion des tâches
Description

TodoList est une application web développée en PHP permettant de gérer une liste de tâches. Elle offre une interface simple et intuitive pour ajouter, supprimer et modifier l'état des tâches.

Fonctionnalités
Ajouter une tâche : créer une nouvelle tâche à partir de son titre.
Afficher les tâches : consulter la liste des tâches enregistrées dans la base de données.
Marquer comme terminée : modifier l'état d'une tâche avec le bouton Done.
Annuler la validation : remettre une tâche terminée à l'état non terminé avec le bouton Undo.
Supprimer une tâche : retirer une tâche de la liste.
Technologies utilisées
PHP
MySQL
PDO pour la connexion à la base de données
HTML5
CSS3
Bootstrap
Git et GitLab / GitHub
Base de données

Le projet utilise une base de données MySQL contenant une table todo avec les informations des tâches.

Les principales colonnes utilisées sont :

id : identifiant de la tâche.
title : titre de la tâche.
done : état de la tâche (terminée ou non terminée).
created_at : date de création de la tâche.

Le fichier SQL du projet est todolist.sql.

Installation et exécution
Installer un environnement PHP et MySQL, comme XAMPP.
Copier le projet dans le dossier htdocs.
Créer une base de données MySQL.
Importer le fichier todolist.sql dans phpMyAdmin.
Configurer les paramètres de connexion à la base de données dans le fichier PHP correspondant.
Démarrer Apache et MySQL.
Ouvrir l'application dans le navigateur :

http://localhost/todolist/

Utilisation
Saisir le titre d'une tâche et cliquer sur Add.
Cliquer sur Done pour terminer une tâche.
Cliquer sur Undo pour annuler son état terminé.
Cliquer sur X pour supprimer une tâche.
Auteur

Projet réalisé dans le cadre de l'apprentissage du développement web.