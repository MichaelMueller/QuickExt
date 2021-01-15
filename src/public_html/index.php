<?php

//require_once __DIR__ . '/../../srcBundle/QuickExt.php';
require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * 
 * @author muellerm
 */
class MailForm implements \Qck\AppFunction
{

    static function new( Qck\LogMessage $msg ): MailForm
    {
        return (new MailForm( $msg ) );
    }

    function __construct( Qck\LogMessage $msg = null )
    {
        $this->msg = $msg;
    }

    public function run( \Qck\App $app )
    {
        /* @var $app \Qck\Ext\App */

        // define the head section
        $head = $app->httpResponse()->createHtmlPage()->html()->head();
        $head->title( $app->name() );

        // define css
        $cssRules = $head->style()->cssRules();
        $cssRules->add( "*" )->setBoxSizing( Qck\Ext\Css\BoxSizing::BORDER_BOX );
        $cssRules->add( "body" )->setMargin( 0 )->setPadding( 0 )->setFontSize( "16px" );
        $cssRules->add( "div" )->setMargin( 0 )->setPadding( "5px" );
        $cssRules->add( "input" )->setMarginTop( "5px" )->setPadding( "5px" )->setWidth( "100%" );
        $cssRules->copy( "input", "textarea" );
        $cssRules->add( ".error" )->setColor( Qck\Ext\Css\Color::ORANGE_RED );
        $cssRules->add( ".okay" )->setColor( Qck\Ext\Css\Color::SEA_GREEN );

        // define body
        $mainDiv = $head->parent()->body( $app->request() )->div();
        $mainDiv->h1( $app->name() );

        // set result message
        if ( $this->msg )
        {
            $this->msg->disableAdditionalInformation();
            $pre = $mainDiv->pre( $this->msg->text() );
            $pre->addClass( $this->msg->hasTopic( Qck\LogMessage::ERROR ) ? "error" : "okay"  );
        }

        // define form
        $form = $mainDiv->form( "?q=SendMail" );
        $form->textfield( "host" )->setPlaceholder( "host" );
        $form->textfield( "username" )->setPlaceholder( "username" );
        $form->password( "password" )->setPlaceholder( "password" );
        $form->textfield( "recipient" )->setPlaceholder( "recipient" );
        $form->textfield( "subject" )->setPlaceholder( "subject" );
        $form->textarea( "text" )->setPlaceholder( "text" );
        $form->submit( "send" );

        // send the response with indentation
        $head->parent()->page()->response()->send( "  " );
    }

    /**
     *
     * @var Qck\LogMessage
     */
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
        $message   = $app->log()->info( "Mail was sent" );
        try
        {
            $phpMailer->newMail( $request->get( "recipient" ) )->setSubject( $request->get( "subject" ) )->setText( $request->get( "text" ) )->send();
        }
        catch ( \PHPMailer\PHPMailer\Exception $ex )
        {
            $message = $app->log()->error( $ex );
        }
        catch ( Qck\Exception $ex )
        {
            $message = $app->log()->error( $ex );
        }
        $message->send();
        MailForm::new( $message )->run( $app );
    }

}

\Qck\Ext\App::new( "Mail Sender Demo App", MailForm::class )->addRoute( SendMail::class )->setShowErrors( true )->run();

