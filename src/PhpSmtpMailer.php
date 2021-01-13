<?php

namespace Qck\Ext;

/**
 * Description of PhpMailer
 *
 * @author muellerm
 */
class PhpSmtpMailer extends SmtpMailer
{

    public function __construct( string $host )
    {
        parent::__construct( $host );
    }

    public function send( Mail $mail )
    {
        $mailer             = new \PHPMailer\PHPMailer\PHPMailer( true );
        $mailer->isSMTP();
        $mailer->Host       = $this->host;
        $mailer->SMTPAuth   = $this->auth;
        $mailer->Username   = $this->username;
        $mailer->Password   = $this->password;
        $mailer->SMTPSecure = $this->encryptionType;
        $mailer->Port       = $this->port;
        if ( !$this->verfiyCertificates )
        {
            $mailer->SMTPOptions = array (
                'ssl' => array (
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                )
            );
        }
        $senderAddress = $this->fromAddress;
        $senderName    = $this->fromName;
        $mailer->setFrom( $senderAddress, $senderName );
        if ( is_string( $recepients ) )
            $recepients    = array ( $recepients );
        foreach ( $recepients as $recepient )
        {
            $rAddress = isset( $recepient[ "address" ] ) ? $recepient[ "address" ] : $recepient;
            $rName    = isset( $recepient[ "name" ] ) ? $recepient[ "name" ] : null;
            $mailer->addAddress( $rAddress, $rName );
        }

        $mailer->isHTML( $isHtml );
        $mailer->Subject = $subject;
        $mailer->Body    = $message;

        foreach ( $attachments as $attachment )
            $mailer->addAttachment( $attachment );

        foreach ( $embeddedImages as $cid => $embeddedImage )
            $mailer->addEmbeddedImage( $embeddedImage, $cid );

        if ( !$mailer->send() )
        {
            throw new \Exception( 'Message could not be sent. ' . $mailer->ErrorInfo );
        }
    }

}
