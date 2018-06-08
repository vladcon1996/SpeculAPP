var chart;

var newTimedValues = function() {
	makeChart(document.getElementById("Current").innerHTML + "->" 
			+ document.getElementById("otherValue").options[document.getElementById("otherValue").selectedIndex].value,[{ y : 0 }]); 
		setIntervalId = setInterval( function() {
		addPoint( 
			{ y : Math.random() * ( document.getElementById("inter").innerHTML.split("-")[1] 
			- document.getElementById("inter").innerHTML.split("-")[0] ) 
			+ parseFloat(document.getElementById("inter").innerHTML.split("-")[0]) }
		);
		console.log(new Date().getTime());
		console.log(document.getElementById("time").innerHTML); 
	}, 
	document.getElementById("time").innerHTML * 1000 );
}
function makeChart( title , values ) {
	chart = new CanvasJS.Chart("chartContainer", { 
        zoomEnabled: true,
		title: {
			text: title
		},
		axisX: {
			minimum: 0,
			title : "Time units"
		},
        axisY: {
			minimum: document.getElementById("inter").innerHTML.split("-")[0],
			maximum: document.getElementById("inter").innerHTML.split("-")[1],
			includeZero: false,
			title: "Value"
        },
		data: [
		{
			type: "spline",
			dataPoints: values
		}
		]
	});
	document.getElementById("currentValue").innerHTML = chart.options.data[0].dataPoints[chart.options.data[0].dataPoints.length-1].y;
    chart.render();
}

function addPoint( newValue ) {

	var length = chart.options.data[0].dataPoints.length;
	chart.options.data[0].dataPoints.push( newValue );
	document.getElementById("currentValue").innerHTML = chart.options.data[0].dataPoints[length].y;
	chart.render();

}
    
function updatePoint() {

	var length = chart.options.data[0].dataPoints.length;
	chart.options.data[0].dataPoints[length-1].y = 15 - Math.random() * 10;
	chart.render();

}

document.body.addEventListener("load",newTimedValues());
document.getElementById("otherValue").addEventListener("change",function() {
	if( this.selectedIndex ) {
		newTimedValues();
	}
});

/*function changeBaseCurrency() {
	makeChart([]);
	document.getElementById("Current").innerHTML = this.innerHTML;
}*/

