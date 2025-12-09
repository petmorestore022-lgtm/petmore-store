<?php

require '../../app/bootstrap.php';

$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, []);

$objectManager = $bootstrap->getObjectManager();

$storage = $objectManager->get(\Magento\Framework\App\Filesystem\DirectoryList::class)->getDefaultConfig();

print_r($storage);
