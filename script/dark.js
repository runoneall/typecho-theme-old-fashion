function changeDarkMode() {
    const head = document.getElementsByTagName('head')[0];
    const darkStyle = document.getElementById('dark-style');
    if (darkStyle) {
        head.removeChild(darkStyle);
        document.cookie = 'colorScheme=light; path=/; expires=0';
    } else {
        const link = document.createElement('link');
        link.id = 'dark-style';
        link.rel = 'stylesheet';
        link.href = darkStyleLink;
        head.appendChild(link);
        document.cookie = 'colorScheme=dark; path=/; expires=0';
    }
}
function isDarkMode() {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.startsWith("colorScheme=")) {
            const value = cookie.substring("colorScheme=".length);
            return value === "dark";
        }
    }
    return false;
}
if (isDarkMode()) {
    changeDarkMode();
}