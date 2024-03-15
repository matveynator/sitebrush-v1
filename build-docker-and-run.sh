#!/bin/bash

docker stop sitebrush
docker rm sitebrush
docker rmi sitebrush
docker build -t sitebrush-v1 .
#docker run -d -p 80:80 -p 4443:443 -v "/etc/timezone:/etc/timezone:ro" -v "/etc/localtime:/etc/localtime:ro" -v /backup/sitebrush/db/conf.d:/etc/mysql/conf.d -v /backup/sitebrush/db/mysql:/var/lib/mysql -v /backup/sitebrush/data:/opt/sitebrush.com  --restart=unless-stopped --name=sitebrush sitebrush

#docker run -d -p 80:80 -p 443:443 -v "/etc/timezone:/etc/timezone:ro" -v "/etc/localtime:/etc/localtime:ro" -v /backup/sitebrush/data:/opt/sitebrush.com  --restart=unless-stopped --name=sitebrush sitebrush


docker tag sitebrush-v1:latest matveynator/sitebrush-v1:latest 

docker run -d -p 80:80 -p 443:443 -v "/etc/timezone:/etc/timezone:ro" -v "/etc/localtime:/etc/localtime:ro" --restart=unless-stopped --name=sitebrush matveynator/sitebrush-v1:latest

docker push matveynator/sitebrush-v1:latest
