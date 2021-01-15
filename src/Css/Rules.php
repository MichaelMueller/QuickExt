<?php

namespace Qck\Ext\Css;

class Rules implements \Qck\Snippet
{

    static function new(): Rules
    {
        return new Rules();
    }

    function addRule( Rule $rule ): Rules
    {
        $rule->setRules( $this );
        $this->rules[ $rule->selector() ] = $rule;
        return $this;
    }

    function add( string $selector ): Rule
    {
        $rule                     = new Rule( $selector, $this );
        $this->rules[ $selector ] = $rule;
        return $rule;
    }

    function copy( $source, $target )
    {
        $this->rules[ $source ]->clone( $target );
    }

    function get( $selector )
    {
        return $this->rules[ $selector ] ?? null;
    }

    public function toString( $indent = null, $level = 0 )
    {
        $strings = array_map( function ( $item ) use( $indent, $level )
        {
            return $item->toString( $indent, $level );
        }, $this->rules );
        return implode( PHP_EOL, $strings );
    }

    /**
     *
     * @var Rule[]
     */
    protected $rules = [];

}
