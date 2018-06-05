document.getElementsByTagName("input")[0].addEventListener('keyup',function showHint() {
    str = document.getElementsByTagName("input")[0].value;
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../app/blah.php?q=" + str, true);
        xmlhttp.send();
    }
});