# TEST SHOPINVEST
URL de test en ligne: http://test-shopinvest.shuo.fr/product/1

## Liste des technos
- PHP 7.3.5
- Laravel 8
- MySQL 5.7.26
- Boostrap / jQuery / Ajax


## Installation

1. Clone du répertoire
   ```sh
   git clone https://github.com/kmvwsve/Test-shopinvest.git
   ```
2. Installer des packages
   ```sh
   composer install
   ```
3. Entrer le fichier `.env`, et modifer les paramètres de la connection de la base de données.
4. Modifer le 'RewriteBase' dans le fichier `public/.htaccess`.
5. Utiliser le fichier  `projectapp.sql` pour créer la base de données de test.
## Démarrage
1. Page produit: (ex: product_id = 1)
    - Local: http://localhost/xxx/product/1
    - Test en ligne: http://test-shopinvest.shuo.fr/product/1
2. Page admin:
    - Local: http://localhost/xxx/admin
    - Test en ligne: http://test-shopinvest.shuo.fr/admin
3. Identifiant et mot de passe pour la page Admin
	- Id : ```shopinvest```
	- Mdp : ```A16185464```
## Structure des fichiers
    ├── app                    
    │   ├── Http             
    │   │   ├── Controllers              
    │   │   │   ├── admin              
    │   │   │   │   ├── category              
    │   │   │   │   │   └── ProductController.php     # liste des produits, CRUD
    │   │   │   │   └── common              
    │   │   │   │       ├── ConnectController.php     # Authentification 
    │   │   │   │       ├── HeaderController.php      # page admin header
    │   │   │   │       └── FooterController.php      # page admin footer
    │   │   │   ├── catalog              
    │   │   │   │   ├── category              
    │   │   │   │   │   └── ProductController.php     # récupérer un produit par ID, actions Ajouter/Supprimer au panier
    │   │   │   │   └── common     
    │   │   │   │       ├── CartController.php        # Action de session du panier
    │   │   │   │       ├── HeaderController.php      # page front header
    │   │   │   │       └── FooterController.php      # page front footer
    |   |   |   |    
    |   |   |   └── ...
    |   |   └── ...
    │   ├── Model              
    │   │   ├── Product.php    # Opérations CRUD de la base de donnée 
    |   |   └── ...
    ├── config             
    │   ├── constants.php      # Définition constante
    |   └── ...
    ├── resources
    │   ├── views              
    │   │   ├── 404.blade.php
    │   │   ├── admin.blade.php
    │   │   ├── cart.blade.php
    │   │   ├── footer.blade.php
    │   │   ├── header.blade.php
    │   │   ├── header_admin.blade.php
    │   │   ├── login.blade.php
    │   │   ├── product.blade.php
    │   │   ├── product_edit.blade.php
    │   │   └── ...
    |   └── ...
    └── ...
## Test unitaire
Test ajouter un produit au panier.
   ```sh
   ./vendor/bin/phpunit
   ```
## TO DO...
1. Page d'accueil.
1. Utiliser le Module 'Auth' et améliorer l'authentification.
2. Module du traitement d'image.
