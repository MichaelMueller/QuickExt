<?php

namespace Qck\Ext\Data;

interface Database
{

    /**
     * @return Table
     */
    function table( $name );
}
