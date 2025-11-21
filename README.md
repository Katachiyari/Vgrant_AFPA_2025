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

---

### Deliverables

- A repo folder **`tp-vagrant-debian`** containing your **Vagrantfile** and associated files.

---

> Feel free to customize with extra icons, screenshots or diagrams.  
> This style stays clear, modern, and easy to scan.

---

Ce format utilise :
- Les badges Shields.io pour les technologies (plus uniformes que les icônes mélangées).
- Une mise en page horizontale.
- Les séparateurs “---” pour aérer.
- Le gras et l’italique pour bien hiérarchiser l’information.
- Des listes à puces soignées.

Tu peux adapter chaque section selon ton besoin, ajouter par exemple des liens “Installation” et “Usage” avec icône et badges si tu veux aller encore plus vers l’esprit “fiche projet” professionnelle. Ce dashboard est compatible avec la plupart des rendus GitHub et améliore la lisibilité et l’aspect visuel[image:2][web:6][web:8].

Un point important pour obtenir ce rendu :  
- N’utilise pas `<img>` HTML mais privilégie les badges Markdown de Shields.io.
- Structure ton texte avec des titres, des listes à puces et des encadrés Markdown.
- Aère visuellement chaque groupe d’informations.

Si tu veux des exemples personnalisés ou d’autres badges, demande-les !
