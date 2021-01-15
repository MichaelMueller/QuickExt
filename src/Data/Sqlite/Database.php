<?php

namespace Qck\Ext\Data\Sqlite;

class Database extends \Qck\Ext\Data\Table
{

    function __construct( $sqlFile )
    {
        $this->sqlFile = $sqlFile;
    }

    /**
     *
     * @var Database 
     */
    protected $sqlFile;

}
