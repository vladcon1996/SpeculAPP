
function getWallet() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var wallet = JSON.parse(this.responseText);
            var txt = "";
            for( x in wallet) {
                txt += "<tr><th></th><td>" + wallet[x].currency + 
                            "</td><td>" + wallet[x].amount + "</td></tr>";
            }
            document.getElementById("walletTable").getElementsByTagName("tbody")[0].innerHTML = txt;
        }
    };
    xmlhttp.open("GET", "getWallet", true);
    xmlhttp.send();
};

function getTransactions() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var transaction = JSON.parse(this.responseText);
            console.log(transaction);
            var txt = "";
            for( x in transaction) {
                txt += "<tr><th></th><td>" + transaction[x].soldamount + 
                            "</td><td>" + transaction[x].soldcurrency +
                            "</td><td>" + transaction[x].boughtamount +
                            "</td><td>" + transaction[x].boughtcurrency +
                            "</td><td>" + transaction[x].date.date + "</td></tr>";
            }
            document.getElementById("historyTable").getElementsByTagName("tbody")[0].innerHTML = txt;
        }
    };
    xmlhttp.open("GET", "getTransactions", true);
    xmlhttp.send();
}


window.addEventListener("load",function getInfo() {
    getWallet();
    getTransactions();
});