<?php

namespace Qck\Ext\Data\Columns;

class Blob extends \Qck\Ext\Data\Column
{

    const TINY   = 255;
    const NORMAL = 65535;
    const MEDIUM = 16777215;
    const LONG   = 4294967295;

    public function __construct( \Qck\Ext\Data\Table $table, string $name, int $maxLength = self::NORMAL )
    {
        parent::__construct( $table, $name );
        $this->maxLength = $maxLength;
    }

    public function validateForType( &$value )
    {
        $errors    = [];
        if ( $this->minLength && mb_strlen( $value ) < $this->minLength )
            $errors [] = sprintf( "at least %s chars required", $this->minLength );
        return $errors;
    }

    /**
     *
     * @var int
     */
    protected $minLength;

    /**
     *
     * @var int
     */
    protected $maxLength;

}
