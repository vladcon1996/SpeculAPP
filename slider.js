var pageNr = 2;
showDivs(1);

function showDivs(n) {
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