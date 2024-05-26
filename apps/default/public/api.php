<?php

require_once '../vendor/autoload.php';

$projectRoot = __DIR__ . '/../../';

echo json_encode([
    'config' => \App\Builders\ConfigBuilder::build($projectRoot)
]);

