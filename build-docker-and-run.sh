docker stop sitebrush
docker rm sitebrush
docker rmi sitebrush
rm -rf /backup/sitebrush
docker build -t sitebrush .
#docker run -d -p 80:80 -p 4443:443 -v "/etc/timezone:/etc/timezone:ro" -v "/etc/localtime:/etc/localtime:ro" -v /backup/sitebrush/db/conf.d:/etc/mysql/conf.d -v /backup/sitebrush/db/mysql:/var/lib/mysql -v /backup/sitebrush/data:/opt/sitebrush.com  --restart=unless-stopped --name=sitebrush sitebrush

#docker run -d -p 80:80 -p 443:443 -v "/etc/timezone:/etc/timezone:ro" -v "/etc/localtime:/etc/localtime:ro" -v /backup/sitebrush/data:/opt/sitebrush.com  --restart=unless-stopped --name=sitebrush sitebrush

docker run -d -p 80:80 -p 443:443 -v "/etc/timezone:/etc/timezone:ro" -v "/etc/localtime:/etc/localtime:ro" --restart=unless-stopped --name=sitebrush sitebrush

sleep 2
docker logs sitebrush
sleep 2
docker exec -it sitebrush bash
echo "ok"
