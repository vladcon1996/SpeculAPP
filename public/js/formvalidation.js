function isInterval() {
    var inf = parseInt(document.forms["newCurrency"]["intervalbg"].value);
    sup = parseInt(document.forms["newCurrency"]["intervalend"].value);
    if( inf > sup ) {
        alert("( " + inf + " , " + sup + " ) is not a valid interval*");
        return false;
    }
    return true;
}

function isInterval2() {
    var inf = parseInt(document.forms["setLimits"]["lose"].value);
    sup = parseInt(document.forms["setLimits"]["win"].value);
    if( inf > sup ) {
        alert("( " + inf + " , " + sup + " ) is not a valid interval*");
        return false;
    }
    return true;
}

function isPassword() {
    if( document.forms["register"]["psw"].value !== document.forms["register"]["psw-repeat"].value ) {
        // alert("Your passwords do not match*");
        return false;
    }
    return true;
}

function requiredFields( formName ) {
    if( formName ) {
        var inputFields = document.forms[formName].getElementsByTagName("INPUT");
        var i;
        for( i = 0 ; i < inputFields.length; i++ ) {
            if( inputFields[i].value === "" ) {
                return false;
            }
        }
        return true;
    }
    return false;
}

function nodeCreation( text ) {
    var para = document.createElement("p"),
        node = document.createTextNode( text );
    para.appendChild(node);
    return para;
}

if( document.forms["register"]) {
    document.forms["register"].addEventListener("submit", function() {
        var regForm = document.forms["register"];
        if( requiredFields("register") ) {
            if( isPassword()) {
                regForm.action = "register";
            } else {
                regForm.appendChild( nodeCreation("Your passwords do not match*"));
            }
        } else {
            regForm.appendChild( nodeCreation("All fields required*") );
        }
    });
}

if( document.forms["newCurrency"]) {
    document.forms["newCurrency"].addEventListener("submit", function() {
        var regForm = document.forms["newCurrency"];
        if( requiredFields("newCurrency") ) {
            if( isInterval() ) {
                getAddCurrencyMessage(this);
            } else {
                regForm.appendChild( nodeCreation("Invalid interval"));
            }
        } else {
            regForm.appendChild( nodeCreation("All fields required*") );
        }
    });
}

if( document.forms["setLimits"]) {
    document.forms["setLimits"].addEventListener("submit", function() {
        var regForm = document.forms["setLimits"];
        if( requiredFields("setLimits") ) {
            if( isInterval2() ) {
                regForm.action = "#";
            } else {
                regForm.appendChild( nodeCreation("Invalid interval"));
            }
        } else {
            regForm.appendChild( nodeCreation("All fields required*") );
        }
    });
}

if( document.forms["exchange"] ) {
    document.forms["exchange"].addEventListener("submit",function() {
        var exForm = document.forms["exchange"];
        if( requiredFields("exchange") ) {
            if( document.getElementById("first").value === document.getElementById("second").value ) {
                exForm.appendChild( nodeCreation(" Try exchanging different currencies*")); 
            } else {
                exForm.action = "makeTransaction";
            }
        } else {
            exForm.appendChild( nodeCreation("All fields required*") );
        }
    });
    document.getElementById("firstamount").addEventListener("input",function() {
        var firstamount =  document.getElementById("firstamount");
        var secondamount = document.getElementById("secondamount");
        secondamount.value = 0.3 * firstamount.value;
    });
}
