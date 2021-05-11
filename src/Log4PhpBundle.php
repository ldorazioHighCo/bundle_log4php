<?php

namespace hcnx\hcnx_bundle_symfony;

use hcnx\hcnx_bundle_symfony\DependencyInjection\Log4PhpExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class Log4PhpBundle extends Bundle
{
    public function getContainerExtension()
    {
        if(null === $this->extension){
//            var_dump($this);die;
            $this->extension = new Log4PhpExtension();
        }
        return $this->extension;
    }


}