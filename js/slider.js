function showDivs( pageNr , n) {
    var i;
    var x = document.getElementsByClassName("myPage");
    if (n > pageNr) {
        n = 1;
    } else if (n < 1) {
        n = pageNr;
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    for ( i = n; i <= x.length ; i = i + pageNr )
        x[i-1].style.display = "flex";  
}

/*function randomPage( pageArray ) {
    var inter = pageArray.length,
    r = Math.random(),
    i = 0,
    index = 0;
    while( i < r ) {
        i = i + 1/inter;
        index++;
    }
    return pageArray[index-1];
}*/