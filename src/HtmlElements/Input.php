<?php

namespace Qck\Ext\HtmlElements;

class Input extends \Qck\Ext\HtmlElement
{

    const TEXT     = "text";
    const PASSWORD = "password";

    static function password( $name, HtmlElement $parent = null ): Input
    {
        return new Input( $name, self::PASSWORD, $parent );
    }

    static function text( $name, HtmlElement $parent = null ): Input
    {
        return new Input( $name, self::TEXT, $parent );
    }

    static function new( $name, $type, HtmlElement $parent = null ): Input
    {
        return new Input( $name, $type, $parent );
    }

    function __construct( $name, $type, HtmlElement $parent = null )
    {
        parent::__construct( $parent );
        $this->name = $name;
        $this->type = $type;
    }

    function setPlaceholder( $placeholder ): Input
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    protected function elementName(): string
    {
        return "input";
    }

    protected $name;
    protected $type;
    protected $placeholder;

}
