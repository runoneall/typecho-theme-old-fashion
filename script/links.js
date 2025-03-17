function xhrGet(url) {
    try {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', "https://dev.oneall.eu.org/netdrive.php/" + url, false);
        xhr.send();
        return xhr.responseText;
    } catch (e) {
        console.error(e);
        return null;
    }
}

function putRss(linkItemsArea, rssLinkItems) {
    let rssItemsHtml = "";
    rssItemsHtml += `<hr><div class="links-rss"><h2>近期更新</h2><ul>`;
    for (const rssLinkItem of rssLinkItems) {
        rssItemsHtml += `<li><pre>${rssLinkItem}</pre></li>`;
        if (xhrGet(rssLinkItem)) {
            console.log('RSS 链接有效:' + rssLinkItem);
        }
    }
    rssItemsHtml += `</ul></div>`;
    linkItemsArea.innerHTML += rssItemsHtml;
}

function putLinks(link_json) {
    const linkItemsArea = document.getElementById('linkItemsArea')
    let linkItemsHTML = "";
    let rssLinkItems = [];
    for (const linkItem of JSON.parse(link_json)) {
        linkItemsHTML += `<div class="link-item"><img class="link-item-avatar" src="${linkItem.avatar}"><div class="link-item-content"><a href="${linkItem.url}" target="_blank"><h2>${linkItem.title}</h2></a><p>${linkItem.description}</p></div></div>`;
        if (linkItem.rss) {
            rssLinkItems.push(linkItem.rss);
        }
    }
    linkItemsArea.innerHTML = linkItemsHTML;
    putRss(linkItemsArea, rssLinkItems);
}

// http://localhost:8501/index.php/links.html