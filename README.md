# Projet 5 Blog PHP

Projet 5 de la formation **PHP/Symfony** d'OpenClassrooms : Créez votre premier blog en PHP !

## Essayer le projet

Pour installer le projet sur votre machine, suivez ces étapes :

- Installez un environnement PHP / MySQL / Apache *(par exemple avec [MAMP](https://www.mamp.info/en/))*
- Installez [Composer](https://getcomposer.org/download/)
- Clonez le projet dans un répertoire et exécutez : composer install
- Créez la base de données via *public/UML/framework.sql*

  >Ce script créera une base de données "framework" avec un jeu de démo
  Les informations sur les accès utilisateurs sont disponibles au début de ce script

- Modifiez *config/global.php* avec :
    - Les constantes qui commence par MAIL pour utiliser la partie [PHPMailer](https://github.com/PHPMailer/PHPMailer) et [Mailtrap](https://mailtrap.io/)
    - Les constantes qui commence par DATABASE pour toute la partie PDO et connection à la base de données


### Tout est prêt !
Une fois Apache et MySQL lancés, le blog sera accessible (par défaut sur : http://localhost:8888)
