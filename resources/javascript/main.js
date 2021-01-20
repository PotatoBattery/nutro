function previousPage(){
    window.history.back();
}

function showLanguageOptions(){
    document.getElementById('language').style.display = "none";
    document.getElementById('language-options').style.display = "block";
}
function checkType(){
    var flag = getCheckedRadioValue('lang');
    var language = '';
    switch (flag){
        case "ru":
            document.getElementById('language').innerHTML = 'Русский';
            language = 'ru';
            break;
        case "en":
            document.getElementById('language').innerHTML =  'English';
            language = 'en'
            break;
        default:
            document.getElementById('language').innerHTML =  'Русский';
            language = 'ru';
            break;
    }
    document.getElementById('language').style.display = "block";
    document.getElementById('language-options').style.display = "none";
    $.ajax({
        type:'post',
        url:'/resources/php/setcookie.php?language',
        data: {
            language:language,
        },
        success:function(){
            location.reload();
        }
    });
}

function changeColorTheme(el){
    var theme = '';
    if($(el).is(':checked')){
        theme = 'wb';
    }else{
        theme = 'color'
    }
    $.ajax({
        type:'post',
        url:'/resources/php/setcookie.php?theme',
        data: {
            theme:theme,
        },
        success:function(){
            location.reload();
        }
    });
}

function getCheckedRadioValue(name) {
    var elements = document.getElementsByName(name);
    for (var i=0, len=elements.length; i<len; ++i)
        if (elements[i].checked) return elements[i].value;
}

function setCookie(name, value, pluginOptions = {}) {
    cookieOptions = $.extend({}, pluginOptions);
    if (cookieOptions.expires instanceof Date) {
        cookieOptions.expires = cookieOptions.expires.toUTCString();
    }
    updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
    for (optionKey in cookieOptions) {
        console.log(cookieOptions[optionKey]);
        updatedCookie += "; " + optionKey;
        optionValue = cookieOptions[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }
    document.cookie = updatedCookie;
}

function getCookie(name) {
    matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : '';
}