<?php
declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
}

class EniPDF extends Module
{
    public function __construct()
    {
        $this->name = 'enipdf';

        parent::__construct();
    }

    public function install()
    {
        parent::install() && $this->registerHook(['displayPDFInvoice']);

        return true;
    }

    public function getContent()
    {
        $quotes = [
            new Quote(),
            new Quote(),
        ];
        $pdf = new PDF($quotes, 'Quote', Context::getContext()->smarty);
        $pdf->render(true);
    }

    public function hookDisplayPDFInvoice($params)
    {
        // Assignation d'une nouvelle variable au template
        $params['smarty']->assign('coming_from', 'ENI');

        // Retourne du contenu affiché dans la variable {$HOOK_DISPLAY_PDF}
        return 'Sera visible dans {$HOOK_DISPLAY_PDF}';
    }
}