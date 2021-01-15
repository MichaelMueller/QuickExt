<?php

namespace Qck\Ext\Data\Columns;

abstract class Number extends \Qck\Ext\Data\Column
{

    public function __construct( \Qck\Ext\Data\Table $table, string $name )
    {
        parent::__construct( $table, $name );
    }

    public function validateForType( &$value )
    {
        $errors   = [];
        foreach ( $this->ranges as $range )
            if ( $value < $range[ 0 ] || $value > $range[ 1 ] )
                $errors[] = sprintf( "must be between %d and %d", $range[ 0 ], $range[ 1 ] );
        return $errors;
    }

    /**
     *
     * @var array[]
     */
    protected $ranges;

}
