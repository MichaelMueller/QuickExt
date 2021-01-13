<?php

namespace Qck\Ext;

class HttpResponse extends \Qck\HttpResponse
{

    /**
     * 
     * @return HttpResponse
     */
    static function new()
    {
        return new HttpResponse();
    }

    public function createHtmlPage(): HtmlPage
    {
        $this->content = new HtmlPage( $this );
        return $this->content;
    }

}
