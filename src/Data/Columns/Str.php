<?php

namespace Qck\Ext\Data\Columns;

class Str extends Blob
{

    public function __construct( \Qck\Ext\Data\Table $table, string $name, int $maxLength = Blob::NORMAL )
    {
        parent::__construct( $table, $name, $maxLength );
    }

    function setCharSet( string $charSet ): Str
    {
        $this->charSet = $charSet;
        return $this;
    }

    function setMinLength( int $minLength ): Str
    {
        $this->minLength = $minLength;
        return $this;
    }

    function addChoice( string $choice ): Str
    {
        $this->choices[] = $choice;
        return $this;
    }

    public function validateForType( &$value )
    {
        $errors   = parent::validateForType( $value );
        if ( is_array( $this->choices ) && in_array( $value, $this->choices ) === false )
            $errors[] = sprintf( "must be one of &s", implode( ", ", $this->choices ) );
        return $errors;
    }

    /**
     *
     * @var int
     */
    protected $minLength;

    /**
     *
     * @var string
     */
    protected $charSet = \Qck\HttpContent::CHARSET_UTF_8;

    /**
     *
     * @var int
     */
    protected $maxLength;

    /**
     *
     * @var string[]
     */
    protected $choices;

}
