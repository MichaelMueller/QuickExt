<?php

namespace Qck\Ext;

class App extends \Qck\App
{

    static function new( $name, $defaultAppFunctionFqcn ): App
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
