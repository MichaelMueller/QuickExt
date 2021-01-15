<?php

namespace Qck\Ext\Data\Columns;

class Int extends Number
{

    public function __construct( \Qck\Ext\Data\Table $table, string $name )
    {
        parent::__construct( $table, $name );
    }

    function addRange( int $min = null, int $max = null ): Int
    {
        if ( !$min )
            $min            = PHP_INT_MIN;
        if ( !$max )
            $min            = PHP_INT_MAX;
        $this->ranges[] = [ $min, $max ];
        return $this;
    }

}
