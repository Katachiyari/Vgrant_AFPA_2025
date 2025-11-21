# README

<!-- Badges -->
<p align="left">
  <img src="https://img.shields.io/badge/VAGRANT-1868F2.svg?&style=flat&logo=vagrant&logoColor=white" />
  <img src="https://img.shields.io/badge/BASH-4EAA25.svg?&style=flat&logo=gnubash&logoColor=white" />
  <img src="https://img.shields.io/badge/HTML5-E34F26.svg?&style=flat&logo=html5&logoColor=white" />
  <img src="https://img.shields.io/badge/SQL-4479A1.svg?&style=flat&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-777BB4.svg?&style=flat&logo=php&logoColor=white" />
</p>

---

## Practical Work – Vagrant

### Objectives

Gradually set up a virtual infrastructure using **Vagrant** + **VirtualBox** to learn:

- *the concept of a box*
- *automated VM creation*
- *provisioning*
- *shared folders*
- *multi-VM modelling (web / database separation)*

---

## Prerequisites

Before you start, please install the following tools:

- **VirtualBox**  
  [Official documentation and downloads](https://www.virtualbox.org/wiki/Downloads)

- **Vagrant**  
  [Official documentation and downloads](https://www.vagrantup.com/downloads)

> Make sure you choose the version matching your operating system (Linux, Windows, Mac).

---

## Project 1 – Creating a Debian Base Box

### Specifications

Project: `vagrant-debian`

- **Box**: `bento/debian-13`
- **Configuration**:
    - **VM Name**: `debian-base`
    - **RAM**: `1024 MB`
    - **CPU**: `1`
    - **Private Network IP**: `192.168.56.10`

**The VM must:**

- Launch with `vagrant up`
- Be accessible via `vagrant ssh`
- Display a custom MOTD after provisioning:  
  `"VM TP – Debian Base"`

#### Deliverables

- Repo folder **`tp-vagrant-debian`** with your **Vagrantfile** and associated files.

---

## Project 2 – VM with LAMP Stack & Shared Folder

### Specifications

Project: `tp-vagrant-lamp`

- **Base Box**: `bento/debian-13`
- **Hostname**: `lamp-server`
- **Port Forwarding**: Host `7676` → VM `80`
- **Shared Folder**: `./shared` → `/var/www/html`
    - owner: `www-data`
    - group: `www-data`
    - fmode=`644`, dmode=`755`

**Provisioning must:**

- Install Apache2
- Install minimal PHP stack (`php`, `php-cli`)
- Enable Apache at boot
- Clean `/var/www/html`
- Copy a sample `index.html` into the shared folder
- Display a custom MOTD

**Script requirements:**

- Idempotency: the script must be replayable (`vagrant provision` without error)

**Validation**

- Site accessible at: `http://ip:7676`

#### Deliverables

- Directory: `tp-vagrant-lamp`
    - `Vagrantfile`
    - provisioning script

---

## Project 3 – Multi-VM Infrastructure: Web + DB

### Specifications

Project: `tp-vagrant-web-db` with two VMs:

#### VM 1 – Database Server (db)

- **Hostname**: `db-server`
- **Box**: `bento/debian-13`
- **Private IP**: `192.168.56.11`
- **RAM**: `1024 MB`
- **CPU**: `1`

**Provisioning must:**

- Install MariaDB
- Configure MariaDB to listen on all interfaces (`bind-address = 0.0.0.0`)
- Use `./db_sql/db_init.sql` to:
    - create DB `tp_db`
    - create user `tp_user@%` with password `tp_password`
    - grant all privileges on DB
- Enable MariaDB at boot

---

#### VM 2 – Web Server (web)

- **Hostname**: `web-server`
- **Box**: `bento/debian-13`
- **Private IP**: `192.168.56.10`
- **RAM**: `1024 MB`
- **CPU**: `1`
- **Port Forwarding**: Host `8080` → VM `80`
- **Shared Folder**: `./shared` → `/var/www/html`


**Provisioning must:**

- Install Apache2
- Install minimal PHP stack (`php`, `php-cli`)
- Enable Apache at boot
- Clean `/var/www/html`
- Copy a sample `index.html` into the shared folder
- Display a custom MOTD

**Script requirements:**

- Idempotency: the script must be replayable (`vagrant provision` without error)

**Validation**

- Site accessible at: `http://ip:7676`

#### Deliverables

- Directory: `tp-vagrant-lamp`
    - `Vagrantfile`
    - provisioning script

---

## Project 3 – Multi-VM Infrastructure: Web + DB

### Specifications

Project: `tp-vagrant-web-db` with two VMs:

#### VM 1 – Database Server (db)

- **Hostname**: `db-server`
- **Box**: `bento/debian-13`
- **Private IP**: `192.168.56.11`
- **RAM**: `1024 MB`
- **CPU**: `1`

**Provisioning must:**

- Install MariaDB
- Configure MariaDB to listen on all interfaces (`bind-address = 0.0.0.0`)
- Use `./db_sql/db_init.sql` to:
    - create DB `tp_db`
    - create user `tp_user@%` with password `tp_password`
    - grant all privileges on DB
- Enable MariaDB at boot

---

#### VM 2 – Web Server (web)

- **Hostname**: `web-server`
- **Box**: `bento/debian-13`
- **Private IP**: `192.168.56.10`
- **RAM**: `1024 MB`
- **CPU**: `1`
- **Port Forwarding**: Host `8080` → VM `80`
- **Shared Folder**: `./shared` → `/var/www/html`

**Provisioning must:**

- Install Apache2 + PHP + `php-mysql`
- Configure `/var/www/html` as shared folder
- Install `index.php` that:
    - tests connection to DB `192.168.56.11`
    - displays a message if successful

#### Interconnections

- Both VMs communicate via private network
    - Web VM > DB VM (port `3306` open)

#### Functional Objective

- Access from host: `http://ip:8080`

#### Deliverables

- Directory: `tp-vagrant-web-db`
    - Vagrantfile (+ optional scripts and configs)

---

> 🎯 **Tip:** Structure your provisioning scripts for idempotency and include helpful comments for each step.  
> Test every VM from the host as described to ensure correct deployment.

---
