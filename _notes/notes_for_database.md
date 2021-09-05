# Notes_pour_BD

## Modules

[ ]  Identifiant_Module  
[ ]  Libelle_Module  
[ ]  ...*categoriser* par Categories_Module  
[ ]  Photo_correspondant  

## Categories_Module

[ ]  Code_Categorie (INFO_xxx, ENTR_xxx, MATH_xxx, COMM_xxx)  
[ ]  Libelle_Categorie  
[ ]  ...*categoriser* Modules  
[ ]  Photo_correspondant

## Comptes

[x]  Identifiant_Compte
[ ]  Photo_correspondant  
[ ]  Etat-Civil_Compte  
    [ ]  Nom  
    [ ]  Prenom
[ ]  Types_comptes  
    Professeurs  
        [ ]  Module(s)_enseignés  
        [ ]  ...*enseigner* pendant Cours  
        [ ]  ...*créer* Posts *concernant* Modules
    Etudiants
        [ ]  ...*assister* à Cours  
        [ ]  ...*appartenir* à Discussions *suite* à posts
    Administrateurs
        [ ]  ...

## Cours

[ ]  Identifiant_Cours  
[ ]  Module_traité_pendant_Cours  
[ ]  ...*enseigner* par Professeurs  
[ ]  ...*assister* par Etudiants  

## Posts

[ ]  Identifiant_post  
[ ]  Source  
[ ]  ...*concerner* Modules  
[ ]  Destinataire  
[ ]  ...*associer* à Reponses_Post

## Reponses_Post

[ ]  Identifiant_Reponse_Post  
[ ]  ...*associer* à Post  

## Discussions

[ ]  Identifiant_discussion  
[ ]  Participants  
[ ]  Createur  
[ ]  ...*Ratacher* à Module  

## Messages

[ ]  Identifiant_message  
[ ]  ...*envoyer* par participants_discussions  
[ ]  Discussion_destinataire  
[ ]  ...*Vue* par participants_discussions  

## Recommendation

[ ]  Identifiant_recommendation  
[ ]  Objet_recommandation  
[ ]  Contenu_recommandation  
[ ]  ...*proposer* par Utilisateur  
