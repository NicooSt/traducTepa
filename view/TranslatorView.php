<?php
require_once 'libs/Smarty/libs/Smarty.class.php';
class TranslatorView {
    private $smarty;
    
    function __construct() {
        $this->smarty = new Smarty();
    }

    function showHomeLocation($translation = null, $message = null, $translationLang) {
        $this->smarty->assign('message', $message);
        $this->smarty->assign('translation', $translation);
        $this->smarty->assign('translationLang', $translationLang);
        $this->smarty->display('templates/translator.tpl');
    }

    function displayAddWordForm($message = null) {
        $this->smarty->assign('message', $message);
        $this->smarty->display('templates/addWordPage.tpl');
    }
}