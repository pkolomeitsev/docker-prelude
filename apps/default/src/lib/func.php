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

/**
 * List of the applications available to make your life easier
 * @return string[]
 */
function getAppList()
{
    return [
        'phpMyAdmin' => 'http://localhost:8081/',
        'MailHog' => 'http://localhost:8025/',
        'phpinfo()' => 'http://localhost/phpinfo.php',
        'Test E-mail' => 'http://localhost/sendmail.php'
    ];
}

function convert($size)
{
    $unit = ['B', 'Kb', 'M', 'Gb', 'Tb', 'Pb'];
    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . '' . $unit[$i];
}

function getListOfTheProjects()
{
    $dir = __DIR__ . '/../../../';
    return array_diff(scandir($dir), ['..', '.', 'default']);
}
