# 🐳 LAMP Stack avec Docker, Vagrant \& CRUD PHP

Projet de mise en œuvre d'une infrastructure **Infrastructure as Code (IaC)** complète pour une application web PHP. Ce projet déploie automatiquement un environnement de développement isolé comprenant un serveur web (Apache/PHP) et une base de données (MariaDB) via **Docker Compose**, le tout hébergé sur une VM provisionnée par **Vagrant**.

## 📋 Fonctionnalités

* **Infrastructure Automatisée** : VM Ubuntu provisionnée par Vagrant.
* **Conteneurisation** : Stack LAMP gérée par Docker Compose.
* **Persistance des Données** : Volume Docker pour MariaDB.
* **CRUD Complet** : Application PHP native (PDO) pour gérer des utilisateurs.
* **Interface Responsive** : Utilisation de Bootstrap 5.
* **Sécurité** : Gestion des secrets via `.env` et utilisateurs BDD restreints.

***

## 🛠 Pré-requis

Avant de commencer, assurez-vous d'avoir installé :

* [VirtualBox](https://www.virtualbox.org/wiki/Downloads) (Hyperviseur)
* [Vagrant](https://www.vagrantup.com/downloads) (Gestionnaire de VM)
* Un terminal (Bash, PowerShell, ou VS Code)

***

## 🚀 Installation \& Démarrage

### 1. Cloner le projet

```bash
git clone https://github.com/ton-repo/mon_projet.git
cd mon_projet
```


### 2. Configurer l'environnement

Copiez le fichier d'exemple pour créer votre configuration locale (ne pas commiter ce fichier s'il contient des vrais secrets).

```bash
cp .env.example .env
```

*Optionnel : Modifiez les mots de passe dans `.env` si nécessaire.*

### 3. Lancer la Machine Virtuelle

Vagrant va télécharger l'image Ubuntu, configurer la VM, installer Docker et lancer les conteneurs automatiquement.

```bash
vagrant up
```

*Le premier lancement peut prendre quelques minutes.*

### 4. Vérifier les conteneurs (Optionnel)

Les conteneurs démarrent automatiquement avec la VM. Si besoin, vous pouvez vous connecter pour vérifier ou relancer manuellement :

```bash
vagrant ssh
cd /vagrant
docker compose ps
# Si besoin de relancer : docker compose up -d --build
```


***

## 🖥 Accès à l'application

Une fois les conteneurs lancés, ouvrez votre navigateur :


| Service | URL |
| :-- | :-- |
| **Application Web** | [http://localhost:8080](http://localhost:8080) |
| **Base de Données** | Port 3306 (interne Docker) |


***

## 📂 Structure du Projet

```text
mon_projet/
├── Vagrantfile             # Configuration de la VM (CPU, RAM, Réseau)
├── install_docker.sh       # Script de provisioning (install Docker automatique)
├── docker-compose.yml      # Orchestration des conteneurs (Web + DB)
├── .env.example            # Modèle de configuration
├── .env                    # Variables d'environnement (Secrets)
├── db/
│   └── init.sql            # Script SQL exécuté au 1er démarrage (Table users)
└── web/
    ├── Dockerfile          # Image PHP personnalisée (Extensions PDO, MySQL)
    └── html/               # Code source de l'application
        ├── db_connect.php  # Connexion PDO sécurisée
        ├── index.php       # Liste (Read)
        ├── create.php      # Ajout (Create)
        ├── update.php      # Modification (Update)
        └── delete.php      # Suppression (Delete)
```


***

## ⚙️ Commandes Utiles

### Depuis votre machine hôte :

* `vagrant up` : Démarre la VM.
* `vagrant halt` : Arrête la VM (économise les ressources).
* `vagrant reload` : Redémarre la VM et applique les changements du Vagrantfile.
* `vagrant ssh` : Ouvre un terminal à l'intérieur de la VM.
* `vagrant destroy` : Supprime totalement la VM (Attention : perte des données non persistées sur l'hôte).


### Depuis la VM (`vagrant ssh`) :

* `docker compose up -d` : Lance les conteneurs en arrière-plan.
* `docker compose logs -f` : Affiche les logs en temps réel (utile pour le debug PHP).
* `docker compose down` : Arrête et supprime les conteneurs.
* `docker compose exec web bash` : Ouvre un terminal dans le conteneur Apache/PHP.

***

## 🛡 Sécurité \& Bonnes Pratiques

* **Utilisateur BDD** : L'application n'utilise pas `root` mais un utilisateur dédié (`user_test`).
* **Isolation** : Le serveur web attend que la base de données soit prête (`healthcheck`) avant de démarrer.
* **PDO** : Utilisation de requêtes préparées pour éviter les injections SQL.

***

## 👤 Auteur

Projet réalisé dans le cadre de la formation DevOps - Décembre 2025.
<span style="display:none">[^1][^10][^2][^3][^4][^5][^6][^7][^8][^9]</span>

<div align="center">⁂</div>

[^1]: https://github.com/rgl/docker-windows-2022-vagrant/blob/main/README.md

[^2]: https://github.com/bubenkoff/vagrant-docker-example

[^3]: https://gitlab.dune-project.org/dune-fem/dune-fem-dev/-/blob/master/README.md

[^4]: https://github.com/geerlingguy/ansible-vagrant-examples/blob/master/README.md

[^5]: https://rolfstreefkerk.com/article/how-to-create-a-flexible-dev-environment-with-vagrant-and-docker/

[^6]: https://aquasecurity.github.io/tracee/v0.7.0/tutorials/setup-development-machine-with-vagrant/

[^7]: https://stackoverflow.com/questions/29850964/project-layout-with-vagrant-docker-and-git

[^8]: https://jbt.github.io/docker/README.md.html

[^9]: https://terryl.in/en/private-markdown-note-by-vagrant-docker-hackmd/

[^10]: https://developer.hashicorp.com/vagrant
