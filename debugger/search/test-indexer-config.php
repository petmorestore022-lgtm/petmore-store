<?php

require '../../app/bootstrap.php';

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$config = $objectManager->get(\Magento\Framework\Search\EngineResolverInterface::class);
$engine = $config->getCurrentSearchEngine();

echo "Current Search Engine: " . $engine . "\n";


$client = $objectManager->get(\OpenSearch\Client::class);
try {
    $info = $client->info();
    echo "✅ OpenSearch connection successful\n";
    echo "Version: " . $info['version']['number'] . "\n";
} catch (Exception $e) {
    echo "❌ OpenSearch connection failed: " . $e->getMessage() . "\n";
}
