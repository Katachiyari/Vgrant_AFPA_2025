#!/bin/bash
set -e # Arrête le script si une commande échoue

# Vérifie si Docker est déjà installé pour éviter de refaire tout le processus
if command -v docker &> /dev/null; then
    echo "Docker est déjà installé. Skipping..."
    exit 0
fi

echo "Installation de Docker..."
export DEBIAN_FRONTEND=noninteractive

# Mise à jour et pré-requis
apt-get update -q
apt-get install -y -q ca-certificates curl gnupg lsb-release

# Clé GPG et Repo (Méthode simplifiée et robuste)
mkdir -p /etc/apt/keyrings
if [ ! -f /etc/apt/keyrings/docker.gpg ]; then
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
fi

echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null

# Installation
apt-get update -q
apt-get install -y -q docker-ce docker-ce-cli containerd.io docker-compose-plugin

# Permissions
usermod -aG docker vagrant
systemctl enable docker --now

echo "Installation terminée avec succès."
