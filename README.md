# Portfolio Professionnel — AKODO Aimé D. Yves

Application web portfolio de standard international pour **AKODO Aimé D. Yves**, vidéaste, monteur vidéo et créateur de contenu audiovisuel basé à Cotonou (Bénin).

Conçue avec **Laravel 12**, **Blade**, **Tailwind CSS v3** (palette Cinéma sombre `#0E0E0E` / or `#D4A847`), **Alpine.js v3**, et un panneau d'administration moderne **Filament v3** optimisé mobile (PWA).

---

## 🚀 Déploiement en production sur Render (Mode Gratuit)

Ce projet est 100% prêt pour être déployé sur [Render.com](https://render.com) en quelques clics grâce à sa configuration Docker multi-stage optimisée pour les limites de mémoire du plan gratuit (512 Mo).

### Méthode 1 : Déploiement automatique via Blueprint (Recommandé)

1. Connectez-vous sur votre compte **[dashboard.render.com](https://dashboard.render.com)**.
2. Cliquez sur **« New + »** en haut à droite, puis sélectionnez **« Blueprint »**.
3. Associez votre dépôt GitHub : `https://github.com/Coder-Machina/Portfolio-aimer.git`.
4. Render va automatiquement détecter le fichier `render.yaml` et configurer le service web Docker avec toutes les variables d'environnement.
5. Cliquez sur **« Apply »** : le build Docker démarre, compile les assets Vite, prépare le conteneur et lance l'application.

---

### Méthode 2 : Déploiement manuel via Web Service

Si vous préférez configurer manuellement le service sur Render :

1. Cliquez sur **« New + »** > **« Web Service »**.
2. Sélectionnez votre dépôt GitHub : `Coder-Machina/Portfolio-aimer`.
3. Configurez les paramètres suivants :
   - **Name** : `portfolio-akodo`
   - **Region** : `Frankfurt` (latence optimale vers l'Afrique de l'Ouest et l'Europe)
   - **Environment** : `Docker`
   - **Branch** : `main`
   - **Plan** : `Free` (0 $/mois)
4. Dans la section **Environment Variables**, ajoutez les clés suivantes :

| Clé | Valeur | Description |
|---|---|---|
| `APP_ENV` | `production` | Environnement de production |
| `APP_DEBUG` | `false` | Désactive l'affichage des erreurs détaillées |
| `APP_NAME` | `AKODO Aimé D. Yves` | Nom de l'application |
| `APP_URL` | `https://portfolio-akodo.onrender.com` | Remplacer par l'URL Render fournie |
| `APP_KEY` | *(Générer avec `php artisan key:generate --show`)* | Clé de chiffrement Laravel |
| `DB_CONNECTION` | `sqlite` | Base de données embarquée sans frais |
| `SESSION_DRIVER` | `cookie` | Maintient la connexion sans perte lors des redémarrages |
| `CACHE_STORE` | `file` | Cache fichiers |
| `FILESYSTEM_DISK` | `public` | Stockage des médias |
| `LOG_CHANNEL` | `stderr` | Affiche les logs en direct dans le dashboard Render |

5. Cliquez sur **« Create Web Service »**.

---

## 🗄️ Gestion de la Base de Données sur Render

### Option A : SQLite (Par défaut — 100% Gratuit sans configuration)
Le conteneur initialise automatiquement le fichier `database/database.sqlite`, exécute les migrations et lance automatiquement les seeders pour insérer les projets, compétences et l'administrateur par défaut.

> [!NOTE]
> Sur le plan gratuit Render sans disque persistant, le stockage de conteneur est éphémère. Pour un test de déploiement, c'est immédiat et sans frais.

### Option B : MySQL externe gratuit (Persistance permanente recommandée)
Pour une base de données persistante gratuite, vous pouvez connecter un service MySQL managé externe gratuit (comme [Aiven](https://aiven.io/), [Clever Cloud](https://www.clever-cloud.com/), ou [TiDB Cloud](https://tidbcloud.com/)) :
1. Créez une base MySQL gratuite sur l'un de ces services.
2. Dans Render > **Environment Variables**, définissez :
   - `DB_CONNECTION=mysql`
   - `DB_HOST=votre-hote.com`
   - `DB_PORT=3306`
   - `DB_DATABASE=votre_db`
   - `DB_USERNAME=votre_user`
   - `DB_PASSWORD=votre_password`
Le conteneur migrera et peuplera automatiquement la base MySQL au démarrage.

---

## 🔐 Accès au Panneau d'Administration (Filament v3)

- **URL d'administration** : `https://<votre-domaine-render>.onrender.com/admin`
- **Email administrateur** : `aimeakd6@gmail.com`
- **Mot de passe par défaut** : `admin1234`

Le panneau d'administration est installable sur smartphone comme une application native (PWA) grâce au manifest configuré et aux icônes Retina.

---

## 🛠️ Développement Local

```bash
# Cloner le dépôt
git clone git@github.com:Coder-Machina/Portfolio-aimer.git
cd Portfolio-aimer

# Installer les dépendances PHP et Node
composer install
npm install

# Configuration d'environnement
cp .env.example .env
php artisan key:generate

# Migrations & Seeders
php artisan migrate --seed

# Compiler les assets et lancer le serveur de dev
npm run build
php artisan serve
```

---

## 🧪 Tests Automatisés

Le projet comprend une suite complète de tests de fonctionnalités (Feature Tests) couvrant toutes les pages publiques, les détails projets, et le formulaire de contact avec limitation de débit (rate limiting) :

```bash
php artisan test
```
