<?php

namespace Qck\Ext\Data;

class Table
{

    function real( string $name ): Columns\Real
    {
        $item            = new Columns\Real( $this, $name );
        $this->columns[] = $item;
        return $item;
    }

    function integer( string $name ): Columns\Integer
    {
        $item            = new Columns\Integer( $this, $name );
        $this->columns[] = $item;
        return $item;
    }

    function string( string $name, int $maxLength = Columns\Blob::NORMAL ): Columns\Str
    {
        $item            = new Columns\Str( $this, $name, $maxLength );
        $this->columns[] = $item;
        return $item;
    }

    function filter( array $data, $evaluateAll = true )
    {
        $exception    = \Qck\Exception::new();
        $filteredData = [];
        foreach ( $this->columns as $column )
        {
            $value  = $data[ $column->name() ] ?? null;
            $errors = $column->validate( $value );

            foreach ( $errors as $error )
                $exception->argError( $error, $column->name() );
            if ( $evaluateAll == false && $exception->hasErrors() )
                $exception->throw();
            $filteredData[ $column->name() ] = $value;
        }
        $exception->throw();
        return $filteredData;
    }

    /**
     *
     * @var Column[]
     */
    protected $columns = [];

    /**
     *
     * @var Row[]
     */
    protected $rows;

}
