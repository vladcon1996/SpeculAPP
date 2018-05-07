function showDivs( pageNr , n) {
    var i;
    var x = document.getElementsByClassName("myPage");
    console.log(pageNr,n);
    pageNr = parseInt(pageNr);
    n = parseInt(n);
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

// window.addEventListener("load",function() {
//     var myPages = document.getElementsByClassName("myPage");
//     showDivs( myPages.length/2 , 1 );
//     console.log(myPages.length/2);
//     for( var i = 0 ; i < myPages.length/2 ; i++ ) {
//         var pageList = myPages[i].getElementsByTagName("LI");
//         console.log(pageList);
//         for( var j = 0 ; j < pageList.length ; j++ ) {
//                 if( i == j ) {
//                     console.log(pageList[j].getElementsByTagName("A")[0]);
//                     pageList[j].getElementsByTagName("A")[0].className +=  " active";
//                 } else {
//                     console.log(pageList[j].getElementsByTagName("A"));
//                     pageList[j].getElementsByTagName("A")[0].addEventListener("click",showDivs( myPages.length/2 , j + 1 ));
//                 }
//         }
//     }
// });

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