# `Pokédex for MVC Lovers`

## Description de l'application

Cette application est un Pokédex interactif développé à des fins éducatives. Elle permet aux utilisateurs de consulter une liste de Pokémon, de voir les détails de chaque Pokémon, y compris leurs types et statistiques, et de filtrer les Pokémon par type.

- PHP
- MySQL
- HTML & CSS
- Composer
- AltoRouter
- Bootstrap

Aperçu dans le dossier résultat :

- Une [page d'accueil](resultat/home.png) qui liste tous les pokémon de la base
- Une [page détail d'un pokémon](resultat/detail.png) qui affiche son type et ses stats
- Une [page qui liste les types](resultat/types.png) de la base quand on clique sur l'un on arrive sur la page suivante
- Une [page qui liste les pokémon filtrés par le type](resultat/electrik.png) cliqué sur la page précédente (electrik.png)

## `Pour installer cette app, suivez les étapes suivantes :`

1. Assurez-vous d'avoir PHP, MySQL, Composer et un serveur web (comme Apache) installés sur votre machine.
2. Clonez ce dépôt dans le répertoire de votre choix.
3. Importez la base de données fournie dans le fichier `database.sql` dans votre serveur MySQL.
4. Ouvrez le fichier `config.ini` et configurez les paramètres de connexion à votre base de données.
5. Exécutez la commande `composer install` pour installer les dépendances.
6. Démarrez votre serveur web et accédez à l'application via votre navigateur.

## Mesures de Sécurité

1. **Validation des Entrées** : Toutes les entrées utilisateur sont validées pour éviter les injections SQL et les attaques XSS.
2. **Préparation des Requêtes SQL** : Utilisation de requêtes préparées pour interagir avec la base de données, ce qui empêche les injections SQL.
3. **Gestion des Erreurs** : Les erreurs sont gérées de manière sécurisée pour éviter la divulgation d'informations sensibles.
4. **Contrôles d'Accès** : Mise en place de contrôles d'accès pour restreindre l'accès aux fonctionnalités sensibles.

## En-têtes de Sécurité

1. **Content Security Policy (CSP)** : Utilisation d'une politique de sécurité du contenu pour empêcher les attaques XSS.
2. **Strict-Transport-Security (HSTS)** : Forcer l'utilisation de HTTPS pour toutes les communications.
3. **X-Content-Type-Options** : Empêcher le navigateur d'interpréter les fichiers comme un autre type MIME.
4. **X-Frame-Options** : Empêcher le site d'être chargé dans un iframe pour éviter les attaques de clickjacking.
5. **X-XSS-Protection** : Activer la protection XSS du navigateur.

## Défis et Solutions Apportées

1. **Gestion des Routes** : La gestion des routes a été simplifiée en utilisant AltoRouter, ce qui a permis une navigation fluide et une maintenance facile.
2. **Affichage Dynamique des Données** : Utilisation de PHP pour générer dynamiquement les pages en fonction des données de la base de données.
3. **Sécurité des Données** : Mise en place de requêtes préparées et de validations d'entrée pour sécuriser les interactions avec la base de données.
4. **Design Responsive** : Intégration de Bootstrap pour assurer que l'application soit responsive et utilisable sur différents appareils.

## Résultat Obtenu

L'application finale permet aux utilisateurs de :

- Consulter une liste complète de Pokémon.
- Voir les détails de chaque Pokémon, y compris leurs types et statistiques.
- Filtrer les Pokémon par type.
- Naviguer facilement grâce à une interface utilisateur intuitive et responsive.

Les mesures de sécurité mises en place assurent que l'application est robuste contre les attaques courantes, offrant ainsi une expérience utilisateur sécurisée et fiable.

Enjoy!
