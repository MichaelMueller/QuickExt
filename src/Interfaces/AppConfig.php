<?php

namespace Qck\Ext\Interfaces;

/**
 * 
 * @author muellerm
 */
interface AppConfig extends \Qck\Interfaces\AppConfig
{

    /**
     * 
     * @param string $host
     * @return SmtpSettings
     */
    function smtpSettings( $host );
}
