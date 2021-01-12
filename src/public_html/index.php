<?php

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * 
 * @author muellerm
 */
class HelloWorld implements \Qck\AppFunction
{

    public function run( App $app )
    {
        $app->httpResponse()->createContent( "Hello World. Your IP: " . $app->httpRequest()->ipAddress()->value() )->response()->send();
    }

}

\Qck\Ext\App::createConfig( "Demo App", HelloWorld::class )->setShowErrors( true )->runApp();

