<?php

namespace Qck\Ext\Interfaces;

/**
 * 
 * @author muellerm
 */
interface SmtpSettings
{

    const ENCRYPTION_SSL = "ssl";
    const ENCRYPTION_TLS = "tls";

    /**
     * @param string $username
     * @param string $password
     * @return SmtpSettings
     */
    function setCredentials( $username, $password );

    /**
     * @param string $encryptionType
     * @return SmtpSettings
     */
    function setEncryptionType( string $encryptionType = SmtpSettings::ENCRYPTION_SSL );

    /**
     * @param string $port
     * @return SmtpSettings
     */
    function setPort( int $port = 465 );

    /**
     * @param string $fromAddress
     * @return SmtpSettings
     */
    function setFromAddress( string $fromAddress );

    /**
     * @param string $fromName
     * @return SmtpSettings
     */
    function setFromName( string $fromName );

    /**
     * @return AppConfig
     */
    function appConfig();
}
