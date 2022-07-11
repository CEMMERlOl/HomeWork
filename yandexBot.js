// ==UserScript==
// @name         yandexBot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  For yandex
// @author       Sidorov A.S.
// @match        https://yandex.ru/*
// @match        https://wikipedia.org/*
// @match        https://*.wikipedia.org/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==


let input_place = document.getElementsByClassName("input__input")[0];
let keywords = ["википедия", "Колумб Христофор", "Александр Сергеевич"];
let keyword = keywords[getRandom(0, keywords.length)];
let links = document.querySelector('a[href*="wikipedia.org"]');
let nextpagelink = document.querySelector("[aria-label='Следующая страница']");

// У википедии есть домены третьего уровня обозначающие различные языковые регионы, чтобы переходы по ссылкам работали, добавил определение этого домена
// Определение домена третьего уровня
let link3dom = location.href;
let url = new URL(link3dom);
let domain = url.hostname.split('.').slice(0,1).join('.');
console.log("The domain name is: "+ domain);

if (input_place !== undefined) {
	click_input_place();
}
else if (location.hostname == "wikipedia.org" || location.hostname == domain + ".wikipedia.org") {
	console.log(domain + ".wikipedia.org");
	let links2wiki = document.querySelectorAll('a[href*="wikipedia.org"]');
	if (getRandom(0, 101) >= 70) {
		location.href = "https://yandex.ru/";
	} else {
	setTimeout(function(){links2wiki[getRandom(0, links2wiki.length)].click();}, getRandom(2000, 3000));
	}
}
else {
	let isnextpage = true;
	if (links !== null && location.hostname !== "wikipedia.org" && location.hostname !== domain + ".wikipedia.org") {
		console.log(domain + ".wikipedia.org");
		isnextpage = false;
		setTimeout(function(){links.click();}, getRandom(500, 1000));
	}
	if (isnextpage == true) {
		nextpagelink.click();
	}
}
function click_input_place () {
	let i = 0;
	let timerId = setInterval(function() {
		input_place.value += keyword[i];
		i++;
		if (i == keyword.length) {
			clearInterval();
			document.getElementsByClassName("mini-suggest_separate-popup_yes")[0].submit();
		}}, 300);
}

function getRandom (min, max) {
	return Math.floor(Math.random()*(max-min) + min);
}
