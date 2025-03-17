function putLinks(link_json) {
    let linkItemsHTML = "";
    for (const JsonItem of JSON.parse(link_json)) {
        linkItemsHTML += `<div class="link-item"><img class="link-item-avatar" src="${JsonItem.avatar}"><div class="link-item-content"><a href="${JsonItem.url}" target="_blank"><h2>${JsonItem.title}</h2></a><p>${JsonItem.description}</p></div></div>`;
    }
    document.getElementById('linkItemsArea').innerHTML = linkItemsHTML;
}