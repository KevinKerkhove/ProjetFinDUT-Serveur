<p align="center"><img src="http://www.iut-lens.univ-artois.fr/wp-content/themes/iutlens2016new2/images/screenshot.png" width="100"></p>


## Présentation de ce projet : GOKU PATH

Partie serveur de notre projet contenant les informations des utilisateurs.

## Rappels sur le système d'information utilisé

*   Un jeu est caractérisé par 

    -   Un nom
    -   Une catégorie
    -   Une description
    -   Un boolean pour savoir si il est fini

*   Une personne est caractérisée par 

    -   Un nom
    -   Un prénom
    -   Un age
    -   Un avatar
    -   un booléen qui indique si la personne est active ou non

*   Un suivi d'activité est caractérisé par 

    -   Le temps de jeu
    -   Le score

*   Un Rôle est caractérisé par 

    -   Le role de l'utilisateur (admin, joueur, auteur)

*   Un `User` est la classe proposée par `Laravel` pour mettre en oeuvre l'identification.

* Quelques explications sur les relations entre classes :

    -   Une jeu est utilisé par les personnes.
    -   Un suivi d'exécution est associé à un jeu et un jeu peut faire l'objet de plusieurs suivis d'exécution
    -   Une personne peut se connecté si un enregistrement dans la table user est associé avec la personne
    -   Un suivi d'exécution est créé par une personne
    
    
*   Nous avons créé trois personnes de base sur notre application : 

    -   Un Admin : 
    ``etiennedoutrelon@gmail.com``
    mot de passe : ``secret``
    -   Un Auteur : 
    ``Bernard_Dujardin@domain.fr``
    mot de passe : ``secret``
    -   Un Joueur : 
    ``robert.duchmol@domain.fr``
    mot de passe : ``secret``
