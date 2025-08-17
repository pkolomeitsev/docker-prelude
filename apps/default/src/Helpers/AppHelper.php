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
        $dsn = sprintf('mysql:host=%s;port=%s', $mysqlService, $port);
        $conn = new PDO($dsn, 'root', 'secret');
        $attributes = [
            'CLIENT_VERSION',
            'CONNECTION_STATUS',
            'SERVER_INFO',
            'SERVER_VERSION',
        ];
        $summary = [];
        foreach ($attributes as $attr) {
            $constant = "PDO::ATTR_$attr";
            $summary [$attr] = $conn->getAttribute(constant($constant));
        }

        $summary['DSN'] = $dsn;
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
            'phpMyAdmin' => [
                'url' => 'http://localhost:8081/'
            ],
            'mailPit' => [
                'title' => 'Mailpit',
                'url' => 'http://localhost:8025/'
            ],
            'redisInsight' => [
                'title' => 'Redis Insight',
                'url' => 'http://localhost:5540/'
            ],
            'rabbitMQ' => [
                'title' => 'Rabbit MQ',
                'url' => 'http://localhost:15672/'
            ]
        ];
    }

    /**
     * @return string[]
     * @deprecated
     */
    public static function getAppListOld(): array
    {
        return [
            'phpMyAdmin' => 'http://localhost:8081/',
            'MailHog' => 'http://localhost:8025/',
            'phpinfo()' => 'http://localhost/old/phpinfo.php',
            'Test E-mail' => 'http://localhost/old/sendmail.php',
            'Redis Insight' => 'http://localhost:5540/'
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
        if (!$dirStructure = scandir($dir)) {
            return [];
        }

        return array_diff($dirStructure, ['..', '.', 'default']);
    }
}