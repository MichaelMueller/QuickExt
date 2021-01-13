<?php

namespace Qck\Ext;

class HtmlPage extends \Qck\HttpContent
{

    public function __construct( \Qck\HttpResponse $response )
    {
        parent::__construct( $response );
        $this->contentType = \Qck\HttpContent::CONTENT_TYPE_TEXT_HTML;
    }

    public function setContentType( $contentType = \Qck\HttpContent::CONTENT_TYPE_TEXT_HTML ): HtmlPage
    {
        return $this;
    }

    function setTitle( string $title ): HtmlPage
    {
        $this->title = $title;
        return $this;
    }

    function setHead( string $head ): HtmlPage
    {
        $this->head = $head;
        return $this;
    }

    function setLanguage( string $language ): HtmlPage
    {
        $this->language = $language;
        return $this;
    }

    protected function print( $var )
    {
        print( $var instanceof \Qck\Snippet ? $var->toString() : strval( $var ) );
    }

    function toString(): string
    {
        ob_start();
        ?>
        <!doctype html>

        <html lang="<?= $this->language ?>">
            <head>
                <meta charset="<?= $this->charSet ?>">

                <title><?= $this->title ?></title>
                <?= $this->print( $this->head ) ?>
            </head>

            <body>
                <?= $this->print( $this->body ) ?>
            </body>
        </html>
        <?php
        return ob_get_clean();
    }

    /**
     *
     * @var string
     */
    protected $title;

    /**
     *
     * @var string
     */
    protected $language = "en";

    /**
     *
     * @var string|\Qck\Snippet
     */
    protected $head;

}
