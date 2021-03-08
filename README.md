<h1 align="center">
Projet Agence de voyage
</h1>

## Pré-requis

* Docker Desktop

Le projet a été developpé sur MacOS

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

## Tests unitaires

Pour lancer les tests unitaires, il suffit de rentrer la commande

> ./vendor/bin/sail test
