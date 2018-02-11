<?php

namespace Src\Services;

use Log;

class ConfigService {
    private static $configs = array();

    public static function get($key) {

        $result = null;

        if(array_key_exists($key, self::$configs)){
            //$result = self::$configs[$key];
            $result = config($key);
//Log::debug("ConfigService->get from cache", ['key' => $key]);
        }else{
            $result = config($key);
            self::$configs[$key] = $result;
        }

        return $result;

    }

    /**
     * 設定情報を消去する
     * @param  [type] $key [description]
     * @return [type] [description]
     */
    public static function flush($key) {

        if(array_key_exists($key, self::$configs)){
            self::$configs[$key] = null;
        }

    }

    /**
     * 設定情報をすべて消去する
     * @param  [type] $key [description]
     * @return [type] [description]
     */
    public static function flushAll() {

        self::$configs = array();

    }

    public static function getDatasourceName($datasourceId) {

        $result = null;

        $indexDatasources = self::get('app.indexDatasources');
        foreach($indexDatasources as $name => $id){
            if($id == $datasourceId){
                $result = $name;
                break;
            }
        }

        return $result;
    }

    public static function getDatasourceId($datasourceName) {

        $result = null;

        $indexDatasources = self::get('app.indexDatasources');

        if(array_key_exists($datasourceName, $indexDatasources))
            $result = $indexDatasources[$datasourceName];
        else
            throw new  SMTJobException("indexDatasourcesに{$datasourceName}が存在しません");

        return $result;

    }

    public static function getApiId($datasourceName, $apiName) {

        $result = null;

        $indexDatasourceApis = self::get('app.indexDatasourceApis');
        $result = $indexDatasourceApis[$datasourceName][$apiName];

        return $result;

    }

    public static function getUnitMaxPage($resultUnit) {

        return self::get("app.getSerpBatchUnit{$resultUnit}MaxPage");
    }

    /**
     * Returns random configuration for proxy, and false if there is no valid configuration
     *
     * @throws ConnectErrorException
     * @return array                 Returns an associative array on success
     */
    public static function getRandomProxy() {

        $proxyConfigFilePath = self::get('app.PROXY_CONFIG');
        $proxyList = parse_ini_file($proxyConfigFilePath, true);
        $i = count($proxyList);

        // check if random configuration is valid, and repeat if it's not
        while ($i--) {
            $randKey = array_rand($proxyList);
            $proxyConfig = $proxyList[$randKey];

            // return configuration only if basic options are set
            if (isset($proxyConfig['enabled']) && $proxyConfig['enabled'] == 1 && !empty($proxyConfig['port'])
                && !empty($proxyConfig['host']) && !empty($proxyConfig['type'])) {

//Log::debug("ConfigService->getRandomProxy", ['host' => $proxyConfig["host"],'port' => $proxyConfig["port"]]);
                    return $proxyConfig;
            }

            unset($proxyList[$randKey]);
        }

        throw new ConnectErrorException('No valid proxy found');
    }
}
a