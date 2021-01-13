<?php

namespace Qck\Ext;

class Mail
{

    static function new( Mailer $mailer, $recipientEmail, $recipientName = null ): Mail
    {
        return new \Qck\Mail( $mailer, $recipientEmail, $recipientName );
    }

    function __construct( Mailer $mailer, $recipientEmail, $recipientName = null )
    {
        $this->mailer = $mailer;
        $this->addRecipient( $recipientEmail, $recipientName );
    }

    public function addRecipient( $recipientEmail, $recipientName = null ): Mail
    {
        $this->recipients[] = [ $recipientEmail, $recipientName ];
        return $this;
    }

    function setText( string $text ): Mail
    {
        $this->text = $text;
        return $this;
    }

    function setSubject( string $subject ): Mail
    {
        $this->subject = $subject;
        return $this;
    }

    function setIsHtml( bool $isHtml ): Mail
    {
        $this->isHtml = $isHtml;
        return $this;
    }

    function addAttachment( string $attachment ): Mail
    {
        $this->attachments[] = $attachment;
        return $this;
    }

    function addEmbeddedImage( string $embeddedImage ): Mail
    {
        $this->embeddedImages[] = $embeddedImage;
        return $this;
    }

    function send(): void
    {
        $this->mailer->send( $this );
    }

    /**
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     *
     * @var string[]
     */
    protected $recipients;

    /**
     *
     * @var string
     */
    protected $text;

    /**
     *
     * @var string
     */
    protected $subject;

    /**
     *
     * @var bool
     */
    protected $isHtml = false;

    /**
     *
     * @var string[]
     */
    protected $attachments;

    /**
     *
     * @var string[]
     */
    protected $embeddedImages;

}
