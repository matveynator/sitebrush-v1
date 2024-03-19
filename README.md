<img width="150" src='https://repository-images.githubusercontent.com/429163995/331b95fa-4309-4d25-8c1a-0e8f34ff7b25' align="right">

# SiteBrush: Static HTML Website Editor.

Steps to install SiteBrush on your server:

## Easy installation via Docker (suitable for Linux Debian/Ubuntu etc):

1. Update packages: `apt-get update`
2. Install necessary packages: `apt-get -y install curl docker.io bash`
3. Run SiteBrush installation:
    ```bash
    curl -L https://raw.githubusercontent.com/matveynator/sitebrush-v1/master/install-sitebrush-in-docker.sh > /tmp/install-sitebrush-in-docker.sh && bash /tmp/install-sitebrush-in-docker.sh
    ```

## Manual installation (for advanced users):

1. Create directories for backup and data:
    ```bash
    mkdir -p /backup/sitebrush/mysql /backup/sitebrush/data
    ```
2. Create Docker volumes:
    ```bash
    docker volume rm sitebrush_mysql_data sitebrush_site_data
    docker volume create --opt type=none --opt device=/backup/sitebrush/mysql --opt o=bind sitebrush_mysql_data
    docker volume create --opt type=none --opt device=/backup/sitebrush/data --opt o=bind sitebrush_site_data
    ```
3. Run the SiteBrush container:
    ```bash
    docker run -d -p 80:80 -v "/etc/timezone:/etc/timezone:ro" -v "/etc/localtime:/etc/localtime:ro" -v sitebrush_mysql_data:/var/lib/mysql -v sitebrush_site_data:/opt/sitebrush.com -e MAILHUB="smtp.gmail.com:587" -e EMAIL="example@gmail.com" -e DOMAIN="gmail.com" -e AUTH_USER="example@gmail.com" -e AUTH_PASS="PASSWORD" --restart=unless-stopped --name=sitebrush matveynator/sitebrush-v1:latest
    ```

## Demo: [sitebrush.com](http://sitebrush.com)

Installing SiteBrush allows you to edit your website online without the need for knowledge of complex technical details. This editor combines the benefits of dynamic and static websites, providing convenience and high page loading speed.

## Features:

- Result - static HTML.
- Visual editor and ability to work with HTML/CSS/JavaScript.
- Automatic backup and website restoration.
- Support for repeating elements on all pages.
- Automatic import of all necessary files.
- Support for changing page addresses without 404 errors.
- Freeze mode for editing and publishing without downtimes.
