
// document.getElementsByTagName("input")[0].addEventListener('keyup',function showHint() {
//     str = document.getElementsByTagName("input")[0].value;
//     if (str.length == 0) { 
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else {
//         var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("txtHint").innerHTML = this.responseText;
//             }
//         };
//         xmlhttp.open("GET", "../app/blah.php?q=" + str, true);
//         xmlhttp.send();
//     }
// });

function getCurrencies() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var currencies = JSON.parse(this.responseText);
            console.log(currencies);
            var txt = "",
                txt2 = "";
            for( x in currencies) {
                txt += "<a class='currencies'>" + currencies[x].name + "</a>";
                txt2 += "<option>" + currencies[x].name + "</option>";
            }
            var array = document.getElementsByClassName("dropdown-content");
            for( i=0; i < array.length; i++ ) {
                array[i].innerHTML = txt;
            }
            var firstSelect = document.getElementById("first");
            if( firstSelect ) {
                firstSelect.innerHTML = txt2;
            }
            var secondSelect = document.getElementById("second");
            if( secondSelect ) {
                secondSelect.innerHTML = txt2;
            }
        }
    };
    xmlhttp.open("GET", "getCurrency", true);
    xmlhttp.send();
}

window.addEventListener("load",getCurrencies());

