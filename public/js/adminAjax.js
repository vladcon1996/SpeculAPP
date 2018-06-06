

function getAddCurrencyMessage(oFormElement) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("addCurrencyMessage").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "addCurrency", true);
    xmlhttp.send(new FormData(oFormElement));
};