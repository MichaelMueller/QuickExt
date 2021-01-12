<?php

namespace Qck\Ext;

/**
 * 
 * @author muellerm
 */
class App extends \Qck\App
{

    public function __construct($name, $defaultAppFunctionFqcn, $showErrors = false, $defaultRouteName = null)
    {
        parent::__construct($name, $defaultAppFunctionFqcn, $showErrors, $defaultRouteName);
    }

}
