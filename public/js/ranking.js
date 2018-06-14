

window.addEventListener("load",function ranking() {
    var rankingTime = document.getElementById("rankingtime").innerHTML;
    document.getElementById("rankingtime").innerHTML = rankingTime + " " +  new Date().toUTCString();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var users = JSON.parse(this.responseText);
            console.log(users);
            var txt = "";
            var count = 0;
            for( x in users) {
                count++;
                txt += "<tr><td>" + count + 
                        "</td><td>" + users[x].username + 
                        "</td><td>" + users[x].estimatedAmount + "</td></tr>";
            }
            document.getElementById("rankingTable").getElementsByTagName("tbody")[0].innerHTML = txt;
            var node = document.createElement("BUTTON");
            node.classList.add("Print");
            node.innerHTML = "Print to PDF";
            node.setAttribute("onclick", "window.print();");
            document.getElementsByClassName("full")[0].appendChild(node);
        }
    }
    xmlhttp.open("GET", "getUserInfo", true);
    xmlhttp.send();
});