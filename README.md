# Test technique Teach'r

Ce projet combine un back-end développé avec Symfony et un front-end développé avec React. Suivez les instructions ci-dessous pour configurer et exécuter l'application.

## ⚠️ Prérequis

- **PHP** : Assurez-vous d'avoir une version de PHP **supérieure à 8.2**.
- **Composer** : Gestionnaire de dépendances pour PHP.
- **Symfony CLI** : Assurez-vous que la CLI Symfony est installée. [Télécharger Symfony CLI](https://symfony.com/download)
- **Node.js** : Assurez-vous d'avoir une version récente (compatible avec React).
- **npm** : Gestionnaire de paquets Node.js.

## 🔧 Installation


1. Ouvrez le fichier `back-end/.env.local`, dans la variable `DATABASE_URL`, remplacer `<password>` par :
   ```env
   AVNS_GIsAndmRFN9V9lhMXRy
   ```

2. Ouvrez un terminal à la racine du projet et exécuter les commandes suivantes : 
```env
 - cd back-end 
 - composer install
 - symfony server:start
 ```
 3. Ouvrez un nouveau terminal à la racine du projet et exécuter les commandes suivantes : 
 ```env
 - cd front-end 
 - npm install
 - npm run dev
 ```
 4. Lancer un navigateur web et aller à l'url suivant : 
  ```env
 - http://localhost:3000
 ```
 
 ## ❗ Notes importantes
- Si vous rencontrez une erreur lors du démarrage de la page web, rechargez la page. Cette erreur peut être causée par le cache de Symfony.
 - Assurez-vous que les serveurs back-end et front-end sont démarrés pour que l'application fonctionne correctement.
