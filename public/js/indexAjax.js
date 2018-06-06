
function getRegisterMessage(oFormElement) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("registerMessage").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "register", true);
    xmlhttp.send(new FormData(oFormElement));
};


function getLoginMessage(oFormElement) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'user') {
                window.location.href = 'exchange';
            } else if (this.responseText === 'admin' ) {
                window.location.href = 'admin';
            } else {
                document.getElementById("loginMessage").innerHTML = this.responseText;
            }
        }
    };
    xmlhttp.open("POST", "login", true);
    xmlhttp.send(new FormData(oFormElement));
};