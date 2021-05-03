# ECF-Banque

Vous arriverez tout d'abord sur la page d'accueil ou vous pourrez vous connecter en tant qu'administrateur, vous inscrire ou vous connecter ( nécessite de s'etre inscrit au préalable)

<h1>1. Page d'accueil : ECF-Banque/Homepage/ </h1>
Ici vous retrouverez la description du site et les trois boutons permettant d'acceder aux pages de connexions et a la page d'inscription.

<h2>1.1 Utilisateur :/ECF-Banque/User_connexion/index.php </h2>
Ici vous retrouverez la page permettant aux utilisateurs de se connecter.

<h2>1.2 Administrateur : /ECF-Banque/Admin_connexion/index.php</h2>
<h3>Guide d'installation</h3>
5 administrateurs ont été définis au préalable dans la base de données située dans le dossier ECF-Banque/Ressources/ECF-Banque.db <br>
les emails predefinis pour chaque utilisateurs sont:
-dupont.jean@gmail.com
-dupont.jacques@gmail.com
-dupont.jeanne@gmail.com
-dupont.pierre@gmail.com
-dupont.paul@gmail.com
Le mot de passe prédéfini pour chaque utilisateur est 12345678.
Pensez a le modifier manuellement dans la base de données et a le securiser avec une fonction telle que password_hash

<h3>Validation des utilisateurs : /ECF-Banque/Admin_connected/index.php</h3>

Une fois connecté, vous pourrez voir tout les utilisateurs en attente de validation, consulter leur piece d'identité et valider l'utilisateur si il est conforme.

<h2>1.3 Inscription : /ECF-Banque/Inscription/index.php </h2>
Ici vous retrouverez la page permettant aux utilisateurs de s'inscrire 
Le nom du fichier ne doit pas contenir de caractères speciaux mais les tirets et underscore sont acceptés
