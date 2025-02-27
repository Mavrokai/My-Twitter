Détails des fichiers et répertoires

/app/controllers :

AuthController.php : Gère l'authentification des utilisateurs, notamment la connexion et l'inscription.
TweetController.php : Gère la création, la suppression, et l'affichage des tweets.
ProfileController.php : Gère les informations liées au profil d'un utilisateur, comme la consultation et la modification.
HomeController.php : Affiche le fil d'actualités, c'est-à-dire les tweets des utilisateurs suivis.

/app/models :

User.php : Modèle représentant un utilisateur. Contient la logique pour la gestion des utilisateurs, comme l'inscription, la connexion et la mise à jour du profil.
Tweet.php : Modèle représentant un tweet. Gère la création, la récupération et la suppression des tweets.
Follow.php : Modèle pour gérer les abonnements entre utilisateurs (qui suit qui).
Like.php : Modèle pour gérer les likes des tweets.

/app/views :

/auth : Contient les vues pour la connexion et l'inscription des utilisateurs (login.php, register.php).
/tweet : Contient les vues liées aux tweets (create.php pour créer un tweet, index.php pour afficher le fil d'actualités).
/profile : Contient les vues pour consulter et éditer un profil utilisateur (view.php, edit.php).
/home : Contient la vue principale du fil d'actualités des utilisateurs (index.php).
layout.php : Le fichier de layout commun à toutes les pages, où le contenu spécifique des pages sera injecté.

/public :

index.php : Point d'entrée de l'application. Il initialise et traite la demande, en appelant le contrôleur et en affichant la vue correspondante.
.htaccess : Configuration des règles de réécriture d'URL pour avoir des URL propres (par exemple, www.monsite.com/tweet/create au lieu de www.monsite.com/index.php?tweet=create).

/tests :

Contient les tests unitaires pour les modèles, contrôleurs et vues. Par exemple, TweetControllerTest.php pourrait tester les actions de création et de suppression des tweets.

/logs :

Contient les fichiers journaux pour déboguer et suivre les erreurs et activités de l'application.

Techno utilisées :

-PHP
-MySQL
-JavaScript
-TailWind