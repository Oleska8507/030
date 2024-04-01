// ==UserScript==
// @name         My New Bot
// @namespace    http://tampermonkey.net/
// @version      1.1
// @description  Bot for Bing new
// @author       Anisimova Olesya
// @match        https://www.bing.com/*
// @grant        none
// ==/UserScript==

let searchInput = document.getElementsByName("q")[0];
let links = document.links;
let searchBtn = document.getElementById("search_icon");
let keywords = ["Базовые вещи про GIT", "10 самых популярных шрифтов от Google",
                "Отключение редакций и ревизий", "Webpack, Parcel и Rollup",
                "Вывод произвольных типов записей и полей"];
//let keyword = keywords[getRandom(0, keywords.length)];
let keyword = "Вывод произвольных типов записей и полей";

if (searchBtn !== null) {
    let i = 0;
    let timerId = setInterval(()=> {
        searchInput.value += keyword[i];
        i++;
        if(i == keyword.length) {
            clearInterval(timerId);
            searchBtn.click();
        }
    }, 500);
} else {
    let nextBingPage = true;
    for (let i = 0; i < links.length; i++) {
        if (links[i].href.indexOf("napli.ru") != -1) {
            let link =links[i];
            nextBingPage = false;
            console.log("нашел строку " + link);
            setTimeout(()=> {
                link.click();
            }, getRandom (3000, 5000));

            break;
        }
    }
    if (document.querySelector(".sb_pagS").innerText == "5") {
        nextBingPage = false;
        location.href = "https://www.bing.com/";
    }
    if (nextBingPage) {
        setTimeout(()=>{
            document.querySelector(".sb_pagN").click();
        }, getRandom (2000, 4000))


    }
}

function getRandom(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}
