#!/usr/bin/env bash


rm -rf var/cache/* var/page_cache/* generated/* var/view_preprocessed/* pub/static/*

mkdir -p generated/code generated/metadata var/cache var/page_cache var/view_preprocessed

mkdir -p var/cache var/page_cache generated var/view_preprocessed pub/static

chmod 777 /var/www/html/app/etc/env.php /var/www/html/app/etc/config.php

php -d memory_limit=2G bin/magento module:enable --all --clear-static-content


php -d memory_limit=2G bin/magento setup:upgrade --keep-generated


php -d memory_limit=2G bin/magento setup:di:compile


php -d memory_limit=2G bin/magento cache:flush


php -d memory_limit=2G bin/magento deploy:mode:set production --skip-compilation


php -d memory_limit=2G bin/magento deploy:mode:show


php -d memory_limit=2G bin/magento setup:static-content:deploy --area adminhtml --theme Magento/backend --force --jobs 2


php -d memory_limit=2G bin/magento setup:static-content:deploy --area frontend --force --jobs 2


php -d memory_limit=2G bin/magento indexer:reindex


# php -d memory_limit=2G bin/magento cron:install --non-optional

php -d memory_limit=2G bin/magento cache:clean

chown -R www-data:www-data .