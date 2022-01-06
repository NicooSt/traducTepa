<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f27d919b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleHome.css">
    <title>TraducTepaWeb | Translate</title>
</head>
<body>
    <div class="title-translator">
        <p id="title" class="tit-p1-translator">TRADUCTEPA WEB</p>
        <p id="langTranslated" class="tit-p2-translator">{$translationLang}</p>
        <i id="changeTranslator" class="fas fa-exchange-alt"></i>
    </div>
    <div id="form-translator" class="cont-translator">
        <p>MINNA NO NIHONGO VOCABULARY</p>
        <input id="inp-translator" autofocus>
        <div class="cont-btn-translator">
            <button id="btn-submit">Translate</button>
            <button id="btn-addWord">Add Word</button>
        </div>
        <p class="message">{if !$message == ''}{$message}{else}{/if}</p>
        <ol>
            {foreach from=$translation item=$word}
                <li>{$word->word}:  {$word->translation}</li>
            {/foreach}
        </ol>
    </div>
    <script src="js/translator.js"></script>
</body>
</html>