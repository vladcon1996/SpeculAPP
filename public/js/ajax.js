
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

var setIntervalId;

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
            var currencies2 = document.getElementsByClassName("currencies");
            for( var i = 0 ; i < currencies2.length ; i++ ) {
                currencies2[i].addEventListener("click",function getValues() {
                    
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var currencyInfo = JSON.parse(this.responseText);
                            console.log(currencyInfo);

                            document.getElementById("Current").innerHTML = currencyInfo.currencyName;
                            document.getElementById("inter").innerHTML = currencyInfo.intervalBegin + " - " + currencyInfo.intervalEnd;
                            document.getElementById("time").innerHTML = currencyInfo.time;
                            values = [{y:5},{y:9}]
                            clearInterval(setIntervalId);
                            if( chart != null ) {
                                chart.destroy();
                            }
                            chart = new CanvasJS.Chart("chartContainer", { 
                                zoomEnabled: true,
                                title: {
                                    text: currencyInfo.currencyName
                                },
                                axisX: {
                                    minimum: 0,
                                    title : "Time units"
                                },
                                axisY: {
                                    minimum: currencyInfo.intervalBegin,
                                    maximum: currencyInfo.intervalEnd,
                                    includeZero: false,
                                    title: "Value"
                                },
                                data: [
                                {
                                    type: "spline",
                                    dataPoints: currencyInfo.values
                                }
                                ]
                            });
                            setIntervalId = setInterval( function() {
                                var xhr2 = new XMLHttpRequest();
                                xhr2.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        addPoint( 
                                            { y : parseFloat(this.responseText) }
                                        );
                                    }
                                }
                                xhr2.open("GET","getLastValue/"+ currencyInfo.currencyName,true);
                                xhr2.send();
                            },
                            currencyInfo.time * 1000 );
                        }
                    }
                    xhr.open("GET", "getCurrencyInfo/" + this.innerHTML , true);
                    xhr.send();
                });
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
    }
    xmlhttp.open("GET", "getCurrency", true);
    xmlhttp.send();
}

window.addEventListener("load",getCurrencies());