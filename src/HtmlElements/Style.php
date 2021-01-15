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
        $this->text = $this->cssRules ? PHP_EOL . $this->cssRules->toString( $indent, $level + 1 ) . PHP_EOL . str_repeat( $indent, $level ) : null;
        return parent::toString( $indent, $level );
    }

    function cssRules(): \Qck\Ext\Css\Rules
    {
        if ( is_null( $this->cssRules ) )
            $this->cssRules = new \Qck\Ext\Css\Rules ( );
        return $this->cssRules;
    }

    /**
     *
     * @var \Qck\Ext\Css\Rules
     */
    protected $cssRules;

}
