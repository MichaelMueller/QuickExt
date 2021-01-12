<?php

namespace Qck\Ext;

/**
 * Description of PhpMailer
 *
 * @author muellerm
 */
class PhpSmtpMailer extends SmtpMailer
{

    public function __construct(string $host)
    {
        parent::__construct($host);
    }

    public function send($recepients, $subject, $message, $isHtml = false, $attachments = array(), $embeddedImages = array())
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $this->host;
        $mail->SMTPAuth = $this->auth;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->SMTPSecure = $this->encryptionType;
        $mail->Port = $this->port;
        if (!$this->verfiyCertificates)
        {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        }
        $senderAddress = $this->fromAddress;
        $senderName = $this->fromName;
        $mail->setFrom($senderAddress, $senderName);
        if (is_string($recepients))
            $recepients = array($recepients);
        foreach ($recepients as $recepient)
        {
            $rAddress = isset($recepient["address"]) ? $recepient["address"] : $recepient;
            $rName = isset($recepient["name"]) ? $recepient["name"] : null;
            $mail->addAddress($rAddress, $rName);
        }

        $mail->isHTML($isHtml);
        $mail->Subject = $subject;
        $mail->Body = $message;

        foreach ($attachments as $attachment)
            $mail->addAttachment($attachment);

        foreach ($embeddedImages as $cid => $embeddedImage)
            $mail->addEmbeddedImage($embeddedImage, $cid);

        if (!$mail->send())
        {
            throw new \Exception('Message could not be sent. ' . $mail->ErrorInfo);
        }
    }

}
