"use strict";

document.querySelector('#btn-goHome').addEventListener('click', function redirectHome() {
    window.location.href = 'translate';
});

document.querySelector('#newWord').addEventListener('keyup', addWord);
document.querySelector('#wordTranslation').addEventListener('keyup', addWord);
document.querySelector('#btn-addWord').addEventListener('click', addWord);
function addWord(e) {
    if (e.keyCode === 13 || e.type === 'click') {
        e.preventDefault();
        let word = document.querySelector('#newWord').value;
        let translate = document.querySelector('#wordTranslation').value.toLowerCase();
        let message = document.querySelector('.message');
        if (word && translate) {
            // let url = `add/${word}/${translate}`;
            // window.location.href = url;
            post('add', {name: word + '/' + translate});
        } else {
            message.innerHTML = 'Complete all fields';
        }
    }
}

// Redirect to url with method POST
function post(path, params, method = 'POST') {
    const form = document.createElement('form');
    form.method = method;
    form.action = path;

    for (const key in params) {
        if (params.hasOwnProperty(key)) {
          const hiddenField = document.createElement('input');
          hiddenField.type = 'hidden';
          hiddenField.name = key;
          hiddenField.value = params[key];
    
          form.appendChild(hiddenField);
        }
    }
    
    document.body.appendChild(form);
    form.submit();
}

document.querySelector('#title').addEventListener('click', function addWordLocation() {
    window.location.href = 'translate';
});