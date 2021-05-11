<?php

namespace hcnx\hcnx_bundle_symfony;


class Log4Php
{
    private $loggers = array();
    private $current = 'root';



    public function __construct($lib_path, $config_path)
    {
        require_once $lib_path . DIRECTORY_SEPARATOR . 'Logger.php';
        \Logger::configure($config_path . DIRECTORY_SEPARATOR .'log4php.xml');
        $this->loggers['root'] = \Logger::getRootLogger();
    }


    private function load(string $logger)
    {
        $this->loggers[$logger] = \Logger::getLogger($logger);
    }


    public function fatal(string $msg, $logger = NULL): string
    {
        $logger = $logger ?: $this->current;
        if (!isset($this->loggers[$logger]))
            $this->load($logger);
        $this->loggers[$logger]->fatal($msg);
        return $msg;
    }


    public function error(string $msg, $logger = NULL): string
    {
        $logger = $logger ?: $this->current;
        if (!isset($this->loggers[$logger]))
            $this->load($logger);
        $this->loggers[$logger]->error($msg);
        return $msg;
    }


    public function warn(string $msg, $logger = NULL): string
    {
        $logger = $logger ?: $this->current;
        if (!isset($this->loggers[$logger]))
            $this->load($logger);
        $this->loggers[$logger]->warn($msg);
        return $msg;
    }


    public function info(string $msg, $logger = NULL): string
    {
        $logger = $logger ?: $this->current;
        if (!isset($this->loggers[$logger]))
            $this->load($logger);
        $this->loggers[$logger]->info($msg);
        return $msg;
    }


    public function debug(string $msg, $logger = NULL): string
    {
        $logger = $logger ?: $this->current;
        if (!isset($this->loggers[$logger]))
            $this->load($logger);
        $this->loggers[$logger]->debug($msg);
        return $msg;
    }


    public function trace(string $msg, $logger = NULL): string
    {
        $logger = $logger ?: $this->current;
        if (!isset($this->loggers[$logger]))
            $this->load($logger);
        $this->loggers[$logger]->trace($msg);
        return $msg;
    }

}