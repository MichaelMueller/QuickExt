<?php

namespace Qck\Ext;

abstract class HtmlElement implements \Qck\Snippet
{

    function __construct( string $elementName, HtmlElement $parent = null )
    {
        $this->elementName = $elementName;
        $this->parent      = $parent;
    }

    function elementName(): string
    {
        return $this->elementName;
    }

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

    /**
     * 
     * @return \Qck\Ext\HtmlElement[]
     */
    function children()
    {
        return $this->children;
    }

    function addClass( string $class ): HtmlElement
    {
        $this->classes[] = $class;
        return $this;
    }

    /**
     * 
     * @return string
     */
    function text()
    {
        return $this->children;
    }

    function toString( $indent = null, $level = 0 )
    {

        $attributes            = $this->attributes;
        if ( $this->classes )
            $attributes[ "class" ] = implode( " ", $this->classes );

        $text = str_repeat( $indent, $level ) . "<" . $this->elementName();
        foreach ( $attributes as $key => $attribute )
            $text .= " " . $key . "=\"" . $attribute . "\"";
        if ( $this->enforceClosingTag || $this->text !== null || count( $this->children ) > 0 )
        {
            $text .= ">" . $this->text . PHP_EOL;
            foreach ( $this->children as $child )
                $text .= $child->toString( $indent, $level + 1 ) . PHP_EOL;
            $text .= str_repeat( $indent, $level ) . "</" . $this->elementName() . ">";
        }
        else
            $text .= " />" . PHP_EOL;
        return $text;
    }

    /**
     *
     * @var string
     */
    protected $elementName;

    /**
     *
     * @var HtmlElement
     */
    protected $parent;

    /**
     *
     * @var bool
     */
    protected $enforceClosingTag = true;

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

    /**
     *
     * @var string[]
     */
    protected $attributes = [];

    /**
     *
     * @var string[]
     */
    protected $classes = [];

}
