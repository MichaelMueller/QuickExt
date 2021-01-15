<?php

namespace Qck\Ext\HtmlElements;

class ContainerElement extends \Qck\Ext\HtmlElement
{

    public function __construct( \Qck\Request $request, string $elementName, \Qck\Ext\HtmlElement $parent )
    {
        parent::__construct( $elementName, $parent );
        $this->request = $request;
    }

    function h1( $text ): TextElement
    {
        $element          = new TextElement( $text, "h1", $this );
        $this->children[] = $element;
        return $element;
    }

    function pre( $text ): TextElement
    {
        $element          = new TextElement( $text, "pre", $this );
        $this->children[] = $element;
        return $element;
    }

    function p( $text ): TextElement
    {
        $element          = new TextElement( $text, "p", $this );
        $this->children[] = $element;
        return $element;
    }

    function div(): ContainerElement
    {
        $element          = new ContainerElement( $this->request, "div", $this );
        $this->children[] = $element;
        return $element;
    }

    function form( $action ): Form
    {
        $element          = new Form( $this->request, $action, $this );
        $this->children[] = $element;
        return $element;
    }

    function textfield( $name ): Input
    {
        $element          = new Input( $name, "text", $this->request, $this );
        $this->children[] = $element;
        return $element;
    }

    function password( $name ): Input
    {
        $element          = new Input( $name, "password", $this->request, $this );
        $this->children[] = $element;
        return $element;
    }

    function submit( $value, $name = "submit" ): Input
    {
        $element          = new Input( $name, "submit", $this->request, $this );
        $element->setValue( $value );
        $this->children[] = $element;
        return $element;
    }

    function textarea( $name ): Textarea
    {
        $element          = new Textarea( $name, $this->request, $this );
        $this->children[] = $element;
        return $element;
    }

    /**
     *
     * @var \Qck\Request
     */
    protected $request;

}
