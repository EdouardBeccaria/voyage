<h1 align="center">
Projet Agence de voyage
</h1>

## Pré-requis

* Docker Desktop

Le projet a été developpé sur MacOS.

Le stack technique utilisé sur Docker est :
* PHP 7.4
* MySQL 8.0
* Laravel 8

## Les commandes à lancer

Récupérez le projet

> git clone https://github.com/EdouardBeccaria/voyage.git

Déplacez vous dedans

> cd voyage  

Récupérez les variables d'environnement

> cp .env.example .env  

Installez les packages 

> composer install  

Lancez Sail pour mettre en place le Docker et l'interface de commande

> ./vendor/bin/sail up -d

Créez la base de données

>./vendor/bin/sail artisan migrate

Mettez à jour le style

> npm install && npm run dev  

Et le tour est joué !

Le projet est accessible via localhost ou http://voyage.test

## Peuplement de la base de données

Un seeder a été créé pour remplir la base de données avec les informations fournies dans l'énoncé.  
Pour remplir la base de donnée avec ces données :
> ./vendor/bin/sail artisan db:seed  

## Tests unitaires

Pour lancer les tests unitaires, il suffit de rentrer la commande

> ./vendor/bin/sail test
