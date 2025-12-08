# Reporting Security Issues

Magento values the contributions of the security research community, and we look forward to working with you to minimize risk to Magento merchants. 

## Where should I report security issues?

We strongly encourage you to report all security issues privately via our [bug bounty program](https://hackerone.com/adobe).  Please provide us with relevant technical details and repro steps to expedite our investigation.  If you prefer not to use HackerOne, email us directly at `psirt@adobe.com` with details and repro steps.  

## Learning More About Security
To learn more about securing a Magento store, please visit the [Security Center](https://magento.com/security).

## Commands

chmod 777 -R var/ && \
php -d memory_limit=4G bin/magento maintenance:enable && \
php -d memory_limit=4G bin/magento cache:clean && \
php -d memory_limit=4G bin/magento cache:flush && \
find var generated vendor pub/static pub/media app/etc -type f -exec chmod 664 {} \; && \
find var generated vendor pub/static pub/media app/etc -type d -exec chmod 775 {} \; && \
php -d memory_limit=4G bin/magento setup:upgrade && \
php -d memory_limit=4G bin/magento setup:di:compile && \
php -d memory_limit=4G bin/magento setup:static-content:deploy -f pt_BR en_US && \
php -d memory_limit=4G bin/magento cache:clean && \
php -d memory_limit=4G bin/magento cache:flush && \
php -d memory_limit=4G bin/magento maintenance:disable && \
php -d memory_limit=4G bin/magento deploy:mode:set developer

chmod 777 -R var/ && \
php -d memory_limit=4G bin/magento maintenance:enable && \
php -d memory_limit=4G bin/magento cache:clean && \
php -d memory_limit=4G bin/magento cache:flush && \
find var generated vendor pub/static pub/media app/etc -type f -exec chmod 664 {} \; && \
find var generated vendor pub/static pub/media app/etc -type d -exec chmod 775 {} \; && \
php -d memory_limit=4G bin/magento setup:upgrade && \
php -d memory_limit=4G bin/magento setup:di:compile && \
php -d memory_limit=4G bin/magento setup:static-content:deploy -f pt_BR en_US && \
php -d memory_limit=4G bin/magento cache:clean && \
php -d memory_limit=4G bin/magento cache:flush && \
php -d memory_limit=4G bin/magento maintenance:disable && \
chown -R www-data:www-data /var/www/html && \rm 
php -d memory_limit=4G bin/magento deploy:mode:set developer 


rm -rf var/cache/* var/page_cache/* var/view_preprocessed/* pub/static/* generated/*
php -d memory_limit=4G  bin/magento setup:upgrade
php -d memory_limit=4G  bin/magento setup:static-content:deploy -flsçs
php -d memory_limit=4G  bin/magento cache:flush

find . -name "require_js.phtml"

composer install --prefer-dist



rm -rf var/cache/* var/page_cache/* var/view_preprocessed/* generated/*
php -d memory_limit=4G   bin/magento setup:di:compile
php -d memory_limit=4G   bin/magento setup:upgrade
php -d memory_limit=4G  bin/magento cache:flush
chmod -R 777 var/ pub/ generated/
