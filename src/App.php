<?php

namespace Qck\Ext;

/**
 * 
 * @author muellerm
 */
class App extends \Qck\App
{
    /*
     * @return Interfaces\AppConfig
     */

    static function createConfig( $name, $defaultAppFunctionFqcn, $defaultRouteName = null )
    {
        return new App\Config( $name, $defaultAppFunctionFqcn, $defaultRouteName );
    }

    public function __construct( App\Config $config )
    {
        parent::__construct( $config );
    }

}

namespace Qck\Ext\App;

class Config extends \Qck\App\Config implements \Qck\Ext\Interfaces\AppConfig
{

    public function __construct( $name, $defaultAppFunctionFqcn, $defaultRouteName = null )
    {
        parent::__construct( $name, $defaultAppFunctionFqcn, $defaultRouteName );
    }

    public function smtpSettings( $host ): \Qck\Ext\Interfaces\SmtpSettings
    {
        $this->smtpSettings = new SmtpSettings( $this, $host );
        return $this->smtpSettings;
    }

    public function runApp()
    {
        new \Qck\Ext\App( $this );
    }

    /**
     *
     * @var SmtpSettings
     */
    protected $smtpSettings;

}

class SmtpSettings implements \Qck\Ext\Interfaces\SmtpSettings
{

    function __construct( \Qck\Ext\Interfaces\AppConfig $appConfig, string $host )
    {
        $this->appConfig = $appConfig;
        $this->host      = $host;
    }

    function appConfig()
    {
        return $this->appConfig;
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

    function encryptionType(): string
    {
        return $this->encryptionType;
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

    function setEncryptionType( string $encryptionType = \Qck\Ext\Interfaces\SmtpSettings ::ENCRYPTION_SSL )
    {
        $this->encryptionType = $encryptionType;
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
     * @var \Qck\Ext\Interfaces\AppConfig
     */
    protected $appConfig;

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
    protected $encryptionType = \Qck\Ext\Interfaces\SmtpSettings::ENCRYPTION_SSL;

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
