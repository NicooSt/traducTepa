<?php
class TranslatorModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_traductepa;charset=utf8', 'root', '');
    }

    function getWordJP_ES($word) {
        $request = $this->db->prepare('SELECT * FROM words WHERE word = ?');
        $request->execute(array($word));
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    function getWordES_JP($word) {
        $request = $this->db->prepare('SELECT * FROM words WHERE translation = ?');
        $request->execute(array($word));
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    function checkWordInDB($word, $translate) {
        $request = $this->db->prepare('SELECT * FROM words WHERE word = ? AND translation = ?');
        $request->execute(array($word, $translate));
        return $request->fetch(PDO::FETCH_OBJ);
    }

    function addWordToDB($word, $translate) {
        $request = $this->db->prepare('INSERT INTO words (word, translation)' . 'VALUES (?, ?)');
        $request->execute(array($word, $translate));
    }
}