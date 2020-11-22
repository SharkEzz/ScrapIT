# ScrapIT

## Cette application est en développement, les fonctionnalités sont ammenés à évoluer

<p>ScrapIT est une application web permettant de suivre les prix de vos articles favoris !</p>
<p>Exemple : un article sur Amazon vous plait et vous souhaitez être notifié d'une baisse de prix sur celui ci ; ajoutez simplement ce produit dans la liste des produits suivi de ScrapIT, une alerte par mail vous sera automatiquement envoyé si le prix de l'objet tombe sous le prix que vous avez renseigné !</p>
<p>L'avantage de ScrapIT est qu'il est extrèment simple d'ajouter le support pour de nouveaux sites, il suffit seulement d'ajouter l'ID du bloc contenant le prix sur le site souhaité !</p>

## Installation

 - Clôner ce dépot
 - Configurer le serveur SMTP pour l'envoi de mail dans le fichier ```.env```
 - Configurer une base de donées MySQL dans le fichier ```.env```
 - Lancer l'installation de la base avec la commande ```php artisan migrate```
 - Lancer l'installation des dépendances JS avec ```yarn install``` ou ```npm install```
 - Compiler les dépendances JS avec ```npm run prod``` ou ```yarn run prod```
 - Installer l'application dans un VirtualHost Apache en faisant pointer la racine sur le dossier ```public/```
 - Ajouter un scraper dans la partie **Scraper**, l'important étant de renseigner l'ID du bloc contenant le prix sur le site souhaité

## Todo

 - [ ] Amélioration du README
 - [ ] Correction des bugs
 - [ ] Ajout des fonctions éditer pour les scrapers et produits
 - [ ] Ajout de tests unitaire
 - [ ] Multiple comptes
 - [ ] Multiples comptes mail
