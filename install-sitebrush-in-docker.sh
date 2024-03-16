#!/bin/bash

# Check if Docker is installed
if ! [ -x "$(command -v docker)" ]; then
  echo "Docker is not installed. Would you like to install it? (y/n)"
  read install_docker
  if [ "$install_docker" = "y" ]; then
    echo "Installing Docker..."
    # Commands to install Docker (you can customize this based on your system)
    # For example, on Ubuntu:
    sudo apt-get update
    sudo apt-get install -y docker.io
    # For other systems, refer to Docker documentation: https://docs.docker.com/get-docker/
    echo "Docker installed successfully."
  else
    echo "Aborted. Exiting..."
    exit 1
  fi
fi

# Default values
default_backup_dir="/backup/sitebrush"
default_mailhub="smtp.gmail.com:587"
default_email="example@gmail.com"
default_auth_user="example@gmail.com"
default_auth_pass="your_password"
default_host_port=80

# Interactively prompt for backup directory
read -p "Enter backup directory path (default: $default_backup_dir): " backup_dir
backup_dir=${backup_dir:-$default_backup_dir}
mkdir -p "${backup_dir}/mysql" "$backup_dir/data"

# Create Docker volumes
docker volume rm sitebrush_mysql_data sitebrush_site_data &> /dev/null
docker volume create --opt type=none --opt device="$backup_dir/mysql" --opt o=bind sitebrush_mysql_data
docker volume create --opt type=none --opt device="$backup_dir/data" --opt o=bind sitebrush_site_data

# Interactively prompt for SMTP settings
read -p "Enter SMTP server address and port (default: $default_mailhub): " mailhub
mailhub=${mailhub:-$default_mailhub}

read -p "Enter email address for sending notifications (default: $default_email): " email
email=${email:-$default_email}

read -p "Enter SMTP authentication user (default: $default_auth_user): " auth_user
auth_user=${auth_user:-$default_auth_user}

read -p "Enter SMTP authentication password (default: $default_auth_pass): " auth_pass
auth_pass=${auth_pass:-$default_auth_pass}

# Extract domain from email address
domain=$(echo "$email" | awk -F'@' '{print $2}')

# Interactively prompt for Docker port mapping
read -p "Enter host port for mapping to container port 80 (default: $default_host_port): " host_port
host_port=${host_port:-$default_host_port}

# Run Docker container with provided settings
docker run -d -p "$host_port:80" \
    -v "/etc/timezone:/etc/timezone:ro" \
    -v "/etc/localtime:/etc/localtime:ro" \
    -v sitebrush_mysql_data:/var/lib/mysql \
    -v sitebrush_site_data:/opt/sitebrush.com \
    -e MAILHUB="$mailhub" \
    -e EMAIL="$email" \
    -e DOMAIN="$domain" \
    -e AUTH_USER="$auth_user" \
    -e AUTH_PASS="$auth_pass" \
    --restart=unless-stopped \
    --name=sitebrush \
    matveynator/sitebrush-v1:latest

echo "SiteBrush container has been started."

