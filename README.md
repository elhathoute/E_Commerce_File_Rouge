<p align="center"><b>My Shoes</b></a></p>

## Présentation de Projet

Bienvenue sur Myshoes, votre destination en ligne pour trouver les chaussures parfaites pour tous les membres de votre famille. Nous proposons une large sélection de chaussures pour homme, femme et enfant, avec des options pour tous les styles et toutes les occasions. Que vous recherchiez des chaussures de sport, des bottes d'hiver ou des chaussures habillées, vous trouverez tout ce dont vous avez besoin sur Myshoes. Avec une expérience d'achat en ligne simple et sécurisée, nous offrons à nos clients une livraison rapide et gratuit et un service clientèle exceptionnel.

## Les technologies utilisées:

- HTML
- Blade
- CSS
- Javascript / JQUERY
- PHP,Laravel
- Mysql

## Conception UML : 
- Diagramme de Classes
- Diagramme de Cas d’Utilisation
- Diagramme de Séquence

## Planification : 
- Trello

## Maquettage : 
- Figma

## installation 

1. Clone the repository : 

```git clone https://github.com/elhathoute/E_Commerce_File_Rouge.git```



2. Install the project dependencies using Composer:

 ```
 
cd E_Commerce_File_Rouge
composer install

```


3. Copy the .env.example file to .env and update the database configuration:

```
create ficher .env and go to .env-exemple
cp .env.example .env



```


4. Generate the application key:


```

php artisan key:generate

---clear cache and config----
php artisan cache:clear
php artisan config:clear


```


5. Run the database migrations:

```

php artisan migrate


```



6. Run the database migrations:


```

php artisan db:seed


```


## Usage : 

To start the application, run the following command:


```

php artisan serve


```
