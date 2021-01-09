<?php

namespace Qck\Ext;

/**
 * Description of PhpMailer
 *
 * @author muellerm
 */
class Mailer
{

    function __construct( \Qck\Ext\App\SmtpSettings $smtpSettings )
    {
        $this->smtpSettings = $smtpSettings;
    }

    public function send( $recepients, $subject, $message, $isHtml = false, $attachments = array (), $embeddedImages = array () )
    {
        $mail             = new \PHPMailer\PHPMailer\PHPMailer( true );
        $mail->isSMTP();
        $mail->Host       = $this->smtpSettings->host;
        $mail->SMTPAuth   = $this->smtpSettings->auth;
        $mail->Username   = $this->smtpSettings->username;
        $mail->Password   = $this->smtpSettings->password;
        $mail->SMTPSecure = $this->smtpSettings->encryptionType;
        $mail->Port       = $this->smtpSettings->port;
        if ( !$this->smtpSettings->verfiyCertificates )
        {
            $mail->SMTPOptions = array (
                'ssl' => array (
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                )
            );
        }
        $senderAddress = $this->smtpSettings->fromAddress;
        $senderName    = $this->smtpSettings->fromName;
        $mail->setFrom( $senderAddress, $senderName );
        if ( is_string( $recepients ) )
            $recepients    = array ( $recepients );
        foreach ( $recepients as $recepient )
        {
            $rAddress = isset( $recepient[ "address" ] ) ? $recepient[ "address" ] : $recepient;
            $rName    = isset( $recepient[ "name" ] ) ? $recepient[ "name" ] : null;
            $mail->addAddress( $rAddress, $rName );
        }

        $mail->isHTML( $isHtml );
        $mail->Subject = $subject;
        $mail->Body    = $message;

        foreach ( $attachments as $attachment )
            $mail->addAttachment( $attachment );

        foreach ( $embeddedImages as $cid => $embeddedImage )
            $mail->addEmbeddedImage( $embeddedImage, $cid );

        if ( !$mail->send() )
        {
            throw new \Exception( 'Message could not be sent. ' . $mail->ErrorInfo );
        }
    }

    /**
     *
     * @var Smtp
     */
    protected $smtpSettings = null;

}
