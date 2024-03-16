#!/bin/bash
docker stop sitebrush
docker rm sitebrush
docker rmi sitebrush-v1 matveynator/sitebrush-v1
docker build -t sitebrush-v1 .
docker tag sitebrush-v1:latest matveynator/sitebrush-v1:latest
docker push matveynator/sitebrush-v1:latest
