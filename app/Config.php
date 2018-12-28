<?php 

namespace App;

class Config
{
    private $config = [
        'database' => [
            'host'  => '127.0.0.1',
            'user' => 'localhost',
            'password' => 'localhost',
            'port' => '3306',
            'dbname' => 'db_word'
        ]
    ];
    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getconfig()
    {
        return $this->config;
    }

    public function getDatabase($database)
    {
        return $this->config['database'][$database];
    }

}