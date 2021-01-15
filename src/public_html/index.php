<?php

//require_once __DIR__ . '/../../srcBundle/QuickExt.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use Qck\Ext\HtmlElements\Div;
use Qck\Ext\HtmlElements\Input;

/**
 * 
 * @author muellerm
 */
class MailForm implements \Qck\AppFunction
{

    static function new( $msg, HtmlElement $parent ): MailForm
    {
        return (new MailForm( $msg, $parent ) );
    }

    function __construct( $msg = null )
    {
        $this->msg = $msg;
    }

    public function run( \Qck\App $app )
    {
        $r = $app->request();

        /*
          $container = Div::new();
          $container->h1()->setText( $app->name() );
          $form      = $container->form( "?q=SendMail" );

          // form
          $form->add( Input::text( "host" )->setPlaceholder( "host" )->setValue( $r->get( "host" ) ) );
          $form->add( Input::text( "username" )->setPlaceholder( "username" )->setValue( $r->get( "username" ) ) );
          $form->add( Input::password( "password" )->setPlaceholder( "password" ) );
          $form->add( Input::text( "recipient" )->setPlaceholder( "recipient" )->setValue( $r->get( "recipient" ) ) );
          $form->add( Input::text( "subject" )->setPlaceholder( "subject" )->setValue( $r->get( "subject" ) ) );
          $form->add( \Qck\Ext\HtmlElements\Textarea::new( "text" )->setPlaceholder( "text" )->setText( $r->get( "text" ) ) );
          $form->add( Input::submit( "send", "send" ) );

          if ( $this->msg )
          $form->p()->setText( "Result: " . $this->msg );


          // css
          $cssRules = Qck\Ext\Css\Rules::new();
          $cssRules->add( "*" )->setBoxSizing( Qck\Ext\Css\BoxSizing::BORDER_BOX );
          $cssRules->add( "body" )->setMargin( 0 )->setPadding( 0 )->setFontSize( "16px" );
          $cssRules->add( "div" )->setMargin( 0 )->setPadding( "5px" );
          $cssRules->add( "input" )->setMarginTop( "5px" )->setPadding( "5px" )->setWidth( "100%" );
          $cssRules->copy( "input", "textarea" );
         * */
        $page = Qck\Ext\HttpResponse::new()->createHtmlPage();
        $page->html()->body( $r )->div()->h1( $app->name() );

        $page->response()->send("  ");
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

