# Projet6
Projet 6 Openclassrooms - SnowTricks

- Configurer les identifiants de la base de données dans le fichier .env
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"

- Charger les librairies à l'aide de composer avec la commande :
    composer install

- Charger les fixtures avec la commande :
    php bin console doctrine:fixtures:load