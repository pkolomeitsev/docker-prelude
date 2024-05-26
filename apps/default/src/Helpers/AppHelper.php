<?php

namespace App\Helpers;

use PDO;

class AppHelper
{
    /**
     * @return array
     */
    public static function getMysqlInfo(): array
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

    /**
     * @return array
     */
    public static function getNginxInfo(): array
    {
        return [
            'version' => substr($_SERVER['SERVER_SOFTWARE'], strpos($_SERVER['SERVER_SOFTWARE'], '/') + 1)
        ];
    }

    /**
     * List of the applications available to make your life easier
     * @return string[]
     */
    public static function getAppList(): array
    {
        return [
            'phpMyAdmin' => 'http://localhost:8081/',
            'MailHog' => 'http://localhost:8025/',
            'phpinfo()' => 'http://localhost/phpinfo.php',
            'Test E-mail' => 'http://localhost/sendmail.php'
        ];
    }

    /**
     * @param int $size
     * @return string
     */
    public static function convert(int $size): string
    {
        $unit = ['B', 'Kb', 'M', 'Gb', 'Tb', 'Pb'];
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . '' . $unit[$i];
    }

    /**
     * @param string $dir
     * @return array
     */
    public static function getListOfTheProjects(string $dir): array
    {
//        $dir = __DIR__ . '/../../../';
        if (!$dirStructure = scandir($dir)) {
            return [];
        }

        return array_diff($dirStructure, ['..', '.', 'default']);
    }
}