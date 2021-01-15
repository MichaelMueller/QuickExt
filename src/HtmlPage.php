<?php

namespace Qck\Ext;

class HtmlPage extends \Qck\HttpContent
{

    public function __construct( \Qck\HttpResponse $response )
    {
        parent::__construct( $response );
        $this->contentType = \Qck\HttpContent::CONTENT_TYPE_TEXT_HTML;
    }

    public function setContentType( $contentType = \Qck\HttpContent::CONTENT_TYPE_TEXT_HTML ): HtmlPage
    {
        return $this;
    }

    function html(): HtmlElements\Html
    {
        if ( is_null( $this->html ) )
            $this->html = new HtmlElements\Html ( );
        return $this->html;
    }

    function toString( $indent = null, $level = 0 )
    {
        $html = str_repeat( $indent, $level ) . "<!doctype html>" . PHP_EOL;
        $html .= $this->html()->toString( $indent, $level ) . PHP_EOL;
        return $html;
    }

    function setIndent( string $indent )
    {
        $this->indent = $indent;
    }

    /**
     *
     * @var HtmlElements\Html
     */
    protected $html;

}
