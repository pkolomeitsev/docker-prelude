<?php

namespace App\Builders;

use App\Helpers\AppHelper;

class ConfigBuilder
{

    /**
     * @param string $dir
     * @return array
     */
    public static function build(string $dir): array
    {
        $nginxInfo = AppHelper::getNginxInfo();
        $mysqlInfo = AppHelper::getMysqlInfo();
        $projects = AppHelper::getListOfTheProjects($dir);
        $appList = AppHelper::getAppList();

        return [
            'appName' => 'Docker-Dev-Env',
            'gitHubLink' => 'https://github.com/pkolomeitsev/docker-dev-env',
            'projects' => $projects,
            'appList' => $appList,
            'systemInfo' => [
                'php' => [
                    'version' => phpversion(),
                    'params' => [
                        'memoryUsage' => AppHelper::convert(memory_get_usage(true)),
                        'memoryLimit' => ini_get('memory_limit'),
                        'system' => php_uname('s')
                            . ' ' . php_uname('r')
                            . ' ' . php_uname('m')
                            . ' ' . php_uname('v'),
                    ],
                ],
                'mysql' => [
                    'version' => $mysqlInfo['SERVER_VERSION'],
                    'params' => [
                        'clientVersion' => $mysqlInfo['CLIENT_VERSION'],
                        'connectionStatus' => $mysqlInfo['CONNECTION_STATUS'],
                        'info' => $mysqlInfo['SERVER_INFO'],
                    ]
                ],
                'nginx' => [
                    'version' => $nginxInfo['version'],
                    'params' => [
                        'ip' => $_SERVER['SERVER_ADDR'],
                    ]
                ],
            ]
        ];
    }

    /**
     * @deprecated
     * @param string $dir
     * @return array
     */
    public static function buildOld(string $dir): array
    {
        $nginxInfo = AppHelper::getNginxInfo();
        $mysqlInfo = AppHelper::getMysqlInfo();
        $projects = AppHelper::getListOfTheProjects($dir);
        $appList = AppHelper::getAppListOld();

        return [
            'appName' => 'Docker-Dev-Env',
            'gitHubLink' => 'https://github.com/pkolomeitsev/docker-dev-env',
            'projects' => $projects,
            'appList' => $appList,
            'php' => [
                'version' => phpversion(),
                'memoryUsage' => AppHelper::convert(memory_get_usage(true)),
                'memoryLimit' => ini_get('memory_limit'),
                'info' => php_uname('s')
                    . ' ' . php_uname('r')
                    . ' ' . php_uname('m')
                    . ' ' . php_uname('v'),

            ],
            'mysql' => [
                'version' => $mysqlInfo['SERVER_VERSION'],
                'clientVer' => $mysqlInfo['CLIENT_VERSION'],
                'connectionStatus' => $mysqlInfo['CONNECTION_STATUS'],
                'info' => $mysqlInfo['SERVER_INFO'],

            ],
            'nginx' => [
                'version' => $nginxInfo['version'],
                'ip' => $_SERVER['SERVER_ADDR'],
            ],
        ];
    }
}