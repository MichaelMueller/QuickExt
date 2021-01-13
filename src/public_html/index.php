<?php

//require_once __DIR__ . '/../../srcBundle/QuickExt.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use Qck\Ext\HtmlElements\Input;
use Qck\Ext\HtmlElements\Br;
use Qck\Ext\HtmlElements\TextElements\Paragraph;

/**
 * 
 * @author muellerm
 */
class MailForm implements \Qck\AppFunction
{

    static function new( $msg, HtmlElement $parent = null ): MailForm
    {
        return (new MailForm( $msg, $parent ) );
    }

    function __construct( $msg = null )
    {
        $this->msg = $msg;
    }

    public function run( \Qck\App $app )
    {
        $r    = $app->request();
        $form = Qck\Ext\HtmlElements\Containers\Form::new( "?q=SendMail" );
        $form->add( Input::text( "host" )->setPlaceholder( "host" )->setValue( $r->get( "host" ) ) );
        $form->add( Br::new() );
        $form->add( Input::text( "username" )->setPlaceholder( "username" )->setValue( $r->get( "username" ) ) );
        $form->add( Br::new() );
        $form->add( Input::password( "password" )->setPlaceholder( "password" ) );
        $form->add( Br::new() );
        $form->add( Input::text( "recipient" )->setPlaceholder( "recipient" )->setValue( $r->get( "recipient" ) ) );
        $form->add( Br::new() );
        $form->add( Input::text( "subject" )->setPlaceholder( "subject" )->setValue( $r->get( "subject" ) ) );
        $form->add( Br::new() );
        $form->add( \Qck\Ext\HtmlElements\TextElements\Textarea::new( "text" )->setText( $r->get( "text" ) ) );
        $form->add( Br::new() );
        $form->add( Input::submit( "send", "send" ) );
        if ( $this->msg )
            $form->add( Paragraph::new( "Result: " . $this->msg ) );

        Qck\Ext\HttpResponse::new()->createHtmlPage()->setBody( $form )->response()->send();
    }

    protected $msg;

}

/**
 * 
 * @author muellerm
 */
class SendMail implements \Qck\AppFunction
{

    public function run( \Qck\App $app )
    {
        $request   = $app->request();
        $phpMailer = Qck\Ext\PhpSmtpMailer::new( $request->get( "host" ) );
        $phpMailer->setCredentials( $request->get( "username" ), $request->get( "password" ) );
        $message   = "Ok";
        try
        {
            $phpMailer->newMail( $request->get( "recipient" ) )->setSubject( $request->get( "subject" ) )->setText( $request->get( "text" ) )->send();
        }
        catch ( \PHPMailer\PHPMailer\Exception $ex )
        {
            $message = strval( $ex );
        }
        catch ( Qck\Exception $ex )
        {
            $message = strval( $ex );
        }
        MailForm::new( $message )->run( $app );
    }

}

\Qck\App::new( "Mail Sender Demo App", MailForm::class )->addRoute( SendMail::class )->setShowErrors( true )->run();

