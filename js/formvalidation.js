function isInterval() {
    var inf = parseInt(document.forms["newCurrency"]["intervalbg"].value),
    sup = parseInt(document.forms["newCurrency"]["intervalend"].value);
    if( inf > sup ) {
        console.log(document.forms["newCurrency"]["intervalbg"].value);
        console.log(document.forms["newCurrency"]["intervalend"].value);
        alert("( " + inf + " , " + sup + " ) is not a valid interval*");
        return false;
    }
}

function isPassword() {
    if( document.forms["register"]["psw"].value !== document.forms["register"]["psw-repeat"].value )
    {
        alert("Your passwords do not match*");
        return false;
    }
}