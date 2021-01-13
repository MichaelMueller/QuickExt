<?php

namespace Qck\Ext;

/**
 * Description of PhpMailer
 *
 * @author muellerm
 */
class PhpSmtpMailer extends SmtpMailer
{

    static function new( string $host ): PhpSmtpMailer
    {
        return new PhpSmtpMailer( $host );
    }

    public function __construct( string $host )
    {
        parent::__construct( $host );
    }

    public function send( Mail $mail )
    {
        $mailer             = new \PHPMailer\PHPMailer\PHPMailer( true );
        $mailer->isSMTP();
        $mailer->Host       = $this->host;
        $mailer->SMTPAuth   = $this->username || $this->password;
        $mailer->Username   = $this->username;
        $mailer->Password   = $this->password;
        $mailer->SMTPSecure = $this->smtpEncryptionType;
        $mailer->Port       = $this->port;
        if ( !$this->verifyCertificates )
        {
            $mailer->SMTPOptions = array (
                'ssl' => array (
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                )
            );
        }
        $senderAddress = $this->fromAddress();
        $senderName    = $this->fromName;
        $mailer->setFrom( $senderAddress, $senderName );

        foreach ( $mail->recipients() as $recepient )
        {
            $rAddress = $recepient[ 0 ];
            $rName    = $recepient[ 1 ];
            $mailer->addAddress( $rAddress, $rName );
        }

        $mailer->isHTML( $mail->isHtml() );
        $mailer->Subject = $mail->subject();
        $mailer->Body    = $mail->text();

        foreach ( $mail->attachments() as $attachment )
            $mailer->addAttachment( $attachment );

        foreach ( $mail->embeddedImages() as $cid => $embeddedImage )
            $mailer->addEmbeddedImage( $embeddedImage, $cid );

        if ( !$mailer->send() )
        {
            \Qck\Exception::new()->error( $mailer->ErrorInfo )->throw();
        }
    }

}
