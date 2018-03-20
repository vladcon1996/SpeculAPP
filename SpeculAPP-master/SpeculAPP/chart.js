var chart;

setInterval( function() { 
	addPoint( 
		{ y : Math.random() * ( document.getElementById("inter").innerHTML.split("-")[1] 
		- document.getElementById("inter").innerHTML.split("-")[0] ) 
		+ parseFloat(document.getElementById("inter").innerHTML.split("-")[0]) }
	); 
}, 
document.getElementById("time").innerHTML * 1000 );

function makeChart( values ) {
	chart = new CanvasJS.Chart("chartContainer", { 
        zoomEnabled: true,
		title: {
			text: "EURO->RON "
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

/*function changeBaseCurrency() {
	makeChart([]);
	document.getElementById("Current").innerHTML = this.innerHTML;
}*/

