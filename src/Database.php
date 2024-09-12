<?php

namespace Corcel;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Config;

/**
 * Class Database
 *
 * @package Corcel
 * @author Junior Grossi <juniorgro@gmail.com>
 * @author Brede Basualdo <hola@brede.cl>
 */
class Database
{
    /**
     * @var array
     */
    protected static $baseParams = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => 'wp_',
    ];

    /**
     * @param array $params
     * @return \Illuminate\Database\Capsule\Manager
     */
    public static function connect(array $conn)
    {
        $capsule = new Capsule();
        $dbcon  = config('corcel.connection');
        
        $params = $conn[$dbcon];
        //$params["prefix"] = static::$baseParams["prefix"] . $siteID . "_";

        $params = array_merge(static::$baseParams, $params);
        $capsule->addConnection($params,$dbcon);
        $capsule->bootEloquent();

        return $capsule;
    }
    /**
     * @param array $params
     * @return \Illuminate\Database\Capsule\Manager
     */
    public static function connectSite($conn,$siteID)
    {
        $capsule = new Capsule();
        $dbcon  = config('corcel.connection');
        
        $params = $conn[$dbcon];
        $params["prefix"] = static::$baseParams["prefix"] . $siteID . "_";

        $params = array_merge(static::$baseParams, $params);
        $capsule->addConnection($params,$dbcon);
        $capsule->bootEloquent();

        return $capsule;
    }
}
