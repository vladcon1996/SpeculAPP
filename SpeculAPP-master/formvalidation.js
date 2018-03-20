function isInterval() {
    var inf = document.forms["newCurrency"]["intervalbg"].value;
    sup = document.forms["newCurrency"]["intervalend"].value;
    if( inf > sup ) {
        alert("( " + inf + " , " + sup + " ) is not a valid interval*");
        return false;
    }
}