## Présentation de ce projet : Système de gestion d'absences

Partie serveur de notre projet contenant les informations des utilisateurs et traitement des absences.

## Rappels sur le système d'information utilisé

*   Une `Absence` est caractérisé par 

    -   Un motif
    -   Une etat de justification
    -   Un document
    -   Un id de `User` qui représente l'élève absent 
    -   Un id de `Creneau` qui représente le cour ou l'élève a été absent 

*   Un `User` est caractérisée par 

    -   Un nom
    -   Un prénom
    -   Un email
    -   Un avatar
    -   Une date de naissance
    -   Un grade
    -   Un rôle
    -   Un mot de passe 

*   Un `Module` est caractérisé par 

    -   Un nom
    -   Le nombre d'heures total de ce module
    
*   Un `Creneau` est caractérisé par

    -   Une date de début
    -   Une durée
    -   Une salle
    -   Un id de `Module` qui représente le cour 
    -   Un id de `Groupe` qui représente le groupe qui assiste au cour 
    -   Un id de `User` qui représente l'enseignant qui va donner le cours 

    
*   Un `Groupe` est caractérisé par

    -   Un nom
    -   Une promo
    
*   La table `in_group` est caractérisé par

    -   Un id de `User` qui représente l'élève 
    -   Un id de `Groupe` qui représente le groupe ou l'élève est assigné
