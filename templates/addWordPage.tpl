<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f27d919b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleAdd.css">
    <title>TraducTepaWeb | Add</title>
</head>
<body>
    <div class="title-translator">
        <p id="title" class="tit-p1-translator">TRADUCTEPA WEB</p>
        <p id="langTranslated" class="tit-p2-translator">日本語 <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Español</p>
    </div>
    <div class="cont-add">
        <div>
            <p>New Word (日本語): <input type="text" id="newWord" autofocus></p>
            <p>Translation (Español): <input type="text" id="wordTranslation"></p>
            <div class="cont-add-btn">
                <button id="btn-addWord">Add</button>
                <button id="btn-goHome">Home</button>
            </div>
            <p class="message">{if !$message == ''}{$message}{else}{/if}</p>
        </div>
    </div>
    <script src="js/addWord.js"></script>
</body>
</html>