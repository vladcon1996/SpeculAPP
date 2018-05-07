if( window.location.href.search("home") == -1 ) {
    var url = window.location.href;
    url += "home/index";
    window.location.href = url;
}