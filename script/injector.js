function inject(script) {
    var s = document.createElement('script');
    s.setAttribute('type', 'text/javascript');
    s.src = chrome.extension.getURL(script);
    s.onload = function() {
        this.parentNode.removeChild(this);
    };
    (document.head || document.documentElement).appendChild(s);
}

inject('parse.min.js');
inject('script.js');