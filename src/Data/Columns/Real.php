<?php

namespace Qck\Ext\Data\Columns;

class Real extends Number
{

    public function __construct( \Qck\Ext\Data\Table $table, string $name )
    {
        parent::__construct( $table, $name );
    }

    function addRange( float $min = null, float $max = null ): Real
    {
        if ( !$min )
            $min            = PHP_FLOAT_MIN;
        if ( !$max )
            $min            = PHP_FLOAT_MAX;
        $this->ranges[] = [ $min, $max ];
        return $this;
    }

}
