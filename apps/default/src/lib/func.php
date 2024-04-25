<?php

function getMysqlInfo()
{
    $mysqlService = 'mysql8-service';
    $port = 3306;
    $conn = new PDO(sprintf('mysql:host=%s;port=%s', $mysqlService, $port), 'root', 'secret');
    $attributes = [
        "CLIENT_VERSION",
        "CONNECTION_STATUS",
        "SERVER_INFO",
        "SERVER_VERSION",
    ];
    $summary = [];
    foreach ($attributes as $attr) {
        $constant = "PDO::ATTR_$attr";
        $summary [$attr] = $conn->getAttribute(constant($constant));
    }

    return $summary;
}

function getNginxInfo()
{
    return [
        'version' => substr($_SERVER['SERVER_SOFTWARE'], strpos($_SERVER['SERVER_SOFTWARE'], '/') + 1)
    ];
}


function getAppList()
{
    return [
        'phpMyAdmin' => 'http://localhost:8081/',
        'phpinfo()' => 'http://localhost/phpinfo.php'
    ];
}

function convert($size)
{
    $unit = array('B', 'Kb', 'M', 'Gb', 'Tb', 'Pb');
    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . '' . $unit[$i];
}

function getPhpMyAdminInfo()
{
    $mysqlService = 'phpmyadmin';
//    docker - compose run phpmyadmin php - v
}

function getListOfTheProjects()
{
    $dir = __DIR__ . '/../../../';
    return array_diff(scandir($dir), ['..', '.', 'default']);
}
