<?php

require_once '../vendor/autoload.php';

use App\Builders\ConfigBuilder;

$projectRoot = __DIR__ . '/../../';

echo json_encode([
    'config' => ConfigBuilder::build($projectRoot)
]);

