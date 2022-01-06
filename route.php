<?php
require_once 'controller/TranslatorController.php';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'translate';
}

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
$params = explode('/', $action);
$translatorController = new TranslatorController();

switch ($params[0]) {
    case 'translate':
        $translatorController->showHome();
        break;
    case 'translateJP-ES':
        $translatorController->translateWord($params[0]);
        break;
    case 'translateES-JP':
        $translatorController->translateWord($params[0]);
        break;
    case 'add-page':
        $translatorController->addWordLocation();
        break;
    case 'add':
        $translatorController->addWord();
        break;    
    default:
        echo 'Error route.php';
        break;
}
