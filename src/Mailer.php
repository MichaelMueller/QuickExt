<?php

namespace Qck\Ext;

interface Mailer
{
    /**
     * 
     * @param \Qck\Ext\Mail $mail
     */
    function send(Mail $mail);
}
