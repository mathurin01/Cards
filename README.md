Cards ! Les statistiques de jeu avec Symfony 2.3
================================================

Bienvenue sur le site de statistique de jeu cartes développé avec Symfony2.
Cette application va permettre de gérer plus facilement les statistiques de jeu de [Coinche], couramment pratiqué en bord de Loire.

Ce document relate les différentes étapes de la création jusqu'à l'installation de l'application.

Installation
------------

```shell
git clone ...
cd Cards
composer install (ou php composer.phar install)
```

### Installation de la BDD

La création de la bdd s'effectue en ligne de commande :

```shell
php app/console doctrine:database:create
```

[Optionel] On peut vérifier le schéma qui va être crée dans la bbd (et qui se base sur le model décrit dans l'application) :

```shell
php app/console doctrine:schema:update --dump-sql
```

Puis effectuer les requètes pour créer le schéma directement dans la bdd :

```shell
php app/console doctrine:schema:update --force
```

Enfin cette commande remplira la bdd avec des données basiques et utiles :

```shell
php app/console doctrine:fixtures:load
```

### Création des dossiers cache et logs

[Regarder les changements de droits sur les caches et logs sur la documentation officielle (plusieurs méthodes effectives)](https://symfony.com/doc/current/book/installation.html)

### Configuration du Virtual Host

```shell
sudo vim /etc/hosts
127.0.0.1   cards
```

```shell
cd /etc/apache2/sites-available/
sudo vim cards.conf (or whatever_name.conf)

<VirtualHost *:80>
    ServerName cards
    ServerAlias cards.loc

    DocumentRoot /home/{YOUR_USER}/workspace/Cards/web/

    <Directory /home/{YOUR_USER}/workspace/Cards/web/>
        Options Indexes FollowSymLinks MultiViews
        # enable the .htaccess rewrites
        AllowOverride All

        # apache 2.4 permissions
        Require all granted

        # rewrite options
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        # prod environment
        #RewriteRule ^(.*)$ app.php [QSA,L]
        # dev environment
        RewriteRule ^(.*)$ app_dev.php [QSA,L]
    </Directory>

    CustomLog ${APACHE_LOG_DIR}/cards.access.log combined
    ErrorLog ${APACHE_LOG_DIR}/cards.error.log

    # Possible values include: debug, info, notice, warn, error, crit, alert, emerg
    LogLevel warn
</VirtualHost>

sudo a2ensite cards.conf (or whatever_name.conf)
sudo service apache2 restart
```

Dans un navigateur => [http://cards/](C'est parti !)

En cas d'erreur, page blanche, etc. => Regarder les logs d'erreurs dans :

```
/var/log/apache2/cards.error.log
```


La coinche
----------

WIP !
