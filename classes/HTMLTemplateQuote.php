<?php
declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

class HTMLTemplateQuote extends HTMLTemplate
{
    public $object;
    public $smarty;
    public $bulk = false;

    public $title = 'Quote';
    public $date;

    public function __construct($object, $smarty, $bulk)
    {
        $this->object = $object;
        $this->smarty = $smarty;
        $this->bulk = (bool) $bulk;

        $this->date = date('Y-m-d');
    }

    public function getContent()
    {
        $this->smarty->assign(['quote' => $this->object]);

        return $this->smarty->fetch('module:enipdf/views/templates/front/pdf/quote.tpl');
    }

    public function getFilename()
    {
        return 'quote.pdf';
    }

    public function getBulkFilename()
    {
        return 'quotes.pdf';
    }
}