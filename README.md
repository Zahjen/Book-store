# Book-store

Groupe : AKNIOU Sabrina - Anne-Lise FLEISCH

## Description

Site Web permettant la consultation de description de livre, accompagné de leur mise en favoris, i.e. onglet Download.

Il existe deux type de connexion. Une connexion pour les utilisateurs, donnant lieu à un dashboard des derniers livres ajoutés, d'un onglet de recherche, d'un classement par catégorie et finalment un onglet profile permettant la modification de son propre compte. 

Il y a également une connexion résérvée au Admin, permettant la gestion des utilisateurs, i.e. suppression, la gestion de livre, ajout, suppression, modification et visualisation de l'ensemble des livres enregistrés.

Ainsi, une utilisateur ne peut que consulter les livres et leur description, alors que l'admin à le pouvoir de les gérer.

Notez également que nous sommes partis du principe qu'il n'existe qu'un seul admin. Il n'est pas possible de le supprimer directement via l'interface graphique (choix délibéré). Ainsi, pour supprimer / ajouter / modifier un admin, il faudra pour le moment passerpar la base de données.

## Gestion du CRUD

Nous avons fait le choix de répartir les différents CRUD selon que la connexion soit initiée par l'utilisateur ou l'admin. LA répartition se fait comme suit :

### Utilisateurs 

- Lire : Tableau Admin
- Insert : Tableau Connexion 
- Update : Tableau utilisateur 
- Delete : Tableau Admin

### Livres 

- Lire : Tableau Admin + Tableau Utilisateur
- Insert : Tableau Admin
- Update : Tableau Admin
- Delete : Tableau Admin

### Download 

- Lire : Tableau Utilisateur 
- Insert : Tableau Utilisateur
- Update : Pas de sens de modifier un téléchargement dans notre cas
- Delete : Tableau Utilisateur

## Choix 

- Pour votre information, nous avons préparé le fait de pouvoir gérer les couvertures de livres dans la base de données (cf attribut 'url'), que nous avons mis à NULL pour le moment et remplacé chaque image du site avec une image par défaut.
- Nous n'avons pas géré le fait qu'un utilisateur puisse télécharger plusieurs fois le même livres. Si c'est le cas, une SQL exception est levée.

## Comptes existants 

Le pseudo, suivit de l'adresse mail, et finalement du mot de passe associé :

- admin, admin@admin.com, Admin123*
- Fahim, fahim@fahim.com, Fahim123*
- Silene, silene@silene.com, Silene123*
- Siham, siham@siham.com, Siham123*
- Gabriel, gabi@gabi.com, Gabriel123*
- Clarisse, clarisse@clarisse.com, Clarisse123*
- Lucas, lucas@lucas.com, Lucas123*
- Sephir, sephir@sephir.com, Sephir123*
