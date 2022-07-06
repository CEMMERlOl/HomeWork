// ==UserScript==
// @name         yandexBot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  For yandex
// @author       Alexandr Sidorov
// @match        https://yandex.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==


let keyword = document.getElementsByClassName("input__input")[0]
if (keyword !== undefined){
keyword.value = "youtube";
document.getElementsByClassName("mini-suggest_separate-popup_yes")[0].submit();
} else {
setTimeout( function(){document.querySelector('a[href*="youtube.com"]').click();}, 100);
}
