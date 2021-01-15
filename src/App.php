<?php

namespace Qck\Ext;

class App extends \Qck\App
{

    /**
     * 
     * @param string $name
     * @param string $defaultAppFunctionFqcn
     * @return \Qck\Ext\App
     */
    static function new( $name, $defaultAppFunctionFqcn )
    {
        return new App( $name, $defaultAppFunctionFqcn );
    }

    public function __construct( $name, $defaultAppFunctionFqcn )
    {
        parent::__construct( $name, $defaultAppFunctionFqcn );
    }

    public function httpResponse(): \Qck\HttpResponse
    {
        if ( is_null( $this->httpResponse ) )
            $this->httpResponse = new HttpResponse( $this->request() );
        return $this->httpResponse;
    }

}
