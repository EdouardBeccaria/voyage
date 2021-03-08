<h1 align="center">
Projet Agence de voyage
</h1>

## Pré-requis

* Docker


## Les commandes à lancer

Récupération du projet :

> git clone

Après avoir récupérer le projet :

>cd agence  
> 
> ./vendor/bin/sail up

Une fois sail lancer, il faut ouvrir un autre onglet du terminal de commande.

Pour mettre en place la base de donnée, il faut lancer la commande :

>./vendor/bin/sail artisan migrate

Suite à la migration, la base de données n'est pas peuplée.

Afin de pouvoir utiliser le docker sur le projet, un dossier laradock doit être créer.

