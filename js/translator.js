"use strict";

document.querySelector('#changeTranslator').addEventListener('click', function changeTranslator() {
    let langTranslated = document.querySelector('#langTranslated');
    if (langTranslated.innerHTML == '日本語 <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Español') {
        langTranslated.classList.add('tit-p2-animation1');
        langTranslated.innerHTML = 'Español <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> 日本語';
        langTranslated.classList.remove('tit-p2-animation2');
    } else if (langTranslated.innerHTML == 'Español <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> 日本語') {
        langTranslated.classList.add('tit-p2-animation2');
        langTranslated.innerHTML = '日本語 <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Español';
        langTranslated.classList.remove('tit-p2-animation1');
    }
});

document.querySelector('#inp-translator').addEventListener('keyup', translate);
document.querySelector('#btn-submit').addEventListener('click', translate);
function translate(e) {
    if (e.keyCode === 13 || e.type === 'click') {
        e.preventDefault();
        let word = document.querySelector('#inp-translator').value;
        let langTranslated = document.querySelector('#langTranslated');
        if (langTranslated.innerHTML == '日本語 <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Español') {
            // let url = `translateJP-ES/${word}`;
            // window.location.href = url;
            post('translateJP-ES', {name: word});
        } else if (langTranslated.innerHTML == 'Español <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> 日本語') {
            // let url = `translateES-JP/${word}`;
            // window.location.href = url;
            post('translateES-JP', {name: word});
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

document.querySelector('#btn-addWord').addEventListener('click', function addWordLocation() {
    window.location.href = 'add-page';
});

document.querySelector('#title').addEventListener('click', function addWordLocation() {
    window.location.href = 'translate';
});