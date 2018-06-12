
function getUsername() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            document.getElementById("username").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "getUsername", true );
    xmlhttp.send();
}

function getWallet() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var wallet = JSON.parse(this.responseText);
            var txt = "";
            var estimatedAmount = 0;
            for( x in wallet) {
                txt += "<tr><th></th><td>" + wallet[x].currency + 
                            "</td><td>" + wallet[x].amount + "</td></tr>";
                estimatedAmount += wallet[x].estimatedAmount;
            }
            document.getElementById("walletTable").getElementsByTagName("tbody")[0].innerHTML = txt;
            document.getElementById("estimatedAmount").innerHTML = estimatedAmount;
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

function getExchangeMessage(oFormElement) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("transactionMessage").innerHTML = this.responseText;
            getWallet();
            getTransactions();
        }
    };
    xmlhttp.open("POST", "makeTransaction", true);
    xmlhttp.send(new FormData(oFormElement));
}

var echangeSetIntervalId;

function getAmount(oFormElement) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            
        }
    }
    var first = oFormElement.getElementById("first").value;
    var second = oFormElement.getElementById("second").value;
    var firstAmount = oFormElement.getElementById("firstamount").value;
    xmlhttp.open("GET", "getAmount/" + firstAmount + "/" + first + "/" + second, true );
    xmlhttp.send();
}

function exchangeInterval() {
    echangeSetIntervalId = setInterval(getAmount(document.getElementById("exchangeForm")),10*1000);
}

function startInterval() {
    console.log("start");
    var first = document.getElementById("first").value;
    var second = document.getElementById("second").value;
    var firstAmount = document.getElementById("firstamount").value;

    console.log(first + " " + second + " " + firstAmount );
    if( first && second && firstAmount && first != second  ) {
        console.log("yes");
        exchangeInterval();
    }
}

function stopInterval() {
    console.log("stop");
    clearInterval(echangeSetIntervalId);
}

window.addEventListener("load",function getInfo() {
    getWallet();
    getTransactions();
    getUsername();

    document.getElementById("first").addEventListener("blur",startInterval());
    document.getElementById("second").addEventListener("blur",startInterval());
    document.getElementById("firstamount").addEventListener("blur",startInterval());

    document.getElementById("first").addEventListener("change",stopInterval());
    document.getElementById("second").addEventListener("change",stopInterval());
    document.getElementById("firstamount").addEventListener("change",stopInterval());

});