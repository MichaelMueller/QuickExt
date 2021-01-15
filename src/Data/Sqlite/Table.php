<?php

namespace Qck\Ext\Data\Sqlite;

class Table extends \Qck\Ext\Data\Table
{

    function __construct( Database $database )
    {
        $this->database = $database;
    }

    /**
     *
     * @var Database 
     */
    protected $database;

}
