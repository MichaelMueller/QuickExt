<?php

namespace Qck\Ext;

abstract class HtmlElement implements \Qck\Snippet
{

    function __construct( HtmlElement $parent = null )
    {
        $this->parent = $parent;
    }

    abstract protected function elementName(): string;

    /**
     * 
     * @return HtmlElement
     */
    function parent()
    {
        return $this->parent;
    }

    function setParent( HtmlElement $parent ): HtmlElement
    {
        $this->parent = $parent;
        return $this;
    }

    function toString(): string
    {
        $ref   = new \ReflectionClass( $this );
        $props = array_filter( $ref->getProperties(), function( $property )
        {
            return $property->class != HtmlElement::class;
        } );
        $attributes = [];
        foreach ( $props as $prop )
        {
            $prop->setAccessible( true );
            $value                          = $prop->getValue( $this );
            if ( !is_scalar( $value ) && is_null( $value ) == false )
                continue;
            $attributes[ $prop->getName() ] = $value;
        }

        $text = "<" . $this->elementName();
        foreach ( $attributes as $key => $attribute )
            $text .= " " . $key . ( is_null( $attribute ) ? null : "=\"" . $attribute . "\"" );
        if ( $this->enforceClosingTag || $this->text !== null || count( $this->children ) > 0 )
        {
            $text .= ">" . $this->text;
            foreach ( $this->children as $child )
                $text .= PHP_EOL . $child->toString();
            $text .= "</" . $this->elementName() . ">" . PHP_EOL;
        }
        else
            $text .= " />" . PHP_EOL;
        return $text;
    }

    /**
     *
     * @var HtmlElement
     */
    protected $parent;

    /**
     *
     * @var bool
     */
    protected $enforceClosingTag;

    /**
     *
     * @var string
     */
    protected $text;

    /**
     *
     * @var HtmlElement[]
     */
    protected $children = [];

}
