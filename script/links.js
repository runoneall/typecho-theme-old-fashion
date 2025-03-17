function xhrGet(url) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', "https://dev.oneall.eu.org/netdrive.php/" + url, true);
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                resolve(xhr.responseText);
            } else {
                reject(new Error(`HTTP Error: ${xhr.status}`));
            }
        };
        xhr.onerror = function () {
            reject(new Error('Network Error'));
        };
        xhr.send();
    });
}

async function putRss(linkItemsArea, rssLinkItems) {
    let rssItemsHtml = "";
    rssItemsHtml += `<hr><div class="links-rss"><h2>近期更新</h2><ul>`;
    for (const rssLinkItem of rssLinkItems) {
        rssItemsHtml += `<li><pre>${rssLinkItem}</pre></li>`;
        xhrGet(rssLinkItem)
            .then(() => console.log('RSS 链接有效:' + rssLinkItem))
            .catch(() => { });
    }
    rssItemsHtml += `</ul></div>`;
    linkItemsArea.innerHTML += rssItemsHtml;
}

function putLinks(link_json) {
    const linkItemsArea = document.getElementById('linkItemsArea');
    let linkItemsHTML = "";
    let rssLinkItems = [];
    for (const linkItem of JSON.parse(link_json)) {
        linkItemsHTML += `<div class="link-item"><img class="link-item-avatar" src="${linkItem.avatar}"><div class="link-item-content"><a href="${linkItem.url}" target="_blank"><h2>${linkItem.title}</h2></a><p>${linkItem.description}</p></div></div>`;
        if (linkItem.rss) {
            rssLinkItems.push(linkItem.rss);
        }
    }
    linkItemsArea.innerHTML = linkItemsHTML;
    setTimeout(() => putRss(linkItemsArea, rssLinkItems), 0);
}