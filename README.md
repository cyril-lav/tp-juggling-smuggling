# TP Type Juggling et Request Smuggling

Cours : https://docs.google.com/presentation/d/1Rf6hiFF8TDIbSktfcJp5nZhATwnWjdkWALmSTOvMsDA/edit?usp=sharing

## Préparation request-smuggling
Afin de gagner du temps, commençons par démarrer le docker.  
Dans le répertoire **request-smuggling** lancer la commande suivante : ``docker-compose up``   
Pendant que tout s'installe, un petit peu de type juggling ...


## 1 - Type Juggling

1 - Aller dans le dossier type-juggling

2 - Lancer la commande ``php -S localhost:8888``

3 - A partir d'ici vous avez accès à un formulaire en lançant ``localhost:8888`` sur votre navigateur.
Vous pouvez vous connecter avec le mot de passe marqué en clair dans le code, néanmoins le but de l'exercice est d'utiliser le type juggling pour se connecter au compte. **admin**.

*Conseil : Vous pouvez utiliser Postman pour envoyer la requête de connexion.*

Comme rendu, nous attendons la requête utilisé.


4 - Maintenant que vous avez exploité le type juggling, modifier le fichier **index.php** pour empêcher l'exploitation de la faille. 
Montrez nous les modifications effectués.


## 2 - Request Smuggling

Installer ncat : 
`` apt update && apt install ncat``

Le serveur (déjà lancé au début du tp) est accessible à l'adresse : ``localhost:8002``.  
L'objectif final est d'accéder au contenu de ``localhost:8002/flag``
 qui doit être : 'THIS_IS_FLAG'

L'unique adresse accessible normalement est : ``localhost:8002/hello``

1 - Retournez le résultat avec **curl** par exemple.

2 - Essayons maintenant avec *netcat* :  
    `` printf 'GET /hello HTTP/1.1\r\nHost: 0.0.0.0:8002\r\n' | nc 127.0.0.1 8002 ``
    Essayez la même requête pour voir le contenu de /flag.

3 - En passant la requête du /flag en contrebande, on peut accéder au contenu normalement bloqué. Modifiez le fichier *requete-flag.txt* et complétez les 2 champs *###COMPLETER ICI ###*  
*Note : Le Content-Length défini la taille en octets du body et prend en compte 2 octets pour le \r\n.*


 En cas de problème avec le fichier : 
 ``` printf 'GET /hello HTTP/1.1\r\nHost: 0.0.0.0:8002\r\nContent-Length: ### COMPLETER ICI ###\r\nTransfer-Encoding: asdchunked\r\n\r\n### COMPLETER ICI ###\r\n\r\n0\r\n\r\nGET /hello HTTP/1.1\r\nHost: 0.0.0.0:8002\r\n' | nc 127.0.0.1 8002 ```
