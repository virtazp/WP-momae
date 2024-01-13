# Documentation mytheme

![intro](https://github.com/virtazp/wordpress/blob/master/mytheme/screenshot.jpg)

## Description

Template de base avec Custom Post Type intégré.
Il permet de partir d'un thème vide et entièrement personnalisable.
Pour une meilleure utilisation, n'hésitez pas à bien regarder la disposition des fichiers. Ils constituent la base en matière d'organisation.

## Compétences à maitriser

Il est nécessaire de connaître le HTML, CSS, JavaScript et quelques bases de PHP, pour l'utilisation et la compréhension de ce thème.

* [HTML et CSS](https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3)
* [JavaScript](https://openclassrooms.com/fr/courses/2984401-apprenez-a-coder-avec-javascript)
* [PHP](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql)

## Hiérarchie

![template](https://github.com/virtazp/wordpress/blob/master/mytheme/assets/img/wp-content.png)

## Exemple de code

Consultez le fichier inc/modules/exemple-code.php :

* Enregistrement de la sidebar
* Longueur d'extrait pour les articles CPT (utilisation avec ACF)
* Redirection page 404
* load more button sur CPT
* Requête SQL WP
* Requête SQL Curl 1
* Requête SQL Curl 2
* Requête API
* Déconnexion

## Fonctionnement

Téléchargez et copiez le thème dans wp-content/themes

Ce thème se compose d'un :

* fichier **functions.php**, qui sert à lié les fichiers JavaScript, CSS, Custom Post Type, etc. Et sert à établir des conditions diverses à appliquer à l'ensemble du site.
* fichier **page.php**, qui sert  de modèle pour l'ensemble des pages sans template attribué dans le back-office
* fichier **index.php**, qui sert de modèle pour la page qui regroupera les articles de base
* fichier **template-pageExemple.php**, qui sert de modèle pour les pages
* fichier **offredemploiCPT.php**, Custom Post Type
* fichier **archive-offredemploi.php**, qui sert de modèle pour la page qui regroupera les articles issu du Custom Post Type
* fichier **single-offredemploi.php**, qui sert de modèle pour les articles issu du Custom Post Type
* dossier **assets**, dans lequel se trouve des fichiers JavaScript et CSS. Ce fichier a pour but de mieux organiser le code en séparant les fichiers. Le lien entre ces fichiers et le thème, se fait dans le fichier functions.php
* dossier **inc**, dans lequel se trouve des exemples de code à copier dans functions.php ou à copier dans un autre fichier en faisant un require_once() dans le fichier functions.php. Le faite de faire un require_once() permet une meilleure organisation au niveau du code.

Pour créér un nouveau template, ou un nouveau Custom Post Type, dupliquez le contenu et renommer le.

## Liens utiles

* [Codex Custom Post Type](https://codex.wordpress.org/Post_Types)

## Avantage de ce thème

Il est très rare que les thèmes préconstruits, correspondent aux attentent des clients finaux. Ce thème permet de pallier à ce problème en partant d'une page blanche.

## Fonctionnement des Custom Post Type

Les custom post types (ou types de contenus personnalisés) permettent de créer du contenu différent (et différencié) de ceux fournis par défaut par WordPress, à savoir les articles ou les pages.

L'exemple fournit est suffisamment complet pour créer un Custom Post Type. Le plus important est la déclaration :

register_post_type(**string $post_type**, array||string $args = array()) à la ligne 56 du fichier offredemploiCPT.php.

En effet, cette déclaration permet d'enregistrer le "slug" (**string $post_type**) : Le slug est l’identifiant texte d’un contenu, il doit être écrit en minuscule et ne pas excéder 20 caractères. Les seules caractères spéciaux autorisés sont le tiret et l'underscore.
Par la suite, ce slug est utile pour construire les templates d'archives et singles.

Le nom du template **archive** lié au Custom Post Type est sous la forme archive-"slug".php, donc template-offredemploi.php pour notre exemple.

Le nom du template **single** lié au Custom Post Type est sous la forme single-"slug".php, donc single-offredemploi.php pour notre exemple.

Le fonctionnement interne de Wordpress, ira chercher automatiquement les templates correspondants. Aucune autre déclaration de lien est nécessaire.

## Réalisation

1. Téléchargez le zip de la dernière version de wordpress à cette adresse [https://fr.wordpress.org/download/](https://fr.wordpress.org/download/)
2. Pour un développement en local et une utilisation de wamp server 64 : extraire le zip dans le dossier C:\wamp64\www\
3. Créer la base de donnée avec phpMyAdmin, utilisateur : root, Mot de passe : Laissez vide
4. Allez à l'adresse [http://localhost/](http://localhost/) en ayant pris soin de lancez d'abord Wamp, et cliquez sur le dossier dans lequel se situe wordpress.
5. Suivre les instructions à l'écran : Il est important de bien choisir le préfixe des tables (autre que wp_), pour prévenir des attaques sur la base de donnée
6. Copié, coller le thème "myTheme" dans le fichier wp-content/themes/
7. Activez le thème dans le back-office de votre site en local, dans Apparence -> Thèmes
8. Personnalisez votre site à votre convenance
9. Pour déployer votre site en ligne sur un serveur, faite une sauvegarde de la base de donnée
10. Connectez vous au serveur distant via SFTP et copiez l'intégralité des fichiers sur le serveur
11. Créez une base de donnée sur votre serveur distant et importez la sauvegarde que vous avez faite précédemment
12. Modifiez les informations de connexion de la base de donnée qui se situent à la racine du dossier dans le fichier wp-config.php  
![Reglage-BDD](https://github.com/virtazp/wordpress/blob/master/mytheme/assets/img/Reglages-BDD.PNG)
13. Et voilà, votre site est en ligne et opérationnel !

## Plugins utiles

[ACF](https://www.advancedcustomfields.com/) : Permet la création de champs personnalisés pour les articles, pages, ou Custom Post Type

[Ninja-Forms](https://ninjaforms.com/) : Formulaire de contact personnalisable

[Customerarea](https://wp-customerarea.com/fr/) : Gestion de contenu privé ou public  pour les utilisateurs

[Backwpup](https://backwpup.com/) : Extension de sauvegarde pour WordPress

[Members](https://fr.wordpress.org/plugins/members/) : Il vous permet de contrôler les autorisations sur votre site en fournissant une interface utilisateur pour le système de rôle et de casquette puissant de WordPress, qui est généralement uniquement disponible pour les développeurs qui savent le coder à la main.