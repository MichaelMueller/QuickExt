<?php

namespace Qck\Ext;

abstract class SmtpMailer implements Mailer
{

    const ENCRYPTION_SSL = "ssl";
    const ENCRYPTION_TLS = "tls";

    function __construct( string $host )
    {
        $this->host = $host;
    }

    function newMail( $recipientEmail, $recipientName = null )
    {
        return new Mail( $this, $recipientEmail, $recipientName );
    }

    function host(): string
    {
        return $this->host;
    }

    function username(): string
    {
        return $this->username;
    }

    function password(): string
    {
        return $this->password;
    }

    function smtpEncryptionType(): string
    {
        return $this->smtpEncryptionType;
    }

    function port(): int
    {
        return $this->port;
    }

    function fromAddress(): string
    {
        return $this->fromAddress;
    }

    function fromName(): string
    {
        return $this->fromName;
    }

    function verifyCertificates(): bool
    {
        return $this->verifyCertificates;
    }

    function setCredentials( $username, $password )
    {
        $this->username = $username;
        $this->password = $password;
        return $this;
    }

    function setSmtpEncryptionType( string $smtpEncryptionType = self ::ENCRYPTION_SSL )
    {
        $this->smtpEncryptionType = $smtpEncryptionType;
        return $this;
    }

    function setPort( int $port = 465 )
    {
        $this->port = $port;
        return $this;
    }

    function setFromAddress( string $fromAddress )
    {
        $this->fromAddress = $fromAddress;
        return $this;
    }

    function setFromName( string $fromName )
    {
        $this->fromName = $fromName;
        return $this;
    }

    function setVerifyCertificates( bool $verifyCertificates )
    {
        $this->verifyCertificates = $verifyCertificates;
        return $this;
    }

    /**
     *
     * @var string
     */
    protected $host;

    /**
     *
     * @var string
     */
    protected $username;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var string
     */
    protected $smtpEncryptionType = self::ENCRYPTION_SSL;

    /**
     *
     * @var int
     */
    protected $port = 465;

    /**
     *
     * @var string
     */
    protected $fromAddress;

    /**
     *
     * @var string
     */
    protected $fromName;

    /**
     *
     * @var bool
     */
    protected $verifyCertificates;

}
