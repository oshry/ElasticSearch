<?php
/**
 * Created by PhpStorm.
 * User: oshry
 * Date: 3/6/15
 * Time: 1:15 AM
 */
namespace Search\Repository;

use PDO;

class DataRepository {
    public static $instances = [];

    public static $default = 'default';

    public static function instance(array $config, $name = NULL)
    {
        if ($name === NULL)
        {
            // Use the default instance name
            $name = static::$default;
        }

        if ( ! isset(static::$instances[$name]))
        {
            static::$instances[$name] = new static($config[$name], $name);
        }
        return static::$instances[$name];
    }

    public function __construct(array $config, $name){
        $this->instance = $name;
        $this->config = $config;
        $this->db = new PDO(
            $config['connection']['dsn'],
            $config['connection']['username'],
            $config['connection']['password']
        );
    }

    public function query($sql){
        //die("{".$sql."} ");
        $query = $this->db->query($sql);
        //echo "<pre>",print_r($query),"</pre>";die;
        $query->setFetchMode(PDO::FETCH_ASSOC);
        //$lala = $query->fetchAll();
        //echo "<pre>",print_r($lala),"</pre>";die();
        return $query->fetchAll();
    }
    public function fetch_class($sql, $entity){
        $query = $this->db->query($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, $entity);
        return $query->fetchAll();
    }
}