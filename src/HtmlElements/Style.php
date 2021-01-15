<?php

namespace Qck\Ext\HtmlElements;

class Style extends \Qck\Ext\HtmlElement
{

    function __construct( Head $parent )
    {
        parent::__construct( "style", $parent );
    }

    /**
     * @return Head
     */
    function parent()
    {
        parent::parent();
    }

    public function toString( $indent = null, $level = 0 ): string
    {
        $this->text = $this->cssRules ? $this->cssRules->toString( $indent, $level ) : null;
        return parent::toString( $indent, $level );
    }

    function cssRules(): CssRules
    {
        if ( is_null( $this->cssRules ) )
            $this->cssRules = new Css\Rules();
        return $this->cssRules;
    }

    /**
     *
     * @var \Qck\Ext\Css\Rules
     */
    protected $cssRules;

}
