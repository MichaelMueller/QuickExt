<?php

namespace Qck\Ext\Data;

abstract class Column
{

    abstract function validateForType( &$value );

    /**
     * @return string[]
     */
    function validate( &$value )
    {
        $errors   = [];
        if ( $this->value && $this->value != $value )
            $errors[] = sprintf( "must be equals %s", $this->value );
        else if ( $this->notNull && $value == null )
            $errors[] = sprintf( "must not be empty" );
        $errors   = array_merge( $errors, $this->validateForType( $value ) );
        if ( count( $errors ) == 0 && is_null( $value ) && $this->default != null )
            $value    = $this->default;
        return $errors;
    }

    function __construct( Table $table, string $name )
    {
        $this->table = $table;
        $this->name  = $name;
    }

    function name(): string
    {
        return $this->name;
    }

    function table(): Table
    {
        return $this->table;
    }

    function setNotNull()
    {
        $this->notNull = true;
    }

    function setValue( string $value ): Column
    {
        $this->value = $value;
        return $this;
    }

    function setDefault( string $default ): Column
    {
        $this->default = $default;
        return $this;
    }

    /**
     *
     * @var Table
     */
    protected $table;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $value;

    /**
     *
     * @var string
     */
    protected $default;

    /**
     *
     * @var bool
     */
    protected $notNull;

}
