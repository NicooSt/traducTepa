<?php
require_once 'model/TranslatorModel.php';
require_once 'view/TranslatorView.php';

class TranslatorController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new TranslatorModel();
        $this->view = new TranslatorView();
    }

    function showHome() {
        $translationLang = '日本語 <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Español';
        $this->view->showHomeLocation(null, null, $translationLang);
    }

    function translateWord($action) {
        $word = $_POST['name'];
        if ($word) {
            if ($action == 'translateJP-ES') {
                $translationJP_ES = $this->model->getWordJP_ES($word);
                $translationLang = '日本語 <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Español';
                if ($translationJP_ES) {
                    $this->view->showHomeLocation($translationJP_ES, null, $translationLang);
                } else {
                    $this->view->showHomeLocation(null, 'The word doesnt exist', $translationLang);
                }
            } else if ($action == 'translateES-JP') {
                $translationES_JP = $this->model->getWordES_JP($word);
                $translationLang = 'Español <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> 日本語';
                if ($translationES_JP) {
                    $this->view->showHomeLocation($translationES_JP, null, $translationLang);
                } else {
                    $this->view->showHomeLocation(null, 'The word doesnt exist', $translationLang);
                }
            }
        } else {
            $this->view->showHomeLocation(null, 'The field remains to be completed', null);
        }
    }

    function addWordLocation() {
        $this->view->displayAddWordForm();
    }

    function addWord() {
        $words = $_POST['name'];
        $params = explode('/', $words);
        $word = $params[0];
        $translate = $params[1];
        
        if ($word && $translate) {
            $checkWord = $this->model->checkWordInDB($word, $translate);
            if (!$checkWord) {
                $this->model->addWordToDB($word, $translate);
                $this->view->displayAddWordForm('The word has been successfully added');
            } else {
                $this->view->displayAddWordForm('The word already exists');
            }
        } else {
            $this->view->displayAddWordForm('Complete all fields');
        }
    }
}