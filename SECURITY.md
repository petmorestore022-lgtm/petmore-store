# Reporting Security Issues

Magento values the contributions of the security research community, and we look forward to working with you to minimize risk to Magento merchants. 

## Where should I report security issues?

We strongly encourage you to report all security issues privately via our [bug bounty program](https://hackerone.com/adobe).  Please provide us with relevant technical details and repro steps to expedite our investigation.  If you prefer not to use HackerOne, email us directly at `psirt@adobe.com` with details and repro steps.  

## Learning More About Security
To learn more about securing a Magento store, please visit the [Security Center](https://magento.com/security).

## Commands

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
php -d memory_limit=4G bin/magento maintenance:disable
