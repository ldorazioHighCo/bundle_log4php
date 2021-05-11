<?php

use hcnx\hcnx_bundle_symfony\Log4Php;
use PHPUnit\Framework\TestCase;

class Log4PhpTest extends TestCase
{
    public $lib_path = "/home/ldorazio/log4php";
    public $config_path = "/var/www/sites/Log4PhpBundle";


    public function testCreateFileInfo()
    {
        $log4php = new Log4Php($this->lib_path, $this->config_path);
        $log4php->info('test Info', "TestUnit");
        $this->assertFileExists('/var/www/sites/Log4PhpBundle/testlog4php.log');
//        unlink("/var/www/sites/Log4PhpBundle/testlog4php.log");
//        sleep(1);
    }

    public function testCreateFileTrace()
    {
        $log4php = new Log4Php($this->lib_path, $this->config_path);
        $log4php->trace('test Trace', "TestUnit");
        $this->assertFileEquals();
        $this->assertFileExists('/var/www/sites/Log4PhpBundle/testlog4php.log');
//        unlink("/var/www/sites/Log4PhpBundle/testlog4php.log");
//        sleep(1);
    }

    public function testCreateFileDebug()
    {
        $log4php = new Log4Php($this->lib_path, $this->config_path);
        $log4php->debug('test Debug', "TestUnit");
        $this->assertFileExists('/var/www/sites/Log4PhpBundle/testlog4php.log');
//        unlink("/var/www/sites/Log4PhpBundle/testlog4php.log");
//        sleep(1);
    }

    public function testCreateFileError()
    {
        $log4php = new Log4Php($this->lib_path, $this->config_path);
        $log4php->error('test Error', "TestUnit");
        $this->assertFileExists('/var/www/sites/Log4PhpBundle/testlog4php.log');
//        unlink("/var/www/sites/Log4PhpBundle/testlog4php.log");
//        sleep(1);
    }

    public function testCreateFileWarn()
    {
        $log4php = new Log4Php($this->lib_path, $this->config_path);
        $log4php->warn('test Warn', "TestUnit");
        $this->assertFileExists('/var/www/sites/Log4PhpBundle/testlog4php.log');
//        unlink("/var/www/sites/Log4PhpBundle/testlog4php.log");
//        sleep(1);
    }


    public function testCreateFileFatal()
    {
        $log4php = new Log4Php($this->lib_path, $this->config_path);
        $log4php->fatal('test Fatal', "TestUnit");
        $this->assertFileExists('/var/www/sites/Log4PhpBundle/testlog4php.log');
//        unlink("/var/www/sites/Log4PhpBundle/testlog4php.log");
//        sleep(1);
    }

}