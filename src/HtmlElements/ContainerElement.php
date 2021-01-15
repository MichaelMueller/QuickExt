<?php

namespace Qck\Ext\HtmlElements;

class ContainerElement extends \Qck\Ext\HtmlElement
{

    public function __construct( \Qck\Request $request, string $elementName, \Qck\Ext\HtmlElement $parent )
    {
        parent::__construct( $elementName, $parent );
        $this->request = $request;
    }

    function h1( $text ): ContainerElement
    {
        $element          = new TextElement( $text, "h1", $this );
        $this->children[] = $element;
        return $this;
    }

    function p( $text ): ContainerElement
    {
        $element          = new TextElement( $text, "p", $this );
        $this->children[] = $element;
        return $this;
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

    function submit( $name, $value ): Input
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
