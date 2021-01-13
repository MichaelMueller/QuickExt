<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Qck\Ext\HtmlElements\Input;
use Qck\Ext\HtmlElements\Br;

/**
 * 
 * @author muellerm
 */
class MailForm implements \Qck\AppFunction
{

    public function run( \Qck\App $app )
    {
        $form = Qck\Ext\HtmlElements\Containers\Form::new( "?q=SendMail" );
        $form->add( Input::text( "host" )->setPlaceholder( "host" ) );
        $form->add( Br::new() );
        $form->add( Input::text( "username" )->setPlaceholder( "username" ) );
        $form->add( Br::new() );
        $form->add( Input::password( "password" )->setPlaceholder( "password" ) );
        $form->add( Br::new() );
        $form->add( Input::text( "recipient" )->setPlaceholder( "recipient" ) );
        $form->add( Br::new() );
        $form->add( Input::text( "subject" )->setPlaceholder( "subject" ) );
        $form->add( Br::new() );
        $form->add( \Qck\Ext\HtmlElements\TextElements\Textarea::new( "text" ) );
        $page = Qck\Ext\HttpResponse::new()->createHtmlPage()->setBody( $form )->response()->send();
    }

}

\Qck\App::new( "Mail Sender Demo App", MailForm::class )->setShowErrors( true )->run();

