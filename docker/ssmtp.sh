#!/bin/bash

# Проверяем наличие переменной $EMAIL
if [ -z "$EMAIL" ]; then
    EMAIL="your_email@gmail.com"
fi

# Проверяем наличие переменной $DOMAIN
if [ -z "$DOMAIN" ]; then
    DOMAIN="your_domain.com"
fi

# Проверяем наличие переменной $MAILHUB
if [ -z "$MAILHUB" ]; then
    MAILHUB="smtp.gmail.com:587"
fi

# Проверяем наличие переменной $AUTH_USER
if [ -z "$AUTH_USER" ]; then
    AUTH_USER="your_email@gmail.com"
fi

# Проверяем наличие переменной $AUTH_PASS
if [ -z "$AUTH_PASS" ]; then
    AUTH_PASS="your_gmail_password"
fi

# Создаем файл конфигурации
echo "root=$EMAIL" > /etc/ssmtp/ssmtp.conf
echo "hostname=$DOMAIN" >> /etc/ssmtp/ssmtp.conf
echo "mailhub=$MAILHUB" >> /etc/ssmtp/ssmtp.conf
echo "AuthUser=$AUTH_USER" >> /etc/ssmtp/ssmtp.conf
echo "AuthPass=$AUTH_PASS" >> /etc/ssmtp/ssmtp.conf
echo "FromLineOverride=YES" >> /etc/ssmtp/ssmtp.conf

